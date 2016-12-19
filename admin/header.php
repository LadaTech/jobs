<?php
ob_start();
session_start();
//echo $_SESSION['username'];
if(!isset($_SESSION['username']))
{
header("Location:index.php");	
}
require_once '../db.php';
$id=$_SESSION['username'];
$swa=$db->query("select * from vb_users where username='$id'");
$resswa=$swa->fetch(PDO::FETCH_ASSOC); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>::: <?php echo $compnay_name; ?>  ::: | Dashboard</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- Bootstrap 3.3.4 -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
<link href="css/styles.css" rel="stylesheet" type="text/css" />  
<!-- FontAwesome 4.3.0 -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Ionicons 2.0.0 -->
<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
<!-- Theme style -->
<link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<!-- AdminLTE Skins. Choose a skin from the css/skins 
folder instead of downloading all of them to reduce the load. -->
<link href="css/_all-skins.min.css" rel="stylesheet" type="text/css" />
<!-- iCheck -->
<link href="css/blue.css" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="css/morris.css" rel="stylesheet" type="text/css" />
<script src="js/jQuery.js"></script>
<link rel="stylesheet" href="css/summernote.css">
<link rel="stylesheet" href="css/jquery-ui.min.css">
<link rel="stylesheet" href="css/daterangepicker-bs3.css">
<link rel="stylesheet" href="css/summernote.css">
<link rel="apple-touch-icon-precomposed" href="<?php echo $path; ?>images/<?php echo $fav_icon_url; ?>">
        <link rel="shortcut icon" href="<?php echo $path; ?>images/<?php echo $fav_icon_url; ?>" type="image/x-icon">
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
<!-- Logo -->
<a href="home.php" class="logo">
<!-- mini logo for sidebar mini 50x50 pixels -->
<span class="logo-mini"><b><?php echo $compnay_small_name; ?> </b></span>
<!-- logo for regular state and mobile devices -->
<span class="logo-lg"><b><?php echo $compnay_name; ?> </b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span>
</a>
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">

<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
   <?php if($resswa['icon']=="" || $resswa['icon']=="0") { ?>
    <img src="img/login.png" class="user-image" alt="User Image" />
    <?php } else { ?>
<img src="img/icons/<?php echo $resswa['icon']; ?>" class="user-image" alt="User Image" />
    <?php } ?>
<span class="hidden-xs"><?php echo ucwords($resswa['name']); ?></span>
</a>
<ul class="dropdown-menu">
<!-- User image -->
<li class="user-header">
    <?php if($resswa['icon']=="" || $resswa['icon']=="0") { ?>
    <img src="img/login.png" class="img-circle" alt="User Image" />
    <?php } else { ?>
<img src="img/icons/<?php echo $resswa['icon']; ?>" class="img-circle" alt="User Image" />
    <?php } ?>
<p>
<?php echo ucwords($resswa['name']); ?> - <?php echo ucwords($resswa['role']); ?>
<small></small>
</p>
</li>
<!-- Menu Body -->

<!-- Menu Footer-->
<li class="user-footer">
<?php
if($resswa['role']=='admin') {
?>
<div class="pull-left">
<a href="profile.php" class="btn  bg-purple">Profile</a>
</div>
<?php
}
?>
<div class="pull-right">
<a href="logout.php" class="btn  bg-purple">Sign out</a>
</div>
</li>
</ul>
</li>
<!-- Control Sidebar Toggle Button -->

</ul>
</div>
</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel -->


<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">

<li class="active treeview">
<a href="home.php">
<i class="fa fa-dashboard text-yellow"></i> <span>Dashboard</span> 
</a>
</li>

<li><a href="manage_industries.php"><i class="fa fa-tree text-yellow"></i> <span>Industries</span></a></li>
<li><a href="manage_domains.php"><i class="fa  fa-globe text-yellow"></i> <span>Domains</span></a></li>
<li><a href="manage_jobseekers.php"><i class="fa fa-users text-yellow"></i> <span>Job Seekers</span></a></li>
<li><a href="manage_cw.php"><i class="fa fa-users text-yellow"></i> <span>Content Writers</span></a></li>
<li><a href="manage_enquiries.php"><i class="fa fa-magic text-yellow"></i> <span>Enquiries</span></a></li>
<li><a href="manage_invitations.php"><i class="fa fa-user-secret text-yellow"></i> <span>Invitations</span></a></li>
<li><a href="manage_chat.php"><i class="fa fa-weixin text-yellow"></i> <span>Chats</span></a></li>
<li><a href="manage_payments.php"><i class="fa fa-usd text-yellow"></i> <span>Payments</span></a></li>
<li><a href="manage_templates.php"><i class="fa fa-file-word-o text-yellow"></i> <span>Templates</span></a></li>
</ul>
</section>
<!-- /.sidebar -->
</aside>


