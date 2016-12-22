<?php
ob_start();
include "config.php";
?>
<?php
ob_start();
if(isset($_POST['submit']))
{
$i_name=$_POST['i_name'];
$did=$_POST['Domain'];
$template= mysql_real_escape_string($_POST['template']);
//$template= htmlspecialchars($_POST['template'], ENT_QUOTES);
$c_name=($_POST['c_name']);
// echo "valid";
//echo "insert into   i_users(name,email,password,role,captcha,cpo) values('$name','$email','$password','$role','$captcha','$cpo')";
$uploaded_dir="../images/templates/";
$filename = $_FILES["image1"]["name"];
$filename=time().rand(1,9999)."_".$filename;
        $path = $uploaded_dir.$filename;
        if (move_uploaded_file($_FILES["image1"]["tmp_name"], $path))
        {
        //unlink($uploaded_dir.$old_img1);
        $image1=$filename;
        }
        else {
//        $image1=$old_img1;
        $image1=0;
        }
$rs=mysql_query("insert into templates(name,iid,template,image1,did) values('$c_name','$i_name','$template','$image1','$did')") or die(mysql_error());
if($rs==1)
{
header('Location:manage_templates.php?msg=created');
}
else {
header('Location:manage_templates.php?msg=non');
}
}
ob_end_flush();
?>  

