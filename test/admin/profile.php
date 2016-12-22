<?php
ob_start();
include "header.php";
$id=$_SESSION['username'];
//echo "select * from vb_users where username='$id'";
$sql=$db->query("select * from vb_users where username='$id' and role='admin'") or die(mysql_error());
if($sql->rowCount()==1)
{
$res=$sql->fetch(PDO::FETCH_ASSOC);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
<h1>
Profile
</h1>
<ol class="breadcrumb">
<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Profile</li>
</ol>
</section>
<!-- Main content -->
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
<h4>	<i class="icon fa fa-check"></i> New Profile has been added</h4>

</div>
<?php   
}
if($msg=='updated')
{
//echo "<p class='msg'>user has been updated</p>";
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Profile has been updated</h4>

</div>
<?php   
}
if($msg=='delete')
{
//echo "<p class='msg'>user has been deleted</p>";
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Profile has been deleted</h4>

</div>
<?php   
}
if($msg=='non')
{
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Sorry, unable to edit new Profile!</h4>

</div>
<?php   
}
if($msg=='nopl')
{
//echo "<p class='rmsg'>Sorry, This email already exist</p>";
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Sorry, This username already exist!</h4>

</div>
<?php   
}
}
?>

<div class="row">
<div class="col-md-2"></div>
<!-- left column -->
<div class="col-md-8">
<!-- Horizontal Form -->
<div class="box box-warning">
<div class="box-header with-border">
<h3 class="box-title">Please fill the following details</h3>
</div><!-- /.box-header -->
<form name="submenus" action="" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data">  
<input type="hidden" name="iuid" id="pid_v" value="<?php echo $res['iuid']; ?>" />
<input type="hidden" name="oldp" id="" value="<?php echo $res['password']; ?>" />
 <input type="hidden" name="old_img1" id="pid_v" value="<?php echo $res['icon']; ?>" />
    
   <div class="box-body">
<div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Name</label>
<div class="col-sm-9">
<input type="text" name="name" id="" value="<?php echo $res['name']; ?>" class="form-control" required="required" />
</div>
</div>
         
<div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Email ID</label>
<div class="col-sm-9">
 <input type="email" name="email" id="" value="<?php echo $res['email']; ?>" class="form-control" required="required" />
</div>
</div>
<div class="form-group">
	<label for="inputPassword3" class="col-sm-3 control-label">Username</label>
<div class="col-sm-9">
<input type="text" name="username" id="confirmPassword" value="<?php echo $res['username']; ?>" class="form-control" required="required" />
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
<div class="col-sm-9">
 <input type="password" name="password" placeholder="Password" class="form-control" id="password" >
</div>
</div>
<div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Re-Password</label>
<div class="col-sm-9">
<input type="password" placeholder="Confirm Password" class="form-control" id="confirm_password" >
</div>
</div>
 <div class="form-group">
<label for="inputPassword3" class="col-sm-3 control-label">Icon</label>
<div class="col-sm-5">
<input type="file" name="image1" id=""  class="form-control" />
</div>
<div class="col-sm-4">
<?php if($res['icon']!=0) { ?><img src="img/icons/<?php echo $res['icon']; ?>" alt="" class="img-responsive" width="150px"> <?php } else { ?> <img src="img/no-img.png" class="img-responsive"  width="150px"> <?php } ?>
</div>
</div>           
         
       </div><!-- /.box-body -->
<div class="box-footer">
<button type="submit" name="submit" class="btn btn-info pull-right">Submit</button>
</div><!-- /.box-footer -->     
    
</form>   
    
 </div><!-- /.box -->

</div>
</div>
</div><!-- /.box-header -->
</section><!-- /.content -->
<!-- content pages -->		
<script>
$(document).ready(function() {
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
    });
</script>
					
<?php
include "footer.php";
?>	   
<?php
ob_start();
if(isset($_POST['submit']))
{
$iuid=($_POST['iuid']);
 $old_img1=$_POST['old_img1'];
$name=($_POST['name']);
$email=($_POST['email']);
$username=($_POST['username']);
$pas=$_POST['password'];
if($pas=="")
{
$password=$_POST['oldp'];
}
else{
$password=md5($_POST['password']);
}
$quer2=$db->query("select * from vb_users where (email='$email' or username='$username') and iuid!='$iuid'") or die(mysql_error());
if(mysql_num_rows($quer2)==0)
{
// echo "valid";
//echo "insert into   i_users(name,email,password,role,captcha,cpo) values('$name','$email','$password','$role','$captcha','$cpo')";
    $uploaded_dir="img/icons/";
$filename = $_FILES["image1"]["name"];
$filename=time().rand(1,9999)."_".$filename;
        $path = $uploaded_dir.$filename;
        if (move_uploaded_file($_FILES["image1"]["tmp_name"], $path))
        {
        unlink($uploaded_dir.$old_img1);
        $image1=$filename;
        }
        else {
        $image1=$old_img1;  
        }
$rs=$db->query("update  vb_users set name='$name',email='$email', password='$password',username='$username',icon='$image1' where iuid=$iuid") or die(mysql_error());
if($rs==1)
{
header('Location:profile.php?msg=updated');
}
else {
header('Location:profile.php?msg=non');
}
}
else
{
header('Location:profile.php?msg=nopl');
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
