<?php
ob_start();
include "db.php";
$q=$_GET["q"];
?>
    <?php
    $sql1=$db->query("select * from  job_seeker where Email_id='$q'") or die(mysql_error());
    if ($sql1->rowCount() == 0)
    {
        echo "<input type='hidden' name='check_email1' id='email_check' value='0'/>";
    }
    else
    {
       echo "<span style='color:#F00;background:#fff;'>Email already exist</span><input type='hidden' name='check_email1' value='1' id='email_check'/>";  
    }
    //<p style='color:red;font-size:12px;text-align:center;'>Email already exist</p>
    ?>

