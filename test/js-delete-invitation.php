<?php
ob_start();
$page="dashboard";
include "header.php";
include 'js-session-check.php';
if(!isset($_GET["id"])){
    $p_a=$my_path."/job-seeker/dashboard.aspx";
header("Location: $p_a");
}

$r=$db->query("select * from  invitations where id=$_GET[id] and jid='$user_info[Job_Seeker_Id]'");
if($r->rowCount()==1){
$dr=$db->query("delete from invitations where id=$_GET[id]");  
    $p_a=$my_path."/job-seeker/invitations/invitation-deleted.aspx";
header("Location: $p_a");
}
else{
    $p_a=$my_path."/job-seeker/dashboard.aspx";
header("Location: $p_a");
}
include "footer.php";
?>