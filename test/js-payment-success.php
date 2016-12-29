<?php
ob_start();
$page = "enquiries";
include_once "header.php";
include_once 'js-session-check.php';

//$_POST['encResp'] = '4c0aaae6ecf33802f552c1605df8d9fd325bcee707dc212426ca0cb67b9505366f4add120dc55162f16174496ce01a3863cdcdafb7e5b5409ca049bfddeed0d9178ba9167ff1360d394510460a7329ec6bea2ca05e796a8f96aaa9dbdac5fbfb5f6c758dca9802a5292b6ada975ed09da8109ebe2f1a88226551dc36cdad659610d7c35f9a2ec93784c4c82300796b739f689dc939e911f57f1d8fcc527853d01ab3d597db7842504302d744dc35723ecf5ef553366710fc8767d9bd02142b1a065ec032648ca6f16e3795d237b3167a5bf8f7170b9c8e4a9fb60b6a06525eb2cced82e63e10d51ae261e046cc6a9d81f6bc98ed2948c5365406e29924293666e630524fd5d09eac188d96afa4a912148c3222ac6912347c892d761183ebad9b592c931533f2d0e0cdbb10051a909646ae1fa8c20864c5e7d7cada6424ab0c1fa2ecde04cf001212a1f301c24efe9481c8cf397fc5dada743571a8fadb3cfea52a2e4c64251404ebd8e1c9104618890a705ab34238f9f306f1fb0ec8fa09891550c9e77037d77b78afa63a07daa927d4f6776959c3022a5f8fc69ae5a5aae463c4a6b36e0a1589bacb8e058545d6e90f9542881baeca4a05f2eb73502017b61317bb0c26acfcfbebb606862ec2952c68d210062fcea15bb147ba8b49a64ff8439dfe3cb566f39c28d18d58c27292063eb89b63d93611579f6283033567110742aae38b2ae20efb1370958a64d251c691f8c839a0c63e8e09f45e22c4c7dda021980d304a1e53f7334a2ba469a3ce0dad2c5c6c9fc0c49265e30df98badebea9fa882fe68639035040675887aad81d72060d815dddd06717ae85434e3438cd812d1e775f7fac73484ca097ce471f364a6f5ef5183c99cf8a6374d0ccb89e64aaba82e72da231ff167ee2dbfee2ec92e916cfda3ae6f3782d14bdf7df2dc5c378165fca3891d356acff6004bd686b05c652b7b1ea62e52eeea2445219dabf0968c7770a091a4db6eff2ea4140c831ea4ff2784543034c34c2838762c407bf98d4e5ae92776ac182f0c05730b6ea722ef8c3fe3ff82b46fc37ba8c73c93c9b79f8a02df451ab375b781a8a02c54f2117f93afa54ba3b06f4a41edb7f443ffa29253fa1ab085bfed8a00e583c8a380be7db883c0209ca50e1c3f0fe59fbf076cf847e415e185e71ef4d7f291f247b1a66b1acd76332afbd862ccab047f882a3e52416f729d006215d9112cb28a3b8fbd4912192bb0171f657421a12e0ec04483798865d65fb3e1bb8f578e345a6154f04648';
//$_POST['orderNo'] = '20161224230711';
//$orderInfo['itemnumber'] = '262';
//$orderInfo['itemname'] = 'MyResume_2';
//$orderInfo['jsid'] = '70';
//$orderInfo['rtype'] = 'qr_fresher';
//$_POST['merchant_param1'] = str_replace(array('&','='),array('|',','),http_build_query($orderInfo));
//echo "<pre>";
//print_r($_POST);
if(!empty($_POST)){
    if($_POST['encResp'] != ''){
        include_once 'library/ccavenue_gateway/CCAvenue.php';
        $ccpayObj = new CCAvenue();
        $response = $ccpayObj->response($_POST['encResp']);

        $tableFieldNames = array();
        $tableFieldNames['order_status'] = 'payment_status';
        $tableFieldNames['currency'] = 'mc_currency';
        $tableFieldNames['amount'] = 'payment_gross';
        $tableFieldNames['tracking_id'] = 'txn_id';
        $tableFieldNames['trans_date'] = 'created_on';
        if($response['order_status'] == 'Success'){
            $response['merchant_param1'] = str_replace(array('|',',','itemnumber',"itemname"),array('&','=',"item_number","item_name"),$response['merchant_param1']);
            parse_str($response['merchant_param1'],$productInfoArr);
            $response['trans_date'] = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$response['trans_date'])));
            $response = array_merge($response,$productInfoArr);
            $fnamesList = implode(",",array_keys($response)); 
            $response['order_status'] = 'Completed';
            $fvaluesList =  "'".implode("','",array_values($response))."'"; 
            $fnamesList = str_replace(array_keys($tableFieldNames), array_values($tableFieldNames),$fnamesList);
            $qry = "INSERT INTO payments (" . $fnamesList . ") VALUES (". $fvaluesList . ")";
            $qryResp = $db->query($qry);
            $item_number = $response['item_number'];
            if($response['rtype'] == "self" || $response['rtype'] == "qr_exp" || $response['rtype'] == "qr_fresher" ){
                $db->query("update js_my_resumes set amount='paid' where id=$item_number ");           
                $pa=$my_path."/js-order-success.php?q=$item_number";
                header("Location: $pa");
            } else if($response['rtype'] == "cw"){
                $pa=$my_path."/js-enquiry-payment.php";
                header("Location: $pa");
            }  
        } else {
            //If transaction failure
        }
    } else {
        //If transaction failure
    }
    
}
?>



<?php
include "footer.php";
?>