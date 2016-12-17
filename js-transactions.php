<?php
ob_start();
$page="my-transactions";
include "header.php";
include 'js-session-check.php';
?>
<!--  <link href="<?php echo $my_path; ?>/templates/css/extra_styles.css" rel="stylesheet">
    <link href="<?php echo $my_path; ?>/templates/Css.jtp" rel="stylesheet">-->
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
    <div class="col-sm-8">
        <h3 class="main-heading">My Transactions
        
  <form class="s_form" action="<?php echo $my_path; ?>/job-seeker/transactions.aspx">
                <div class="">
<input type="text" class="form-control" name="q" placeholder="Search Keyword"   value="<?php if(isset($_GET["q"])){ echo $_GET["q"]; } ?>"/>
                    <input type="submit" name="" value="Search" class="btn btn4" />
                </div>   
                <div class="clearfix"></div>
            </form>        
        </h3>
        
<?php
if(isset($_GET['msg']))
{
$msg=$_GET['msg'];
if($msg=='resume-saved')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> New Resume has been saved.</h4>

</div>
<?php   
}
if($msg=='resume-updated')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Resume has been updated.</h4>

</div>
<?php   
}
if($msg=='payment-success')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Congrats! Payment has been completed. Download your Resume</h4>

</div>
<?php   
}
if($msg=='resume-deleted')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Resume has been deleted.</h4>

</div>
<?php   
}
/***********************Resend  activatelinksent ***********************************/

if($msg=='payment-cancelled')
{
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
?>
    
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Sorry, Your payment has been cancelled! Please try again.</h4>

</div>
<?php   
}
/***********************Payment Cancelled  activatelinksent ***********************************/

}
?>
        
<div class="row my-resumes">
<?php
if(isset($_GET["q"])){
$q=$_GET["q"];
$sql1="SELECT * FROM payments where jsid='$user_info[Job_Seeker_Id]' and (created_on like '%$q%'  or  payment_status like '%$q%'  or   payment_gross like '%$q%'  or   rtype like '%$q%'  )";
$stmt_dom = $db->query("$sql1");
}
else {	
$sql1="SELECT * FROM payments where jsid='$user_info[Job_Seeker_Id]' order by id desc";
$stmt_dom = $db->query("$sql1 limit $id,$no");
}
//$stmt_dom->execute();

if ($stmt_dom->rowCount() == 0){
?>
    <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-times"></i> Sorry, No Transactions Found!</h4>
</div>
<?php    
}
else{
?>
    <table class="table-wrapper">
        <thead>
            <th>Transaction No</th>
            <th>Payment Status</th>
<!--            <th>PDF File</th>-->
            <th>Amount</th>
            <th>Resume Type</th>
            <th>Transaction On</th>
        </thead>
        <tbody>
<?php
while($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)){
?>    
           <tr class="transactio_preview preview" data-tid="<?php echo $row_dom["id"]; ?>"  data-jid="<?php echo $row_dom["jsid"]; ?>">
               
              
                <td><?php echo $row_dom["txn_id"]; ?></td>
                <td><?php echo $row_dom["payment_status"]; ?></td>
                <td><?php echo $row_dom["mc_currency"]." ".$row_dom["payment_gross"]; ?></td>
                <td><?php echo $row_dom["rtype"]; ?></td>
                <td><?php echo date("d M Y h:i A", strtotime($row_dom["created_on"])); ?></td>
                
            </tr>
<?php } ?> 
        </tbody>
    </table>
<?php } ?>
</div>
       
        
       
 <div class="clearfix"></div>                
<div class="center">
<ul class="pagination">
<?php
include 'pagination.php';
if(!isset($_GET["q"])){
$r_url=$my_path."/job-seeker/transactions";
$obj->page($sql1,$no,$r_url,$db);
}
?>
</ul><!-- End Pagination -->                     
</div>      
        
      
    </div>
    <div class="col-sm-4">
      
  <?php require_once 'js_sidebar.php'; ?>      
        
    </div>
    
</div>
</div>
</div>
</section>  <!--/gmap_area -->


<!-- Preview Popup-->  
<div class="modal fade in" id="preview-popup" role="dialog" aria-hidden="false">
<div class="modal-dialog">

<!-- Preview  POPUP  content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>

<h3><span>Transaction Details</span></h3> 
</div>
<div class="papersheet-outer" id="resume">    
<div class="modal-body" id="resume-viewer">


</div>
</div>
<div class="clearfix"></div>
</div>
<!-- Preview POPUP  content End-->
</div>
</div>
<!-- Preview Popup End-->  

<?php
include "footer.php";
?>
<script>
$(".preview").click(function(){
$id=$(this).data("tid");
$jid=$(this).data("jid");
$this=$(this);
//alert($id);
$.ajax({
type:"get",
url:"<?php echo $path; ?>/get-transaction-info.php",
data:{"id":$id,"utype":"js","jid":$jid},
success:function(data){
//alert(data);
$(".modal-body").empty().html(data);
$(".modal-body").append($this.closest("tr").find(".other-info").html());
$(".modal-footer .action_data").empty().html($this.closest("tr").find(".clone_data").html());
$("#preview-popup").modal("show");
}
});   
//    $(this).closest(".preview_content").html();
//   $(".modal-header").html()
});
</script>
