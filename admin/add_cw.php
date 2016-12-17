<?php

ob_start();

include "header.php";

?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

<section class="content-header">

<h1>

Create  Content Writer

</h1>

<ol class="breadcrumb">

<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>

<li><a href="manage_cw.php"><i class="fa fa-users text-aqua"></i>Manage Content Writer</a></li>

<li class="active">Create  Content Writer</li>

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

    <form name="submenus" action="" method="post" class="form-horizontal my_form" id="identicalForm" enctype="multipart/form-data" onsubmit="return validateform();"> 
    
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

<input type="password" placeholder="Password" id="password" name="password" class="form-control" autocomplete="off" required="">

</div>
<div class="col-lg-6">
<label class="control-label" for="address">Confirm Password <span class="imp">*</span> </label>

<input type="password" placeholder="Confirm Password" id="confirm_password" name="c_password" class="form-control" autocomplete="off" required="">

</div>
  
<div class="clear"></div>
</div>  

<div class="form-group">
<div class="col-lg-6">
<label class="control-label" for="address">Gender <span class="imp">*</span> </label> <br/>

<div class="padding-10">  <input type="radio"  id="ptype" name="Gender" class="" value="Male" required=""> Male
&nbsp;&nbsp;&nbsp;
<input type="radio"  id="ptype" name="Gender" class="" value="Female" required=""> Female </div>

</div>
    <div class="col-lg-6">
<label class="control-label" for="address">Contact Number <span class="imp">*</span> </label>

<input type="text" name="Phone_No" id="popupDatepicker" placeholder="Contact Number" value="" class="form-control form-style-small" required="required" autocomplete="off">
</div>   
<!--    <div class="col-lg-6">
<label class="control-label" for="address">Industry <span class="imp">*</span> </label>

<select class="form-control" id="Industry" name="Industry" required>
    <option value="">Select Industry</option>
    <?php
    $sql_dom = 'SELECT * FROM industry order by asc';
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
</div>    -->
  <div class="col-lg-6">
<label class="control-label" for="address">Experience <span class="imp">*</span> </label>
<div class="row">
<div class="col-xs-6">
<select class="form-control" id="exp_years" name="exp_yrs" required>
<option value="">Years</option>
<?php for($k=0;$k<50;$k++) { ?> <option value="<?php echo $k; ?>"><?php echo $k; ?> Years</option><?php } ?>

</select>
</div>
<div class="col-xs-6">
<select class="form-control" id="exp_months" name="exp_mnths" required>
<option value="">Months</option>
<?php for($k=0;$k<12;$k++) { ?> <option value="<?php echo $k; ?>"><?php echo $k; ?> Months</option><?php } ?>
</select>
</div>
</div>
</div>    
    
<div class="col-lg-6">
<label class="control-label" for="address">Education <span class="imp">*</span> </label>
<select type="text" name="Education" id="popupDatepicker" class="form-control form-style-small" required="required" >
    <option value="">-Select-</option>
    <option value="PG">PG</option>
    <option value="Degree">Degree</option>
    <option value="Inter">Inter</option>
    <option value="SSC">SSC</option>
</select>
</div>       
<div class="col-lg-6">
<label class="control-label" for="address">Address <span class="imp">*</span> </label>
<textarea type="text" name="Address" placeholder="Address" class="form-control form-style-small" required="required" ></textarea>
</div> 
<div class="col-lg-6">
<label class="control-label" for="address">Profile Summary <span class="imp">*</span> </label>
<textarea type="text" name="Profile_summary" placeholder="Profile Summary"  class="form-control form-style-small" required="required" ></textarea>
</div>     
    
<div class="clear"></div>
</div> 
        <h4 class='main_heading'>Payment Info</h4>
<div class="tab-content">

<div role="tabpanel" class=" active" id="personal_details">
<h3 class="sub_heading">For Specialized</h3>
<div class="form-group">
    <div class="col-lg-6">
<label class="control-label" for="address">Industry </label>

<select class="form-control" id="Industry" name="iid">
    <option value="">Select Industry</option>
    <?php
    $sql_dom = 'SELECT * FROM industry';
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
  
