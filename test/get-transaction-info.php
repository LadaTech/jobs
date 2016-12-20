<?php
ob_start();
include "db.php";
$q=$_GET["id"];
$jid=$_GET["jid"];
$sql19="SELECT * FROM payments where jsid='$jid' and id='$q' order by id desc";
$stmt_dom = $db->query("$sql19");
$row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC);
?>
<?php
if($row_dom["rtype"]=="cw") { 
$cp=$db->query("select *,(select name from  industry where id=i.iid) iname, (select name from domains where id=i.did) dname from cw_ordernow i where id=$row_dom[item_number]");  
 if ($cp->rowCount() == 1)
 {
$ordernow = $cp->fetch(PDO::FETCH_ASSOC);
$sql21=$db->query("select * from  content_writer where Content_writer_id='$ordernow[cwid]'");
if($sql21->rowCount()==1){
$rdata=$sql21->fetch(PDO::FETCH_ASSOC);
?>
<div class="other-info">
<h4 class="sp_heading">Content Writer Info</h4>              
<div class="row">
    <div class="col-sm-9">
        <div class="col-sm-5 blabel">Full Name : </div><div class="col-sm-7"><?php echo $rdata["First_name"]." ".$rdata["Last_name"]; ?></div> <div class="clearfix"></div>
        <?php if(!isset($_GET["utype"])) { ?>    
    <div class="col-sm-5 blabel">Email : </div><div class="col-sm-7"><?php echo $rdata["Email_id"]; ?></div><div class="clearfix"></div>
    <div class="col-sm-5 blabel">Alternate Email : </div><div class="col-sm-7"><?php echo $rdata["Alternate_email"]; ?></div><div class="clearfix"></div>
    <div class="col-sm-5 blabel">Contact Number  : </div><div class="col-sm-7"><?php echo $rdata["Phone_No"]; ?></div><div class="clearfix"></div>
    <div class="col-sm-5 blabel">Alternate Contact Number : </div><div class="col-sm-7"><?php echo $rdata["Alternate_Phone_no"]; ?></div><div class="clearfix"></div>
    <div class="col-sm-5 blabel">Gender : </div><div class="col-sm-7"><?php echo $rdata["Gender"]; ?></div><div class="clearfix"></div>
    <div class="col-sm-5 blabel">Address : </div><div class="col-sm-7"><?php echo $rdata["Address"]; ?></div><div class="clearfix"></div>
    
    <?php } ?>
    <div class="col-sm-5 blabel">Experience : </div><div class="col-sm-7"><?php echo $rdata["exp_yrs"]; ?> Years <?php echo $rdata["exp_mnths"]; ?> Months</div><div class="clearfix"></div>
    <div class="col-sm-5 blabel">Education : </div><div class="col-sm-7"><?php echo $rdata["Education"]; ?></div><div class="clearfix"></div>
    <div class="col-sm-5 blabel">Certifications : </div><div class="col-sm-7"><?php if($rdata["Certifications"]!="") { echo $rdata["Certifications"]; } else { echo "Not Applicable";} ?></div><div class="clearfix"></div>
    </div>
    <div class="col-sm-3">
        <?php if($rdata['profile_pic']!=0 && $rdata['profile_pic']!="") { ?><img src="<?php echo $my_path; ?>/images/cw/<?php echo $rdata['profile_pic']; ?>" height="100px" class="img-responsive"><?php } else { ?><img src="<?php echo $my_path; ?>/images/user.png" height="100px"> <?php } ?>
    </div>
    <div class="clearfix"></div>
    <div class='col-sm-9'>   
    <div class="col-sm-5 blabel">
        Skills : 
    </div>
    <div class="col-sm-7">
        <?php
$lang=$db->query("select * from cw_skills where cwid='$rdata[Content_writer_id]'");
$lc=0;
if($lang->rowCount()==0){
?>
        <b class="no-info">No Skills Found</b>
<?php
}
else{ ?> <ol> <?php
while($rec_j = $lang->fetch(PDO::FETCH_ASSOC)){
$lc++;     
?> 
 <li><?php echo $rec_j["cw_skill_description"]; ?></li>       
<?php } ?></ol> <?php } ?>    </div>
    </div>
     <div class="clearfix"></div>
     <div class='col-sm-12'>   
     <h4 class="sp_heading">Content Writer Payment  Info</h4>
     </div>
     <div class='col-sm-12 no-padding'>   
    <?php
$sql_dom="SELECT *,(select name from industry where id=i.iid) as iname FROM cw_payment_info i where cwid=$rdata[Content_writer_id]";
$stmt_dom = $db->query($sql_dom);
if ($stmt_dom->rowCount() == 1){
$pdom=$stmt_dom->fetch(PDO::FETCH_ASSOC);   
?>
<?php  if($pdom['iname']!="" &&  $pdom['special_fresher']!="" && $pdom['special_4_exp']!=""){ ?>
        <div class="special">
         <div class='col-sm-9'>   
    <div class="col-sm-5 blabel">
        Specific  Industry :
    </div>
             <div class="col-sm-7">
              <?php echo $pdom['iname']; ?>   
             </div>   
            </div>
     <div class="clearfix"></div>
     
     
            <div class='col-sm-9'>   
    <div class="col-sm-5 blabel">Specific  Price : </div>
             <div class="col-sm-7"> $<?php echo $pdom['special_fresher']; ?> - $<?php echo $pdom['special_4_exp']; ?></div>
             </div>   
            </div>
     <div class="clearfix"></div>
            </div>
<?php } ?>
<div class='col-sm-12 no-padding'>      
<div class='col-sm-9'>   
    <div class="col-sm-5 blabel">General Price : </div>
             <div class="col-sm-7"> $<?php echo $pdom['general_fresher']; ?> - $<?php echo $pdom['general_4_exp']; ?> </div>
     <div class="clearfix"></div>
      </div>       
     
    <div class='col-sm-9'>   
    <div class="col-sm-5 blabel">Delivery Time : </div>
             <div class="col-sm-7"><?php 
    if($pdom['expected_special_delivery']==$pdom['expected_delivery']){
        echo $pdom['expected_special_delivery']." Days"; 
    }
    else{
        if($pdom['expected_special_delivery']>$pdom['expected_delivery']){
            echo $pdom['expected_delivery']." - ".$pdom['expected_special_delivery']." Days"; 
        }
        else{
            echo $pdom['expected_special_delivery']." - ".$pdom['expected_delivery']." Days"; 
        }
    }
    ?></div>
     <div class="clearfix"></div>
      </div>   
</div>
<?php } ?>
</div>    
</div>
<?php
}  
?>   
<div class="other-info">
<h4 class="sp_heading">Enquiry Info</h4>
<div class="col-sm-9">
<div class="col-sm-5 blabel">Industry : </div><div class="col-sm-7"><?php echo $ordernow["iname"]; ?></div> <div class="clearfix"></div>
<div class="col-sm-5 blabel">Domain : </div><div class="col-sm-7"><?php echo $ordernow["dname"]; ?></div><div class="clearfix"></div>
<div class="col-sm-5 blabel">Profile Type : </div><div class="col-sm-7"><?php echo $ordernow["ptype"]; ?></div><div class="clearfix"></div>
<div class="col-sm-5 blabel">Experience : </div><div class="col-sm-7"><?php echo $ordernow["exp_years"]."Years ".$ordernow["exp_mnths"]."Months "; ?></div><div class="clearfix"></div>
<div class="col-sm-5 blabel">Enquiry On : </div><div class="col-sm-7"><?php echo date("d M Y h:i A", strtotime($ordernow["created_on"])); ?></div><div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>               
<?php       
}
}
?> 
<div class="other-info">
<h4 class="sp_heading">Transaction Details</h4>
<div class="col-sm-9">
<div class="col-sm-5 blabel">Transaction No : </div><div class="col-sm-7"><?php echo $row_dom["txn_id"]; ?></div> <div class="clearfix"></div>
<div class="col-sm-5 blabel">Payment Status : </div><div class="col-sm-7"><?php echo $row_dom["payment_status"]; ?></div><div class="clearfix"></div>
<div class="col-sm-5 blabel">Amount : </div><div class="col-sm-7"><?php echo $row_dom["mc_currency"]." ".$row_dom["payment_gross"]; ?></div><div class="clearfix"></div>
<div class="col-sm-5 blabel">Resume Type : </div><div class="col-sm-7"><?php if($row_dom["rtype"]!="") {echo $row_dom["rtype"]; } else { echo "Not Applicable"; } ?></div><div class="clearfix"></div>
<div class="col-sm-5 blabel">Transaction On : </div><div class="col-sm-7"><?php echo date("d M Y h:i A", strtotime($row_dom["created_on"])); ?></div><div class="clearfix"></div>
</div>
<div class="clearfix"></div>
</div>  