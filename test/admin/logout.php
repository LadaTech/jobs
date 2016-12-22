<?php
ob_start();
session_start();
require_once("../db.php");
session_destroy();
unset($_SESSION['username']);
header("Location: index.php");
?>