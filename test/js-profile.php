<?php
ob_start();
$page = "";
include "header.php";
include 'js-session-check.php';

//Remove profile picture 
if(isset($_GET['r']) && $_GET['r'] == 's' ){
    $uploaded_dir = "images/jobseeker/";
    $profPic = $user_info['profile_pic'];
    $fullPath = $uploaded_dir.$profPic;
    unlink($fullPath);
    $removeProfPic = $db->query("update job_seeker set profile_pic='' where Job_Seeker_Id=$user_info[Job_Seeker_Id]");    
    if($removeProfPic){
        $errorMsg = "Profile picture removed successfully";
        $msg->error($errorMsg);
        $pa=$my_path."/job-seeker/t-0/profile-updated.aspx";
        $pa=$my_path."/js-profile.php?tab=0";
        header("Location: $pa");
    } else {
        $errorMsg = "Profile picture not removed ";
        $msg->error($errorMsg);
        $pa=$my_path."/job-seeker/edit-profile.aspx";
        header("Location: $pa");
    }
}

if(isset($_POST['submit']))
{
$fname=ucwords($_POST['First_name']);
$lname=ucwords($_POST['Last_name']);
$Industry=$_POST["Industry"];
$Alternate_email=$_POST["Alternate_email"];
$Alternate_Phone_no=$_POST["Alternate_Phone_no"];
$Father_Name=$_POST["Father_Name"];
$Domain=$_POST["Domain"];
$Phone_No=$_POST["Phone_No"];
$Address=$_POST["Address"];
$Objective=$_POST["Objective"];
$old_img1=$_POST['old_img1'];
//exit();
$tab_place=$_POST["tab_place"];
$uploaded_dir = "images/jobseeker/";
$filename = $_FILES["image1"]["name"];
$filename=rand(100,999)."_".$filename;
$path = $uploaded_dir.$filename;
$imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
if($imageFileType != '' && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"  ) {
    $errorMsg = "Sorry, only JPG, JPEG, PNG  files are allowed";
    $msg->error($errorMsg);
    $pa=$my_path."/job-seeker/edit-profile.aspx";
    header("Location: $pa");
    exit;
} else {
    if (move_uploaded_file($_FILES["image1"]["tmp_name"], $path))
    {
    unlink($uploaded_dir.$old_img1);    
    $image1=$filename;
    }
    else {
    $image1=$old_img1;  
    }
}
$Experience_level=$_POST['Experience_level'];
$jsinsert=$db->query("update job_seeker set 
First_name='$fname',Last_name='$lname',Phone_No='$Phone_No',Industry='$Industry',Domain='$Domain',Experience_level='$Experience_level',Alternate_email='$Alternate_email',Alternate_Phone_no='$Alternate_Phone_no',Father_Name='$Father_Name',Address='$Address',Objective='$Objective',profile_pic='$image1' where Job_Seeker_Id=$user_info[Job_Seeker_Id]");    

/**********Skills************/
$db->query("delete from  js_skills where job_seeker_id=$user_info[Job_Seeker_Id]");
$language_name=$_POST["language_name"];
$skills=$_POST["skills"];
$llc=0;
    while(list($key1,$val1)= each($skills))
    {
$skill_title=$_POST["skill_title"][$llc];  
if($val1!="" && $skill_title!=""){
$rs=$db->query("insert into js_skills(js_skill_description,job_seeker_id,skill_title) values('$val1','$user_info[Job_Seeker_Id]','$skill_title')") or die(mysql_error());
        }
        $llc++;
    }
/***********Skills*************/

/***********languages*****************/
$db->query("delete from js_languages where Job_Seeker_Id=$user_info[Job_Seeker_Id]");
$language_name=$_POST["language_name"];
if(is_array($language_name))
{
    $llc=0;
    while(list($key1,$val1)= each($language_name))
    {

if($val1!=""){
try{            
    echo "";
    echo "<br/>";
echo $profficiency_level=$_POST["profficiency_level"][$llc];
echo $lang_read=$_POST["lang_read"][$llc];
echo $writes=$_POST["writes"][$llc];
echo $speaks=$_POST["speaks"][$llc];
//exit();
$rs=$db->query("insert into js_languages(language_name,profficiency_level,lang_read,writes,speaks,job_seeker_id) values('$val1','$profficiency_level','$lang_read','$writes','$speaks','$user_info[Job_Seeker_Id]')") or die(mysql_error());
}
catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}

        }
        $llc++;
    }
}
/***********languages*****************/


/*********************Education Starts*************************/
$db->query("delete from  js_educational_information where job_seeker_id=$user_info[Job_Seeker_Id]");
$js_qualification_name=$_POST["js_qualification_name"];
if(is_array($js_qualification_name))
{
    $llc=0;
    while(list($key1,$val1)= each($js_qualification_name))
    {
if($val1!=""){
try{   
     echo "<br/>";
   // print_r($_POST['js_course']);
   // echo $_POST['js_course'][$llc];
    echo "<br/>";
echo $js_course=$_POST["js_course"][$llc];
echo $js_institution_name=$_POST["js_institution_name"][$llc];
echo $js_percentage=$_POST["js_percentage"][$llc];
echo $js_start_date=$_POST["js_start_date"][$llc];
echo $js_end_date=$_POST["js_end_date"][$llc];
$ed_description=$_POST["ed_description"][$llc];
//exit();
$rs=$db->query("insert into js_educational_information(js_qualification_name,js_course,js_institution_name,js_percentage,js_start_date,js_end_date,job_seeker_id,ed_description) values('$val1','$js_course','$js_institution_name','$js_percentage','$js_start_date','$js_end_date','$user_info[Job_Seeker_Id]','$ed_description')") or die(mysql_error());
}
catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}

        }
     $llc++;
    }
}


