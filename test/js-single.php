<div class="single-profile">
                <div class="avatar1 col-sm-3 no-padding">
<div class="onoff-chat <?php if($recjs['online']=="1"){ echo "isonline"; } else { ?>isoffline<?php } ?>"><span class="<?php if($recjs['online']=="1"){ echo "isonline"; } else { ?>isoffline<?php } ?>"></span> <?php if($recjs['online']=="1"){ echo "Online"; } else { ?>Offline<?php } ?></div>                         
<?php if($recjs['profile_pic']!=0 && $recjs['profile_pic']!="") {  ?><img src="<?php echo $my_path; ?>/images/jobseeker/<?php echo $recjs['profile_pic']; ?>" alt="" /><?php } else { ?> <img src="<?php echo $my_path; ?>/images/user.png" alt=""><?php } ?>    
                </div>
                 <div class="info col-sm-9 no-padding">
                    <div class="title">
                        <?php echo $recjs["First_name"]." ".$recjs["Last_name"]; ?>
                    </div>
                     <div class="desc"><span>Industry  </span><i class="info"><?php echo $recjs["iname"]; ?></i></div>
                     <div class="desc"><span>Domain  </span><i class="info"><?php echo $recjs["dname"]; ?></i></div>
                    <div class="desc"><span>Profile Type  </span><i class="info"><?php echo $recjs["Experience_level"]; ?></i></div>
                  
                </div>
                  <div class="buttons">
<?php
$sql_dom="SELECT * FROM invitations i where jid='$recjs[Job_Seeker_Id]' and cwid=$user_info[Content_writer_id] order by id desc";
$stmt_dom = $db->query($sql_dom);
if ($stmt_dom->rowCount() == 1){
$rdom=$stmt_dom->fetch(PDO::FETCH_ASSOC);   
if($rdom["approve"]=="Pending"){
?>
<div class="col-sm-8 col-sm-offset-2"><a class="btn btn-primary open2 btn-full" disabled><i class="fa fa-eye" aria-hidden="true"></i> Invitation Pending</a></div>      <?php    
}
else
if($rdom["approve"]=="Approved"){
?>
<div class="col-sm-6 col-sm-offset-3"><a class="btn btn-primary open2 btn-full" href="<?php echo $my_path; ?>/cw/js-<?php echo $recjs["Job_Seeker_Id"]; ?>/start-chat.aspx"><i class="fa fa-edit" aria-hidden="true"></i> Chat Now</a></div>   
<?php
}
else{
?>
<div class="col-sm-8 col-sm-offset-2"><a class="btn btn-primary open2 btn-full" disabled><i class="fa fa-eye" aria-hidden="true"></i> Invitation Canceled</a></div>      <?php    
}    
?>
 
<?php    
}
else{
?>
<div class="col-sm-8 col-sm-offset-2"> <a href="<?php echo $my_path; ?>/cw/js-<?php echo $recjs["Job_Seeker_Id"]; ?>/send-invitation.aspx" class="btn btn-primary open2 btn-full"><i class="fa fa-repeat" aria-hidden="true"></i> Send Invitation</a></div>
<?php  
}
?><div class="clearfix"></div>
                </div>
            </div>