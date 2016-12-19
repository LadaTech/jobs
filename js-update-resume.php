<?php
ob_start();
?>
<?php
$page="";
include 'header.php';
include 'js-session-check.php';
?>

<?php
include 'footer.php';
?>
<?php
ob_start();
if(isset($_POST['resume_text']))
{
$resume_text=$_POST["resume_text"];
$selected_template=$_POST["selected_template"];
$myrid=$_POST["myrid"];
$html_data=$_POST["html_data"];
$css_data=$_POST["css_data"];
try{    
$rs=$db->query("update js_my_resumes set selected_template='$selected_template',resume_text='$resume_text',css_data='$css_data',html_data='$html_data' where id=$myrid") or die(mysql_error());
if($rs)
{
    $pa=$my_path."/job-seeker/my-resumes/resume-updated.aspx";
    header("Location: $pa");
}
 else {
     $pa=$my_path."/job-seeker/my-resumes.aspx";
     header("Location: $pa");
 }
}
catch(PDOException $e){
     echo $e->getMessage();
     header("Location: $pa");
 }
}
ob_end_flush();
?>