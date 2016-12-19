<?php
ob_start();
include "db.php";
@session_start();
//echo $q=$_SESSION["uid"];
if(isset($_SESSION["jsemail"])){
$q=$_SESSION["jsemail"];
?>
<?php
//echo "select * from job_seeker where email='$q' and email_verification_status=0";
$sql1=$db->query("select * from job_seeker where Email_id='$q' and email_verification_status=0") or die(mysql_error());
    if($sql1->rowCount()=='1')
    {
  $res=$sql1->fetch(PDO::FETCH_ASSOC);
$subject ="Jatka.in | Email Verification";            
$from = "noreplay@jatka.in";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From:" . $from;
echo $message = "
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Jatka.in | Account  Email Verification</title>
</head>
<body>
<p>Hello <b>$res[fname],</b></p>
<p>We noticed that you need to verify your email address. All you need to do is click the button below (it only takes a few seconds). You won’t be asked to log in to your TeacherHunt.in account – we’re simply verifying Details of this email address.</p><br/>
<p><a href='$my_path/login/$res[email_verification]/activation.aspx'>Click here for activate your account</a></p>
  <p>  or </p><br/>
<p>(Copy Below link and paste it into browser new tab)    </p>
<p>$my_path/login/$res[email_verification]/activation.aspx</p>

<p>If you don't verify your email address, we’re required to temporarily put your Account on hold until verification is complete.*</p>

<p>Thanks for being a Jatka.in user.</p>

<p>Sincerely,<br/>
Jatka.in</p>

</body>
</html>";    
$to= $email; 
mail($to,$subject,$message,$headers);
$p_a=$my_path."/login/activatelinksent.aspx";
header("Location: $p_a");   
    }
    else
    {
$p_a=$my_path."/login.aspx";
header("Location: $p_a");   
    }
    //<p style='color:red;font-size:12px;text-align:center;'>Email already exist</p>
}
else{
$p_a=$my_path."/login.aspx";
header("Location: $p_a");   
}
    ?>

