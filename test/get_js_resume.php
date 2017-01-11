<?php
ob_start();
include "db.php";
$q=$_GET["id"];
?>
<?php
$sql1=$db->query("select * from  js_my_resumes where id='$q'") or die(mysql_error());
$rdata=$sql1->fetch(PDO::FETCH_ASSOC);
if($rdata["quick_resume_id"] != '0'){
    $fullFileName = $qr_files_path . $rdata['qr_file_name'];
    echo file_get_contents($fullFileName);
} else {
    echo $rdata["resume_text"];
}
?>

