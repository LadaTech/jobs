<?php
ob_start();
$page = "enquiries";
include "header.php";
include 'js-session-check.php';
if(!isset($_GET["cwid"])){
$p_a=$my_path."/job-seeker/dashboard.aspx";
header("Location: $p_a");    
}
?>

<section class="inner_page_info">
<div class="gmap-area1">

<div class="container">
<div class="row profile">
<div class="col-sm-8">
<h3 class="main-heading">Send Enquiry</h3>
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

<form name="submenus" action="<?php echo $my_path; ?>/job-seeker/cw-<?php echo $_GET["cwid"]; ?>/send-enquiry.aspx" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data">     
    <input type="hidden" name="cwid" value="<?php echo $_GET["cwid"]; ?>" />
<div class="tabs-wrap profile_tabs_wrapper">

<div class="tab-content">

<div role="tabpanel" class=" active" id="personal_details">


<div class="form-group">
<div class="col-lg-6">
<label class="control-label" for="address">First Name </label>
<input type="text" name="First_name" id="" placeholder="First Name" value="<?php echo $user_info["First_name"]; ?>" class="form-control" readonly=""> 
</div>
<div class="col-lg-6">
<label class="control-label" for="address">Last Name</label>
<input type="text" name="Last_name" id="" placeholder="Last Name" value="<?php echo $user_info["Last_name"]; ?>" class="form-control" readonly=""> 
</div>    
<div class="clear"></div>
</div>  

<div class="form-group">
   <div class="col-lg-6">
<label class="control-label" for="address">Industry <span class="imp">*</span> </label>

<select class="form-control" id="Industry" name="Industry">
    <option value="">Select Industry</option>
    <?php
    $sql_dom = 'SELECT * FROM industry  order by name asc';
    $stmt_dom = $db->query($sql_dom);
//$stmt_dom->execute();

    if ($stmt_dom->rowCount() > 0) {
        while ($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)) {
            echo $row_dom['domain_name'];
            ?>

            <option  value="<?php echo $row_dom['id']; ?>" <?php if ($user_info["Industry"] == $row_dom['id']) {
        echo "selected";
    } ?>><?php echo $row_dom['name']; ?></option>
<?php
}
}
?>
</select>
</div>  
 
     <div class="col-lg-6">
<label class="control-label" for="address">Domain <span class="imp">*</span> </label>

<select class="form-control" id="Domain" name="Domain">
    <option value="">Select Domain</option>
    <?php
//    echo $user_info['Industry']."abc";
$sql_dom = "SELECT * FROM domains where iid='$user_info[Industry]'";
    $stmt_dom = $db->query($sql_dom);
//$stmt_dom->execute();

    if ($stmt_dom->rowCount() > 0) {
        while ($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)) {
         //   echo $row_dom['domain_name'];
            ?>

            <option  value="<?php echo $row_dom['id']; ?>" <?php if ($user_info["Domain"] == $row_dom['id']) {
        echo "selected";
    } ?>><?php echo $row_dom['name']; ?></option>
<?php
}
}
?>
</select>
</div>     
    
<div class="col-lg-6">
<label class="control-label" for="address">Profile Type <span class="imp">*</span> </label> <br/>

<div class="padding-10">  <input type="radio"  id="ptype" name="Experience_level" class="ptype" value="Fresher" required="" <?php if ($user_info["Experience_level"] == "Fresher") {
echo "checked";
} ?>> Fresher
    &nbsp;&nbsp;&nbsp;
    <input type="radio"  id="ptype" name="Experience_level" class="ptype" value="Experienced" required="" <?php if ($user_info["Experience_level"] == "Experienced") {
echo "checked";
} ?>> Experienced </div>

</div>
<?php 
 if ($user_info["Experience_level"] == "Fresher") {
     $fresher = '1';
 } else {
     $fresher = '0';
 }
