<?php
ob_start();
include "header.php";
$id="1";
$sql=mysql_query("select * from logo_info where lid=$id") or die(mysql_error());
if(mysql_num_rows($sql)==1)
{
$res=mysql_fetch_assoc($sql);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
<h4>	<i class="icon fa fa-check"></i> New Location has been added</h4>

</div>
<?php   
}
if($msg=='updated')
{
//echo "<p class='msg'>user has been updated</p>";
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Logo has been updated</h4>

</div>
<?php   
}
if($msg=='delete')
{
//echo "<p class='msg'>user has been deleted</p>";
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Location has been deleted</h4>

</div>
<?php   
}
if($msg=='non')
{
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Sorry, unable to add new Location!</h4>

</div>
<?php   
}
if($msg=='nopl')
{
//echo "<p class='rmsg'>Sorry, This email already exist</p>";
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Sorry, This Location already exist!</h4>

</div>
<?php   
}
}
?>
<section class="content-header">
<h1>
Manage Logo
</h1>
<ol class="breadcrumb">
<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
 <li><a href="manage_ads.php"><i class="fa fa-picture-o text-aqua"></i>Manage Logo & Fav Icons</a></li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->

<div class="row">
    <div class="col-md-1"></div>
            <!-- left column -->
            <div class="col-md-9">
              <!-- Horizontal Form -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Please fill the following details</h3>
                </div><!-- /.box-header -->
                
<!--vb_classifieds  forms values stores here-->
<form name="submenus" action="" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data">
    <input type="hidden" name="lid" id="pid_v" value="<?php echo $res['lid']; ?>" />
<input type="hidden" name="old_img1" id="pid_v" value="<?php echo $res['logo']; ?>" />
<input type="hidden" name="old_img2" id="pid_v" value="<?php echo $res['fav_icon']; ?>" />
<div class="box-body">


<!--vb_classified_images stores image here-->
<div class="form-group" id="imagead" >
<label for="inputPassword3" class="col-sm-3 control-label">Logo</label>
<div class="col-sm-5">
<input type="file" name="logo" id=""  class="form-control" />
</div>
<div class="col-sm-4">
<?php if($res['logo']!=0) { ?><img src="../images/logo/<?php echo $res['logo']; ?>" class="img-responsive"><?php } ?>
</div>
</div>

<div class="form-group" id="imagead" >
<label for="inputPassword3" class="col-sm-3 control-label">Fav Icon</label>
<div class="col-sm-5">
<input type="file" name="fav" id=""  class="form-control" />
</div>
<div class="col-sm-4">
<?php if($res['fav_icon']!=0) { ?><img class="img-responsive" src="../images/logo/<?php echo $res['fav_icon']; ?>" ><?php } ?>
</div>
</div>
<div class="form-group" id="" >
<label for="inputPassword3" class="col-sm-3 control-label">Site Title</label>
<div class="col-sm-9">
<input type="text" name="title" id="" value="<?php echo $res['title']; ?>"  class="form-control" />
</div>
</div>
<div class="form-group" id="" >
<label for="inputPassword3" class="col-sm-3 control-label">Site Short  Title(2 Letters)</label>
<div class="col-sm-9">
<input type="text" name="short_title" id="" value="<?php echo $res['short_title']; ?>" class="form-control" />
</div>
</div>
</div><!-- /.box-body -->
<div class="box-footer">
<input type="submit" name="submit" class="btn btn-info pull-right" value='Submit'>
</div><!-- /.box-footer -->             
</form>
</div><!-- /.box -->

</div>
</div>
</div><!-- /.box-header -->
</section><!-- /.content -->
<!-- content pages -->	
<?php
include "footer.php";
?>	
<?php
ob_start();
if(isset($_POST['submit']))
{
$lid=mysql_real_escape_string($_POST['lid']);
$old_img1=$_POST['old_img1'];
$old_img2=$_POST['old_img2'];
$title=$_POST['title'];
$short_title=$_POST['short_title'];
$uploaded_dir = "../images/logo/";
//Logo 1 upload 
$filename = $_FILES["logo"]["name"];
$filename=rand(100,999)."_".$filename;
$path = $uploaded_dir.$filename;
if (move_uploaded_file($_FILES["logo"]["tmp_name"], $path))
{
unlink($uploaded_dir.$old_img1);    
$logo=$filename;
}
else {
$logo=$old_img1;  
}

//Fav Icon 1 upload 
$filename = $_FILES["fav"]["name"];
$filename=rand(100,999)."_".$filename;
$path = $uploaded_dir.$filename;
if (move_uploaded_file($_FILES["fav"]["tmp_name"], $path))
{
unlink($uploaded_dir.$old_img2);    
$fav=$filename;
}
else {
$fav=$old_img2;  
}

$status=$_POST['status'];
$created_by=$resswa['iuid'];
$rs=mysql_query("update logo_info set logo='$logo',fav_icon='$fav',short_title='$short_title',title='$title' where lid=$lid") or die(mysql_error());
if($rs==1)
{
    header('Location:manage_logo.php?msg=updated');
}
 else {
    header('Location:manage_logo.php?msg=non');
 }
}
ob_end_flush();
?>  
<?php
}
else 
{
header("location:home.php");
}
?>

		