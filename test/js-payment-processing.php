<?php
ob_start();
$page="my-resumes";
include "header.php";
include 'js-session-check.php';
?>
    <style>
        div.papersheet-outer{
                margin-right: 0px;
    margin-left: 0px;
    width: 100%;
        }
    </style>
<section class="inner_page_info">
<div class="gmap-area1">

<div class="container">
<div class="row profile">
    <div class="col-sm-12">
        <h3 class="main-heading">Payment Processing</h3>
<div class="row my-resumes">
<div class="col-sm-3 col-sm-offset-4">
    <img src='<?php echo $my_path; ?>/images/loading.gif' alt='Processing' />
</div>
<?php
if(isset($_POST["payment_status"])){
    $payment_status=$_POST["payment_status"];
    $item_name=$_POST["item_name"];
    $mc_currency=$_POST["mc_currency"];
    $item_number=$_POST["item_number"];
    $payment_gross=$_POST["payment_gross"];
    $jsid=$user_info["Job_Seeker_Id"];
    $txn_id=$_POST["txn_id"];
    $rtype=$_GET["rtype"];
    if($rtype=="self" && $payment_status == "Completed"){
$us=$db->query("update js_my_resumes set amount='paid' where id=$item_number");           }
$insert = $db->query("INSERT INTO payments(payment_status,item_name,mc_currency,item_number,payment_gross,jsid,txn_id,rtype) VALUES('$payment_status','$item_name','$mc_currency','$item_number','$payment_gross','$jsid','$txn_id','$rtype')");  
    if($insert)
	{    
        $pa=$my_path."/job-seeker/my-resumes/payment-success.aspx";
        header("Location: $pa");
        }
        else {
        $pa=$my_path."/job-seeker/my-resumes/payment-cancel.aspx";
        header("Location: $pa");
        }
}
?>
</div>
</div>
<!--    <div class="col-sm-4">
      
  <?php //require_once 'cw_sidebar.php'; ?>      
        
    </div>-->
    
</div>
</div>
</div>
</section>  <!--/gmap_area -->
<?php
include "footer.php";
?>
