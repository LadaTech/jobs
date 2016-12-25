<?php
ob_start();
$page="my-resumes";
include "header.php";
include 'js-session-check.php';
if(!isset($_GET["id"])){
    $p_a=$my_path."/job-seeker/dashboard.aspx";
    header("Location: $p_a");
}
if(isset($_POST['submit'])){
    //Product Info
    $orderInfo = array();
    $orderInfo['item_number'] = $_POST['item_number'];
    $orderInfo['item_name'] = $_POST['item_name'];
    $orderInfo['jsid'] = $user_info['Job_Seeker_Id'];
    $orderInfo['rtype'] = 'self';
    include_once 'library/ccavenue_gateway/CCAvenue.php';
    $ccpayObj = new CCAvenue();
    $formData['tid'] = date('YmdHis');
    $formData['order_id'] = date('YmdHis');
    $formData['merchant_param1'] = str_replace(array('&','='),array('|',','),http_build_query($orderInfo));
    $formData['order_id'] = date('YmdHis');
    $formData['amount'] = $_POST['price'] = '1.00';
    $formData['redirect_url'] = $my_path.'/js-payment-success.php';
    $formData['cancel_url'] = $my_path.'/js-payment-failure.php';
    $ccpayObj->request($formData);
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
$sql_dom="SELECT m.*,t.name FROM js_my_resumes m LEFT JOIN templates t ON m.selected_template = t.id where m.jsid='$user_info[Job_Seeker_Id]' and m.id=$_GET[id]";
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
    <div class="col-sm-6" >
    <div id="mblfireworks">
        <img src="<?php echo $my_path; ?>/images/final-logo.png" class="img-responsive col-md-4 col-md-offset-4" alt="logo">
<div class="order-confirm">
<h1 style="font-size:40px;" align="center" id="blinker">Congratulations!!!</h1>

<p style="padding:5px; background-color:#FFFFCC" >You are now eligible to avail <strong>Jatka.in launching offer</strong> where you get to create your resume absolutely <strong>free of cost</strong> instead of paying <strong style="color:orange; font-size:20px;">$2</strong>. <br /><br />

 As part of its launching offer, Jatka.in is pleased to announce a special free resume offer that is valid only for today. <br /><br />

We look forward to make your <strong>career journey</strong> more worthwhile. <br /><br />

Now you can download your desired resume form My Resumes Tab.</p>
<!--<h4>Your Selected Resume</h4>

<p>Pages that you view in incognito tabs won’t stick around in your browser’s history, cookie store or search history after you’ve closed all of your incognito tabs. Any files you download or bookmarks you create will be kept.</p>
<p>However, you aren’t invisible. Going incognito doesn’t hide your browsing from your employer, your Internet service provider or the websites that you visit.</p>
<h5><span>Amount : </span>$1.29 </h5>-->
</div>

 
</div>
        <form name="customerData" action="" class="display-inline" method="post">
           <input type="hidden" name="item_number" value="<?php echo $rt["selected_template"]; ?>" /> 
           <input type="hidden" name="item_name" value="<?php echo $rt["name"]; ?>" />   
        <div class="col-sm-6 col-sm-offset-3 div-paynow">
            <input type="submit" name="submit" class="btn  toolbar btn btn-primary open2 btn-full" value="Pay Now">
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
<script src="http://mybloggerlab.com/Scripts/fireworks.js" type="text/javascript"></script>

<script>
/*Fire Works By MyBloggerLab.com*/   
jQuery(function($){               
Xteam.fireworkShow('#mblfireworks', 50);                 
});  

var blink_speed = 200;
var t = setInterval(function () {
    var ele = document.getElementById('blinker');
    ele.style.color= (ele.style.color == 'orange' ? '#cccc00' : ele.style.color == 'red' ? 'orange' : 'red');    
}, blink_speed); 
</script>

<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
</script>