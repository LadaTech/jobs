
         <div class="widgets resume-teplates">
            <h3>Registered Job Seekers</h3>
 <div class="accordion cw-accordian">    
     <div class="panel-group" id="accordion1">            
<?php
  $js=$db->query("select *, (select name from  industry where id=i.Industry) iname, (select name from domains where id=i.Domain) dname from  job_seeker i order by online desc limit 0,20");
    $tc=1;
  if($js->rowCount()!=0) { 
      while($recjs=$js->fetch(PDO::FETCH_ASSOC)){
?>   
          <div class="panel panel-default">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne<?php echo $tc; ?>">
   <span class="<?php if($recjs['online']=="1"){ echo "isonline"; } else { ?>isoffline<?php } ?>"></span>                  
   <span class="smpic"><?php if($recjs['profile_pic']!=0 && $recjs['profile_pic']!="") {  ?><img src="<?php echo $my_path; ?>/images/jobseeker/<?php echo $recjs['profile_pic']; ?>" alt="" /><?php } else { ?> <img src="<?php echo $my_path; ?>/images/user.png" alt=""><?php } ?></span>
<?php echo $recjs['First_name']; ?>

</a>    
   <div id="collapseOne<?php echo $tc; ?>" class="panel-collapse collapse">  
        <?php include "js-single.php"; ?>
   </div>
     </div>
<?php 
$tc++;
          } 
  ?>
         </div>

                          
            </div> 
      <div class="buttons">
                    <div class="col-sm-10 col-sm-offset-1"> <a class="btn btn-primary open2 btn-full view-more" href="<?php echo $my_path; ?>/cw/job-seekers.aspx"><i class="fa fa-repeat" aria-hidden="true"></i> View More Job Seekers</a></div>     <div class="clear"></div>
                </div>      
    <?php        
      }?>   
         </div>
     
