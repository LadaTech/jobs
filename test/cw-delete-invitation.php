<?php
ob_start();
$page="dashboard";
include "header.php";
include 'cw-session-check.php';
if(!isset($_GET["id"])){
    $p_a=$my_path."/cw/dashboard.aspx";
header("Location: $p_a");
}

$r=$db->query("select * from  invitations where id=$_GET[id] and cwid='$user_info[Content_writer_id]'");
if($r->rowCount()==1){
$dr=$db->query("delete from invitations where id=$_GET[id]");  
    $p_a=$my_path."/cw/invitations/invitation-deleted.aspx";
header("Location: $p_a");
}
else{
    $p_a=$my_path."/cw/dashboard.aspx";
header("Location: $p_a");
}
include "footer.php";
?>