<?php
if(!isset($_SESSION["uid"])){
unset($_SESSION["cwid"]);      
$p_a=$my_path."/login.aspx"; // not valid details
header("Location: $p_a"); 
}
?>