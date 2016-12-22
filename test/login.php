<?php
ob_start();
?> 
<?php

$page="";
include 'header.php';
?>
<section class="inner_page_info">
<div class="gmap-area1">
<div class="center banner">                
<h2>Job Seeker Login</h2>
</div>
<div class="container  home_content">
    <?php
if(isset($_GET['msg']))
{
$msg=$_GET['msg'];
if($msg=='success')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Congratulations, You have successfully Registered. Please login below. Open your registered email account and  verify your email address.</h4>

</div>
<?php   
}
/***********************Resend  activatelinksent ***********************************/
if($msg=='activatelinksent')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Congratulations, Your activation link has been sent to your registered email.</h4>

</div>
<?php   
}

/***********************Password Sent Message ***********************************/
if($msg=='password-sent')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Congratulations, Your new password has been sent to your registered email.</h4>

</div>
<?php   
}

if($msg=='not-valid')
{
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-times"></i> Sorry, Invalid Login details!</h4>

</div>
<?php   
}
/********************Not activated******************/
if($msg=='not-activated')
{
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-times"></i> Sorry! Account not yet activated. Open your registered email account and  verify your email address <a href="<?php echo $my_path; ?>/job-seeker/send-activation-link.aspx" class="resend-link">Resend activation link</a></h4>

</div>
<?php   
}

/********************Deactivated your account by admin******************/
if($msg=='account-deactivated')
{
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-times"></i> Sorry! Your account has been deactivated.</h4>

</div>
<?php   
}

}



/**************Email verification***************/
if(isset($_GET['activation_code']))
{
  $activation=$_GET['activation_code'];
$c=$db->query("SELECT Job_Seeker_Id FROM job_seeker WHERE email_verification='$activation'");

if($c->rowCount() > 0)
{
$c1=$db->query("SELECT Job_Seeker_Id FROM job_seeker WHERE email_verification='$activation' and email_verification_status=0");

if($c1->rowCount() == 1)
{
$db->query("UPDATE job_seeker SET email_verification_status='1' WHERE email_verification='$activation'");
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Congratulations! Your account is activated. Please login here</h4>
</div>        
<?php
}
else
{
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Your account is already active, no need to activate again. Please login here</h4>

</div>
<?php
}
}
else
{
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-times"></i> Sorry, unable to activate your Profile! Wrong activation code.</h4>

</div>        
<?php
}  
}        
        
        
   /************End Email verification**************/     

?>
<div class="row projects_wrapper  gallery_page">
<div class="row projects_inner">
<div class="col-md-4 col-sm-3">
</div>   
<div class="col-md-4 col-sm-6 login_form">
   <form name="submenus" action="<?php echo $my_path; ?>/login.aspx" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data"> 
     <div class="form-group">
<div class="col-lg-12">
<label class="control-label" for="address">Login as:</label>
</div>
<div class="col-sm-9 col-sm-offset-1"><input type="radio" name="js" class="logins" checked value="1"> Job Seeker &nbsp; <input type="radio" name="js" class="logins" value="2"> Content Writer          
 <div class="clear"></div>
</div> 
     </div>
<div class="form-group">
<div class="col-lg-12">
    <label class="control-label" for="address">Email <span class="imp">*</span> </label>
<input type="email" name="email" id="" placeholder="Email" value="" class="form-control" required="required"> 
</div>
     <div class="clear"></div>
</div>  
    <div class="form-group">
<div class="col-lg-12">
    <label class="control-label" for="address">Password <span class="imp">*</span> </label>
    <a href="<?php echo $my_path; ?>/forgot-password.aspx" style="float:right;">Forgot Password?</a>
    <input type="password" placeholder="Password" id="address" name="password" class="form-control" autocomplete="off" required="">
  
</div>
     <div class="clear"></div>
</div>    
        
<div class="form-group">
<div class="col-lg-8">
<!-- open1 is given in the class that is binded with the click event -->
<p class="new_Account">New User? <a href="<?php echo $my_path; ?>/register.aspx">Register</a> today.</p>
</div>
<div class="col-lg-4">
<!-- open1 is given in the class that is binded with the click event -->
<input type="submit" name="submit" class="btn btn-primary open2" value="Login">
</div>
     <div class="clear"></div>
</div>        
        
    </form>   
     
</div>   
<div class="col-md-4 col-sm-3">
</div>   
</div>
 
    

</div>  
    
</div>
</div>
</section>  <!--/gmap_area -->


<?php
include 'footer.php';
?>
     
<?php
/***************Login***************/
if(isset($_POST["email"])) {
$username=$_POST['email'];
$password=md5($_POST['password']);
try {
$stmtjs=$db->prepare("SELECT * FROM job_seeker WHERE Email_id = :u && Password = :p");
$stmtjs->execute(array(":u"=>$username,":p"=>$password));
if($stmtjs->rowCount()==1){
$js=$stmtjs->fetch(PDO::FETCH_ASSOC);

$uname = $js['User_name'];
$jid = $js['Job_Seeker_Id'];
// print_r($js);
 //exit();
if($js['status']=='1' && $js['email_verification_status']=='1') { 
//$_SESSION['seeker'] = $js['Job_Seeker_Id'];
//unset($_SESSION['school']);
$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $js['First_name']);
$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
$clean = strtolower(trim($clean, '-'));
$clean = preg_replace("/[\/_|+ -]+/", "-", $clean);
echo $p_a=$my_path."/job-seeker/$clean.aspx";
$t_date=date("d F Y");
unset($_SESSION["jsemail"]);
$db->query("UPDATE job_seeker SET online='1' WHERE Job_Seeker_Id='$js[Job_Seeker_Id]'");
$_SESSION["uid"]=$js['Job_Seeker_Id'];
//exit();
header("Location: $p_a");        
}
else{
if($js['email_verification_status']=='0') { 
$_SESSION["jsemail"]=$username;    
$p_a=$my_path."/login/not-activated.aspx";
header("Location: $p_a");           
}    
else{
if($js['status']=='0') { 
    $p_a=$my_path."/login/account-deactivated.aspx";
    header("Location: $p_a");           
   }
}
}
}
else {
 $p_a=$my_path."/login/not-valid.aspx"; // not valid details
header("Location: $p_a");       
}
}
	catch(PDOException $e){
		die("Database error: ".$e->getMessage());
	}
}
?>          
<script>
$(".logins").on("click",function(){
    
var a=$(this).val();
if(a=="2"){
window.location.href="<?php echo $my_path; ?>/cw/login.aspx";
}
});
</script>    