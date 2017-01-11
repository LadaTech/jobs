<?php
$page = 'Dashboard';
include "header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
Dashboard
<small>Control panel</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Dashboard</li>
</ol>
</section>
<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->


<div class="row">



<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-green">
<div class="inner">
<h3>
<?php
$bcd= $db->query("select count(*) as c from industry")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                        
</h3>
<p>Industries</p>
</div>
<div class="icon">
<!--<i class="ion fa fa-tree"></i>-->
<i class="fa  fa-globe"></i>
</div>
    <a href="manage_industries.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div><!-- ./col -->


<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-purple">
<div class="inner">
<h3>
<?php
$bcd= $db->query("select count(*) as c from domains")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                        
</h3>
<p>Domains</p>
</div>
<div class="icon">
<i class="fa  fa-globe"></i>
</div>
    <a href="manage_domains.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div><!-- ./col -->



<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-yellow">
<div class="inner">
<h3>
<?php
$bcd= $db->query("select count(*) as c from job_seeker")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                        
</h3>
<p>Job Seekers</p>
</div>
<div class="icon">
<i class="fa  fa-users"></i>
</div>
    <a href="manage_jobseekers.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div><!-- ./col -->

<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-maroon">
<div class="inner">
<h3>
<?php
$bcd= $db->query("select count(*) as c from content_writer")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                        
</h3>
<p>Content Writers</p>
</div>
<div class="icon">
<i class="fa  fa-users"></i>
</div>
    <a href="manage_cw.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div><!-- ./col -->

<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$bcd= $db->query("select count(*) as c from enquiry_info")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                        
</h3>
<p>Enquiries</p>
</div>
<div class="icon">
<i class="fa fa fa-pencil"></i>
</div>
    <a href="manage_enquiries.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-teal  bg-real-purple">
<div class="inner">
<h3>
<?php
$bcd= $db->query("select count(*) as c from invitations")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                        
</h3>
<p>Invitations</p>
</div>
<div class="icon">
<i class="fa fa fa-file-word-o"></i>
</div>
    <a href="manage_invitations.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-olive  bg-real-purple">
<div class="inner">
<h3>
<?php
$bcd= $db->query("select count(*) as c from chat_info")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                        
</h3>
<p>Chat</p>
</div>
<div class="icon">
<i class="fa fa fa-weixin"></i>
</div>
    <a href="manage_chat.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-aqua  bg-real-purple">
<div class="inner">
<h3>
<?php
$bcd= $db->query("select count(*) as c from  payments")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                        
</h3>
<p>Payments</p>
</div>
<div class="icon">
<i class="fa fa-rupee"></i>
</div>
    <a href="manage_payments.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>


<div class="col-lg-3 col-xs-6">
<!-- small box -->
<div class="small-box bg-aqua bg-real-purple">
<div class="inner">
<h3>
<?php
$bcd= $db->query("select count(*) as c from templates")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                        
</h3>
<p>Templates</p>
</div>
<div class="icon">
<i class="fa fa fa-file-word-o"></i>
</div>
    <a href="manage_templates.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

</div>










<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>	















</section><!-- /.content -->
<?php
include "footer.php";
?>