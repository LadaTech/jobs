<?php
ob_start();
$page="notifications";
include "header.php";
include 'cw-session-check.php';
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
        <h3 class="main-heading">Notifications</h3>
        
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
if($msg=='resume-deleted')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Resume has been deleted.</h4>

</div>
<?php   
}
/***********************Resend  activatelinksent ***********************************/
}
?>
        
<div class="row my-resumes">
<?php
$sql_dom="SELECT *,(select First_name from job_seeker where Job_Seeker_Id=i.jid) as jsname FROM chat_info i where cwid='$user_info[Content_writer_id]' order by id desc";
$stmt_dom = $db->query($sql_dom);
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
            <tr class="<?php if($row_dom["cwread"]==0) { echo "unread"; }?>">
                <td><?php echo $row_dom["jsname"]; ?></td>
                <td><?php echo substr($row_dom["msg"],0,150); ?></td>
                <td><?php echo date("d M Y h:i A",strtotime($row_dom["created_on"])); ?></td><td><a href="<?php echo $my_path; ?>/cw/js-<?php echo $row_dom["jid"]; ?>/start-chat.aspx" class="btn-rsms"><i class="fa fa-mail-forward"></i> Chat</a></td></tr>
<?php } ?> 
        </tbody>
    </table>
<?php } ?>
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
?>