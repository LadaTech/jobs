<?php
ob_start();
include "header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
<h1>
Create  Job Seeker
</h1>
<ol class="breadcrumb">
<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="manage_jobseekers.php"><i class="fa fa-users text-aqua"></i>Manage Job Seekers</a></li>
<li class="active">Create  Job Seeker</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->

<div class="row">
    <div class="col-md-1"></div>
            <!-- left column -->
            <div class="col-md-9">
              <!-- Horizontal Form -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Please fill the following details</h3>
                </div><!-- /.box-header -->
                
<!--vb_classifieds  forms values stores here-->
<form name="submenus" action="" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data" onsubmit="return validateform();">
<div class="box-body">
<div class="form-group">
<div class="col-lg-6">
<label class="control-label" for="address">First Name <span class="imp">*</span> </label>
<input type="text" name="fname" id="" placeholder="First Name" value="" class="form-control" required="required"> 
</div>
<div class="col-lg-6">
<label class="control-label" for="address">Last Name <span class="imp">*</span> </label>
<input type="text" name="lname" id="" placeholder="Last Name" value="" class="form-control" required="required"> 
</div>    
<div class="clear"></div>
</div>  
<div class="form-group email_weapper">
<div class="col-lg-12">
<label class="control-label" for="address">Email <span class="imp">*</span> </label>
<input type="email" name="email" id="email_a" placeholder="Email" value="" class="form-control" required="required" autocomplete="off">
<p class="progress_bar"><span class="m_error mail_check"><input type="hidden" name="cf" id="email_check" value="2"></span>
</p>
<span class="email-block imp" style="display: none;">Please enter a the Valid Email.</span>      

</div>
<div class="clear"></div>
</div>  


<div class="form-group">
<div class="col-lg-6">
<label class="control-label" for="address">Password <span class="imp">*</span> </label>

<input type="password" placeholder="Password" id="address" name="password" class="form-control" autocomplete="off" required="">

</div>
<div class="col-lg-6">
<label class="control-label" for="address">Contact Number <span class="imp">*</span> </label>

<input type="text" name="Phone_No" id="popupDatepicker" placeholder="Contact Number" value="" class="form-control form-style-small" required="required" autocomplete="off">
</div>    
<div class="clear"></div>
</div>  

<div class="form-group">
<div class="col-lg-6">
<label class="control-label" for="address">Profile Type <span class="imp">*</span> </label> <br/>

<div class="padding-10">  <input type="radio"  id="ptype" name="Experience_level" class="" value="Fresher" required=""> Fresher
&nbsp;&nbsp;&nbsp;
<input type="radio"  id="ptype" name="Experience_level" class="" value="Experienced" required=""> Experienced </div>

</div>
    <div class="col-lg-6">
<label class="control-label" for="address">Industry <span class="imp">*</span> </label>

<select class="form-control" id="Industry" name="Industry" required>
    <option value="">Select Industry</option>
    <?php
    $sql_dom = 'SELECT * FROM industry order by name asc';
    $stmt_dom = $db->query($sql_dom);
//$stmt_dom->execute();

    if ($stmt_dom->rowCount() > 0) {
        while ($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)) {
            echo $row_dom['domain_name'];
            ?>

            <option  value="<?php echo $row_dom['id']; ?>"><?php echo $row_dom['name']; ?></option>
<?php
}
}
?>
</select>
</div>  
 <div class="col-lg-6">
<label class="control-label" for="address">Domain <span class="imp">*</span> </label>

<select class="form-control" id="Domain" name="Domain" required>
    <option value="">Select Domain</option>
</select>
</div>    
<div class="clear"></div>
</div> 
      

</div><!-- /.box-body -->
<div class="box-footer">
<button type="submit" name="submit" class="btn btn-info pull-right">Submit</button>
</div><!-- /.box-footer -->             
</form>
</div><!-- /.box -->

</div>
</div>
</div><!-- /.box-header -->
</section><!-- /.content -->
<!-- content pages -->	
<?php
include "footer.php";
?>
<?php
ob_start();
if(isset($_POST['submit']))
{
$fname=  ucwords($_POST['fname']);
$lname=ucwords($_POST['lname']);
$email=$_POST['email'];
$password=md5($_POST["password"]);
$Industry=$_POST["Industry"];
$Domain=$_POST["Domain"];
$Phone_No=$_POST["Phone_No"];
$Experience_level=$_POST['Experience_level'];
$email_check=$db->prepare("select * from job_seeker where Email_id='$email'");
echo $email_check->execute();
if($email_check->rowCount()==0){
$rs=$db->query("insert into  job_seeker(First_name,Last_name,Email_id,Password,Industry,Domain,Phone_No,Experience_level,language_name,profficiency_level,lan_read,lan_write,lan_speak,usertype_id,inserted_by,updated_by,status) values('$fname','$lname','$email','$password','$Industry','$Domain','$Phone_No','$Experience_level', '', '', '', '', '', 1, '', '',1)") or die(mysql_error());
if($rs==1)
{
    header('Location:manage_jobseekers.php?msg=created');
}
 else {
    header('Location:manage_jobseekers.php?msg=non');
 }
}
else {
    header('Location:manage_jobseekers.php?msg=nopl');
 }
}
ob_end_flush();
?>  
<script type="text/javascript">
//  alert();
$(document).ready(function()
{
$("#email_a").on('keyup blur', function(){
$(".mail_check").empty().append("<image src='<?php echo $my_path; ?>/images/spinner.gif' />");
var id=$(this).val();
//  alert("ff");
$.ajax({
type:"get",
url:"<?php echo $my_path; ?>/get_check_email.php",
data:{"q":id},
success:function(data){
//  alert(data);
$(".mail_check").empty().append(data);
}
});
});

$("#Industry").on('change', function(){
$("#Domain").empty().append("<image src='<?php echo $my_path; ?>/images/spinner.gif' />");
var id=$(this).val();
//  alert("ff");
$.ajax({
type:"get",
url:"<?php echo $my_path; ?>/get_domains.php",
data:{"q":id},
success:function(data){
//  alert(data);
$("#Domain").empty().append(data);
}
});
});
})
</script>

<script type="text/javascript" language="javascript">

function validateform(){
var email_check=document.getElementById("email_check");
if(email_check.value == "1")
{
$(".email-block").css("display", "block");
return false;
}
else{
$(".help-block").css("display", "none");
}
return true;
}
</script>  

		