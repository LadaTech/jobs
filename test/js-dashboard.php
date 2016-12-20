<?php
ob_start();
$page="dashboard";
include "header.php";
include 'js-session-check.php';
?>
<section class="inner_page_info">
<div class="gmap-area1">

<div class="container">
<div class="row profile">
    <div class="col-sm-8">
        <h3 class="main-heading">Dashboard</h3>
        
        
        
<div class="row dashboard">



<div class="col-lg-4 col-xs-6">
<!-- small box -->
<div class="small-box bg-green">
<div class="inner">
<h3>
<?php
$filled_c=0;
$totc=0;
foreach ($user_info as $key => $value) {
if($key=="First_name" || $key=="Last_name" || $key=="Email_id" || $key=="Password" || $key=="Alternate_email" || $key=="Phone_No" || $key=="Alternate_Phone_no" || $key=="Address" || $key=="Experience_level" || $key=="Domain" || $key=="Father_Name" || $key=="Industry" || $key=="Objective" || $key=="profile_pic"){    
if ($value != ''){
$filled_c++;
}
$totc++;
}
}
//echo $filled_c."+".$totc
$lang=$db->query("select * from js_languages where job_seeker_id='$user_info[Job_Seeker_Id]'");
if($lang->rowCount()==0){  $totc++; } else { $filled_c++; $totc++; }

$lang=$db->query("select * from js_educational_information where job_seeker_id='$user_info[Job_Seeker_Id]'");
if($lang->rowCount()==0){  $totc++; } else { $filled_c++; $totc++; }

$lang=$db->query("select * from js_work_experience where Job_Seeker_Id='$user_info[Job_Seeker_Id]'");
if($lang->rowCount()==0){  $totc++; } else { $filled_c++; $totc++; }

$lang=$db->query("select * from js_skills where job_seeker_id='$user_info[Job_Seeker_Id]'");
$lc=0;
if($lang->rowCount()==0){  $totc++; } else { $filled_c++; $totc++; }

$prof_perc = round(($filled_c*100)/$totc);
echo $lsp=$prof_perc."%";        
?>
                       
</h3>
<p>Profile Completion</p>
</div>
<div class="icon">
<i class="ion fa fa-user"></i>
</div>
    <a href="<?php echo $my_path; ?>/job-seeker/edit-profile.aspx" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div><!-- ./col -->


<div class="col-lg-4 col-xs-6">
<!-- small box -->
<div class="small-box bg-purple">
<div class="inner">
<h3>
<?php
$bcd= $db->query("SELECT count(*) as c FROM js_my_resumes where jsid='$user_info[Job_Seeker_Id]'")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                         
</h3>
<p>Resumes</p>
</div>
<div class="icon">
<i class="fa fa-file-text"></i>
</div>
    <a href="<?php echo $my_path; ?>/job-seeker/my-resumes.aspx" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div><!-- ./col -->



<div class="col-lg-4 col-xs-6">
<!-- small box -->
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$bcd= $db->query("SELECT count(*) as c from content_writer where Content_writer_id in(select cwid from cw_payment_info where general_fresher!='')")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                       
</h3>
<p>Our Experts</p>
</div>
<div class="icon">
<i class="fa  fa-users"></i>
</div>
    <a href="<?php echo $my_path; ?>/job-seeker/our-experts.aspx" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div><!-- ./col -->

<div class="col-lg-4 col-xs-6">
<!-- small box -->
<div class="small-box bg-maroon">
<div class="inner">
<h3>
<?php
$bcd= $db->query("SELECT count(*) as c FROM enquiry_info i where jid='$user_info[Job_Seeker_Id]'")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                           
</h3>
<p>Enquiries</p>
</div>
<div class="icon">
<i class="fa fa-bell"></i>
</div>
    <a href="<?php echo $my_path; ?>/job-seeker/enquiries.aspx" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div><!-- ./col -->

<div class="col-lg-4 col-xs-6">
<div class="small-box bg-yellow">
<div class="inner">
<h3>
<?php
$bcd= $db->query("SELECT count(*) as c FROM invitations i where jid='$user_info[Job_Seeker_Id]'")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                       
</h3>
<p>Invitations</p>
</div>
<div class="icon">
<i class="fa fa fa-weibo"></i>
</div>
    <a href="<?php echo $my_path; ?>/job-seeker/invitations.aspx" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-4 col-xs-6">
<div class="small-box bg-aqua">
<div class="inner">
<h3>
<?php
$bcd= $db->query("SELECT count(*) as c FROM chat_info i where jid='$user_info[Job_Seeker_Id]'")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                        
</h3>
<p>Chat</p>
</div>
<div class="icon">
<i class="fa fa-mail-reply-all"></i>
</div>
    <a href="<?php echo $my_path; ?>/job-seeker/chat.aspx" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

</div>
       
        
        
        
      
    </div>
    <div class="col-sm-4">
      
  <?php require_once 'js_sidebar.php'; ?>      
        
    </div>
    
</div>
</div>
</div>
</section>  <!--/gmap_area -->

<?php
include "footer.php";
?>