/*********************Education Ends*************************/



/********************* js_work_experience Starts*************************/
$db->query("delete from   js_work_experience where job_seeker_id=$user_info[Job_Seeker_Id]");
$Company_Name=$_POST["Company_Name"];
if(is_array($Company_Name))
{
    $llc=0;
    while(list($key1,$val1)= each($Company_Name))
    {

if($val1!=""){
try{            
    echo "";
    echo "<br/>";
echo $Current_CTC=$_POST["Current_CTC"][$llc];
echo $Designation=$_POST["Designation"][$llc];
echo $Expected_CTC=$_POST["Expected_CTC"][$llc];
echo $Start_date=$_POST["Start_date"][$llc];
echo $End_date=$_POST["End_date"][$llc];
$exp_description=$_POST["exp_description"][$llc];
//exit();
$rs=$db->query("insert into  js_work_experience(Company_Name,Current_CTC,Designation,Expected_CTC,Start_date,End_date,job_seeker_id,exp_description) values('$val1','$Current_CTC','$Designation','$Expected_CTC','$Start_date','$End_date','$user_info[Job_Seeker_Id]','$exp_description')") or die(mysql_error());
}
catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}

        }
    $llc++;    
    }
}


/********************* js_work_experience Ends*************************/


if($jsinsert)
{    
$pa=$my_path."/job-seeker/t-".trim($tab_place)."/profile-updated.aspx";
header("Location: $pa");
}
else {
$pa=$my_path."/job-seeker/edit-profile.aspx";
header("Location: $pa");
}
}
ob_end_flush();
?>

<section class="inner_page_info">
<div class="gmap-area1">

<div class="container">
<div class="row profile">
<div class="col-sm-8">
<h3 class="main-heading">Complete Your Profile</h3>
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

<form name="submenus" action="<?php echo $my_path; ?>/job-seeker/edit-profile.aspx" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data">     
<input type="hidden" name="old_img1" id="pid_v" value="<?php echo $user_info['profile_pic']; ?>" />
   <input type="hidden" name="tab_place" class="tab_place" value="<?php if(isset($_GET["tab"])){
   if($_GET["tab"]=='4') { echo "4"; } else { echo ($_GET["tab"]); } } else { ?>0 <?php } ?>" />
<div class="tabs-wrap profile_tabs_wrapper">
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="tab0 active">
<a href="#personal_details" aria-controls="personal_details" data-tab="0" role="tab" data-toggle="tab" aria-expanded="true">Personal Details</a>
</li>
<li class="tab1">
<a href="#educational_details" aria-controls="educational_details" data-tab="1" role="tab" data-toggle="tab" aria-expanded="false">Educational Details</a>
</li>
<li class="tab2">
<a href="#experience" aria-controls="experience" role="tab" data-tab="2" data-toggle="tab" aria-expanded="false">Experience Details</a>
</li>
<li class="tab3">
<a href="#skills" aria-controls="skills" role="tab" data-tab="3" data-toggle="tab" aria-expanded="false">Skills</a>
</li>
<li class="tab4">
<a href="#objective" aria-controls="objective" role="tab" data-tab="4" data-toggle="tab" aria-expanded="false">Objective</a>
</li>

</ul>

<div class="tab-content">

<div role="tabpanel" class="tab-pane tab0 active" id="personal_details">


<div class="form-group">
<div class="col-lg-6">
<label class="control-label" for="address">First Name </label>
<input type="text" name="First_name" id="" placeholder="First Name" value="<?php echo $user_info["First_name"]; ?>" class="form-control" required="required" readonly> 
</div>
<div class="col-lg-6">
<label class="control-label" for="address">Last Name </label>
<input type="text" name="Last_name" id="" placeholder="Last Name" value="<?php echo $user_info["Last_name"]; ?>" class="form-control" required="required" readonly> 
</div>    
<div class="clear"></div>
</div>  
<div class="form-group email_weapper">
<div class="col-lg-6">
<label class="control-label" for="address">Email <span class="imp">*</span> </label>
<input type="email" name="email" id="email_a" placeholder="Email" value="<?php echo $user_info["Email_id"]; ?>" class="form-control" required="required" autocomplete="off" readonly>
<p class="progress_bar"><span class="m_error mail_check"><input type="hidden" name="cf" id="email_check" value="2"></span>
</p>
<span class="email-block imp" style="display: none;">Please enter a the Valid Email.</span>      

</div>
<div class="col-lg-6">
<label class="control-label" for="address">Alternate Email </label>
<input type="email" name="Alternate_email" id="Alternate_email" placeholder="Alternate_email" value="<?php echo $user_info["Alternate_email"]; ?>" class="form-control"  autocomplete="off">
</div>    
<div class="clear"></div>
</div>  


