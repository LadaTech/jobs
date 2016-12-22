<?php
ob_start();
$page = "enquiries";
include "header.php";
include 'js-session-check.php';
//if(!isset($_GET["cwid"])){
//$p_a=$my_path."/job-seeker/dashboard.aspx";
//header("Location: $p_a");    
//}
if(!empty($_POST)){
    include_once 'library/ccavenue_gateway/CCAvenue.php';
    $ccpayObj = new CCAvenue();
    $response = $ccpayObj->response($_POST);
    print_r($response);
}
?>



<?php
include "footer.php";
?>