?>
<div class="col-lg-6">
<label class="control-label" for="address">Experience <span class="imp">*</span> </label>
<div class="row">
<div class="col-xs-6">
<select class="form-control" id="exp_years" name="exp_yrs" required>
<option value="">Years</option>
<?php for($k=0;$k<50;$k++) { ?> 
    <option  <?php echo ($k == 0 && $fresher == 1) ? 'selected': '' ;?>  value="<?php echo $k; ?>" > <?php echo $k; ?> Years </option>
<?php } ?>
</select>
</div>
<div class="col-xs-6">
<select class="form-control" id="exp_months" name="exp_mnths" required>
<option value="">Months</option>
<?php for($k=0;$k<12;$k++) { ?> 
    <option  <?php echo ($k == 0 && $fresher == 1) ? 'selected': '' ;?> value="<?php echo $k; ?>" > <?php echo $k; ?> Months</option>
<?php } ?>
</select>
</div>
</div>
</div>    
<div class="clear"></div>
</div>   

</div>

<!--<div role="tabpanel" class="" id="skills">
<?php
$lang=$db->query("select * from  js_skills where job_seeker_id='$user_info[Job_Seeker_Id]'");
$lc=0;
if($lang->rowCount()==0){
?>
<div id="Skill1" class="clonedInput_4">
<h4 id="reference" name="reference" class="heading-reference">Skill #1</h4>
<div class="form-group">
<div class="col-lg-12">
<textarea  name="skills[]" id="skill1" placeholder="Skills" class="form-control form-style-small input_skill" ></textarea>
</div>    
<div class="clear"></div>
</div>  
</div>    
<?php
}
else{

//$tc=$lang->rowCount();
 while($rec_j = $lang->fetch(PDO::FETCH_ASSOC)){
$lc++;     
?>   
<div id="Skill<?php echo $lc; ?>" class="clonedInput_4">
<h4 id="reference" name="reference" class="heading-reference">Skill #<?php echo $lc; ?></h4>
<div class="form-group">
<div class="col-lg-12">
<textarea  name="skills[]" id="" placeholder="Skills" class="form-control form-style-small input_skill" ><?php echo $rec_j["js_skill_description"]; ?></textarea>
</div>    
<div class="clear"></div>
</div>  
</div>
 <?php
 }
}
 ?>
    
<div class="form-group">
<div class="col-sm-6">    
<button type="button" id="btnAdd_4" name="btnAdd_4" class="btn btn-info btn-full">add section</button>
</div><div class="col-sm-6">   
<button type="button" id="btnDel_4" name="btnDel_4" class="btn btn-danger  btn-full"  <?php if($lc==0 || $lc==1) { echo "disabled"; }?>>remove section above</button> </div>  <div class="clearfix"></div>
</div>  
<div class="form-group">
<div class="col-sm-4 col-sm-offset-4">
<input type="submit" name="submit" value="Submit"  class="btn btn-primary btn-full open2 continue"/>
</div> 
<div class="clearfix"></div>
</div>  
</div>  -->

<div class="form-group">
<div class="col-sm-4 col-sm-offset-4">
<input type="submit" name="submit" value="Submit"  class="btn btn-primary btn-full open2 continue"/>
</div>
</div>
</div>
</div>
</form>
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


$(".ptype").on("click", function(){
if($(this).val() == "Fresher"){
$("#exp_years").val(0);
$("#exp_months").val(0);
}
else{
$("#exp_years").val('');
$("#exp_months").val('');
}    
});
});
</script>

<?php
ob_start();
if(isset($_POST['submit']))
{
$Industry=$_POST["Industry"];
$Domain=$_POST["Domain"];
$exp_yrs=$_POST["exp_yrs"];
$exp_mnths=$_POST["exp_mnths"];
$cwid=$_POST["cwid"];
$Experience_level=$_POST['Experience_level'];

$jsinsert=$db->query("insert into enquiry_info(cwid,jid,iid,did,ptype,exp_years,exp_mnths,approve) value('$cwid','$user_info[Job_Seeker_Id]','$Industry','$Domain','$Experience_level','$exp_yrs','$exp_mnths','Pending')");    

if($jsinsert)
{    
$pa=$my_path."/job-seeker/enquiries-sent.aspx";
header("Location: $pa");
}
else {
$pa=$my_path."/job-seeker/dashboard.aspx";
header("Location: $pa");
}
}
ob_end_flush();
?>  