<div class="form-group">
<div class="col-lg-6">
<label class="control-label" for="address">Contact Number <span class="imp">*</span> </label>

<input type="text" name="Phone_No" id="popupDatepicker" placeholder="Contact Number" value="<?php echo $user_info["Phone_No"]; ?>" class="form-control form-style-small" required="required" autocomplete="off">
</div>    

<div class="col-lg-6">
<label class="control-label" for="address">Alternate Contact Number </label>

<input type="text" name="Alternate_Phone_no" id="popupDatepicker" placeholder="Alternate Contact Number" value="<?php echo $user_info["Alternate_Phone_no"]; ?>" class="form-control form-style-small"  autocomplete="off">
</div>    
<div class="clear"></div>
</div>  

<div class="form-group">
<div class="col-lg-6">
<label class="control-label" for="address">Profile Type <span class="imp">*</span> </label> <br/>

<div class="padding-10">  <input type="radio"  id="ptype" name="Experience_level" class="" value="Fresher" required="" <?php if ($user_info["Experience_level"] == "Fresher") {
echo "checked";
} ?>> Fresher
    &nbsp;&nbsp;&nbsp;
    <input type="radio"  id="ptype" name="Experience_level" class="" value="Experienced" required="" <?php if ($user_info["Experience_level"] == "Experienced") {
echo "checked";
} ?>> Experienced </div>

</div>
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
<label class="control-label" for="address">Father Name </label>

<input type="text" name="Father_Name" id="popupDatepicker" placeholder="Father Name" value="<?php echo $user_info["Father_Name"]; ?>" class="form-control form-style-small"  autocomplete="off">
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
<div class="clear"></div>
</div>  


<div class="form-group">
   

<div class="col-lg-6">
<label class="control-label" for="address">Address </label>
<textarea class="form-control vertical" id="textArea" placeholder="Address" rows="1" name="Address"><?php echo $user_info["Address"]; ?></textarea>

<!--<label for="inputPassword3" class="control-label">Profile Pic</label>-->


</div>   
<div class="col-lg-4 dp">
    <?php if($user_info['profile_pic']!=0 && $user_info['profile_pic']!="") { ?>
        <img src="<?php echo $my_path; ?>/images/jobseeker/<?php echo $user_info['profile_pic']; ?>" height="130px">
    <?php } else { ?>
        <img src="<?php echo $my_path; ?>/images/user.png" height="130px"> 
    <?php } ?>
    <input type="file" name="image1" id=""  class="form-control1" />

    <?php if(isset($user_info['profile_pic']) && $user_info['profile_pic'] != '' ) { ?>
        <a href="/js-profile.php?r=s">Remove</a>
    <?php } ?>
</div>
<div class="clear"></div>
</div>   

<?php
$lc=0;
$lang=$db->query("select * from js_languages where job_seeker_id='$user_info[Job_Seeker_Id]'");
if($lang->rowCount()==0){
?>
  
 <div  class="clonedInput_3 clone-lang-div">   
     <fieldset>  
<h4 id="reference" name="reference" class="heading-reference">Language #1</h4>
<!-- Select Basic -->
<div class="form-group">
    <div class="col-sm-4">   
        <label class="control-label">Language Name</label>
        <input type="text" name="language_name[]" placeholder="Language Name" data-error="This field is required" value=""  class="form-control input_lang">
    </div>
    <div class="col-sm-4">   
        <label class="control-label">Proficiency Level</label>
        <select data-error="This field is required"  name="profficiency_level[]" class="form-control select_prof">
<option value="">Select</option>
<option value="Beginner">Beginner</option>
<option value="Intermediate">Intermediate</option>
<option value="Expert">Expert</option>
<option value="Professional">Professional</option>
        </select>
    </div>

<div class="col-sm-4"> 
<label class="control-label">Language Skills</label><br/>
<label>
    <input type="checkbox" name="lang_read[]" value="0" class="radio_read_hidden" checked/>
<input type="checkbox" name="lang_read[]" value="1" class="radio_read"> Read </label> &nbsp;

<label>
    <input type="checkbox" name="speaks[]" value="0" class="radio_speaks_hidden" checked/>  
<input type="checkbox" name="speaks[]" value="1" class="radio_speaks"> Speak </label> &nbsp;
<label>
    <input type="checkbox" name="writes[]" value="0" class="radio_writes_hidden" checked/>  
<input type="checkbox" name="writes[]" value="1" class="radio_writes"> Write </label> &nbsp;
</div>
        <button type="button" name="btnDel_4" class="btn btn-danger btn-lang-del pull-right" ><i class='fa fa-trash-o'></i></button> 
    <div class="clearfix"></div>
</div> 
</fieldset>
</div><!-- end #entry1 -->

<?php
}
else{

//$tc=$lang->rowCount();
 while($rec_j = $lang->fetch(PDO::FETCH_ASSOC)){
$lc++;     
?>   
 
 <div  class="clonedInput_3 clone-lang-div"> 
     <fieldset>   
     <h4 id="reference" name="reference" class="heading-reference">Language #<?php echo $lc; ?> <span class="delete_section"></span></h4>
<!-- Select Basic -->
<div class="form-group">
    <div class="col-sm-4">   
        <label class="control-label">Language Name</label>
        <input type="text" name="language_name[]" placeholder="Language Name" data-error="This field is required" value="<?php echo $rec_j["language_name"]; ?>" required="" class="form-control input_lang">
    </div>
    <div class="col-sm-4">   
        <label class="control-label">Proficiency Level</label>
        <select data-error="This field is required" name="profficiency_level[]" class="form-control select_prof">
            <option value="">Select</option>
<option value="Beginner"  <?php if($rec_j["profficiency_level"]=="Beginner"){ echo "selected";}?>>Beginner</option>
<option value="Intermediate" <?php if($rec_j["profficiency_level"]=="Intermediate"){ echo "selected";}?>>Intermediate</option>
<option value="Expert" <?php if($rec_j["profficiency_level"]=="Expert"){ echo "selected";}?>>Expert</option>
<option value="Professional" <?php if($rec_j["profficiency_level"]=="Professional"){ echo "selected";}?>>Professional</option>
        </select>
    </div>

<div class="col-sm-4"> 
<label class="control-label">Language Skills</label><br/>
<label>
   <input type="checkbox" name="lang_read[]" value="0" class="radio_read_hidden" <?php if($rec_j["lang_read"]=="0"){ echo "checked";}?>/>
     
<input type="checkbox" name="lang_read[]" value="1" class="radio_read" <?php if($rec_j["lang_read"]=="1"){ echo "checked";}?>> Read </label> &nbsp;
<label>
     <input type="checkbox" name="speaks[]" value="0" class="radio_speaks_hidden" <?php if($rec_j["speaks"]=="0"){ echo "checked";}?>/> 
<input type="checkbox" name="speaks[]" value="1"  class="radio_speaks" <?php if($rec_j["speaks"]=="1"){ echo "checked";}?>> Speak </label> &nbsp;
<label>
    <input type="checkbox" name="writes[]" value="0" class="radio_writes_hidden" <?php if($rec_j["writes"]=="0"){ echo "checked";}?>/>  
<input type="checkbox" name="writes[]" value="1"  class="radio_writes" <?php if($rec_j["writes"]=="1"){ echo "checked";}?>> Write </label> &nbsp;
</div>
    <button type="button" name="btnDel_4" class="btn btn-danger btn-lang-del pull-right" ><i class='fa fa-trash-o'></i></button>  
    <div class="clearfix"></div>
</div>   
   </fieldset>
 </div>   
 
<?php 
}
}
?>

    <div class="cloning-lang-data">
        
        
    </div>   
