<?php
ob_start();
$page="dashboard";
include "header.php";
include 'cw-session-check.php';
if(!isset($_GET["id"])){
    $p_a=$my_path."/cw/dashboard.aspx";
header("Location: $p_a");
}

$r=$db->query("select * from  chat_info where id=$_GET[id] and cwid='$user_info[Content_writer_id]'");
if($r->rowCount()==1){
 $rec=$r->fetch(PDO::FETCH_ASSOC);    
$dr=$db->query("update chat_info set del='1' where jid=$rec[jid] and cwid=$rec[cwid]");  
    $p_a=$my_path."/cw/chat/chat-deleted.aspx";
header("Location: $p_a");
}
else{
    $p_a=$my_path."/cw/dashboard.aspx";
header("Location: $p_a");
}
include "footer.php";
?>