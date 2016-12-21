<?php

$my_path = "http://" . $_SERVER['HTTP_HOST'];
$path = "http://" . $_SERVER['HTTP_HOST'] . "/";
$DB_host = "localhost";
$company_url = "#";
$compnay_small_name = "Jatka";
$logo_img_url = "logo.png";
$fav_icon_url = "";
$compnay_name = "Jatka.in";
switch ($_SERVER['SERVER_NAME']) {
    case 'jatka.in' : {
            $DB_user = "nagendra_jin";
            $DB_pass = "nagendra@ipl";
            $DB_name = "jatkaupdate";
            break;
        }
    case "localhost": {
            $DB_user = "root";
            $DB_pass = "";
            $DB_name = "jatkaupdate";
            break;
        }
}

try {
    $db = new PDO("mysql:host={$DB_host};dbname={$DB_name}", $DB_user, $DB_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
//Set useful variables for paypal form
//$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
//$paypal_id = 'phanisri1@gmail.com'; //Business Email

$paypal_url = 'https://www.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_id = 'phanisri.konte@gmail.com'; //Business Email

$return_jsurl = $my_path . '/job-seeker/transactions-payment-success.aspx';
$return_jsourl = $my_path . '/job-seeker/cw-order/transactions-payment-success.aspx';
$cancel_jsurl = $my_path . '/job-seeker/transactions-payment-cancelled.aspx';
?>
