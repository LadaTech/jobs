<?php
ob_start();
//echo "abc".$_SESSION['username']."def";
require_once '../db.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>::: <?php echo $compnay_name; ?>  ::: | Log In</title>
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
	$error = null;
	
	# was there a reCAPTCHA response?
	if (isset($_POST["email"])) {
  	$username=$_POST['email'];
	$password=$_POST['password'];
		
     
			$login=$db->query("select username from vb_users where username='$username' and password=md5('$password')") or die(mysql_error());
			if($login->rowCount()==1){
				$_SESSION['username'] = $username;
				header("Location: home.php");
			}
		
			 else {
			# set the error code so that we can display it
			//  $error = $resp->error;
		?>
		<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i>Alert!</h4>
                    Sorry invalid Login Details.
                  </div>
		<?php			  
		}
	}
?>
<?php
if(isset($_GET['msg']))
{
$msg=$_GET['msg'];
if($msg=='sent')
{
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> New password sent to your email!</h4>

</div>
<?php    
}
if($msg=='nopl')
{
?>
<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i>Alert!</h4>
                    Sorry You don't have a permission to change the password contact Super Admin.
                  </div>
<?php
}
}
?>
      <div class="login-box-body">
        <p class="login-box-msg"><b>Sign in to start your session</b></p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text"  name="email" class="form-control" placeholder="Username" required/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password"  required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
		  
		   
		  
          <div class="row">
            <div class="col-xs-8">    
            <!--   <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>    -->                    
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
		  </form>


        <a href="forgot_password.php">I forgot my password</a><br>
      

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