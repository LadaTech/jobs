<?php
ob_start();
$page = "invitations";
include "header.php";
include 'cw-session-check.php';
if(!isset($_GET["jid"])){
$p_a=$my_path."/cw/dashboard.aspx";
header("Location: $p_a");    
}
else{
    $jid=$_GET["jid"];
$jsinsert=$db->query("insert into invitations(cwid,jid,approve) value('$user_info[Content_writer_id]','$jid','Pending')");    

if($jsinsert)
{    
$pa=$my_path."/cw/invitation-sent.aspx";
header("Location: $pa");
}
else {
$pa=$my_path."/cw/dashboard.aspx";
header("Location: $pa");
}

}
?>  