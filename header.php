<?php
@session_start();
include_once "db.php";
include_once 'page_number.php';
date_default_timezone_set("Asia/Kolkata");
require_once 'library/FlashMessages.php';
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Jatka.in <?PHP
            if (isset($pageTitle)) {
                echo ":: ".$pageTitle;
            }
            ?></title>

        <!-- core CSS -->
        <link href="<?php echo $my_path; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $my_path; ?>/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://necolas.github.io/normalize.css/4.1.1/normalize.css" rel="stylesheet" >

        <link href="<?php echo $my_path; ?>/css/responsive.css" rel="stylesheet">
        <link href="<?php echo $my_path; ?>/css/main.css" rel="stylesheet">
        <link href="<?php echo $my_path; ?>/css/star-rating.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="<?php echo $my_path; ?>/images/fav.png">
    </head><!--/head-->

    <body class="homepage">
        <header id="header">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-4">
                            <!--                         <div class="social">
                                                        <ul class="social-share">
                                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                                        </ul>
                                                        
                                                   </div>-->
                        </div>
                        <div class="col-sm-6 col-xs-8">
                            <div class="pull-right">
                                <?php
                                if (isset($_SESSION["uid"])) {
                                    $stmt = $db->prepare("SELECT * FROM job_seeker where Job_Seeker_Id=$_SESSION[uid]") or die(mysql_error());
                                    $stmt->execute();
                                    if ($stmt->rowCount() == 1) {
                                        $user_info = $stmt->fetch(PDO::FETCH_ASSOC);
                                    } else {
                                        $p_a = $my_path . "/login.aspx"; // not valid details
                                        header("Location: $p_a");
                                    }
                                    ?>
                                    <ul class="account_menu">

                                        <li><i class="fa fa-user"></i> Welcome  <a href="<?php echo $my_path; ?>/job-seeker/<?php
                                            $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $user_info['First_name']);
                                            $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
                                            $clean = strtolower(trim($clean, '-'));
                                            $clean = preg_replace("/[\/_|+ -]+/", "-", $clean);
                                            echo $clean;
                                            ?>.aspx"> <b><?php echo ucfirst(strtolower($user_info["First_name"])); ?></b></a></li>

                                        <li class="ring-wrapper">
                                            <div class="dropdown account-menu-dropdown show-on-hover">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell" aria-hidden="true"></i></a>
                                                <ul class="dropdown-menu profile-notification bell-notifications">
                                                    <?php
                                                    $rc = 0;
                                                    /*                                                     * ***********Invitations Tab****** */
                                                    $i1 = $db->query("SELECT *,(select First_name from content_writer where Content_writer_id=i.cwid) as cwname FROM invitations i where jid='$user_info[Job_Seeker_Id]' and approve='Pending' order by id desc");
                                                    if ($i1->rowCount() != 0) {
                                                        while ($row_dom = $i1->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <li class="bellinfo"><a href="<?php echo $my_path; ?>/job-seeker/invitations.aspx"><?php echo $row_dom["cwname"]; ?> Sent a <b>Invitation</b> to you</a></li>
                                                            <?php
                                                            $rc++;
                                                        }
                                                    }
                                                    /*                                                     * ***********Invitations Tab End ****** */

                                                    /*                                                     * ***********Enquiries Tab****** */
//$i1=$db->query("SELECT *,(select First_name from content_writer where Content_writer_id=i.cwid) as cwname, (select name from  industry where id=i.iid) iname, (select name from domains where id=i.did) dname FROM enquiry_info i where jid='$user_info[Job_Seeker_Id]' and jsread=0 order by id desc");
//if ($i1->rowCount() != 0){
// while($row_dom = $i1->fetch(PDO::FETCH_ASSOC)){
//
                                                    ?>
    <!--    <li class="bellinfo"><a href="//<?php echo $my_path; ?>/job-seeker/enquiries.aspx"><?php //echo $row_dom["cwname"];      ?> is <?php //echo $row_dom["approve"];      ?> your <b>request</b></a></li>-->
                                                    <?php
