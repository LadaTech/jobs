<!DOCTYPE html>
<?php //error_reporting(E_ERROR); 
include 'db.php'; 
include_once 'jobseeker/jobseeker_model.php';

$jobseeker = new jobseeker($db);
?>
    <html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Virtuellhire - Resume Services </title>
        <meta name="description" content="The Spice Lounge">
        
        <meta name="keywords" content="The Spice Lounge">
        <meta name="author" content="The Spice Lounge">

        <link rel="icon" href="imag/favicon.ico" type="image/x-icon" />
        <!-- Loading Google Web fonts-->
        <link href='http://fonts.googleapis.com/css?family=Carrois+Gothic+SC' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!--General CSS-->
        <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="assets/css/font-awesome.css" type="text/css">
        <link type="text/css" rel="stylesheet" href="assets/css/simple-line-icons.css">
        <link rel="stylesheet" href="assets/css/animate.min.css" type="text/css">

        <!--Menu-->
        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <link rel="stylesheet" href="assets/css/menu.css" type="text/css">
        <link rel="stylesheet" href="assets/css/slicknav.css">

        <!--Optional CSS Starts-->

        <!--Owl Slider-->
        <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
        <!--Owl Slider-->

        <!--Gallery Cycle Slider-->
        <link rel="stylesheet" href="assets/css/cycleslider.css">
        <!--Gallery Cycle Slider End-->

        <!--Gallery SuperSized Slider-->
        <link rel="stylesheet" href="assets/css/supersized.css" type="text/css" media="screen">
        <link rel="stylesheet" href="assets/css/supersized.shutter.css" type="text/css" media="screen">
        <!--Gallery SuperSized Slider End-->

        <!--Gallery Filer-->
        <link type="text/css" rel="stylesheet" href="assets/css/portfolio-new.css">
        <link rel="stylesheet" href="assets/css/prettyPhoto.css" type="text/css">
        <!--Gallery Filer End-->

        <!--Optional CSS Ends-->

        <!--Home-Style5 Style And Color-->
        <link rel="stylesheet" href="assets/css/home-style4.css" type="text/css">
        <link rel="stylesheet" href="assets/css/colors/home-style4-color.css" id="color" type="text/css">
        <!--Home-Style5 Style And Color-->

        <link rel="shortcut icon" href="assets/assets/images/favicon.ico">
        <link rel="apple-touch-icon" href="assets/assets/images/apple_touch_icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/assets/images/apple_touch_icon_72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/assets/images/apple_touch_icon_114x114.png">
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
    </head>

    <body>

        <!--PRELOADER STARTS-->
        <!--<section id="jSplash">
  <div class="spinner">
    <div class="cube cube0"></div>
    <div class="cube cube1"></div>
    <div class="cube cube2"></div>
    <div class="cube cube3"></div>
    <div class="cube cube4"></div>
    <div class="cube cube5"></div>
    <div class="cube cube6"></div>
    <div class="cube cube7"></div>
    <div class="cube cube8"></div>
    <div class="cube cube9"></div>
    <div class="cube cube10"></div>
    <div class="cube cube11"></div>
    <div class="cube cube12"></div>
    <div class="cube cube13"></div>
    <div class="cube cube14"></div>
    <div class="cube cube15"></div>
  </div>
</section>-->
        <!--PRELOADER ENDS-->

        <!--Nice Scroll-->
        <!--Used For Mobile Resolution-->
        <div id="menutop"></div>
        <!--Nice Scroll-->

        <!--Wrapper 
=============================-->
        <div id="wrapper">
            <div id="mask">

                <!--Header 
