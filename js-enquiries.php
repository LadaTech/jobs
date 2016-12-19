<?php
ob_start();
$page="enquiries";
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
        <h3 class="main-heading">My Enquiries
         <form class="s_form" action="<?php echo $my_path; ?>/job-seeker/enquiries.aspx">
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
if($msg=='sent')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Enquiry has been sent.</h4>

</div>
<?php   
}
if($msg=='enquiry-deleted')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Enquiry has been deleted.</h4>

</div>
<?php   
}
/***********************Resend  activatelinksent ***********************************/
}
?>
        
<div class="row my-resumes">
<?php
/*****************/
//$ur=$db->query("update enquiry_info set jsread=1 where jid='$user_info[Job_Seeker_Id]'");
/***********************/
if(isset($_GET["q"])){
$q=$_GET["q"];
$sql1="SELECT *,(select First_name from content_writer where Content_writer_id=i.cwid) as cwname, (select name from  industry where id=i.iid) iname, (select name from domains where id=i.did) dname FROM enquiry_info i where jid='$user_info[Job_Seeker_Id]' and (created_on like '%$q%' or approve like '%$q%' or ptype like '%$q%' or cwid in (select Content_writer_id from content_writer where First_name like '%$q%') )";
$stmt_dom = $db->query("$sql1");
}
else {	
$sql1="SELECT *,(select First_name from content_writer where Content_writer_id=i.cwid) as cwname, (select name from  industry where id=i.iid) iname, (select name from domains where id=i.did) dname FROM enquiry_info i where jid='$user_info[Job_Seeker_Id]' order by id desc";
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
            <th>Enquiry On</th>
            <th>Status</th>
           <th>Action</th>
            <th class="hide">hide Action</th>
        </thead>
        <tbody>
<?php
while($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)){
?>    
            <tr class="preview" data-rid="<?php echo $row_dom["cwid"]; ?>">
                <td><?php echo $row_dom["cwname"]; ?>
                    <div class="other-info" style="display: none;">
                         <h4 class="sp_heading">Enquiry Info</h4>
                         <div class="col-sm-9">
<div class="col-sm-5 blabel">Industry : </div><div class="col-sm-7"><?php echo $row_dom["iname"]; ?></div> <div class="clearfix"></div>
<div class="col-sm-5 blabel">Domain : </div><div class="col-sm-7"><?php echo $row_dom["dname"]; ?></div><div class="clearfix"></div>
<div class="col-sm-5 blabel">Profile Type : </div><div class="col-sm-7"><?php echo $row_dom["ptype"]; ?></div><div class="clearfix"></div>
<div class="col-sm-5 blabel">Experience : </div><div class="col-sm-7"><?php echo $row_dom["exp_years"]."Years ".$row_dom["exp_mnths"]."Months "; ?></div><div class="clearfix"></div>
    </div>
                         <div class="clearfix"></div>
                    </div>
                
                </td>
               
                <td><?php echo date("d M Y h:i A",strtotime($row_dom["created_on"])); ?></td><td class="<?php echo $row_dom["approve"]; ?>"><?php echo $row_dom["approve"]; ?></td>
                <td><a href="<?php echo $my_path; ?>/job-seeker/i-<?php echo $row_dom["id"]; ?>/delete-enquiry.aspx" onclick="javascript:return confirm('Do you want Delete This?');" class="btn-rsms" title='Delete'><i class="fa fa-trash-o"></i></a></td>
                <td class="clone_data hide">
                  <?php
                  if($row_dom["approve"]=="Pending"){
?>
<div class="col-sm-8 col-sm-offset-2"><a class="btn btn-primary btn3" disabled><i class="fa fa-eye" aria-hidden="true"></i> Enquiry Pending</a></div>      <?php    
}
else
if($row_dom["approve"]=="Approved"){
?>
<div class="col-sm-6"><a href="<?php echo $my_path; ?>/job-seeker/cw-<?php echo $row_dom["cwid"]; ?>/order-now.aspx" class="btn btn-primary btn3"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Order Now</a></div>   
<div class="col-sm-6"><a class="btn btn-primary btn3" href="<?php echo $my_path; ?>/job-seeker/cw-<?php echo $row_dom["cwid"]; ?>/start-chat.aspx"><i class="fa fa-edit" aria-hidden="true"></i> Chat Now</a></div>   

<?php
}
else{
?>
<div class="col-sm-8 col-sm-offset-2"><a class="btn btn-primary btn3" disabled><i class="fa fa-eye" aria-hidden="true"></i> Enquiry Canceled</a></div>      <?php    
}   
                  ?>
                </td>
                
               
            </tr>
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
$r_url=$my_path."/job-seeker/enquiries";
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