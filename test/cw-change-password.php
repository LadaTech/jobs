<?php
ob_start();
?>
<?php
$page="change-password";
include 'header.php';
include 'cw-session-check.php';
?>
<section class="inner_page_info">
<div class="gmap-area1">
<div class="container">
<div class="row profile">
    

<div class="col-sm-8">
    
   <h3 class="main-heading">Change Password</h3>   
<?php
if(isset($_GET['msg']))
{
$msg=$_GET['msg'];
if($msg=='updated')
{
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Congratulations, Your password has been updated</h4>

</div>
<?php   
}
if($msg=='wrong')
{
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
?>
<div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-times"></i> Sorry, Invalid old Password!</h4>

</div>
<?php   
}
}
?>    
   <form name="submenus" action="<?php echo $my_path; ?>/cw/change-password.aspx" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data" onsubmit="return validateform();"> 

       
       
<div class="form-group">
<div class="col-lg-8">
<label class="control-label" for="address">Old Password <span class="imp">*</span> </label>
<input type="password" placeholder="Old Password" id="address" name="old_password" class="form-control" autocomplete="off" required="">
<input type="hidden" name="old_p" value="<?php echo $user_info["Password"]; ?>" />
</div>
<div class="clear"></div>
</div> 
       
<div class="form-group">
<div class="col-lg-8">
<label class="control-label" for="address">New Password <span class="imp">*</span> </label>
<input type="password" placeholder="New Password" id="password" name="password" class="form-control" autocomplete="off" required="">
</div>
<div class="clear"></div>
</div> 
       
<div class="form-group">
<div class="col-lg-8">
<label class="control-label" for="address">Confirm Password <span class="imp">*</span> </label>
<input type="password" placeholder="Confirm Password" id="confirm_password" name="c_password" class="form-control" autocomplete="off" required="">
</div>
<div class="clear"></div>
</div> 

<div class="form-group">
<div class="col-sm-3 col-sm-offset-2">
<!-- open1 is given in the class that is binded with the click event -->
<input type="submit" name="submit" class="btn btn-primary open2 btn-full" value="Update Password">
</div>
     <div class="clear"></div>
</div>        
        
    </form>   
     
</div> 
    
      <div class="col-sm-4">
      
  <?php require_once 'js_sidebar.php'; ?>      
        
    </div>
</div>
 
    

</div>  
    
</div>
</section>  <!--/gmap_area -->


<?php
include 'footer.php';
?>
<?php
ob_start();
if(isset($_POST['submit']))
{
$old_p=$_POST["old_p"];
$old_password=md5($_POST["old_password"]);
$password=md5($_POST["password"]);
//$new_to=$_POST["new_to"];
//$years=$_POST["years"];
//$months=mysql_real_escape_string($_POST["months"]);
if($old_p==$old_password){
try{    
$stmt=$db->prepare("update content_writer set Password=:Password where Content_writer_id=:Content_writer_id");
$stmt->bindParam(':Password', $password, PDO::PARAM_STR);
$stmt->bindParam(':Content_writer_id', $_SESSION["cwid"], PDO::PARAM_STR);
$stmt->execute(); 
if($stmt->rowCount()>0)
{
    
    $pa=$my_path."/cw/password-updated.aspx";
    header("Location: $pa");
}
 else {
     $pa=$my_path."/cw/password-updated.aspx";
     header("Location: $pa");
 }
}
catch(PDOException $e){
     echo $e->getMessage();
}
}
 else {
     $pa=$my_path."/cw/wrong-password.aspx";
     header("Location: $pa");
 }
}
ob_end_flush();
?>  
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