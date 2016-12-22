<?php
ob_start();
//echo "abc".$_SESSION['username']."def";
require_once '../db.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>::: <?php echo $compnay_name; ?>  ::: | Forgot Password</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
	 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
   
    <!-- Theme style -->
    <link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="css/blue.css" rel="stylesheet" type="text/css" />
	<script src='https://www.google.com/recaptcha/api.js'></script>
<link rel="apple-touch-icon-precomposed" href="<?php echo $path; ?>images/<?php echo $fav_icon_url; ?>">
        <link rel="shortcut icon" href="<?php echo $path; ?>images/<?php echo $fav_icon_url; ?>" type="image/x-icon">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
         <a href="index.php"><img src="<?php echo $path; ?>images/<?php echo $logo_img_url; ?>"  class="a_logo" alt="<?php echo $compnay_name; ?>" /></a>
      </div><!-- /.login-logo -->
<?php
session_start();
ini_set('display_errors', TRUE);

// Get a key from https://www.google.com/recaptcha/admin/create
	
	# was there a reCAPTCHA response?
	if (isset($_POST["email"])) {
		$username=$_POST['email'];
$length = 10;
$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
$password=$randomString;
$pass=MD5($password);
try{
$email_check=$db->prepare("select * from vb_users where email='$username'");
$email_check->execute();
//echo $email_check->rowCount();
}
catch(PDOException $e){
		die("Database error: ".$e->getMessage());
	}
if($email_check->rowCount()==1){
    $check=$email_check->fetch(PDO::FETCH_ASSOC);
    
	if($check['role']=="admin")
	{
$result=$db->prepare("UPDATE  vb_users set password='$pass' where email='$username'");  
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
<h3>password</h3>
<p>Your password Is:".$password."</p>
      
</body>
</html>";    
$to= $email; 
mail($to,$subject,$message,$headers);
header('Location:index.php?msg=sent');
	}
	else {
		header("Location:index.php?msg=nopl");
		}
}
else {
			# set the error code so that we can display it
			//  $error = $resp->error;
		?>
		<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i>Alert!</h4>
                    Sorry invalid Email  Details.
                  </div>
		<?php			  
		}
		
		ob_end_flush();	
			//$_SESSION['Username']=$_POST['username'];
			//header("Location:index.php");
			
		}
?>
      <div class="login-box-body">
        <p class="login-box-msg">Enter your registered email</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="email"  name="email" class="form-control" placeholder="Email" value="" required/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
		  
          <div class="row">
            <div class="col-xs-8">    
                              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
            </div><!-- /.col -->
          </div>
        </form>


        <a href="index.php">Back to Login</a><br>
      

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="js/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>