=============================-->
                <div id="header" class="header">
                    <!--  Menu section for sub page and mobile resolution -->
                    <div class="menu-inner">
                        <div class="container">
                            <div class="row">
                                <div class="header-table col-md-12 header-menu">
                                    <!--  Logo section -->
                                    <div class="logo">
                                        <a href="#home" class="nav-link"><img src="http://virtuelltech.com/assets/images/Logo-3.png" width="50%" alt="Logo"></a>
                                    </div>
                                    <!--  // Logo section -->

                                    <!--  Menu section -->
                                    <nav class="main-nav">
                                        <a href="#" class="nav-toggle"></a>
                                        <ul id="sub-nav" class="nav">
                                            <li><a href="#home" class="nav-link">Home</a></li>
                                            <li><a href="#about" class="nav-link">About Us</a></li>
                                            <li><a href="" class="nav-link">Services<span class="sub-toggle"></span></a>
                                                <ul>
                                                    <li><a href="#services1" class="nav-link">Services 1</a></li>
                                                    <li><a href="#services2" class="nav-link">Services 2</a></li>
                                                    <li><a href="#services3" class="nav-link">Services 3</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#blog" class="nav-link">Blog<span class="sub-toggle"></span></a> </li>
                                            <li><a href="#contact" class="nav-link">Contact Us</a></li>
                                            <li><a href="#contactform" class="nav-link"> Login</a></li>
                                            <li><a href="#Register" class="nav-link"> Register </a></li>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!--  // Menu section -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  Menu section for sub page and mobile resolution -->
                </div>
                <!-- // Header 
=============================-->

                <!--Home Page
=============================-->
                <div id="home" class="item">
                    <div class="bgimg"></div>
                    <div class="pattern_bg4"></div>
                    <div class="clearfix">
                        <div class="header_details">
                            <div class="container">
                                <div class="clearfix">
                                    <div class="header_icons accura-header-block accura-hidden-2xs">
                                        <ul class="accura-social-icons accura-stacked accura-jump accura-full-height accura-bordered accura-small accura-colored-bg clearFix">
                                            <!--Social Icon 1-->
                                            <li id="1">
                                                <a href="http://www.facebook.com" target="_blank" class="accura-social-icon-facebook circle"> <i class="fa fa-facebook"></i> </a>
                                            </li>
                                            <!--Social Icon 1-->

                                            <!--Social Icon 2-->
                                            <li id="2">
                                                <a href="http://www.twitter.com" target="_blank" class="accura-social-icon-twitter circle"> <i class="fa fa-twitter"></i> </a>
                                            </li>
                                            <!-- // Social Icon 2-->

                                            <!--Social Icon 3-->
                                            <li id="3">
                                                <a href="http://www.googleplus.com" target="_blank" class="accura-social-icon-gplus circle"> <i class="fa fa-google-plus"></i> </a>
                                            </li>
                                            <!-- // Social Icon 3-->

                                            <!--Social Icon4-->
                                            <li id="4">
                                                <a href="https://instagram.com/accounts/login/" target="_blank" class="accura-social-icon-instagram circle"> <i class="fa fa-instagram"></i> </a>
                                            </li>
                                            <!-- // Social Icon 4-->

                                            <!--Social Icon 5-->
                                            <li id="5">
                                                <a href="https://www.linkedin.com/uas/login" target="_blank" class="accura-social-icon-linkedin circle"> <i class="fa fa-linkedin"></i> </a>
                                            </li>
                                            <!-- // Social Icon 5-->

                                        </ul>
                                    </div>
                                    
                                        <div class="logo">
                                        <a href="#home" class="nav-link"><img src="http://virtuelltech.com/assets/images/Logo-3.png" width="25%" alt="Logo"></a>
                                    </div>
                                         
                                </div>
                            </div>
                            <div class="clearfix">
                               <!-- Login-->
