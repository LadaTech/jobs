<?php
ob_start();
$page = "enquiries";
include "header.php";
include 'js-session-check.php';
//$_POST['encResp'] = '4c0aaae6ecf33802f552c1605df8d9fdac3864f7d7b5f0994fb480beda604b861d2ac4c4f8d1eb4647a591a8c6e1621c13dfda2787cbfdd18b3ff1e63d1fe084b63ad0374434cd6986c27273266933c8866100019fe7153da4ea0b40edcc8a9536b6b809670a3fcd2356dd8d951e4b16bf3ef77a8268fec2079e91aede3488a13a9a195644b7904e973c7ccd05c99cd80131975855d4f617b907383f3a772b497b2cfdaac52ab0a49a81069708016f0c604afb644e6a27a91f2f79d5de81596c47364d0ea0480ab537cb0a9bdb22710e49c5919c958a788d79617f96b7e8f480c9f3f8c7a31ff43f72c1f16fb523b2b01a90633eead9ce2aff3ed5ce7080342da5208ef9b147663cd54ed98ba2268da543db4fadb55293d3257e3ecdccc3e9e9e1f3eb9af778362e5d6da5a84d103c10d7a06f185b0b870cd02302f439554cb51aad0c36acb18d68f878f1411747bd638d2415ff88ae6774240508fc79d893bbb88318434e1932002ed54880eaf32b71ed0764c17dfbbba31c0ccc71115c1ffe60dd8289cee26697d0e0db3de10463bd84116d867c410dad6a8508f5d9bfe9ac2761db2444eaf8202501f74a194ce6b0049d34b29958a764c4cb35d6c22cb74786a41b9d9e4a1c95fb0ab6288d2109673dd6b951f9ab17366c6fe48a15a16423e312328be698734984df5ba560adc858c9db30bb2b2f7bc3a09fb5909923aff7c25a1f835a703a7a209a4e503f5720c548dd74ac61efdffbd36f9fe0c3f0b26bd8deee4ea3f5d1acf6eba2618f260409d3bc39a6bce6c5dc82a2795df4669591d228b4d555b319873fa41de05a7e27c4725dc3f9db3d8bdd0287c63cf767a0b4ff7997d9fa0aee2c4739e12220da74e315f77c09f8ee15593ea2ff0e441be66e023f1fbc9179b477162a5bc18bcd1aaf0e59630f26c809e93cfa1b10148621418e588049318a4d636e6956c2ed920d4b9e05f45a59e99ed3cc969615487585def2b20e30785ad40ecf8b226b1b7796816b54e2593ba1ca095b9cebfb3d3661a18f44a5bebc2a8ca49d0ef7c1409c934319431f09b0ba11cfd99bd1972e15a87d89ea1d8abe664c9539bd0b832d4982ba9d655baa23b7ea5ab0ce3a278b243972e1db2ebeca5a6d50a87f4e2253ea590d';
//$_POST['orderNo'] = '20161224230711';
//$orderInfo['item_number'] = '123';
//$orderInfo['item_name'] = 'MyResume_2';
//$orderInfo['jsid'] = '30';
//$orderInfo['rtype'] = 'cw';
//$_POST['merchant_param1'] = str_replace(array('&','='),array('|',','),http_build_query($orderInfo));
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
            $response['merchant_param1'] = str_replace(array('|',','),array('&','='),$response['merchant_param1']);
            parse_str($response['merchant_param1'],$productInfoArr);
            $response['trans_date'] = date('Y-m-d H:i:s',strtotime(str_replace('/','-',$response['trans_date'])));
            $response = array_merge($response,$productInfoArr);
            $fnamesList = implode(",",array_keys($response)); 
            $fvaluesList =  "'".implode("','",array_values($response))."'"; 
            $fnamesList = str_replace(array_keys($tableFieldNames), array_values($tableFieldNames),$fnamesList);
            $qry = "INSERT INTO payments (" . $fnamesList . ") VALUES (". $fvaluesList . ")";
            $qryResp = $db->query($qry);
            if($response['rtype'] == "self"){
                $item_number = $response['item_number'];
                $us=$db->query("update js_my_resumes set amount='paid' where id=$item_number ");           
            }
            $pa=$my_path."/job-seeker/my-resumes/payment-success.aspx";
            header("Location: $pa");
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