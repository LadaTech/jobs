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
$send_type=$_POST["send_type"];
try{    
$rs=$db->query("insert into  js_my_resumes(jsid,selected_template,resume_text,status,cwid,pdf_file,html_data,css_data) values('$user_info[Job_Seeker_Id]','$selected_template','$resume_text','Saved','0','0','0','0')") or die(mysql_error());
if($rs)
{
    $last_id=$db->lastinsertid();
    if($send_type=="save"){
    $pa=$my_path."/job-seeker/my-resumes/resume-saved.aspx";
    }
    else{
    $pa=$my_path."/job-seeker/r-$last_id/order-now.aspx";    
    }
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