<div class="form-group">
<div class="col-sm-3  col-sm-offset-9 btn45">    
    <button type="button" id="add-lang" name="btnAdd_4" class="btn btn-info"><i class='fa fa-plus'></i> Add Section</button>
</div>  <div class="clearfix"></div>
</div>
<div class="clearfix"></div>            


<div class="form-group">
<div class="col-sm-3 col-sm-offset-4">

<input type="submit" name="submit" data-tab="0" value="Save and Continue" class="btn btn-primary btn-full open2">
</div>
</div>     


</div>

<div role="tabpanel" class="tab-pane tab1" id="educational_details">

<?php
$lc=0;
$lang=$db->query("select * from js_educational_information where job_seeker_id='$user_info[Job_Seeker_Id]'");
if($lang->rowCount()==0){
?>
<div  class="clonedInput_2  clone-edu-div">
<h4 id="reference" name="reference" class="heading-reference">Education #1</h4>
<fieldset>
<!-- Select Basic -->
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Choose Education</label>
    <select class="form-control sel_qualification" name="js_qualification_name[]" value="">
        <option value="">Select</option>
         <option value="Ph.D" <?php ?>>Ph.D</option>
        <option value="Post Graduation">Post Graduation</option>
        <option value="Graduation">Graduation</option>
        <option value="Diploma">Diploma</option>
        <option value="Intermediate">Intermediate</option>
        <option value="SSC">SSC</option>
    </select>
</div>
<div class="col-sm-6">   
    <label class="control-label">Course</label>
    <input type="text" data-error="This field is First Name " name="js_course[]" class="form-control js_course" value="">
</div>
<div class="clearfix"></div>
</div>
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Institute Name  </label>
    <input type="text" data-error="This field is First Name "  name="js_institution_name[]" class="form-control js_institution_name" value="">
</div>
<div class="col-sm-6">   
    <label class="control-label">% or CGPA </label>
    <input type="text" name="js_percentage[]" class="form-control js_percentage" value="">
</div>
<div class="clearfix"></div>
</div>

<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Start date  </label>
    <input type="date" data-error="Start date" name="js_start_date[]" class="form-control js_start_date" value="00-00-0000">
</div>
<div class="col-sm-6">   
    <label class="control-label">End date</label>
    <input type="date" data-error="End date " name="js_end_date[]" class="form-control js_end_date" value="00-00-0000">
</div>
    
<div class="col-sm-12">   
    <label class="control-label">Description</label>
    <textarea name="ed_description[]" id="" placeholder="Description" class="form-control form-style-small input_skill"></textarea>
</div> 
    
 <button type="button" name="btnDel_4" class="btn btn-danger btn-edu-del pull-right" ><i class='fa fa-trash-o'></i></button>     
<div class="clearfix"></div>
</div>        
</div><!-- end #entry1 -->
<?php
}
else{

//$tc=$lang->rowCount();
 while($rec_j = $lang->fetch(PDO::FETCH_ASSOC)){
$lc++;     
?>   
<div  class="clonedInput_2 clone-edu-div">
<h4 id="reference" name="reference" class="heading-reference">Education #<?php echo $lc; ?></h4>
<fieldset>
<!-- Select Basic -->
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Choose Education</label>
    <select class="form-control sel_qualification" name="js_qualification_name[]" value="">
        <option value="">Select</option>
       
        
        <option value="Ph.D" <?php if($rec_j["js_qualification_name"]=="Ph.D"){ echo "selected";}?>>Ph.D</option>
        <option value="Post Graduation" <?php if($rec_j["js_qualification_name"]=="Post Graduation"){ echo "selected";}?>>Post Graduation</option>
        <option value="Graduation" <?php if($rec_j["js_qualification_name"]=="Graduation"){ echo "selected";}?>>Graduation</option>
        <option value="Diploma" <?php if($rec_j["js_qualification_name"]=="Diploma"){ echo "selected";}?>>Diploma</option>
        <option value="Intermediate" <?php if($rec_j["js_qualification_name"]=="Intermediate"){ echo "selected";}?>>Intermediate</option>
        <option value="SSC" <?php if($rec_j["js_qualification_name"]=="SSC"){ echo "selected";}?>>SSC</option>
    </select>
</div>
<div class="col-sm-6">   
    <label class="control-label">Course</label>
    <input type="text" data-error="This field is First Name " name="js_course[]" class="form-control js_course" value="<?php echo $rec_j["js_course"]; ?>">
</div>
<div class="clearfix"></div>
</div>
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Institute Name  </label>
    <input type="text" data-error="This field is First Name "  name="js_institution_name[]" class="form-control js_institution_name" value="<?php echo $rec_j["js_institution_name"]; ?>">
</div>
<div class="col-sm-6">   
    <label class="control-label">% or CGPA </label>
    <input type="text" name="js_percentage[]" class="form-control js_percentage" value="<?php echo $rec_j["js_percentage"]; ?>">
</div>
<div class="clearfix"></div>
</div>

<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Start date  </label>
    <input type="date" data-error="Start date" name="js_start_date[]" class="form-control js_start_date" value="<?php echo $rec_j["js_start_date"]; ?>">
</div>
<div class="col-sm-6">   
    <label class="control-label">End date</label>
    <input type="date" data-error="End date " name="js_end_date[]" class="form-control js_end_date" value="<?php echo $rec_j["js_end_date"]; ?>">
</div>
    
<div class="col-sm-12">   
    <label class="control-label">Description</label>
    <textarea name="ed_description[]" id="" placeholder="Description" class="form-control form-style-small input_skill"><?php echo $rec_j["ed_description"]; ?></textarea>
</div>    
    
    <button type="button" name="btnDel_4" class="btn btn-danger btn-edu-del pull-right" ><i class='fa fa-trash-o'></i></button> 
<div class="clearfix"></div>
</div>        
</div><!-- end #entry1 -->
<?php 
}
}
?>