<div id="Login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <form name="login" action="login_process.php" method="post">
                                                <?php if(isset($_GET['inserted'])):?>
                                                    <div class="">
                                                        <div class="alert alert-info">
                                                            <strong>Record was inserted successfully..</strong>
                                                        </div>
                                                    </div>
                                                    <?php elseif(isset($_GET['in_failure'])): ?>
                                                        <div class="">
                                                            <div class="alert alert-warning">
                                                                <strong>SORRY!</strong> ERROR while inserting record !
                                                            </div>
                                                        </div>
                                                        <?php endif;?>

                                                            <div class="clearfix col-md-12 ">
                                                                <div class="subtitle">Enter Your Login Details</div>
 <div class="form-group">
    <label for="email">Username:</label>
    <input type="text" class="form-control"  name="uname" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwd" id="pwd">
  </div>
                                                                

                                                                <div class="form-group pull-right">
                                                                    <a href="forgot-password.html">Forgot password?</a>
                                                                </div>
                                                                <!--Button-->
                                                                <button id="logintsubmitBtn" type="submit" class="btn btn-3 btn-3e">Login</button>
                                                                <!-- // Button-->
                                                            </div>
                                                            <?php // To display Login Error messages
		
		
		if(isset($_GET['err'])){
		$ut=$_GET['ut'];
		if ($_GET['err']==1){
		if($ut == 'sa'){
		echo "<span style=\"color:#FF0000\"><strong>Invalid Super Admin Credentials</strong></span>";
            $error = "Invalid Super Admin Credentials";
		}
		else if($ut == 'ad'){
		echo "<span style=\"color:#FF0000\"><strong>Invalid Admin Credentials</strong></span>";
            $error = "Invalid Admin Credentials";
		}
		else if($ut == 'cw'){
		echo "<span style=\"color:#FF0000\"><strong>Invalid Content Writer Credentials</strong></span>";
            $error = "Invalid Content Writer Credentials";
		}
		else if($ut == 'js'){
		echo "<span style=\"color:#FF0000\"><b>Invalid Job Seeker Credentials</b></span>";
            $error = "Invalid Job Seeker Credentials";
		}
		}
		else if ($_GET['err']==2){
		echo "<span style=\"color:#FF0000\">Your trying to access un authorized login credentials</span>";
            $error = "Your trying to access un authorized login credentials";
		}
		}
		?>
                                            </form>
      </div>
      
    </div>

  </div>
</div>
                            </div>
                            <!-- // Header Details -->
                        </div>
                        <!-- // Clearfix -->

                        <!-- Home Content -->
                        <div class="clearfix container center">

                            <!-- Owl Slider -->

                        </div>
                        <!-- Home Content -->
                    </div>
                </div>

                <!-- // Home Page
=============================-->

                <!-- About
=============================-->

                <div id="about" class="item subpage">
                    <div class="content">
                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix">
                                            <h1>About Us</h1>
                                            <div class="tags"> Virtuell Hire is a leading recruitment/training & development solution provider. Virtuell Hire offers staffing solutions to small, medium and large companies and organizations. Virtuell Hire provides services across the globe with rich experience in IT services on all the technologies. Virtuell Hire is one of Hyderabad’s leading career oriented consultancy for youth. The technology-driven platform of VirtuelHire attracts youth with great aspirations and equips them for promising and exciting careers in the knowledge sector. </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // About
=============================-->

                <!-- services1
=============================-->

                <div id="services1" class="item subpage">
                    <div class="content">
                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix">
                                            <h1>services 1</h1>
                                            <div class="tags">Page is under construction....</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // services1
=============================-->

                <!-- services2
=============================-->

                <div id="services2" class="item subpage">
                    <div class="content">
                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix">
                                            <h1>Services 2</h1>
                                            <div class="tags">Page is under construction....</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // services1
=============================-->

                <!-- services3
=============================-->

                <div id="services3" class="item subpage">
                    <div class="content">
                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix">
                                            <h1>services 3</h1>
                                            <div class="tags">Page is under construction....</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- services3
=============================-->

                <!-- blog
=============================-->

                <div id="blog" class="item subpage">
                    <div class="content">
                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix">
                                            <h1>Blog </h1>
                                            <div class="tags">Page is under construction....</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- blog
=============================-->

                <!-- // Clients
=============================-->

                <!--Contact 
=============================-->

                <div id="contact" class="item">
                    <div class="content">
                        <div class="fullBg"></div>
                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container">
                                    <div class="col-md-6 empty">
                                        <iframe src="https://www.google.com/maps/d/embed?mid=1HG7nAz8ugQhxUhgLz-rh5qlhclE" width="90%" height="450"></iframe>
                                    </div>
                                    <div class="col-md-6 content_text">
                                        <h1>Contact Us</h1>
                                        <div class="clearfix">
                                            <h2 class="clearfix address"> <span class="left"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;</span> <span class="left"> 7th Floor, Block I, White House,<br>
                    Kundan Bagh, Beside LIfeStyle,<br>
                    Begumpet, <br>
