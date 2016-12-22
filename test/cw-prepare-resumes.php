<?php
ob_start();
$page="prepare-resumes";
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
    <div class="col-sm-12">
        <h3 class="main-heading">Prepare Resumes</h3>
        
<?php
if(isset($_GET['msg']))
{
$msg=$_GET['msg'];
if($msg=='approved')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Enquiry has been approved.</h4>

</div>
<?php   
}
if($msg=='canceled')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Enquiry has been canceled.</h4>

</div>
<?php   
}
/***********************Resend  activatelinksent ***********************************/
}
?>
        
<div class="row my-resumes">
<?php
$sql_dom="SELECT *,(select First_name from job_seeker where Job_Seeker_Id=i.jid) as jname, (select name from  industry where id=i.iid) iname, (select name from domains where id=i.did) dname FROM cw_ordernow i where cwid='$user_info[Content_writer_id]' and id in(select item_number from payments where payment_status='Completed' and rtype='cw') order by id desc";
//$sql_dom="SELECT *,(select First_name from job_seeker where Job_Seeker_Id=i.jid) as jsname FROM chat_info i where cwid='$user_info[Content_writer_id]' order by id desc";
$stmt_dom = $db->query($sql_dom);
//$stmt_dom->execute();

if ($stmt_dom->rowCount() == 0){
?>
    <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-times"></i> Sorry, No Information Found!</h4>
</div>
<?php    
}
else{
?>
    <table class="table-wrapper">
        <thead>
             <th>Job Seeker Name</th>
            <th>Industry</th>
            <th>Domain</th>
            <th>Profile Type</th>
            <th>Experience</th>
            <th>Enquiry On</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
<?php
while($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)){
?>    
           <tr class="">
                <td><?php echo $row_dom["jname"]; ?></td>
                <td><?php echo $row_dom["iname"]; ?></td>
                <td><?php echo $row_dom["dname"]; ?></td>
                <td><?php echo $row_dom["ptype"]; ?></td>
                <td><?php echo $row_dom["exp_years"]."Years ".$row_dom["exp_mnths"]."Months "; ?></td>
               
                <td><?php echo date("d M Y h:i A",strtotime($row_dom["created_on"])); ?></td><td class="<?php echo $row_dom["approve"]; ?>"><?php echo $row_dom["approve"]; ?></td>
                <td>
                    <?php if($row_dom["approve"]=="Pending") { ?>
                    <a href="#" class="btn btn-primary open2"><i class="fa fa-edit"></i> Create Resume</a>
<!--                    <a href="<?php echo $my_path; ?>/cw/e-<?php echo $row_dom["id"]; ?>/cancel.aspx" class="btn btn-primary open2"><i class="fa fa-times"></i> Cancel</a>-->
                    <?php } ?>
                </td>
               
            </tr>
<?php } ?> 
        </tbody>
    </table>
<?php } ?>
</div>
       
        
        
        
      
    </div>
<!--    <div class="col-sm-4">
      
  <?php //require_once 'cw_sidebar.php'; ?>      
        
    </div>-->
    
</div>
</div>
</div>
</section>  <!--/gmap_area -->
<?php
include "footer.php";
?>