<div class="cloning-edu-data">
        
        
</div>

<div class="form-group">
<div class="col-sm-3  col-sm-offset-9 btn45">   
    <button type="button" id="add-edu" name="btnAdd_4" class="btn btn-info"><i class='fa fa-plus'></i> Add Section</button>
</div>  <div class="clearfix"></div>
</div>
<div class="clearfix"></div>     


<div class="form-group">

<div class="col-sm-3 col-sm-offset-4">
<input type="button" name="submit" value="Back"  class="btn btn-primary btn-full open2 back"/>
</div>
<div class="col-sm-3 col-sm-offset-0">
<input type="submit" name="submit" value="Save and Continue" class="btn btn-primary btn-full open2">
</div>    
<div class="clearfix"></div>
</div>   
</div>

<div role="tabpanel" class="tab-pane tab2" id="experience">
<?php
$lc=0;
$lang=$db->query("select * from js_work_experience where Job_Seeker_Id='$user_info[Job_Seeker_Id]'");
if($lang->rowCount()==0){
?>
<div class="clonedInput_1 clone-exp-div">
<h4 id="reference" name="reference" class="heading-reference">Company #1</h4>
<fieldset>
<!-- Select Basic -->
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Company Name</label>
    <input type="text" data-error="Company Name" name="Company_Name[]" class="form-control Company_Name" value="">
</div>
<div class="col-sm-6">   
    <label class="control-label">Current CTC</label>
    <input type="text" data-error="Current CTC" name="Current_CTC[]" class="form-control Current_CTC" value="">
</div>
<div class="clearfix"></div>
</div>
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Designation </label>
    <input type="text" data-error="Designation " name="Designation[]" class="form-control Designation" value="">
</div>
<div class="col-sm-6">   
    <label class="control-label">Expected  CTC</label>
    <input type="text" data-error="Expected  CTC" name="Expected_CTC[]" class="form-control Expected_CTC" value="">
</div>
<div class="clearfix"></div>
</div>

<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Start date  </label>
    <input type="date" data-error="Start date" name="Start_date[]" class="form-control Start_date" value="00-00-0000">
</div>
<div class="col-sm-6">   
    <label class="control-label">End date</label>
    <input type="date" data-error="End date " name="End_date[]" class="form-control End_date" value="00-00-0000">
</div>
<div class="col-sm-12">   
    <label class="control-label">Description</label>
    <textarea name="exp_description[]" id="" placeholder="Description" class="form-control form-style-small input_skill"></textarea>
</div>      
    <button type="button" name="btnDel_4" class="btn btn-danger btn-exp-del pull-right" ><i class='fa fa-trash-o'></i></button>     
<div class="clearfix"></div>
</div>        
</div><!-- end #entry1 -->
<?php
}
else{
//$tc=$lang->rowCount();
 while($rec_j = $lang->fetch(PDO::FETCH_ASSOC)){
$lc++;     
?>   

<div class="clonedInput_1 clone-exp-div">
<h4 id="reference" name="reference" class="heading-reference">Company #<?php echo $lc; ?></h4>
<fieldset>
<!-- Select Basic -->
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Company Name</label>
    <input type="text" data-error="Company Name" name="Company_Name[]" class="form-control Company_Name" value="<?php echo $rec_j["Company_Name"]; ?>">
</div>
<div class="col-sm-6">   
    <label class="control-label">Current CTC</label>
    <input type="text" data-error="Current CTC" name="Current_CTC[]" class="form-control Current_CTC" value="<?php echo $rec_j["Current_CTC"]; ?>">
</div>
<div class="clearfix"></div>
</div>
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Designation </label>
    <input type="text" data-error="Designation " name="Designation[]" class="form-control Designation" value="<?php echo $rec_j["Designation"]; ?>">
</div>
<div class="col-sm-6">   
    <label class="control-label">Expected  CTC</label>
    <input type="text" data-error="Expected  CTC" name="Expected_CTC[]" class="form-control Expected_CTC" value="<?php echo $rec_j["Expected_CTC"]; ?>">
</div>
<div class="clearfix"></div>
</div>

<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Start date  </label>
    <input type="date" data-error="Start date" name="Start_date[]" class="form-control Start_date" value="<?php echo $rec_j["Start_date"]; ?>">
</div>
<div class="col-sm-6">   
    <label class="control-label">End date</label>
    <input type="date" data-error="End date " name="End_date[]" class="form-control End_date" value="<?php echo $rec_j["End_date"]; ?>">
</div>
    <div class="col-sm-12">   
    <label class="control-label">Description</label>
    <textarea name="exp_description[]" id="" placeholder="Description" class="form-control form-style-small input_skill"><?php echo $rec_j["exp_description"]; ?></textarea>
</div>  
    <button type="button" name="btnDel_4" class="btn btn-danger btn-exp-del pull-right" ><i class='fa fa-trash-o'></i></button>   
<div class="clearfix"></div>
</div>        
</div><!-- end #entry1 -->

<?php 
}
}
?>
<div class="cloning-exp-data">
        
        
</div>
<div class="form-group">
<div class="col-sm-3  col-sm-offset-9 btn45">   
    <button type="button" id="add-exp" name="btnAdd_4" class="btn btn-info"><i class='fa fa-plus'></i> Add Section</button>
