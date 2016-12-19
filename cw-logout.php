<?php
ob_start();
session_start();
require_once("header.php");
$db->query("UPDATE content_writer SET online='0' WHERE Content_writer_id='$user_info[Content_writer_id]'");
session_destroy();
$p_a=$my_path."/cw/login.aspx"; // not valid details
header("Location: $p_a"); 
?>