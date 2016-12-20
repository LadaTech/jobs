<?php
ob_start();
$page = "chat";
include "header.php";
include 'js-session-check.php';
if(!isset($_GET["cwid"])){
$pa=$my_path."/job-seeker/dashboard.aspx";
header("Location: $pa");   
}
$cw=$db->query("select *,(select First_name from content_writer where Content_writer_id=$_GET[cwid]) as fname from chat_info where cwid=$_GET[cwid] and jid='$user_info[Job_Seeker_Id]'");
$cw1=$db->query("select First_name from content_writer where Content_writer_id=$_GET[cwid]");
if($cw1->rowCount()==1){
    $cwdata=$cw1->fetch(PDO::FETCH_ASSOC);
}
/*******Update Chat Box********/
$ucb=$db->query("update chat_info set jsread=1 where cwid=$_GET[cwid] and jid='$user_info[Job_Seeker_Id]'");
?>

<section class="inner_page_info">
<div class="gmap-area1">

<div class="container">
<div class="row profile">
<div class="col-sm-8">
<h3 class="main-heading">Chat Box</h3>
<?php
if(isset($_GET['msg']))
{
$msg=$_GET['msg'];
if($msg=='updated')
{
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>	<i class="icon fa fa-check"></i> Profile has been updated!</h4>

</div>
<?php   
}
}
?>
    
<div class="tabs-wrap profile_tabs_wrapper">
    <div class="chat_box">
        <h4 class="chat-with">Chat with <?php echo $cwdata["First_name"]; ?></h4>
        <div class="chat-history">        
       
 <?php
 if($cw->rowCount()>0){
while($chat=$cw->fetch(PDO::FETCH_ASSOC)){ ?>   
<div class="single-chat"> <div class="<?php if($chat["msg_from"]=='cw'){ ?>chat_to<?php } else{?>chat_from<?php }?> chat_div">
            <div class="pull-left letter"><?php echo substr(trim($chat["fname"]),0,1); ?></div>
            <div class="media-body">
                <h4><?php if($chat["msg_from"]=='cw'){ echo $chat["fname"]; } else{ 
                    echo $user_info["First_name"]; }?><span class="pull-right"><i class="fa fa-clock-o"></i> <?php echo $chat["created_on"]; ?></span></h4>
            <p><?php echo $chat["msg"]; ?></p>
            </div>
        </div> </div>      
 <?php } } ?>    
        </div>
      <form name="submenus" action="<?php echo $my_path; ?>/job-seeker/cw-<?php echo $_GET["cwid"]?>/start-chat.aspx" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data">    
        <div class="chat_form row no-margin">

    <input type="hidden" name="cwid" value="<?php echo $_GET["cwid"]?>" />
<div class="col-sm-11 no-padding">
<textarea name="chat" class="form-control" placeholder="Type Here" required></textarea>
</div>
<div class="col-sm-1 no-padding"><button name="submit" class="btn-chat" type="submit">Send</button></div>

            
        </div> 
</form>       
    </div>   
</div>
</div>
<div class="col-sm-4">

<?php require_once 'js_sidebar.php'; ?>      

</div>

</div>
</div>
</div>
</section>  <!--/gmap_area -->

<?php
include "footer.php";
?>
<script type="text/javascript" src="<?php echo $my_path; ?>/js/clone-form-td-multiple.js"></script>
<script type="text/javascript">
//  alert();
$(document).ready(function()
{
$("#Industry").on('change', function(){
$("#Domain").empty().append("<image src='images/spinner.gif' />");
var id=$(this).val();
//  alert("ff");
$.ajax({
type:"get",
url:"<?php echo $my_path; ?>/get_domains.php",
data:{"q":id},
success:function(data){
//  alert(data);
$("#Domain").empty().append(data);
}
});
});
});
</script>

<?php
ob_start();
if(isset($_POST['chat']))
{
$chat=ucwords($_POST['chat']);
$cwid=ucwords($_POST['cwid']);
$jid=$user_info['Job_Seeker_Id'];
$jsinsert=$db->query("insert into chat_info(jid,cwid,msg,msg_from) values('$jid','$cwid','$chat','js')");    
if($jsinsert)
{    
$pa=$my_path."/job-seeker/cw-$cwid/start-chat.aspx";
header("Location: $pa");
}
else {
$pa=$my_path."/job-seeker/dashboard.aspx";
header("Location: $pa");
}
}
ob_end_flush();
?>  