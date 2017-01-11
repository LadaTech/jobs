<?php
$page = 'Domains';
include "header.php";
	include_once 'page_number.php';
?>
<script type="text/javascript">
$(document).ready(function(){
$('.myonoffswitch').click(function(){
var abc = $(this).data('value');
//alert(abc);
$v="#myonoffswitch"+abc;
//alert($v);
var myonoffswitch=$($v).val();
//alert(myonoffswitch);
if ($($v+":checked").length == 0)
{
var a="0";
}
else
{
var a="1";
}

//alert(a);
$.ajax({
type: "POST",
url: "change_listings_status.php",
data: "value="+a+"&id="+abc+"&pname=batches",
success: function(html){
   // alert(html);
$("#display").html(html).show();
if(html=="error")
    {
       $('.my_alertn').show();
      
     $($v).removeAttr('checked');
    }
}
}); 
});
});
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
Manage  Industries
</h1>
<ol class="breadcrumb">
<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Manage Domains</li>
</ol>
</section>

<section class="content">
<!-- Small boxes (Stat box) -->
<?php
if(isset($_GET['msg']))
{
$msg=$_GET['msg'];
if($msg=='created')
{
//echo "<p class='msg'></p>";
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> New Domain has been added</h4>

</div>
<?php   
}
if($msg=='updated')
{
//echo "<p class='msg'>user has been updated</p>";
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Domain has been updated</h4>

</div>
<?php   
}
if($msg=='delete')
{
//echo "<p class='msg'>user has been deleted</p>";
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Domain has been deleted</h4>

</div>
<?php   
}
if($msg=='non')
{
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Sorry, unable to add new Domain!</h4>

</div>
<?php   
}
if($msg=='nopl')
{
//echo "<p class='rmsg'>Sorry, This email already exist</p>";
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Sorry, This Domain already exist!</h4>

</div>
<?php   
}
}
?>
<div class="row margin-bottom">
<div class="col-xs-6"> 
<form method='GET' name='regform' action=''>
<table width="530">
<tr>
        <td width="50">
<input type="text" class="form-control" placeholder="Search by Domain Name" name="ad_cat" style="margin-right: 15px" value="<?php if(isset($_GET['ad_cat'])) { echo $_GET['ad_cat']; }?>" id="post_cat" required="required">
        </td>
         
        <td width="50"><input type="submit"   id="" value="GO" placeholder="Search School" class="btn btn-primary" required="required" /></td>
</tr>
</table>
</form>	
</div>
<div class="col-xs-6">
    <?php if(isset($_GET['ad_cat'])){ ?>
<div class="col-xs-3">
<div class="input-group">
    <a href="manage_domains.php" class="btn btn-success">View All</a>
</div>
</div>
<?php } ?>
<a href="add_domains.php" class="btn bg-purple pull-right fc-right">Add New Domain</a>
</div>
</div>
<div class="row">
<div class="mand_indu col-xs-12">					
<div class="box">
<div class="box-header">
</div>

<div class="box-body">
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr class="tr-header">												
        <th>Domain Name</th>
        <th>Industry Name</th>
        <th>Actions</th>
</tr>
</thead>
<tbody>
<?php
$loop_page='domains';
if(isset($_GET['ad_cat']))
{
$q=$_GET['ad_cat'];
$sql1="select *,(select name from industry where id=p.iid) i_name from domains p where name like '%$q%'  order by  name asc";
$rs= $db->query("$sql1 limit $id,$no") or die(mysql_error());
include "loop_hub.php";
}
else {
$sql1="select *,(select name from industry where id=p.iid) i_name from domains p order by  name asc";
$rs= $db->query("$sql1 limit $id,$no") or die(mysql_error());
include "loop_hub.php";
}
?>																			
</tbody>
</table>
 <div class="pull-right margin-right" >
<ul class="pagination">
<?php
if(isset($_GET['ad_cat']))
{
include 'pagination.php';
// echo $_SERVER['REQUEST_URI'];
$r_url="manage_domains.php?ad_cat=$_GET[ad_cat]";
$obj->page1($sql1,$no,$r_url,$db);
}
else  {
  include 'pagination.php';
  $obj->page($sql1,$no,"manage_domains",$db);
}
?>
</ul>
</div>
   </div>
    </div>
</div>
</div>			

</section><!-- /.content -->
<!-- content pages -->							
<?php
include "footer.php";
?>		