Hyderabad - 500016<br>
                    Telangana.<br>
                    </span> </h2>
                                            <div class="phone"><i class="fa fa-phone"></i>&nbsp;&nbsp;+ 040 4012 0229</div>
                                            <a href="mailto:info@virtuellhire.com" class="mail-text"> <i class="fa fa-envelope"></i>info@virtuellhire.com </a>
                                            <div class="clearfix">
                                                <div class="header_icons accura-header-block accura-hidden-2xs social_top">
                                                    <ul class="accura-social-icons accura-stacked accura-jump accura-full-height accura-bordered accura-small accura-colored-bg clearFix">
                                                        <!--Social Icon 1-->
                                                        <li>
                                                            <a href="http://www.facebook.com" target="_blank" class="accura-social-icon-facebook circle"> <i class="fa fa-facebook"></i> </a>
                                                        </li>
                                                        <!-- // Social Icon 1-->

                                                        <!--Social Icon 2-->
                                                        <li>
                                                            <a href="http://www.twitter.com" target="_blank" class="accura-social-icon-twitter circle"> <i class="fa fa-twitter"></i> </a>
                                                        </li>
                                                        <!-- // Social Icon 2-->

                                                        <!--Social Icon 3-->
                                                        <li>
                                                            <a href="http://www.googleplus.com" target="_blank" class="accura-social-icon-gplus circle"> <i class="fa fa-google-plus"></i> </a>
                                                        </li>
                                                        <!-- // Social Icon 3-->

                                                        <!--Social Icon4-->
                                                        <li>
                                                            <a href="https://instagram.com/accounts/login/" target="_blank" class="accura-social-icon-instagram circle"> <i class="fa fa-instagram"></i> </a>
                                                        </li>
                                                        <!-- // Social Icon 4-->

                                                        <!--Social Icon 5-->
                                                        <li>
                                                            <a href="https://www.linkedin.com/uas/login" target="_blank" class="accura-social-icon-linkedin circle"> <i class="fa fa-linkedin"></i> </a>
                                                        </li>
                                                        <!-- // Social Icon 5-->
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--Button-->
                                            <!--<div class="pad_top30"> <a class="btn btn-3 btn-3e nav-link" href="#contactform">Request a Quote</a> </div>-->
                                            <!-- // Button-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Contact 
=============================-->

                <!-- Login Form
=============================-->

                <div id="contactform" class="item">
                    <div class="content">
                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div id="contactforms">
                                            <h1>Login</h1>

                                            <!--Form Starts-->
                                            <form name="login" action="login_process.php" method="post">
                                                <?php if(isset($_GET['inserted'])):?>
                                                    <div class="">
                                                        <div class="alert alert-info">
                                                            <strong>Record was inserted successfully..</strong>
                                                        </div>
                                                    </div>
                                                    <?php elseif(isset($_GET['in_failure'])): ?>
                                                        <div class="">
                                                            <div class="alert alert-warning">
                                                                <strong>SORRY!</strong> ERROR while inserting record !
                                                            </div>
                                                        </div>
                                                        <?php endif;?>

                                                            <div class="clearfix ">
                                                                <div class="subtitle">Enter Your Login Details</div>

                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" name="uname">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="password" class="form-control" name="pwd" placeholder="Password">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group pull-right">
                                                                    <a href="forgot-password.html">Forgot password?</a>
                                                                </div>
                                                                <!--Button-->
                                                                <button id="logintsubmitBtn" type="submit" class="btn btn-3 btn-3e">Login</button>
                                                                <!-- // Button-->
                                                            </div>
                                                            <?php // To display Login Error messages
		
		
		if(isset($_GET['err'])){
		$ut=$_GET['ut'];
		if ($_GET['err']==1){
		if($ut == 'sa'){
		echo "<span style=\"color:#FF0000\"><strong>Invalid Super Admin Credentials</strong></span>";
            $error = "Invalid Super Admin Credentials";
		}
		else if($ut == 'ad'){
		echo "<span style=\"color:#FF0000\"><strong>Invalid Admin Credentials</strong></span>";
            $error = "Invalid Admin Credentials";
		}
		else if($ut == 'cw'){
		echo "<span style=\"color:#FF0000\"><strong>Invalid Content Writer Credentials</strong></span>";
            $error = "Invalid Content Writer Credentials";
		}
		else if($ut == 'js'){
		echo "<span style=\"color:#FF0000\"><b>Invalid Job Seeker Credentials</b></span>";
            $error = "Invalid Job Seeker Credentials";
		}
		}
		else if ($_GET['err']==2){
		echo "<span style=\"color:#FF0000\">Your trying to access un authorized login credentials</span>";
            $error = "Your trying to access un authorized login credentials";
		}
		}
		?>
                                            </form>
                                            <!--Form Ends-->
                                            <script>
                                                var message = '<?php echo $error; ?>';
                                                if (message != "")
                                                    alert(message);

                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Login Form
