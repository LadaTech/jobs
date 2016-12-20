<?php
ob_start();
$page="my-resumes";
include "header.php";
include 'js-session-check.php';
if(!isset($_GET["id"])){
$p_a=$my_path."/job-seeker/dashboard.aspx";
header("Location: $p_a");
}
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
        <h3 class="main-heading">Order Confirmation</h3>
        
<?php
if(isset($_GET['msg']))
{
$msg=$_GET['msg'];
if($msg=='approved')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Invitation has been approved.</h4>

</div>
<?php   
}
if($msg=='canceled')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Invitation has been canceled.</h4>

</div>
<?php   
}
/***********************Resend  activatelinksent ***********************************/
}
?>
        
<div class="row my-resumes">
    <div class="col-sm-6 resume_preview" id="resume-viewer">
 <?php
$sql_dom="SELECT * FROM js_my_resumes where jsid='$user_info[Job_Seeker_Id]' and id=$_GET[id]";
$stmt_dom = $db->query($sql_dom);
//$stmt_dom->execute();
if ($stmt_dom->rowCount() == 1){
$rt=$stmt_dom->fetch(PDO::FETCH_ASSOC);
echo $rt["resume_text"];
}
else{
$p_a=$my_path."/job-seeker/dashboard.aspx";
header("Location: $p_a");    
}
?>       
    </div>
    <div class="col-sm-6">
        
<div class="order-confirm">
<h4>Your Selected Resume</h4>
<p>Pages that you view in incognito tabs won’t stick around in your browser’s history, cookie store or search history after you’ve closed all of your incognito tabs. Any files you download or bookmarks you create will be kept.</p>
<p>However, you aren’t invisible. Going incognito doesn’t hide your browsing from your employer, your Internet service provider or the websites that you visit.</p>
<h5><span>Amount : </span> $0.01 </h5>
</div>
       <form action="<?php echo $paypal_url; ?>" method="post" class="display-inline">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="My Resume <?php echo $rt["id"]; ?>">
        <input type="hidden" name="item_number" value="<?php echo $rt["id"]; ?>">
        <input type="hidden" name="resume_type" value="self">
        <input type="hidden" name="amount" value="0.01<?php //echo $event["fee"]; ?>">
        <input type="hidden" name="currency_code" value="USD">
        <input type='hidden' name='rm' value='2'>
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='<?php echo $cancel_jsurl; ?>'>
		<input type='hidden' name='return' value='<?php echo $return_jsurl; ?>'>

        
        <!-- Display the payment button. -->
<!--       <input type="submit" name="submit" class="btn  toolbar btn btn-primary open2 pull-right" value="Payment Now"/>-->
        <div class="col-sm-6 col-sm-offset-3 div-paynow">
        <input type="submit" class="btn  toolbar btn btn-primary open2 btn-full btn-paynow" value="Pay Now">
        </div>
        
    </form>  
    </div>
    
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
$(".btn-paynow").click(function(){
$(".div-paynow").empty().html("<img src='<?php echo $my_path; ?>/images/loading.gif' alt='Processing' />");
$("form").submit();
});
</script>
