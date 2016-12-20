<?php
ob_start();
$page="our-experts";
include "header.php";
include 'js-session-check.php';
?>
<section class="inner_page_info">
<div class="gmap-area1">
<div class="container">
<div class="row profile">
<div class="col-sm-12">
<h3 class="main-heading">Our Experts

            <form class="s_form" action="<?php echo $my_path; ?>/job-seeker/our-experts.aspx">
                <div class="">
<input type="text" class="form-control" name="q" placeholder="Search Keyword"   value="<?php if(isset($_GET["q"])){ echo $_GET["q"]; } ?>"/>
                    <input type="submit" name="" value="Search" class="btn btn4" />
                </div>   
                <div class="clearfix"></div>
            </form>
</h3>
<div class="row dashboard experts-wrapper">
<?php
if(isset($_GET["q"])){
$q=$_GET["q"];
$sql1="select * from content_writer where Content_writer_id in(select cwid from cw_payment_info where general_fresher!='') and (First_name like '%$q%' or Last_name like '%$q%' or Education like '%$q%' or exp_yrs like '%$q%' or Content_writer_id in(select cwid from cw_payment_info where iid in(select id from industry where  name like '%$q%')))";
$oe = $db->query("$sql1");
}
else {
$sql1="select * from content_writer where Content_writer_id in(select cwid from cw_payment_info where general_fresher!='')";
$oe=$db->query("$sql1 limit $id,$no");
}
if($oe->rowCount()==0){
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-times"></i> Sorry, No Experts found now!</h4>

</div>   
<?php    
}
else{
   while($experts=$oe->fetch(PDO::FETCH_ASSOC)) 
   {
?>
<div class="col-sm-4">
 <?php  include "cw-single.php"; ?>
</div>   
<?php    
   }
}
?>
</div>
</div>
<div class="clearfix"></div>                
<div class="center">
<ul class="pagination">
<?php
include 'pagination.php';
if(!isset($_GET["q"])){
$r_url=$my_path."/job-seeker/our-experts";
$obj->page($sql1,$no,$r_url,$db);
}
?>
</ul><!-- End Pagination -->                     
</div>    
<!--    <div class="col-sm-4">
<?php //require_once 'js_sidebar.php'; ?>      
</div>-->
</div>
</div>
</div>
</section>  <!--/gmap_area -->

<?php
include "footer.php";
?>