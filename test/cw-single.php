<div class="single-profile">
<div class="avatar1 col-sm-3 no-padding">
<div class="onoff-chat <?php if($experts['online']=="1"){ echo "isonline"; } else { ?>isoffline<?php } ?>"><span class="<?php if($experts['online']=="1"){ echo "isonline"; } else { ?>isoffline<?php } ?>"></span> <?php if($experts['online']=="1"){ echo "Online"; } else { ?>Offline<?php } ?></div>                     
<?php if($experts['profile_pic']!=0 && $experts['profile_pic']!="") {  ?><img src="<?php echo $my_path; ?>/images/cw/<?php echo $experts['profile_pic']; ?>" alt="" /><?php } else { ?> <img src="<?php echo $my_path; ?>/images/user.png" alt=""><?php } ?>                    
<?php //echo substr(trim($experts['First_name']),0,1); ?>
<div class="stars side-stars">
<input id="input-21e" value="4" type="number" class="rating read-only" min=0 max=5 step=1 data-size="xs" >    
</div>
</div>
<div class="info col-sm-9 no-padding">
<div class="title">
<?php echo $experts['First_name']." ".$experts['Last_name']; ?>
</div>
    <div class="desc"><span>Education  </span><i class="info"><?php echo $experts['Education']; ?></i></div>
    <div class="desc"><span>Experience  </span><i class="info"><?php echo $experts['exp_yrs']; ?> Years <?php echo $experts['exp_mnths']; ?> Months</i></div>
<?php
$sql_dom="SELECT *,(select name from industry where id=i.iid) as iname FROM cw_payment_info i where cwid=$experts[Content_writer_id]";
$stmt_dom = $db->query($sql_dom);
if ($stmt_dom->rowCount() == 1){
$pdom=$stmt_dom->fetch(PDO::FETCH_ASSOC);   
?>
<?php  if($pdom['iname']!="" &&  $pdom['special_fresher']!="" && $pdom['special_4_exp']!=""){ ?>
        <div class="special">
            <div class="desc"><span>Specific  Industry  </span><i class="info"><?php echo $pdom['iname']; ?></i></div>
            <div class="desc"><span>Specific  Price  </span><i class="info">$<?php echo $pdom['special_fresher']; ?> - $<?php echo $pdom['special_4_exp']; ?></i></div>
            </div>
<?php } ?>
    <div class="desc"><span>General Price  </span><i class="info"> $<?php echo $pdom['general_fresher']; ?> - $<?php echo $pdom['general_4_exp']; ?></i></div>
    <div class="desc"><span>Delivery Time  </span><?php 
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
<?php } ?>
</div>
        <div class="clearfix"></div>
<div class="buttons">
<?php
$sql_dom="SELECT * FROM enquiry_info i where jid='$user_info[Job_Seeker_Id]' and cwid=$experts[Content_writer_id] order by id desc";
$stmt_dom = $db->query($sql_dom);
if ($stmt_dom->rowCount() == 1){
$rdom=$stmt_dom->fetch(PDO::FETCH_ASSOC);   
if($rdom["approve"]=="Pending"){
?>
<div class="col-sm-8 col-sm-offset-2">
    <a href="<?php echo $my_path; ?>/job-seeker/cw-<?php echo $experts["Content_writer_id"]; ?>/send-enquiry.aspx" class="btn btn-primary open2 btn-full">
        <i class="fa fa-text-width" aria-hidden="true"></i> Send Enquiry
    </a>
</div>
<?php    
} else if($rdom["approve"]=="Approved"){
?>
<div class="col-sm-6"><a href="<?php echo $my_path; ?>/job-seeker/cw-<?php echo $experts["Content_writer_id"]; ?>/order-now.aspx" class="btn btn-primary open2 btn-full"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Order Now</a></div>   
<div class="col-sm-6"><a class="btn btn-primary open2 btn-full" href="<?php echo $my_path; ?>/job-seeker/cw-<?php echo $experts["Content_writer_id"]; ?>/start-chat.aspx"><i class="fa fa-edit" aria-hidden="true"></i> Chat Now</a></div>   

<?php
} else {
?>
<div class="col-sm-8 col-sm-offset-2">
    <a href="<?php echo $my_path; ?>/job-seeker/cw-<?php echo $experts["Content_writer_id"]; ?>/send-enquiry.aspx" class="btn btn-primary open2 btn-full">
        <i class="fa fa-text-width" aria-hidden="true"></i> Send Enquiry
    </a>
</div>
<?php    
}    
?>
 
<?php    
}
else{
?>
<div class="col-sm-8 col-sm-offset-2"> <a href="<?php echo $my_path; ?>/job-seeker/cw-<?php echo $experts["Content_writer_id"]; ?>/send-enquiry.aspx" class="btn btn-primary open2 btn-full"><i class="fa fa-text-width" aria-hidden="true"></i> Send Enquiry</a></div>
<?php  
}
?>

<div class="clear"></div>
</div>
            </div>