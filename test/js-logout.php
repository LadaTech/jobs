<?php
ob_start();
session_start();
require_once("header.php");
$db->query("UPDATE job_seeker SET online='0' WHERE Job_Seeker_Id='$user_info[Job_Seeker_Id]'");
session_destroy();
unset($_SESSION['uid']);

$p_a=$my_path."/login.aspx"; // not valid details
header("Location: $p_a"); 
?>