//     $rc++;
// }   
//}
                                                    /*                                                     * ***********Enquiries Tab End ****** */


                                                    /*                                                     * ***********Chat Tab****** */
                                                    $i1 = $db->query("SELECT *,(select First_name from content_writer where Content_writer_id=i.cwid) as cwname FROM chat_info i where jid='$user_info[Job_Seeker_Id]'  and jsread=0 order by id desc");
                                                    if ($i1->rowCount() != 0) {
                                                        while ($row_dom = $i1->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <li class="bellinfo"><a href="<?php echo $my_path; ?>/job-seeker/chat.aspx"><?php echo $row_dom["cwname"]; ?> is sent a <b>message</b> to you</a></li>
                                                            <?php
                                                            $rc++;
                                                        }
                                                    }
                                                    /*                                                     * ***********Chat Tab End ****** */



                                                    /*                                                     * ***********Resumes Tab****** */
                                                    $i1 = $db->query("SELECT *,(select First_name from content_writer where Content_writer_id=i.cwid) as cwname FROM js_my_resumes i where jsid='$user_info[Job_Seeker_Id]' and cwid!=0  and jsread=0 order by id desc");
                                                    if ($i1->rowCount() != 0) {
                                                        while ($row_dom = $i1->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <li class="bellinfo"><a href="<?php echo $my_path; ?>/job-seeker/my-resumes.aspx"><?php echo $row_dom["cwname"]; ?> is sent your <b>resume</b> to you. Download it.</a></li>
                                                            <?php
                                                            $rc++;
                                                        }
                                                    }
                                                    /*                                                     * ***********Resumes tab End ****** */

                                                    if ($rc == 0) {
                                                        ?>
                                                        <li class="bellinfo">No Notifications Found</li>
                                                        <?php
                                                    }
                                                    ?>  
                                                    <li><i class="fa fa-sort-up" aria-hidden="true"></i></li>

                                                </ul>
                                            </div>  
                                            <span class="ring-count"><?php echo $rc; ?></span>
                                        </li>

                                        <li  class="">
                                            <div class="dropdown account-menu-dropdown">
                                                <a href="#" class="dropdown-toggle after_login" data-toggle="dropdown"><i class="fa fa-gear"></i></a>
                                                <ul class="dropdown-menu">
                                                    <i class="fa fa-sort-up" aria-hidden="true"></i>
                                                    <li><a href="<?php echo $my_path; ?>/job-seeker/dashboard.aspx"><i class="fa fa-home"></i> Dashboard</a></li>

                                                    <li>
                                                        <a href="<?php echo $my_path; ?>/job-seeker/edit-profile.aspx">
                                                            <i class="glyphicon glyphicon-user"></i>
                                                            Edit Profile</a>
                                                    </li>     
                                                    <li>
                                                        <a href="<?php echo $my_path; ?>/job-seeker/transactions.aspx">
                                                            <i class="fa fa-money"></i>
                                                            Transactions </a>
                                                    </li>
                                                    <li ><a href="<?php echo $my_path; ?>/job-seeker/enquiries.aspx"><i class="fa fa-bell"></i> My Enquiries</a></li> 
                                                    <li>
                                                        <a href="<?php echo $my_path; ?>/change-password.aspx">
                                                            <i class="glyphicon glyphicon-lock"></i>
                                                            Change Password </a>
                                                    </li>
                                                    <li class="li-my-account"><a href="<?php echo $my_path; ?>/logout.aspx"><i class="fa fa-lock"></i> Logout</a></li>
                                                </ul>
                                            </div>  </li>
                                    </ul>
                                    <?php
                                } else
                                if (isset($_SESSION["cwid"])) {
                                    $stmt = $db->prepare("SELECT * FROM content_writer where Content_writer_id=$_SESSION[cwid]") or die(mysql_error());
                                    $stmt->execute();
                                    if ($stmt->rowCount() == 1) {
                                        $user_info = $stmt->fetch(PDO::FETCH_ASSOC);
                                    } else {
                                        $p_a = $my_path . "/cw/login.aspx"; // not valid details
                                        header("Location: $p_a");
                                    }
                                    ?>
                                    <ul class="account_menu">

                                        <li><i class="fa fa-user"></i> Welcome <a href="<?php echo $my_path; ?>/cw/<?php
                                            $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $user_info['First_name']);
                                            $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
                                            $clean = strtolower(trim($clean, '-'));
                                            $clean = preg_replace("/[\/_|+ -]+/", "-", $clean);
                                            echo $clean;
                                            ?>.aspx"> <b><?php echo ucfirst(strtolower($user_info["First_name"])); ?></b></a></li>

                                        <li class="ring-wrapper">
                                            <div class="dropdown account-menu-dropdown show-on-hover">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell" aria-hidden="true"></i></a>
                                                <ul class="dropdown-menu profile-notification bell-notifications">
                                                    <?php
                                                    $rc = 0;
                                                    /*                                                     * ***********Invitations Tab****** */
