<?php
ob_start();
$page="";
include "header.php";
?>

<section class="inner_page_info">
<div class="gmap-area1">
<div class="center banner">                
<h2>Job Seeker Registration</h2>
</div>

<div class="container  home_content">
<div class="row projects_wrapper  gallery_page">
<div class="row projects_inner">



<div class="col-md-3 col-sm-3">
</div>   
<div class="col-md-6 col-sm-6 login_form">
<?php
if(isset($_GET['msg']))
{
$msg=$_GET['msg'];
if($msg=='exist')
{
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-times"></i> Sorry, This Email already exist!</h4>

</div>
<?php   
}
if($msg=='fail')
{
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-times"></i> Sorry, Unable to create your profile please try again!</h4>

</div>
<?php   
}
}
?>  
    <form name="submenus" action="<?php echo $my_path; ?>/register.aspx" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data" onsubmit="return validateform();">
     <div class="form-group">
<div class="col-lg-12">
<label class="control-label" for="address">Register as:</label>
</div>
<div class="col-sm-9 col-sm-offset-1"><input type="radio" name="js" class="logins" checked value="1"> Job Seeker &nbsp; <input type="radio" name="js" class="logins" value="2"> Content Writer          
 <div class="clear"></div>
</div> 
     </div>        
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
<label class="control-label" for="address">Profile Type <span class="imp">*</span> </label> <br/>

<div class="padding-10">  <input type="radio"  id="ptype" name="Experience_level" class="" value="Fresher" required=""> Fresher
&nbsp;&nbsp;&nbsp;
<input type="radio"  id="ptype" name="Experience_level" class="" value="Experienced" required=""> Experienced </div>

</div>
    <div class="col-lg-6">
<label class="control-label" for="address">Contact Number <span class="imp">*</span> </label>

<input type="text" name="Phone_No" id="popupDatepicker" placeholder="Contact Number" value="" class="form-control form-style-small" required="required" autocomplete="off">
</div>   
    <div class="col-lg-6">
<label class="control-label" for="address">Industry <span class="imp">*</span> </label>

<select class="form-control" id="Industry" name="Industry" required>
    <option value="">Select Industry</option>
    <?php
    $sql_dom = 'SELECT * FROM industry  order by name asc';
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

<div class="form-group">
<div class="col-lg-7">
<!-- open1 is given in the class that is binded with the click event -->
<p class="new_Account">Already User? <a href="login.aspx">Login</a> here.</p>
</div>
<div class="col-lg-4">
<!-- open1 is given in the class that is binded with the click event -->
<input type="submit" name="submit" class="btn btn-primary open2" value="Register">
</div>
<div class="clear"></div>
</div>        

</form>   

</div>   
<div class="col-md-3 col-sm-3">
</div>   
</div>



</div>  

</div>
</div>
</section>


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
include "db.php";
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
//$new_to=$_POST["new_to"];
//$years=$_POST["years"];
//$months=mysql_real_escape_string($_POST["months"]);
$status=1;
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
if(preg_match($regex, $email))
{
$activation=md5($email.time());
$email_check=$db->prepare("select * from job_seeker where Email_id='$email'");
echo $email_check->execute();
if($email_check->rowCount()==0){
$jsinsert=$db->query("insert into  job_seeker(First_name,Last_name,Email_id,Password,Industry,Domain,Phone_No,Experience_level,language_name,profficiency_level,lan_read,lan_write,lan_speak,usertype_id,inserted_by,updated_by,status,email_verification,Objective,profile_pic,email_verification_status) values('$fname','$lname','$email','$password','$Industry','$Domain','$Phone_No','$Experience_level', '', '', '', '', '', 1, '', '',1,'$activation','','','0')") or die(mysql_error()); 
if($jsinsert)
{    
/*********************Email Open*********************/        
$subject ="Jatka.in | Email Verification";            
$from = "noreplay@jatka.in";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From:" . $from;
$message = "
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Jatka.in | Account  Email Verification</title>
</head>
<body>
<div style='background:#F6F6F6;padding:15px;'>
<table>
<tr>
<td colspan='3'><img src='$my_path/images/logo.png' width='150px;'></td>
<td><p>&nbsp;</p></td><td><p>&nbsp;</p></td><td><p>&nbsp;</p></td>
<td></td>
</tr>
</table>
</div>
<div style='background:#fff;'>
<p>Hello <b>$fname,</b></p>
<p>We noticed that you need to verify your email address. All you need to do is click the button below (it only takes a few seconds). You won’t be asked to log in to your oneness account – we’re simply verifying Details of this email address.</p><br/>
<p><a href='$my_path/login/$activation/activation.aspx'>Click here for activate your account</a></p>
  <p>  or </p><br/>
<p>(Copy Below link and paste it into browser new tab)    </p>
<p>$my_path/login/$activation/activation.aspx</p>

<p>If you don't verify your email address, we’re required to temporarily put your Account on hold until verification is complete.*</p>

<p>Thanks for being a Jatka.in user.</p>

<p>Sincerely,<br/>
Jatka.in</p>

</div>
<div style='background:#ff8503;padding:15px;'></div>
</body>
</html>";    
$to= $email; 
mail($to,$subject,$message,$headers);
/*********************Email Close*********************/    
$pa=$my_path."/register/success.aspx";
header("Location: $pa");
}
else {
$pa=$my_path."/register/fail.aspx";
header("Location: $pa");
}
}
else {
     $pa=$my_path."/register/email-exist.aspx";
     header("Location: $pa");
 }
 }
else {
     $pa=$my_path."/register/fail.aspx";
     header("Location: $pa");
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
url:"<?php echo $my_path; ?>/get_check_email.php",
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

<script>
$(".logins").on("click",function(){
    
var a=$(this).val();
if(a=="2"){
window.location.href="<?php echo $my_path; ?>/cw/register.aspx";
}
});
</script>    