<div class="clear"></div>
</div>  
<div class="form-group email_weapper">
<div class="col-lg-6">
<label class="control-label" for="address">Fresher Price </label>
<input type="number" name="special_fresher" id="email_a" placeholder="Fresher Price" value="" class="form-control"  autocomplete="off">
</div>
<div class="col-lg-6">
<label class="control-label" for="address">1-3 Experience </label>
<input type="number" name="special_1_exp" id="Alternate_email" placeholder="1-3 Experience" value="" class="form-control"  autocomplete="off">
</div>   
<div class="col-lg-6">
<label class="control-label" for="address">3-5 Experience </label>
<input type="number" name="special_2_exp" id="Alternate_email" placeholder="3-5 Experience" value="" class="form-control"  autocomplete="off">
</div> 
<div class="col-lg-6">
<label class="control-label" for="address">5-10 Experience </label>
<input type="number" name="special_3_exp" id="Alternate_email" placeholder="5-10 Experience" value="" class="form-control"  autocomplete="off">
</div>   
<div class="col-lg-6">
<label class="control-label" for="address">10+ Experience </label>
<input type="number" name="special_4_exp" id="Alternate_email" placeholder="10+ Experience" value="" class="form-control"  autocomplete="off">
</div>       
<div class="clear"></div>
</div>  
<h3 class="sub_heading">For General Price</h3>
<div class="form-group email_weapper">
<div class="col-lg-6">
<label class="control-label" for="address">Fresher Price <span class="imp">*</span> </label>
<input type="number" name="general_fresher" id="email_a" placeholder="Fresher Price" value="" class="form-control" required="required" autocomplete="off">
</div>
<div class="col-lg-6">
<label class="control-label" for="address">1-3 Experience <span class="imp">*</span></label>
<input type="number" name="general_1_exp" id="Alternate_email" placeholder="1-3 Experience" value="" class="form-control"  autocomplete="off" required>
</div>   
<div class="col-lg-6">
<label class="control-label" for="address">3-5 Experience <span class="imp">*</span></label>
<input type="number" name="general_2_exp" id="Alternate_email" placeholder="3-5 Experience" value="" class="form-control"  autocomplete="off" required>
</div> 
<div class="col-lg-6">
<label class="control-label" for="address">5-10 Experience <span class="imp">*</span></label>
<input type="number" name="general_3_exp" id="Alternate_email" placeholder="5-10 Experience" value="" class="form-control"  autocomplete="off" required>
</div>   
<div class="col-lg-6">
<label class="control-label" for="address">10+ Experience <span class="imp">*</span></label>
<input type="number" name="general_4_exp" id="Alternate_email" placeholder="10+ Experience" value="" class="form-control"  autocomplete="off" required>
</div>       
<div class="clear"></div>
</div>  
</div>  

</div>
                
        
        
        
        
            
<div class="form-group">
<div class="col-lg-7">

</div>
<div class="col-lg-4">
<!-- open1 is given in the class that is binded with the click event -->
<input type="submit" name="submit" class="btn btn-primary open2" value="Submit">
</div>
<div class="clear"></div>
</div>        

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

<?php

ob_start();

if(isset($_POST['submit']))

{

$fname=  ucwords($_POST['fname']);
$lname=ucwords($_POST['lname']);
$email=$_POST['email'];
$Gender=$_POST["Gender"];
$password=md5($_POST["password"]);
$Industry=$_POST["Industry"];
$Domain=$_POST["Domain"];
$Phone_No=$_POST["Phone_No"];
$Experience_level=$_POST['Experience_level'];
$Address=$_POST["Address"];
$Profile_summary=$_POST["Profile_summary"];
$exp_yrs=$_POST["exp_yrs"];
$exp_mnths=$_POST["exp_mnths"];
$Education=$_POST["Education"];

$email_check=$db->prepare("select * from content_writer where Email_id='$email'");

echo $email_check->execute();

if($email_check->rowCount()==0){

$rs=$db->query("insert into content_writer(First_name,Last_name,Email_id,Gender,Phone_No,Address,Profile_summary,exp_yrs,exp_mnths,Password,Education,status,email_verification_status) values('$fname','$lname','$email','$Gender','$Phone_No','$Address','$Profile_summary','$exp_yrs','$exp_mnths','$password','$Education','1','1')");
if($rs)
{
$last_id=$db->lastinsertid();    
$iid=$_POST['iid'];
$special_fresher=$_POST['special_fresher'];
$special_1_exp=$_POST['special_1_exp'];
$special_2_exp=$_POST['special_2_exp'];
$special_3_exp=$_POST['special_3_exp'];
$special_4_exp=$_POST['special_4_exp'];
$general_fresher=$_POST['general_fresher'];
$general_1_exp=$_POST['general_1_exp'];
$general_2_exp=$_POST['general_2_exp'];
$general_3_exp=$_POST['general_3_exp'];
$general_4_exp=$_POST['general_4_exp'];
$p2=$db->query("insert into cw_payment_info(cwid,iid,special_fresher,special_1_exp,special_2_exp,special_3_exp,special_4_exp,general_fresher,general_1_exp,general_2_exp,general_3_exp,general_4_exp) values('$last_id','$iid','$special_fresher','$special_1_exp','$special_2_exp','$special_3_exp','$special_4_exp','$general_fresher','$general_1_exp','$general_2_exp','$general_3_exp','$general_4_exp')");
header('Location:manage_cw.php?msg=created');
}
else {
    header('Location:manage_cw.php?msg=non');
 }
}
else {
    header('Location:manage_cw.php?msg=nopl');
 }
}
ob_end_flush();
?>  

<script type="text/javascript">
//  alert();
$(document).ready(function()
{
$("#email_a").on('keyup blur', function(){
$(".mail_check").empty().append("<image src='images/spinner.gif' />");
var id=$(this).val();
//  alert("ff");
$.ajax({
type:"get",
url:"<?php echo $my_path; ?>/get_cw_check_email.php",
data:{"q":id},
success:function(data){
//  alert(data);
$(".mail_check").empty().append(data);
}
});
});

$("#Industry").on('change', function(){
$("#Domain").empty().append("<image src='images/spinner.gif' />");
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
<script>
$(document).ready(function() {
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
    });
</script>



		