=============================-->



                <!-- Register Form
=============================-->
	  <?php


if(isset($_POST['btn-save']))
{
	$First_name = $_POST['First_name'];
	$Last_name = $_POST['Last_name'];
	$Email_id = $_POST['Email_id'];
	$User_name = $_POST['User_name'];
	$Password = $_POST['Password'];
	$Confirm_password = $_POST['Confirm_password'];	
	$Phone_No = $_POST['Phone_No'];
	$Experience_level = $_POST['Experience_level'];
	$Domain = $_POST['Domain'];
	$usertype_id = $_POST['usertype_id'];
	
	
	if($jobseeker->create($First_name,$Last_name,$Email_id,$User_name,$Password,$Confirm_password,$Phone_No,$Experience_level,$Domain,$usertype_id))
	{
		$error = "inserted";
	}
	else
	{
		$error = "failed";
	}
}
?>
<script>
                                                var message = '<?php echo $error; ?>';
                                                if (message != "")
                                                    alert(message);

                                            </script>
                    <div id="Register" class="item">
                        <div class="content">
                            <div class="content_overlay"></div>
                            <div class="content_inner">
                                <div class="row contentscroll">
                                    <div class="container col-md-12">
                                        <div class="col-md-6 empty">&nbsp;</div>
                                        <div class="col-md-6 content_text">
                                            <div id="contactforms">
                                                
                                                            <h1>Register</h1>
                                                            <!--Form Starts-->
                                                            <form method="post">
                                                            
			
			
                                                      
                                                                <div class="clearfix ">

                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <input type="text" name='First_name' required class="form-control" placeholder="First Name">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <input type="text" name='Last_name' required class="form-control" placeholder="Last Name">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <input type="email" name='Email_id' required class="form-control" placeholder="Email Id">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <input type="text" name='User_name' required class="form-control" placeholder="User Name">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <input type="password" name='Password' required class="form-control" placeholder="Password">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <input type="password" name='Confirm_password' required class="form-control" placeholder="Confirm Password">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <input type="text" name='Phone_No' required class="form-control" placeholder="Contact Number">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <select class="form-control" id="Domain" name="Domain">
                                                                                    <option value="">Select Domain</option>
                                                                                    <?php
            
					$sql_dom='SELECT * FROM js_template_domains';
					$stmt_dom = $db->prepare($sql_dom);
					$stmt_dom->execute();


					while($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)){
						echo $row_dom['domain_name']; ?>

                                                                                        <option value="<?php echo $row_dom['domain_id']; ?>">
                                                                                            <?php echo $row_dom['domain_name']; ?>
                                                                                        </option>
                                                                                        <?php
						}
						?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="radio">
                                                                                    <label>
                                                                                        <input type="radio" name='Experience_level' checked="" value="Fresher" id="optionsRadios1"> Fresher </label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="radio">
                                                                                    <label>
                                                                                        <input type="radio" name='Experience_level' value="Experience" id="optionsRadios2"> Experienced </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!--Button-->
                                                                    <button id="contactsubmitBtn" type="submit" class="btn btn-3 btn-3e" name="btn-save">Submit</button>
                                                                    <!-- // Button-->
                                                                </div>
                                                            </form>
                                                            <!--Form Ends-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- // Register Form
=============================-->

                    <!-- Footer
=============================-->

                    <div id="footer" class="footer">
                    <div class="copyright row">
                        <div class=" col-md-8" style="">Copyrights &copy; <span>Virtuelltech</span> 2016. ALL RIGHTS RESERVED</div>
                        <div class="col-md-4 pull-right" style=""><a href="#about" class="nav-link">About Us</a> | <a href="#services1" class="nav-link">Services 1</a> | <a href="#blog" class="nav-link">Blog<span class="sub-toggle"></span></a> | <a href="#contact" class="nav-link">Contact Us</a></div>
                        
                                                            </div>
                    </div>

                    <!-- // Footer Ends
=============================-->

                    <!--Special Menu 