</div>  <div class="clearfix"></div>
</div>

<div class="clearfix"></div>

<div class="form-group">

<div class="col-sm-3 col-sm-offset-4">
<input type="button" name="submit" value="Back"  class="btn btn-primary btn-full open2 back"/>
</div>
<div class="col-sm-3 col-sm-offset-0">
<input type="submit" name="submit" value="Save and Continue" class="btn btn-primary btn-full open2">
</div>    
<div class="clearfix"></div>
</div> 
</div>
<div role="tabpanel" class="tab-pane tab3" id="skills">
<?php
$lang=$db->query("select * from js_skills where job_seeker_id='$user_info[Job_Seeker_Id]'");
$lc=0;
if($lang->rowCount()==0){
?>
<div  class="clonedInput_4 clone-skill-div">
<h4 id="reference" name="reference" class="heading-reference">Skill</h4>
<div class="form-group">
    <div class="col-lg-12">
     <label class="control-label">Skill Title</label>
       <input type="text"  name="skill_title[]" class="form-control" value="">
    </div>
<div class="col-lg-12">
     <label class="control-label">Description</label>
<textarea  name="skills[]" id="" placeholder="Skills" class="form-control form-style-small input_skill" ></textarea>
</div>    
<button type="button" name="btnDel_4" class="btn btn-danger btn-del pull-right" ><i class='fa fa-trash-o'></i></button>       
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
<div class="clonedInput_4 clone-skill-div">
<h4 id="reference" name="reference" class="heading-reference">Skill</h4>
<fieldset>
<div class="form-group">
    <div class="col-lg-12">
     <label class="control-label">Skill Title</label>
       <input type="text"  name="skill_title[]" class="form-control" value="<?php echo $rec_j["skill_title"]; ?>">
    </div>
<div class="col-lg-12">
     <label class="control-label">Description</label>
<textarea  name="skills[]" id="" placeholder="Skills" class="form-control form-style-small input_skill" ><?php echo $rec_j["js_skill_description"]; ?></textarea>
</div>    
<button type="button" name="btnDel_4" class="btn btn-danger btn-del pull-right" ><i class='fa fa-trash-o'></i></button>       
<div class="clear"></div>
</div> 
</fieldset>
</div>
 <?php
 }
}
 ?>
