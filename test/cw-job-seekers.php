<?php
ob_start();
$page="our-experts";
include "header.php";
include 'cw-session-check.php';
?>
<section class="inner_page_info">
<div class="gmap-area1">
<div class="container">
<div class="row profile">
<div class="col-sm-12">
<h3 class="main-heading">Job Seekers

            <form class="s_form" action="<?php echo $my_path; ?>/cw/job-seekers.aspx">
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
$sql1="select *, (select name from  industry where id=i.Industry) iname, (select name from domains where id=i.Domain) dname from  job_seeker i where Email_id like '%$q%' or First_name like '%$q%' or Last_name like '%$q%'";
$oe = $db->query("$sql1");
}
else {
$sql1="select *, (select name from  industry where id=i.Industry) iname, (select name from domains where id=i.Domain) dname from  job_seeker i order by Job_Seeker_Id desc";
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
   while($recjs=$oe->fetch(PDO::FETCH_ASSOC)) 
   {
?>
<div class="col-sm-4 js-wrappers">
<?php include "js-single.php"; ?>
</div>   
<?php    
   }
}
?>
</div>
       
        
        
      
<div class="clearfix"></div>                
<div class="center">
<ul class="pagination">
<?php
include 'pagination.php';
if(!isset($_GET["q"])){
$r_url=$my_path."/cw/job-seekers";
$obj->page($sql1,$no,$r_url,$db);
}
?>
</ul><!-- End Pagination -->                     
</div>         
      
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