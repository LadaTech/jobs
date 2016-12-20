<?php
ob_start();
session_start();
require_once("db.php");
session_destroy();
unset($_SESSION['uid']);
$p_a=$my_path."/login.aspx"; // not valid details
header("Location: $p_a"); 
?>