<div class="cloning-data">
        
        
</div>     
<div class="form-group">
<div class="col-sm-3  col-sm-offset-9 btn45">    
    <button type="button" id="add-skill" name="btnAdd_4" class="btn btn-info"><i class='fa fa-plus'></i> Add Section</button>
</div>  <div class="clearfix"></div>
</div>
    
    
<div class="form-group">

<div class="col-sm-3 col-sm-offset-4">
<input type="button" name="submit" value="Back"  class="btn btn-primary btn-full open2 back"/>
</div>
<div class="col-sm-3 col-sm-offset-0">
<input type="submit" name="submit" value="Save and Continue" class="btn btn-primary btn-full open2">
</div>    
<div class="clearfix"></div>
</div>   
</div>  

<div role="tabpanel" class="tab-pane tab4" id="objective">
<div class="form-group">
<div class="col-lg-12">
<label class="control-label" for="address">Objective  </label>

<textarea  name="Objective" id="" placeholder="Objective" class="form-control form-style-small" ><?php echo $user_info["Objective"]; ?></textarea>
</div>       
<div class="clear"></div>
</div>  
<div class="form-group">

<div class="col-sm-3 col-sm-offset-4">
<input type="button" name="submit" value="Back"  class="btn btn-primary btn-full open2 back"/>
</div>
<div class="col-sm-3 col-sm-offset-0">
<input type="submit" name="submit" value="Save" class="btn btn-primary btn-full open2">
</div>    
<div class="clearfix"></div>
</div> 
</div>  

</div></div>
</form>





</div>
<div class="col-sm-4">

<?php require_once 'js_sidebar.php'; ?>      

</div>

</div>
</div>
</div>
</section>  <!--/gmap_area -->





<div  class="cloned-skill hide">
<h4 id="reference" name="reference" class="heading-reference">Skill</h4>
<fieldset>
<div class="form-group">
    <div class="col-lg-12">
     <label class="control-label">Skill Title</label>
       <input type="text"  name="skill_title[]" class="form-control" value="">
    </div>
<div class="col-lg-12">
     <label class="control-label">Description</label>
<textarea  name="skills[]" id="" placeholder="Skills" class="form-control form-style-small input_skill" ></textarea>
</div>    
<button type="button" name="btnDel_4" class="btn btn-danger btn-del pull-right" ><i class='fa fa-trash-o'></i></button>       
<div class="clear"></div>
</div> 
</fieldset>
</div>  



<div  class="cloned-exp hide">
<h4 id="reference" name="reference" class="heading-reference">Company & Experience Details</h4>
<fieldset>
<!-- Select Basic -->
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Company Name</label>
    <input type="text" data-error="Company Name" name="Company_Name[]" class="form-control Company_Name" value="">
</div>
<div class="col-sm-6">   
    <label class="control-label">Current CTC</label>
    <input type="text" data-error="Current CTC" name="Current_CTC1" class="form-control Current_CTC" value="">
</div>
<div class="clearfix"></div>
</div>
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Designation </label>
    <input type="text" data-error="Designation " name="Designation[]" class="form-control Designation" value="">
</div>
<div class="col-sm-6">   
    <label class="control-label">Expected  CTC</label>
    <input type="text" data-error="Expected  CTC" name="Expected_CTC[]" class="form-control Expected_CTC" value="">
</div>
<div class="clearfix"></div>
</div>

<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Start date  </label>
    <input type="date" data-error="Start date" name="Start_date[]" class="form-control Start_date" value="00-00-0000">
</div>
<div class="col-sm-6">   
    <label class="control-label">End date</label>
    <input type="date" data-error="End date " name="End_date[]" class="form-control End_date" value="00-00-0000">
</div>
        <div class="col-sm-12">   
    <label class="control-label">Description</label>
    <textarea name="exp_description[]" id="" placeholder="Description" class="form-control form-style-small input_skill"></textarea>
</div> 
    <button type="button" name="btnDel_4" class="btn btn-danger btn-exp-del pull-right"><i class="fa fa-trash-o"></i></button>
<div class="clearfix"></div>
</div>        
</div>




<div  class="hide  cloned-edu">
<h4 id="reference" name="reference" class="heading-reference">Education Details</h4>
<fieldset>
<!-- Select Basic -->
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Choose Education</label>
    <select class="form-control sel_qualification" name="js_qualification_name[]" value="">
        <option value="">Select</option>
         <option value="Ph.D" <?php ?>>Ph.D</option>
        <option value="Post Graduation">Post Graduation</option>
        <option value="Graduation">Graduation</option>
        <option value="Diploma">Diploma</option>
        <option value="Intermediate">Intermediate</option>
        <option value="SSC">SSC</option>
    </select>
</div>
<div class="col-sm-6">   
    <label class="control-label">Course</label>
    <input type="text" data-error="This field is First Name " name="js_course[]" class="form-control js_course" value="">
</div>
<div class="clearfix"></div>
</div>
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Institute Name  </label>
    <input type="text" data-error="This field is First Name "  name="js_institution_name[]" class="form-control js_institution_name" value="">
</div>
<div class="col-sm-6">   
    <label class="control-label">% or CGPA </label>
    <input type="text" name="js_percentage[]" class="form-control js_percentage" value="">
