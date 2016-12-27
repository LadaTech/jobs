<?php
ob_start();
include "db.php";
$q=$_GET["id"];
?>
<?php
$sql1=$db->query("select * from  js_my_resumes where amount='paid' and id='$q'") or die(mysql_error());
$rdata=$sql1->fetch(PDO::FETCH_ASSOC);
if($rdata["id"] == '') {
    $pa=$my_path."/js-payment-confirmation.php?id=$q";
    header("Location: $pa");
}
?>

<?php
$content='<div id="resume-viewer">'.$rdata["resume_text"].'</div>';

// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
$dompdf = new DOMPDF;                        
$dompdf->load_html($content);
$dompdf->render();
$resume_pdfname="My-Resume-".$rdata["id"].".pdf";
$dompdf->stream("$resume_pdfname",array("Attachment"=>1));
?>

