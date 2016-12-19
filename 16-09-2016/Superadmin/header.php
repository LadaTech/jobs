<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Resume Services</title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>  <![endif]-->
    <link href="assets\css\vendors.min.css" rel="stylesheet">
    <link href="assets\css\styles.min.css" rel="stylesheet">
    <script charset="utf-8" src="//maps.google.com/maps/api/js?sensor=true"></script>
  </head>
  <body scroll-spy="" id="top" class=" theme-template-dark theme-pink alert-open alert-with-mat-grow-top-right">
    <main>
      <aside class="sidebar fixed" style="width: 260px; left: 0px; ">
        <div class="brand-logo">
          <div id="logo">
            
          </div> Resume Services </div>
        <div class="user-logged-in">
          <div class="content">
            <div class="user-name">Admin1 <span class="text-muted f9">admin</span></div>
            <div class="user-email">admin@virtuelltech.com</div>
            <div class="user-actions"> <a class="m-r-5" href="#">settings</a> <a href="#">logout</a> </div>
          </div>
        </div>
        <ul class="menu-links">
          <li icon="md md-blur-on"> <a href="superadmin.php?type=home"><i class="md md-blur-on"></i>&nbsp;<span>Dashboard</span></a></li>
            <li icon="md md-blur-on"> <a href="superadmin.php?type=profile"><i class="md md-blur-on"></i>&nbsp;<span>My Profile</span></a></li>
                        <li icon="md md-blur-on"> <a href="superadmin.php?type=cp"><i class="md md-blur-on"></i>&nbsp;<span>Candidate Profile</span></a></li> 
            <li icon="md md-blur-on"> <a href="superadmin.php?type=cwp"><i class="md md-blur-on"></i>&nbsp;<span>Contentwritter Profile</span></a></li> 
          <li> <a href="#" data-toggle="collapse" data-target="#UIelements" aria-expanded="false" aria-controls="UIelements" class="collapsible-header waves-effect"><i class="md md-photo"></i>&nbsp;Admin</a>
            <ul id="UIelements" class="collapse">
              <li> <a href="superadmin.php?type=aa"><span>Add Admin</span></a></li>
              <li> <a href="superadmin.php?type=ap"><span>Admin Profile</span></a></li>
            </ul>
          </li>
              <li> <a href="#" data-toggle="collapse" data-target="#UIelements1" aria-expanded="false" aria-controls="UIelements" class="collapsible-header waves-effect"><i class="md md-photo"></i>&nbsp;Transactions</a>
            <ul id="UIelements1" class="collapse">
              <li> <a href="superadmin.php?type=rbo"><span>Resume by Own</span></a></li>
              <li> <a href="superadmin.php?type=rcw"><span>Resume Content writter</span></a></li>
                <li> <a href="superadmin.php?type=ex"><span>Expenses</span></a></li>
            </ul>
          </li>             
          <li icon="md md-blur-on"> <a href="superadmin.php"><i class="md md-blur-on"></i>&nbsp;<span>Enquiry</span></a></li>
          <li icon="md md-blur-on"> <a href="superadmin.php?type=pwd"><i class="md md-blur-on"></i>&nbsp;<span>Change Password</span></a></li>

        </ul>
      </aside>

      <div class="main-container">
          
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header pull-left">
              <button type="button" class="navbar-toggle pull-left m-15" data-activates=".sidebar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
<!--
              <ul class="breadcrumb">
                <li><a href="#/">Materialism</a></li>
                <li class="active">Basic forms</li>
              </ul>
-->
            </div>
            <ul class="nav navbar-nav navbar-right navbar-right-no-collapse">
              <li class="dropdown pull-right">
                <button class="dropdown-toggle pointer btn btn-round-sm btn-link withoutripple" data-template-url="assets/tpl/partials/dropdown-navbar.html"> <i class="md md-more-vert f20"></i> </button>
              </li>
              <li class="dropdown pull-right">
                <button class="dropdown-toggle pointer btn btn-round-sm btn-link withoutripple" data-template-url="assets/tpl/partials/theme-picker.html"> <i class="md md-settings f20"></i> </button>
              </li>
              <li navbar-search="" class="pull-right">
                <div>
                  <div class="mat-slide-right pull-right">
                    <form class="search-form form-inline pull-left ">
                      <div class="form-group">
                        <label class="sr-only" for="search-input">Search</label>
                        <input type="text" class="form-control" id="search-input" placeholder="Search" autofocus=""> </div>
                    </form>
                  </div>
                  <div class="pull-right">
                    <button class="btn btn-sm btn-link pull-left withoutripple"> <i class="md md-search f20"></i> </button>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>

       

  <?php
  
  include_once '../db.php';

include_once '../administrator/content_writer_model.php';

//$contentwriter = new contentwriter($db);
//session_start();
//
//		$query = "SELECT * FROM content_writer where Content_writer_Id='".$_SESSION['content_writer_Id']."'";       
//	
//		//$jobseeker->dataview($query);
//		
//		$stmt = $db->prepare($query);
//		
//		$stmt->execute();
//	
//		//$stmt->rowCount();		
//			
//		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		
		?>