=============================-->

                    <div id="specialmenu" class="toHideTheBubbles hidden-phone">
                        <div class="spcontainer">
                            <!--Spmenu 1-->
                            <div id="spmenu1">
                                <a href="#contactform"  class="spmenu spmenu1 nav-link"> <span><i class="fa fa-sign-in" aria-hidden="true"></i></span> <span class="sptext">Login</span> </a>
                            </div>
                            <!-- // Spmenu 1-->

                            <!--Spmenu 2-->
                            <div id="spmenu2">
                                <a href="#Register" class="spmenu spmenu2 nav-link"> <span> <i class="fa fa-file-text" aria-hidden="true"></i> </span> <span class="sptext"> Register</span> </a>
                            </div>
                            <!-- // Spmenu 2-->

                            <!--Spmenu 3-->

                            <!-- // Spmenu 3-->
                        </div>
                    </div>

                    <!-- // Special Menu 
=============================-->

            </div>
        </div>
        <!-- // Wrapper =============================-->

        <!--java script-->

        <!-- Preloader Starts -->
        <script type="text/javascript" src="assets\js\jpreloader.min.js"></script>
        <!-- Preloader Starts -->

        <script type="text/javascript" src="assets\js\bootstrap.min.js"></script>
        <script type="text/javascript" src="assets\js\jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="assets\js\jquery.validate.min.js"></script>
        <script type="text/javascript" src="assets\js\jquery.fitvids.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="assets\js\appear.js"></script>

        <!-- Slick Navigation -->
        <script type="text/javascript" src="assets\js\jquery.slicknav.min.js"></script>
        <!-- Slick Navigation -->

        <!-- Nice Scroll-->
        <script type="text/javascript" src="assets\js\jquery.nicescroll.min.js"></script>
        <script type="text/javascript" src="assets\js\jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="assets\js\jquery.easing.1.3.js"></script>

        <!-- include retina js -->
        <script type="text/javascript" src="assets\js\retina-1.1.0.min.js"></script>
        <!-- include retina js -->

        <!-- Owl Carousel Starts-->
        <script type="text/javascript" src="assets\js\owl.carousel.min.js"></script>
        <!-- Owl Carousel Ends-->

        <!-- Cycle Slider Sldier -->
        <script type="text/javascript" src="assets\js\jquery.cycle.all.js"></script>
        <script type="text/javascript" src="assets\js\jquery.cycle2.caption2.js"></script>
        <!-- Cycle Slider Sldier Ends-->

        <!--SuperSized Gallery-->
        <script type="text/javascript" src="assets\js\supersized.3.2.7.min.js"></script>
        <script type="text/javascript" src="assets\js\supersized.shutter.min.js"></script>
        <!--SuperSized Gallery End-->

        <!-- Filter Gallery And PrettyPhoto-->
        <script type="text/javascript" src="assets\js\jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="assets\js\jquery.mixitup.min.js"></script>
        <!-- Filter Gallery And PrettyPhoto End-->

        <!-- Skills Progress Bar Starts-->
        <script src="assets\js\jquery.easypiechart.min.js"></script>
        <!-- Skills Progress Bar Ends-->

        <!-- Fit Text Starts-->
        <script type="text/javascript" src="assets\js\jquery.fittext.js"></script>
        <script type="text/javascript">
            $("#home_title1").fitText(1.1, {
                minFontSize: '22px',
                maxFontSize: '40px'
            });
            $("#home_title2").fitText(1.1, {
                minFontSize: '22px',
                maxFontSize: '40px'
            });

        </script>
        <!-- Fit Text Ends-->

        <!-- Place Holder Scripts Starts-->
        <script type="text/javascript" src="assets\js\jquery.placeholder.min.js"></script>
        <!-- Place Holder Scripts Ends-->

        <!-- Custom Scripts Starts-->
        <script type="text/javascript" src="assets\js\custom-general.js"></script>
        <script type="text/javascript" src="assets\js\google-map-custom.js"></script>
        <script type="text/javascript" src="assets\js\home-style4-custom.js"></script>
        <!-- Custom Scripts Ends-->

        <!--IE9 Hack Code For Gradient Color-->

        <!--[if gte IE 9]>
  <style type="text/css">
    .pattern_bg4 {
       filter: none;
    }
  </style>
<![endif]-->

    </body>

    </html>
