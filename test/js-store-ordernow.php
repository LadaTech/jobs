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
if(isset($_GET["cwoid"])){
$sql_dom="SELECT * FROM cw_ordernow i where jid='$user_info[Job_Seeker_Id]' and id='$_GET[cwoid]' order by id desc";
$stmt_dom = $db->query($sql_dom); 
if ($stmt_dom->rowCount() != 1){
$pa=$my_path."/job-seeker/dashboard.aspx";
header("Location: $pa");    
}
$row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC);
?>
<?php //echo $row_dom["price"]; ?>
<form action="<?php echo $paypal_url; ?>" method="post" class="display-inline">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="My Resume <?php echo $row_dom["id"]; ?>">
        <input type="hidden" name="item_number" value="<?php echo $row_dom["id"]; ?>">
        <input type="hidden" name="resume_type" value="cw">
        <input type="hidden" name="amount" value="0.01">
        <input type="hidden" name="currency_code" value="USD">
        <input type='hidden' name='rm' value='2'>
        <!-- Specify URLs -->
<input type='hidden' name='cancel_return' value='<?php echo $cancel_jsurl; ?>'>
<input type='hidden' name='return' value='<?php echo $return_jsourl; ?>'>

        
        <!-- Display the payment button. -->
<!--       <input type="submit" name="submit" class="btn  toolbar btn btn-primary open2 pull-right" value="Payment Now"/>-->
        <div class="col-sm-6 col-sm-offset-3 div-paynow">
        <input type="submit" class="btn hidden toolbar btn btn-primary open2 btn-full btn-paynow" value="Pay Now">
        </div>
        
    </form>     
<?php    
}
else{
$pa=$my_path."/job-seeker/dashboard.aspx";
header("Location: $pa");    
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
<script>
$(document).ready(function() {    
$("form").submit();
});
</script>