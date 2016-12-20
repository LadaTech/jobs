<?php
ob_start();
include "db.php";
$q=$_GET["id"];
?>
<?php
$sql1=$db->query("select * from  js_my_resumes where id='$q'") or die(mysql_error());
$rdata=$sql1->fetch(PDO::FETCH_ASSOC);
echo $rdata["resume_text"];
?>

