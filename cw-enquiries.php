<?php
ob_start();
$page="enquiries";
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
        <h3 class="main-heading">Enquiries
        
        <form class="s_form" action="<?php echo $my_path; ?>/cw/enquiries.aspx">
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
if(isset($_GET["q"])){
$q=$_GET["q"];
$sql1="SELECT *,(select First_name from job_seeker where Job_Seeker_Id=i.jid) as jname, (select name from  industry where id=i.iid) iname, (select name from domains where id=i.did) dname FROM enquiry_info i where cwid='$user_info[Content_writer_id]' and  (created_on like '%$q%'  or   approve like '%$q%'  or   jid in(select Job_Seeker_Id from job_seeker where  First_name like '%$q%')  )";
$stmt_dom = $db->query("$sql1");
}
else {
$sql1="SELECT *,(select First_name from job_seeker where Job_Seeker_Id=i.jid) as jname, (select name from  industry where id=i.iid) iname, (select name from domains where id=i.did) dname FROM enquiry_info i where cwid='$user_info[Content_writer_id]' order by id desc";
//$sql_dom="SELECT *,(select First_name from job_seeker where Job_Seeker_Id=i.jid) as jsname FROM chat_info i where cwid='$user_info[Content_writer_id]' order by id desc";
$stmt_dom = $db->query("$sql1 limit $id,$no");
//$stmt_dom->execute();
}
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
             <th>Job Seeker Name</th>
<!--            <th>Industry</th>
            <th>Domain</th>
            <th>Profile Type</th>
            <th>Experience</th>-->
            <th>Enquiry On</th>
            <th>Status</th>
             <th>Action</th>
            <th class="hide">hide Action</th>
        </thead>
        <tbody>
<?php
while($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)){
?>    
           <tr class="preview" data-rid="<?php echo $row_dom["jid"]; ?>">
                 <td><?php echo $row_dom["jname"]; ?>
                 
                 
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
<!--                <td><?php echo $row_dom["iname"]; ?></td>
                <td><?php echo $row_dom["dname"]; ?></td>
                <td><?php echo $row_dom["ptype"]; ?></td>
                <td><?php echo $row_dom["exp_years"]."Years ".$row_dom["exp_mnths"]."Months "; ?></td>-->
               
                <td><?php echo date("d M Y h:i A",strtotime($row_dom["created_on"])); ?></td><td class="<?php echo $row_dom["approve"]; ?>"><?php echo $row_dom["approve"]; ?></td>
                 <td><a href="<?php echo $my_path; ?>/cw/i-<?php echo $row_dom["id"]; ?>/delete-enquiry.aspx" onclick="javascript:return confirm('Do you want Delete This?');" class="btn-rsms" title='Delete'><i class="fa fa-trash-o"></i></a></td>
                <td class="clone_data hide">
                    <?php if($row_dom["approve"]=="Pending") { ?>
                    <a href="<?php echo $my_path; ?>/cw/e-<?php echo $row_dom["id"]; ?>/approve.aspx" class="btn btn-primary open2"><i class="fa fa-check"></i> Approve</a> <a href="<?php echo $my_path; ?>/cw/e-<?php echo $row_dom["id"]; ?>/cancel.aspx" class="btn btn-primary open2"><i class="fa fa-times"></i> Cancel</a>
                    <?php } ?>
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
$r_url=$my_path."/cw/enquiries";
$obj->page($sql1,$no,$r_url,$db);
}
?>
</ul><!-- End Pagination -->                     
</div>      
     
        
    </div>
   <div class="col-sm-4">
      
  <?php require_once 'cw_sidebar.php'; ?>      
        
    </div>
    
</div>
</div>
</div>
</section>  <!--/gmap_area -->

<?php
include "footer.php";
include "cw-jsinfopopup.php";
?>
