<?php
if(!isset($_SESSION["cwid"])){
unset($_SESSION["uid"]);    
$p_a=$my_path."/cw/login.aspx"; // not valid details
header("Location: $p_a"); 
}
?>