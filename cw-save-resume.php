<?php
ob_start();
?>
<?php
$page="";
include 'header.php';
include 'cw-session-check.php';
?>

<?php
include 'footer.php';
?>
<?php
ob_start();
if(isset($_POST['resume_text']))
{
$resume_text=$_POST["resume_text"];
$cwoid=$_POST["cwoid"];
$jsid=$_POST["jsid"];
$selected_template=$_POST["selected_template"];
$cwid=$_POST["cwid"];
echo $send_type=$_POST["send_type"];
try{
$rs=$db->query("update cw_ordernow set approve='$send_type',resume_text='$resume_text' where id='$cwoid'") or die(mysql_error());        


if($send_type=="Completed"){
$rsc=$db->query("insert into  js_my_resumes(jsid,selected_template,resume_text,status,cwid,pdf_file,html_data,css_data,amount) values('$jsid','$selected_template','$resume_text','Saved','$cwid','0','0','0','paid')") or die(mysql_error());      
 }
//$rs=$db->query("insert into  js_my_resumes(jsid,selected_template,resume_text,status,cwid,pdf_file,html_data,css_data) values('$user_info[Job_Seeker_Id]','$selected_template','$resume_text','$send_type','0','0','0','0')") or die(mysql_error());
if($rs)
{
    if($send_type=="Saved"){
    $pa=$my_path."/cw/my-orders/resume-saved.aspx";
    }
    else{
    $pa=$my_path."/cw/my-orders/resume-completed.aspx";   
    }
    header("Location: $pa");
}
 else {
     $pa=$my_path."/cw/my-orders.aspx";
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