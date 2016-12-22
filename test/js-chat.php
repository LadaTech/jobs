<?php
ob_start();
$page="chat";
include "header.php";
include 'js-session-check.php';
?>
    <style>
        div.papersheet-outer{
                margin-right: 0px;
    margin-left: 0px;
    width: 100%;
        }
    </style>
<section class="inner_page_info">
<div class="gmap-area1">

<div class="container">
<div class="row profile">
    <div class="col-sm-8">
        <h3 class="main-heading">Chat
        
         <form class="s_form" action="<?php echo $my_path; ?>/job-seeker/chat.aspx">
                <div class="">
<input type="text" class="form-control" name="q" placeholder="Search Keyword"   value="<?php if(isset($_GET["q"])){ echo $_GET["q"]; } ?>"/>
                    <input type="submit" name="" value="Search" class="btn btn4" />
                </div>   
                <div class="clearfix"></div>
            </form>
        </h3>
        
<?php
if(isset($_GET['msg']))
{
$msg=$_GET['msg'];
if($msg=='resume-saved')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> New Resume has been saved.</h4>

</div>
<?php   
}
if($msg=='chat-deleted')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Chat has been deleted.</h4>

</div>
<?php   
}
/***********************Resend  activatelinksent ***********************************/
}
?>
        
<div class="row my-resumes">
<?php
if(isset($_GET["q"])){
$q=$_GET["q"];
$sql1="SELECT *,(select First_name from content_writer where Content_writer_id=i.cwid) as cwname FROM chat_info i where jid='$user_info[Job_Seeker_Id]' and del='0' and (created_on like '%$q%'  or cwid in (select Content_writer_id from content_writer where First_name like '%$q%') )";
$stmt_dom = $db->query("$sql1");
}
else {	
$sql1="SELECT *,(select First_name from content_writer where Content_writer_id=i.cwid) as cwname FROM chat_info i where jid='$user_info[Job_Seeker_Id]' and del='0' order by id desc";
$stmt_dom = $db->query("$sql1 limit $id,$no");
}
//$stmt_dom->execute();

if ($stmt_dom->rowCount() == 0){
?>
    <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-times"></i> Sorry, No Chat Found!</h4>
</div>
<?php    
}
else{
?>
    <table class="table-wrapper">
        <thead>
            <th>Content Writer Name</th>
            <th>Messages</th>
            <th>Message On</th>
            <th>Action</th>
        </thead>
        <tbody>
<?php
while($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)){
?>    
            <tr class="preview <?php if($row_dom["jsread"]==0) { echo "unread"; }?>" data-rid="<?php echo $row_dom["cwid"]; ?>">
               <td><?php echo $row_dom["cwname"]; ?></td>
                <td><?php echo substr($row_dom["msg"],0,150); ?></td>
                <td><?php echo date("d M Y h:i A",strtotime($row_dom["created_on"])); ?></td><td><a href="<?php echo $my_path; ?>/job-seeker/cw-<?php echo $row_dom["cwid"]; ?>/start-chat.aspx" class="btn-rsms"><i class="fa fa-mail-forward"></i> Chat</a>
                <a href="<?php echo $my_path; ?>/job-seeker/c-<?php echo $row_dom["id"]; ?>/delete-chat.aspx" onclick="javascript:return confirm('Do you want Delete This?');" class="btn-rsms" title='Delete'><i class="fa fa-trash-o"></i></a>
                </td></tr>
<?php } ?> 
        </tbody>
    </table>
<?php } ?>
</div>
       
        
 <div class="clearfix"></div>                
<div class="center">
<ul class="pagination">
<?php
include 'pagination.php';
if(!isset($_GET["q"])){
$r_url=$my_path."/job-seeker/chat";
$obj->page($sql1,$no,$r_url,$db);
}
?>
</ul><!-- End Pagination -->                     
</div>          
       
        
      
    </div>
    <div class="col-sm-4">
      
  <?php require_once 'js_sidebar.php'; ?>      
        
    </div>
    
</div>
</div>
</div>
</section>  <!--/gmap_area -->
<?php
include "footer.php";
include "js-cwinfopopup.php";
?>