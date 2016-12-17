<?php
ob_start();
include "db.php";
$exp_years=$_GET["exp_years"];
$exp_months=$_GET["exp_months"];
$Industry=$_GET["Industry"];
$Domain=$_GET["Domain"];
$cwid=$_GET["cwid"];
$oe=$db->query("select * from cw_payment_info where cwid=$cwid");
if($oe->rowCount()==1){
$experts=$oe->fetch(PDO::FETCH_ASSOC);
//print_r($experts);
$exp_level="";
if($exp_years==0){ $exp_level="Fresher"; }
if($exp_years>0 && $exp_years<=3){ $exp_level="1_3"; }
if($exp_years>3 && $exp_years<=5) { $exp_level="3_5"; }
if($exp_years>5 && $exp_years<=10){ $exp_level="5_10"; }
if($exp_years>10){ $exp_level="11"; }
if($experts["iid"]==$Industry && $experts["did"]==$Domain){
    /************Special Price**********/
 if($exp_level=="Fresher") { echo $experts["special_fresher"]; }  
 if($exp_level=="1_3") { echo $experts["special_1_exp"]; }  
 if($exp_level=="3_5") { echo $experts["special_2_exp"]; }  
 if($exp_level=="5_10") { echo $experts["special_3_exp"]; }  
 if($exp_level=="11") { echo $experts["special_4_exp"]; }  
}
else{
 if($exp_level=="Fresher") { echo $experts["general_fresher"]; }  
 if($exp_level=="1_3") { echo $experts["general_1_exp"]; }  
 if($exp_level=="3_5") { echo $experts["general_2_exp"]; }  
 if($exp_level=="5_10") { echo $experts["general_3_exp"]; }  
 if($exp_level=="11") { echo $experts["general_4_exp"]; }  
    
}

}
else{
  echo "no";  
}


?>
