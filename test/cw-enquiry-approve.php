<?php
ob_start();
include "db.php";
if(!isset($_GET["eid"])){
$p_a=$my_path."/cw/enquiries.aspx";
header("Location: $p_a");
}
$q=$_GET["eid"];
$msg=$_GET["msg"];
?>
<?php
$sql1=$db->query("update enquiry_info set approve='$msg',jsread='0' where id='$q'") or die(mysql_error());
if ($sql1)
{
    if($msg=="Approved"){
$p_a=$my_path."/cw/enquiries-approved.aspx";
    }
    else{
$p_a=$my_path."/cw/enquiries-canceled.aspx";        
    }
header("Location: $p_a");
}
?>