//$i1=$db->query("SELECT *,(select First_name from job_seeker where Job_Seeker_Id=i.jid) as jname FROM invitations i where cwid='$user_info[Content_writer_id]' and cwread='0' order by id desc");
//if ($i1->rowCount() != 0){
// while($row_dom = $i1->fetch(PDO::FETCH_ASSOC)){
//
                                                    ?>
                                                <!--    <li class="bellinfo"><a href="//<?php echo $my_path; ?>/cw/invitations.aspx"><?php echo $row_dom["jname"]; ?> is <?php echo $row_dom["approve"]; ?>  to your <b>Invitation</b></a></li>-->
                                                    <?php
//     $rc++;
// }   
//}
                                                    /*                                                     * ***********Invitations Tab End ****** */

                                                    /*                                                     * ***********Enquiries Tab****** */
                                                    $i1 = $db->query("SELECT *,(select First_name from job_seeker where Job_Seeker_Id=i.jid) as jname FROM enquiry_info i where cwid='$user_info[Content_writer_id]' and approve='Pending' order by id desc");
                                                    if ($i1->rowCount() != 0) {
                                                        while ($row_dom = $i1->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <li class="bellinfo"><a href="<?php echo $my_path; ?>/cw/enquiries.aspx"><?php echo $row_dom["jname"]; ?> is  sent  a <b>Enquiry</b> to you.</a></li>
                                                            <?php
                                                            $rc++;
                                                        }
                                                    }
                                                    /*                                                     * ***********Enquiries Tab End ****** */


                                                    /*                                                     * ***********Chat Tab****** */
                                                    $i1 = $db->query("SELECT *,(select First_name from job_seeker where Job_Seeker_Id=i.jid) as jsname  FROM chat_info i where cwid='$user_info[Content_writer_id]'  and cwread=0 order by id desc");
                                                    if ($i1->rowCount() != 0) {
                                                        while ($row_dom = $i1->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <li class="bellinfo"><a href="<?php echo $my_path; ?>/cw/chat.aspx"><?php echo $row_dom["jsname"]; ?> is sent a <b>message</b> to you</a></li>
                                                            <?php
                                                            $rc++;
                                                        }
                                                    }
                                                    /*                                                     * ***********Chat Tab End ****** */



                                                    /*                                                     * *********** My orders Tab****** */
                                                    $i1 = $db->query("SELECT *,(select First_name from job_seeker where Job_Seeker_Id=i.jid) as jname FROM cw_ordernow i where cwid='$user_info[Content_writer_id]' and id in(select item_number from payments where payment_status='Completed' and rtype='cw') and approve='pending' order by id desc");
                                                    if ($i1->rowCount() != 0) {
                                                        while ($row_dom = $i1->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                            <li class="bellinfo"><a href="<?php echo $my_path; ?>/cw/my-orders.aspx"><?php echo $row_dom["jname"]; ?> is done a payment for creating  <b>resume</b> to you. Create it.</a></li>
                                                            <?php
                                                            $rc++;
                                                        }
                                                    }
                                                    /*                                                     * ***********My orders tab End ****** */

                                                    if ($rc == 0) {
                                                        ?>
                                                        <li class="bellinfo">No Notifications Found</li>
                                                        <?php
                                                    }
                                                    ?> 
                                                    <li><i class="fa fa-sort-up" aria-hidden="true"></i></li>

                                                </ul>
                                            </div>  
                                            <span class="ring-count"><?php echo $rc; ?></span>
                                        </li>



                                        <li  class="">
                                            <div class="dropdown account-menu-dropdown">
                                                <a href="#" class="dropdown-toggle after_login" data-toggle="dropdown"><i class="fa fa-gear"></i></a>
                                                <ul class="dropdown-menu">
                                                    <i class="fa fa-sort-up" aria-hidden="true"></i>
                                                    <li><a href="<?php echo $my_path; ?>/cw/dashboard.aspx"><i class="fa fa-home"></i> Dashboard</a></li>

                                                    <li>
                                                        <a href="<?php echo $my_path; ?>/cw/edit-profile.aspx">
                                                            <i class="glyphicon glyphicon-user"></i>
                                                            Edit Profile</a>
                                                    </li> 

                                                    <li>
                                                        <a href="<?php echo $my_path; ?>/cw/payment-info.aspx">
                                                            <i class="fa fa-money"></i>
                                                            Edit Payment Info</a>
                                                    </li> 
                                                    <li>
                                                        <a href="<?php echo $my_path; ?>/cw/transactions.aspx">
                                                            <i class="fa fa-money"></i>
                                                            Transactions </a>
                                                    </li>
                                                    <li><a href="<?php echo $my_path; ?>/cw/invitations.aspx"><i class="fa fa fa-weibo"></i> My Invitations</a></li>

                                                    <li>
                                                        <a href="<?php echo $my_path; ?>/cw/change-password.aspx">
                                                            <i class="glyphicon glyphicon-lock"></i>
                                                            Change Password </a>
                                                    </li>

                                                    <li class="li-my-account"><a href="<?php echo $my_path; ?>/cw/logout.aspx"><i class="fa fa-lock"></i> Logout</a></li>
                                                </ul>
                                            </div>  </li>
                                    </ul>                            
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo $my_path; ?>/login.aspx" class="b1">Log In</a>  <a href="<?php echo $my_path; ?>/register.aspx"  class="b2">Register</a>
                                <?php } ?>                        
                            </div>

                        </div>
                    </div>
                </div><!--/.container-->
            </div><!--/.top-bar-->

            <nav class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php if (isset($_SESSION["uid"])): ?>
                            <a class="navbar-brand" href="<?php echo $my_path; ?>/job-seeker/dashboard.aspx"><img src="<?php echo $my_path; ?>/images/logoo.png" alt="logo"></a>

                        <?php elseif (isset($_SESSION["cwid"])): ?>
                            <a class="navbar-brand" href="<?php echo $my_path; ?>/cw/dashboard.aspx"><img src="<?php echo $my_path; ?>/images/logoo.png" alt="logo"></a>
                        <?php else: ?>

                            <a class="navbar-brand" href="<?php echo $my_path; ?>"><img src="<?php echo $my_path; ?>/images/logoo.png" alt="logo"></a>
                        <?php endif; ?>



                    </div>

                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <?php
                            if (isset($_SESSION["uid"])) {
                                ?>
                                <li <?php if ($page == "dashboard") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/job-seeker/dashboard.aspx">Dashboard</a></li>
                                <li <?php if ($page == "resume-templates") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/job-seeker/resume-templates.aspx">Resume Templates</a></li>
                                <li <?php if ($page == "our-experts") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/job-seeker/our-experts.aspx">Our Experts</a></li>
                                <li <?php if ($page == "my-resumes") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/job-seeker/my-resumes.aspx">My Resumes</a></li>
                                <li <?php if ($page == "invitations") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/job-seeker/invitations.aspx">Invitations</a></li>
                             <!--<li <?php if ($page == "enquiries") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/job-seeker/enquiries.aspx">Enquiries</a></li>  -->
                                <li <?php if ($page == "chat") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/job-seeker/chat.aspx">Chat</a></li>
                                <?php
                            } else
                            if (isset($_SESSION["cwid"])) {
                                ?>
                                <li <?php if ($page == "dashboard") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/cw/dashboard.aspx">Dashboard</a></li>
                                <li <?php if ($page == "prepare-resumes") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/cw/my-orders.aspx">My Orders</a></li>
                                <li <?php if ($page == "our-experts") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/cw/job-seekers.aspx">Job Seekers</a></li>
                                <!--<li <?php if ($page == "invitations") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/cw/invitations.aspx">Invitations</a></li>-->
                                <li <?php if ($page == "enquiries") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/cw/enquiries.aspx">Enquiries</a></li>   
                                <li <?php if ($page == "chat") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/cw/chat.aspx">Chat</a></li>
                                <?php
                            } else {
                                ?>
                                <li <?php if ($page == "index") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>">Home</a></li>
                                <li <?php if ($page == "about") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/about-us.aspx">About Us</a></li>
                                <li <?php if ($page == "services") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/services.aspx">Services</a></li>
                                <li <?php if ($page == "portfolio") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/portfolio.aspx">Portfolio</a></li>
                                <!--                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i class="fa fa-angle-down"></i></a>
                                                            <ul class="dropdown-menu">
                                                                <li><a href="blog-item.html">Blog Single</a></li>
                                                               
                                                            </ul>
                                                        </li>-->
                                <li <?php if ($page == "skill") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/why-jatka.aspx">Why Jatka.in</a></li> 
                                <li <?php if ($page == "contact") { ?>class="active" <?php } ?>><a href="<?php echo $my_path; ?>/contact.aspx">Contact</a></li>     
                                <?php } ?>                        
                        </ul>
                    </div>
                </div><!--/.container-->
            </nav><!--/nav-->

        </header><!--/header-->
        <?php
        if ($msg->hasErrors()) {
            echo $msg->display();
        }
        ?>