<?php
ob_start();
$page="dashboard";
include "header.php";
include 'js-session-check.php';
if(!isset($_GET["id"])){
    $p_a=$my_path."/job-seeker/dashboard.aspx";
header("Location: $p_a");
}

$r=$db->query("select * from  chat_info where id=$_GET[id] and jid='$user_info[Job_Seeker_Id]'");
if($r->rowCount()==1){
 $rec=$r->fetch(PDO::FETCH_ASSOC);    
$dr=$db->query("update chat_info set del='1' where jid=$rec[jid] and cwid=$rec[cwid]");  
    $p_a=$my_path."/job-seeker/chat/chat-deleted.aspx";
header("Location: $p_a");
}
else{
    $p_a=$my_path."/job-seeker/dashboard.aspx";
header("Location: $p_a");
}
include "footer.php";
?>