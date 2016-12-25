<?php
ob_start();
$page = "enquiries";
include "header.php";
include 'js-session-check.php';
if(!empty($_POST)){
    include_once 'library/ccavenue_gateway/CCAvenue.php';
    $ccpayObj = new CCAvenue();
    $response = $ccpayObj->response($_POST['encResp']);
    $tableFieldNames = array();
    $tableFieldNames['order_status'] = 'payment_status';
    $tableFieldNames['currency'] = 'mc_currency';
    $tableFieldNames['amount'] = 'payment_gross';
    $tableFieldNames['tracking_id'] = 'txn_id';
    $tableFieldNames['trans_date'] = 'created_on';
    if($response['order_status'] == 'Aborted' || $response['order_status'] == 'Failure'){
        $response['merchant_param1'] = str_replace(array('|',',','itemnumber',"itemname"),array('&','=',"item_number","item_name"),$response['merchant_param1']);
        parse_str($response['merchant_param1'],$productInfoArr);
        if($response['trans_date'] == '') $response['trans_date'] = date('Y-m-d H:i:s');
        $response = array_merge($response,$productInfoArr);
        $fnamesList = implode(",",array_keys($response)); 
        $fvaluesList =  "'".implode("','",array_values($response))."'"; 
        $fnamesList = str_replace(array_keys($tableFieldNames), array_values($tableFieldNames),$fnamesList);
        $qry = "INSERT INTO payments (" . $fnamesList . ") VALUES (". $fvaluesList . ")";
        $qryResp = $db->query($qry);
        $pa=$my_path."/job-seeker/my-resumes/payment-cancel.aspx";
        header("Location: $pa");
    }
}
?>



<?php
include "footer.php";
?>