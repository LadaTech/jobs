<?php
ob_start();
$page="dashboard";
include "header.php";
include 'cw-session-check.php';
?>
<section class="inner_page_info">
<div class="gmap-area1">

<div class="container">
<div class="row profile">
<div class="col-sm-8">
<h3 class="main-heading">Dashboard</h3>
<?php
$p1=$db->query("select * from cw_payment_info where cwid=$_SESSION[cwid]");
if($p1->rowCount()==1){
$payment=$p1->fetch(PDO::FETCH_ASSOC); 
{
if($payment["general_fresher"]==''| $payment["general_1_exp"]==''| $payment["general_2_exp"]==''| $payment["general_3_exp"]==''| $payment["general_4_exp"]==''){    
?>
<div class="notifications-alert">
    <p>Your Profile Not visible on Job Seeker Side. Because of Payment Info. Please Update your Payment Info. <a href="<?php echo $my_path?>/cw/payment-info.aspx">Click Here</a></p>
</div>        
<?php } } } ?>

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
if($key=="First_name" || $key=="Last_name" || $key=="Email_id" || $key=="Password" || $key=="Alternate_email" || $key=="Phone_No" || $key=="Alternate_Phone_no" || $key=="Gender" || $key=="Address" || $key=="Profile_summary" || $key=="exp_yrs" || $key=="exp_mnths" || $key=="Education" || $key=="profile_pic"  || $key=="Certifications"){ 
if ($value != ''){
$filled_c++;
}
$totc++;
}
}
$lang=$db->query("select * from cw_skills where cwid='$user_info[Content_writer_id]'");
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
    <a href="<?php echo $my_path; ?>/cw/edit-profile.aspx" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div><!-- ./col -->


<div class="col-lg-4 col-xs-6">
<!-- small box -->
<div class="small-box bg-purple">
<div class="inner">
<h3>
<?php
$bcd= $db->query("SELECT count(*) as c FROM cw_ordernow where cwid='$user_info[Content_writer_id]' and id in(select item_number from payments where payment_status='Completed' and rtype='cw')")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                        
</h3>
<p>My Orders</p>
</div>
<div class="icon">
<i class="fa fa-file-text"></i>
</div>
    <a href="<?php echo $my_path; ?>/cw/my-orders.aspx" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div><!-- ./col -->



<div class="col-lg-4 col-xs-6">
<!-- small box -->
<div class="small-box bg-red">
<div class="inner">
<h3>
<?php
$bcd= $db->query("SELECT count(*) as c FROM   job_seeker i")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                           
</h3>
<p>Job Seekers</p>
</div>
<div class="icon">
<i class="fa  fa-users"></i>
</div>
    <a href="<?php echo $my_path; ?>/cw/job-seekers.aspx" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div><!-- ./col -->

<div class="col-lg-4 col-xs-6">
<div class="small-box bg-maroon">
<div class="inner">
<h3>
<?php
$bcd= $db->query("SELECT count(*) as c FROM chat_info i where cwid='$user_info[Content_writer_id]'")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                         
</h3>
<p>Chat</p>
</div>
<div class="icon">
<i class="fa fa-mail-reply-all"></i>
</div>
    <a href="<?php echo $my_path; ?>/cw/chat.aspx" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div> 

<div class="col-lg-4 col-xs-6">
<div class="small-box bg-yellow">
<div class="inner">
<h3>
<?php
$bcd= $db->query("SELECT count(*) as c FROM invitations i where cwid='$user_info[Content_writer_id]'")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                          
</h3>
<p>Invitations</p>
</div>
<div class="icon">
<i class="fa fa fa-weibo"></i>
</div>
    <a href="<?php echo $my_path; ?>/cw/invitations.aspx" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-4 col-xs-6">
<div class="small-box bg-aqua">
<div class="inner">
<h3>
<?php
$bcd= $db->query("SELECT count(*) as c FROM enquiry_info i where cwid='$user_info[Content_writer_id]'")->fetch(PDO::FETCH_ASSOC);
echo $bcd['c'];
//echo "0";
?>                       
</h3>
<p>Enquiries</p>
</div>
<div class="icon">
<i class="fa fa fa-bell"></i>
</div>
    <a href="<?php echo $my_path; ?>/cw/enquiries.aspx" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>

</div>
       
        
        
        
      
    </div>
    <div class="col-sm-4">
      
  <?php require_once 'cw_sidebar.php'; ?>      
        
    </div>
    
</div>
</div>
</div>
</section>  <!--/gmap_area -->

<?php
include "footer.php";
?>