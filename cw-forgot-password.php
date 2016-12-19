<?php
ob_start();
$page="";
include 'header.php';
?>
<section class="inner_page_info">
<div class="gmap-area1">
<div class="center banner">                  
<h2>Forgot Password</h2>
</div>
<div class="container  home_content">
<?php
	
	# was there a reCAPTCHA response?
	if (isset($_POST["email"])) {
		$username=$_POST['email'];
$length = 10;
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
$password=$randomString;
$pass=MD5($password);
$email_check=$db->prepare("select * from content_writer where Email_id='$username'");
$email_check->execute();
//echo $email_check->rowCount();
if($email_check->rowCount()==1){
//	if($check['role']=="admin")
//	{
    
    
$result=$db->prepare("UPDATE  content_writer set Password='$pass' where Email_id='$username'");
$result->execute();
$subject ="Jathka.in | Reset Account Password";          
$from = "noreplay@jathka.in";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From:" . $from;
$message = "
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Password</title>
</head>
<body>
<p>Hi,</p>
<p>Let's get you a new one.</p>
<p>Login Email :".$username."</p>
<p>Login password Is:".$password."</p>
    
<p>Thanks for being a OneNess user.</p>
<p>Sincerely,<br/>
Jathka.in</p>     
</body>
</html>";    
$to= $username; 
mail($to,$subject,$message,$headers);
$p_a=$my_path."/cw/login/password-sent.aspx";
header("Location: $p_a");  
}
else {
			# set the error code so that we can display it
			//  $error = $resp->error;
		?>
		<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-times"></i> Sorry, Invalid Email Address!</h4>

</div>
		<?php			  
		}
		
		ob_end_flush();	
			//$_SESSION['Username']=$_POST['username'];
			//header("Location:index.php");
			
		}
?>
<div class="row projects_wrapper  gallery_page">
<div class="row projects_inner">
<div class="col-md-4 col-sm-3">
</div>   
<div class="col-md-4 col-sm-6 login_form">
   <form name="submenus" action="<?php echo $my_path; ?>/cw/forgot-password.aspx" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data"> 
     <div class="form-group">
<div class="col-lg-12">
    <label class="control-label" for="address">Email <span class="imp">*</span> </label>
<input type="email" name="email" id="" placeholder="Email" value="" class="form-control" required="required"> 
</div>
     <div class="clear"></div>
</div>  
        
<div class="form-group">
<div class="col-lg-8">
<!-- open1 is given in the class that is binded with the click event -->
<p class="new_Account">For Login? <a href="<?php echo $my_path; ?>/cw/login.aspx">Back to login</a></p>
</div>
<div class="col-lg-4">
<!-- open1 is given in the class that is binded with the click event -->
<input type="submit" name="submit" class="btn btn-primary open2" value="Submit">
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