</div>
<div class="clearfix"></div>
</div>

<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Start date  </label>
    <input type="date" data-error="Start date" name="js_start_date[]" class="form-control js_start_date" value="00-00-0000">
</div>
<div class="col-sm-6">   
    <label class="control-label">End date</label>
    <input type="date" data-error="End date " name="js_end_date[]" class="form-control js_end_date" value="00-00-0000">
</div>
<div class="col-sm-12">   
    <label class="control-label">Description</label>
    <textarea name="ed_description[]" id="" placeholder="Description" class="form-control form-style-small input_skill"></textarea>
</div>     
    
 <button type="button" name="btnDel_4" class="btn btn-danger btn-edu-del pull-right" ><i class='fa fa-trash-o'></i></button>     
<div class="clearfix"></div>
</div>        
</div><!-- end #entry1 -->



<div  class="hide  cloned-lang">  
     <fieldset>  
<h4 id="reference" name="reference" class="heading-reference">Language Details</h4>
<!-- Select Basic -->
<div class="form-group">
    
    
    <div class="col-sm-4">   
        <label class="control-label">Language Name</label>
        <input type="text" name="language_name[]" placeholder="Language Name" data-error="This field is required" value=""  class="form-control input_lang">
    </div>
    <div class="col-sm-4">   
        <label class="control-label">Proficiency Level</label>
        <select data-error="This field is required"  name="profficiency_level[]" class="form-control select_prof">
<option value="">Select</option>
<option value="Beginner">Beginner</option>
<option value="Intermediate">Intermediate</option>
<option value="Expert">Expert</option>
<option value="Professional">Professional</option>
        </select>
    </div>

<div class="col-sm-4"> 
<label class="control-label">Language Skills</label><br/>
<label>
    <input type="checkbox" name="lang_read[]" value="0" class="radio_read_hidden" checked/>
<input type="checkbox" name="lang_read[]" value="1" class="radio_read"> Read </label> &nbsp;

<label>
   <input type="checkbox" name="speaks[]" value="0" class="radio_speaks_hidden" checked/>  
<input type="checkbox" name="speaks[]" value="1" class="radio_speaks"> Speak </label> &nbsp;
<label>
    <input type="checkbox" name="writes[]" value="0" class="radio_writes_hidden" checked/>    
<input type="checkbox" name="writes[]" value="1" class="radio_writes"> Write </label> &nbsp;
</div>
        <button type="button" name="btnDel_4" class="btn btn-danger btn-lang-del pull-right" ><i class='fa fa-trash-o'></i></button> 
    <div class="clearfix"></div>
</div> 
</fieldset>
</div><!-- end #entry1 -->


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


$(document).on("click",".btn-del",function(){
var r = confirm("Do you want to delete this section");
var num=$(".clone-skill-div").length;
if (r == true) {
    if(num>1){
  $(this).closest(".clone-skill-div").remove();
    }
}
});


$(document).on("click",".btn-exp-del",function(){
var r = confirm("Do you want to delete this section");
var num=$(".clone-exp-div").length;
if (r == true) {
    if(num>1){
  $(this).closest(".clone-exp-div").remove();
    }
}
});


$(document).on("click",".btn-edu-del",function(){
var r = confirm("Do you want to delete this section");
var num=$(".clone-edu-div").length;
if (r == true) {
    if(num>1){
  $(this).closest(".clone-edu-div").remove();
    }
}
});

$(document).on("click",".btn-lang-del",function(){
var r = confirm("Do you want to delete this section");
var num=$(".clone-lang-div").length;
if (r == true) {
    if(num>1){
  $(this).closest(".clone-lang-div").remove();
    }
}
});

});
</script>

<?php 
if(isset($_GET["tab"])){
 if($_GET["tab"]=='4') { $tab="tab4"; } else { $tab="tab".($_GET["tab"]); } 
 
?>

<script>
$(document).ready(function () {
$('.nav.nav-tabs li').removeClass('active');
$('.tab-pane').removeClass('active');
$('.nav.nav-tabs li.<?php echo $tab; ?>').addClass('active');
$('.tab-pane.<?php echo $tab; ?>').addClass('active');
});
</script>
<?php
}
?>  

<script>
$(document).ready(function () {
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  var target = $(e.target).attr("data-tab") // activated tab
 $(".tab_place").val(target);
});

$(document).on('click', ".radio_read" ,function(){
    $this=$(this);
if($this.is(':checked')){
     $this.closest("label").find(".radio_read_hidden").removeAttr('checked');
} else {
     $this.closest("label").find(".radio_read_hidden").prop('checked', true);
}
});

$(document).on('click', ".radio_speaks" ,function(){
    $this=$(this);
if($this.is(':checked')){
     $this.closest("label").find(".radio_speaks_hidden").removeAttr('checked');
} else {
     $this.closest("label").find(".radio_speaks_hidden").prop('checked', true);
}
});

$(document).on('click', ".radio_writes" ,function(){
    $this=$(this);
if($this.is(':checked')){
     $this.closest("label").find(".radio_writes_hidden").removeAttr('checked');
} else {
     $this.closest("label").find(".radio_writes_hidden").prop('checked', true);
}
});


});
</script>