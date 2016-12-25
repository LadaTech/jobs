<?php
ob_start();
include "header.php";
include 'js-session-check.php';

/*
 *  Make it as read notification after clicking the enquiries  which are displaying under notifications count in header.php
 *  After that navigate to enquiries page
 */
if(isset($_GET['id']) && $_GET['id'] != ''){
    $recId = $_GET['id'];
    $res = $db->query("update enquiry_info set jsread=1 where id='$recId'");
    if($res){
        $url = $my_path . '/js-enquiries.php';
        header("Location: $url");
    }
}

?>