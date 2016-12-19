<?php
ob_start();
include "header.php";
$id=$_GET['uid'];
$cid=$id;
$sql=$db->query("select * from job_seeker where Job_Seeker_Id=$id") or die(mysql_error());
if($sql->rowCount()==1)
{
$user_info=$sql->fetch(PDO::FETCH_ASSOC);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">
<h1>
Edit  Job Seeker
</h1>
<ol class="breadcrumb">
<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="manage_jobseekers.php"><i class="fa fa-tree text-aqua"></i>Manage Job Seekers</a></li>
<li class="active">Edit  Job Seeker</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->

<div class="row">
    <div class="col-md-1"></div>
            <!-- left column -->
            <div class="col-md-9">
              <!-- Horizontal Form -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Please fill the following details</h3>
                </div><!-- /.box-header -->
                
<!--vb_classifieds  forms values stores here-->
<form name="submenus" action="" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data">
    <input type="hidden" name="sid" id="pid_v" value="<?php echo $user_info['Job_Seeker_Id']; ?>" />
<div class="box-body">
<div class="tabs-wrap profile_tabs_wrapper">
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active">
<a href="#personal_details" aria-controls="personal_details" role="tab" data-toggle="tab" aria-expanded="true">Personal Details</a>
</li>
<li>
<a href="#educational_details" aria-controls="educational_details" role="tab" data-toggle="tab" aria-expanded="false">Educational Details</a>
</li>
<li>
<a href="#experience" aria-controls="experience" role="tab" data-toggle="tab" aria-expanded="false">Experience Details</a>
</li>
<li>
<a href="#skills" aria-controls="skills" role="tab" data-toggle="tab" aria-expanded="false">Skills</a>
</li>

<li>
<a href="#objective" aria-controls="objective" role="tab" data-toggle="tab" aria-expanded="false">Objective</a>
</li>

</ul>

<div class="tab-content">

<div role="tabpanel" class="tab-pane active" id="personal_details">


<div class="form-group">
<div class="col-lg-6">
<label class="control-label" for="address">First Name <span class="imp">*</span> </label>
<input type="text" name="First_name" id="" placeholder="First Name" value="<?php echo $user_info["First_name"]; ?>" class="form-control" required="required"> 
</div>
<div class="col-lg-6">
<label class="control-label" for="address">Last Name <span class="imp">*</span> </label>
<input type="text" name="Last_name" id="" placeholder="Last Name" value="<?php echo $user_info["Last_name"]; ?>" class="form-control" required="required"> 
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
    $sql_dom = 'SELECT * FROM industry order by name asc';
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
</div>    
<div class="clear"></div>
</div>   



<?php
$lc=0;
$lang=$db->query("select * from js_languages where job_seeker_id='$cid'");
if($lang->rowCount()==0){
?>
 <div id="Language1" class="clonedInput_3">   
<h4 id="reference" name="reference" class="heading-reference">Language #1</h4>
<!-- Select Basic -->
<div class="form-group">
    <div class="col-sm-4">   
        <label class="control-label">Language Name</label>
        <input type="text" name="language_name[]" placeholder="Language Name" data-error="This field is required" value=""  class="form-control input_lang">
    </div>
    <div class="col-sm-4">   
        <label class="control-label">Profficiency Level</label>
        <select data-error="This field is required"  name="profficiency_level1" class="form-control select_prof">
<option value="">Select</option>
<option value="Beginner">Beginner</option>
<option value="Intermediate">Intermediate</option>
<option value="Expert">Expert</option>
<option value="Profossional">Profossional</option>
        </select>
    </div>

<div class="col-sm-4"> 
<label class="control-label">Language Skills</label><br/>
<label>
<input type="checkbox" name="lang_read1" value="1" class="radio_read"> Read </label> &nbsp;

<label>
<input type="checkbox" name="speaks1" value="1" class="radio_speaks"> Speak </label> &nbsp;
<label>
<input type="checkbox" name="writes1" value="1" class="radio_writes"> Write </label> &nbsp;
</div>
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
 <div id="Language<?php echo $lc; ?>" class="clonedInput_3">   
<h4 id="reference" name="reference" class="heading-reference">Language #<?php echo $lc; ?></h4>
<!-- Select Basic -->
<div class="form-group">
    <div class="col-sm-4">   
        <label class="control-label">Language Name</label>
        <input type="text" name="language_name[]" placeholder="Language Name" data-error="This field is required" value="<?php echo $rec_j["language_name"]; ?>" required="" class="form-control input_lang">
    </div>
    <div class="col-sm-4">   
        <label class="control-label">Profficiency Level</label>
        <select data-error="This field is required" name="profficiency_level<?php echo $lc; ?>" class="form-control select_prof">
            <option value="">Select</option>
<option value="Beginner"  <?php if($rec_j["profficiency_level"]=="Beginner"){ echo "selected";}?>>Beginner</option>
<option value="Intermediate" <?php if($rec_j["profficiency_level"]=="Intermediate"){ echo "selected";}?>>Intermediate</option>
<option value="Expert" <?php if($rec_j["profficiency_level"]=="Expert"){ echo "selected";}?>>Expert</option>
<option value="Profossional" <?php if($rec_j["profficiency_level"]=="Profossional"){ echo "selected";}?>>Profossional</option>
        </select>
    </div>

<div class="col-sm-4"> 
<label class="control-label">Language Skills</label><br/>
<label>
<input type="checkbox" name="lang_read<?php echo $lc; ?>" value="1" class="radio_read"<?php if($rec_j["lang_read"]=="1"){ echo "checked";}?>> Read </label> &nbsp;

<label>
<input type="checkbox" name="speaks<?php echo $lc; ?>" value="1"  class="radio_speaks"<?php if($rec_j["speaks"]=="1"){ echo "checked";}?>> Speak </label> &nbsp;
<label>
<input type="checkbox" name="writes<?php echo $lc; ?>" value="1"  class="radio_writes"<?php if($rec_j["writes"]=="1"){ echo "checked";}?>> Write </label> &nbsp;
</div>
    <div class="clearfix"></div>
</div>   
 </div>   
<?php 
}
}
?>


<div class="form-group">
<div class="col-sm-6">    
<button type="button" id="btnAdd_3" name="btnAdd_2" class="btn btn-info btn-full">add section</button>
</div><div class="col-sm-6">   
<button type="button" id="btnDel_3" name="btnDel_2" class="btn btn-danger  btn-full" <?php if($lc==0 || $lc==1) { echo "disabled"; }?>>remove section above</button> </div>  <div class="clearfix"></div>
</div>   
<div class="clearfix"></div>            


<div class="form-group">
<div class="col-sm-6 col-sm-offset-6">
<input type="button" name="submit" value="Continue"  class="btn btn-primary btn-full open2 continue"/>
</div>
</div>     


</div>

<div role="tabpanel" class="tab-pane" id="educational_details">

<?php
$lc=0;
$lang=$db->query("select * from js_educational_information where job_seeker_id='$cid'");
if($lang->rowCount()==0){
?>
<div id="Education1" class="clonedInput_2">
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
    <input type="text" data-error="This field is First Name " name="js_course1" class="form-control js_course" value="">
</div>
<div class="clearfix"></div>
</div>
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Institute Name  </label>
    <input type="text" data-error="This field is First Name "  name="js_institution_name1" class="form-control js_institution_name" value="">
</div>
<div class="col-sm-6">   
    <label class="control-label">% or CGPA </label>
    <input type="text" name="js_percentage1" class="form-control js_percentage" value="">
</div>
<div class="clearfix"></div>
</div>

<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Start date  </label>
    <input type="date" data-error="Start date" name="js_start_date1" class="form-control js_start_date" value="00-00-0000">
</div>
<div class="col-sm-6">   
    <label class="control-label">End date</label>
    <input type="date" data-error="End date " name="js_end_date1" class="form-control js_end_date" value="00-00-0000">
</div>
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
<div id="Education<?php echo $lc; ?>" class="clonedInput_2">
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
    <input type="text" data-error="This field is First Name " name="js_course<?php echo $lc; ?>" class="form-control js_course" value="<?php echo $rec_j["js_course"]; ?>">
</div>
<div class="clearfix"></div>
</div>
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Institute Name  </label>
    <input type="text" data-error="This field is First Name "  name="js_institution_name<?php echo $lc; ?>" class="form-control js_institution_name" value="<?php echo $rec_j["js_institution_name"]; ?>">
</div>
<div class="col-sm-6">   
    <label class="control-label">% or CGPA </label>
    <input type="text" name="js_percentage<?php echo $lc; ?>" class="form-control js_percentage" value="<?php echo $rec_j["js_percentage"]; ?>">
</div>
<div class="clearfix"></div>
</div>

<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Start date  </label>
    <input type="date" data-error="Start date" name="js_start_date<?php echo $lc; ?>" class="form-control js_start_date" value="<?php echo $rec_j["js_start_date"]; ?>">
</div>
<div class="col-sm-6">   
    <label class="control-label">End date</label>
    <input type="date" data-error="End date " name="js_end_date<?php echo $lc; ?>" class="form-control js_end_date" value="<?php echo $rec_j["js_end_date"]; ?>">
</div>
<div class="clearfix"></div>
</div>        
</div><!-- end #entry1 -->
<?php 
}
}
?>

<div class="form-group">
<div class="col-sm-6">    
<button type="button" id="btnAdd_2" name="btnAdd_2" class="btn btn-info btn-full">add section</button>
</div><div class="col-sm-6">   
<button type="button" id="btnDel_2" name="btnDel_2" class="btn btn-danger  btn-full"  <?php if($lc==0 || $lc==1) { echo "disabled"; }?>>remove section above</button> </div>  <div class="clearfix"></div>
</div>   
<div class="clearfix"></div>     


<div class="form-group">
<div class="col-sm-3 col-sm-offset-6">
<input type="button" name="submit" value="Back"  class="btn btn-primary btn-full open2 back"/>
</div>
<div class="col-sm-3">
<input type="button" name="submit" value="Continue"  class="btn btn-primary btn-full open2 continue"/>
</div> 
<div class="clearfix"></div>
</div>   
</div>

<div role="tabpanel" class="tab-pane" id="experience">
<?php
$lc=0;
$lang=$db->query("select * from js_work_experience where Job_Seeker_Id='$cid'");
if($lang->rowCount()==0){
?>
<div id="entry1" class="clonedInput_1">
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
    <input type="text" data-error="Current CTC" name="Current_CTC1" class="form-control Current_CTC" value="">
</div>
<div class="clearfix"></div>
</div>
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Designation </label>
    <input type="text" data-error="Designation " name="Designation1" class="form-control Designation" value="">
</div>
<div class="col-sm-6">   
    <label class="control-label">Expected  CTC</label>
    <input type="text" data-error="Expected  CTC" name="Expected_CTC1" class="form-control Expected_CTC" value="">
</div>
<div class="clearfix"></div>
</div>

<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Start date  </label>
    <input type="date" data-error="Start date" name="Start_date1" class="form-control Start_date" value="00-00-0000">
</div>
<div class="col-sm-6">   
    <label class="control-label">End date</label>
    <input type="date" data-error="End date " name="End_date1" class="form-control End_date" value="00-00-0000">
</div>
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

<div id="entry<?php echo $lc; ?>" class="clonedInput_1">
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
    <input type="text" data-error="Current CTC" name="Current_CTC<?php echo $lc; ?>" class="form-control Current_CTC" value="<?php echo $rec_j["Current_CTC"]; ?>">
</div>
<div class="clearfix"></div>
</div>
<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Designation </label>
    <input type="text" data-error="Designation " name="Designation<?php echo $lc; ?>" class="form-control Designation" value="<?php echo $rec_j["Designation"]; ?>">
</div>
<div class="col-sm-6">   
    <label class="control-label">Expected  CTC</label>
    <input type="text" data-error="Expected  CTC" name="Expected_CTC<?php echo $lc; ?>" class="form-control Expected_CTC" value="<?php echo $rec_j["Expected_CTC"]; ?>">
</div>
<div class="clearfix"></div>
</div>

<div class="form-group">
<div class="col-sm-6">   
    <label class="control-label">Start date  </label>
    <input type="date" data-error="Start date" name="Start_date<?php echo $lc; ?>" class="form-control Start_date" value="<?php echo $rec_j["Start_date"]; ?>">
</div>
<div class="col-sm-6">   
    <label class="control-label">End date</label>
    <input type="date" data-error="End date " name="End_date<?php echo $lc; ?>" class="form-control End_date" value="<?php echo $rec_j["End_date"]; ?>">
</div>
<div class="clearfix"></div>
</div>        
</div><!-- end #entry1 -->

<?php 
}
}
?>

<div class="form-group">
<div class="col-sm-6">    
<button type="button" id="btnAdd_1" name="btnAdd_1" class="btn btn-info btn-full">add section</button>
</div><div class="col-sm-6">   
<button type="button" id="btnDel_1" name="btnDel_1" class="btn btn-danger  btn-full" <?php if($lc==0 || $lc==1) { echo "disabled"; }?>>remove section above</button> </div>  <div class="clearfix"></div>
</div>   
<div class="clearfix"></div>

<div class="form-group">
<div class="col-sm-3 col-sm-offset-6">
<input type="button" name="submit" value="Back"  class="btn btn-primary btn-full open2 back"/>
</div>
<div class="col-sm-3">
<input type="button" name="submit" value="Continue"  class="btn btn-primary btn-full open2 continue"/>
</div> 
<div class="clearfix"></div>
</div>   
</div>
<div role="tabpanel" class="tab-pane" id="skills">
<?php
$lang=$db->query("select * from js_skills where job_seeker_id='$cid'");
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
<div class="col-sm-3 col-sm-offset-6">
<input type="button" name="submit" value="Back"  class="btn btn-primary btn-full open2 back"/>
</div>
<div class="col-sm-3">
<input type="button" name="submit" value="Continue"  class="btn btn-primary btn-full open2 continue"/>
</div> 
<div class="clearfix"></div>
</div>  
</div>  

<div role="tabpanel" class="tab-pane" id="objective">
<div class="form-group">
<div class="col-lg-12">
<label class="control-label" for="address">Objective  </label>

<textarea  name="Objective" id="" placeholder="Objective" class="form-control form-style-small" ><?php echo $user_info["Objective"]; ?></textarea>
</div>       
<div class="clear"></div>
</div>  

<div class="form-group">
<div class="col-sm-3 col-sm-offset-6">
<input type="button" name="submit" value="Back"  class="btn btn-primary btn-full open2 back"/>
</div>
<div class="col-sm-3">
<input type="submit" name="submit" value="Save All"  class="btn btn-primary btn-full open2"/>
</div> 
<div class="clearfix"></div>
</div>  
</div>  

</div></div>


</div><!-- /.box-body -->
<!--<div class="box-footer">
<button type="submit" name="submit" class="btn btn-info pull-right">Submit</button>
</div> /.box-footer              -->
</form>
</div><!-- /.box -->

</div>
</div>
</div><!-- /.box-header -->
</section><!-- /.content -->
<!-- content pages -->	
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
if(isset($_POST['submit']))
{
$fname=ucwords($_POST['First_name']);
$cid=ucfirst(($_POST['sid']));
$lname=ucwords($_POST['Last_name']);
$Industry=$_POST["Industry"];
$Alternate_email=$_POST["Alternate_email"];
$Alternate_Phone_no=$_POST["Alternate_Phone_no"];
$Father_Name=$_POST["Father_Name"];
$Domain=$_POST["Domain"];
$Phone_No=$_POST["Phone_No"];
$Address=$_POST["Address"];
$Objective=$_POST["Objective"];
//exit();
$Experience_level=$_POST['Experience_level'];
$jsinsert=$db->query("update job_seeker set 
First_name='$fname',Last_name='$lname',Phone_No='$Phone_No',Industry='$Industry',Domain='$Domain',Experience_level='$Experience_level',Alternate_email='$Alternate_email',Alternate_Phone_no='$Alternate_Phone_no',Father_Name='$Father_Name',Address='$Address',Objective='$Objective' where Job_Seeker_Id=$cid");    

/**********Skills************/
$db->query("delete from  js_skills where job_seeker_id=$cid");
$language_name=$_POST["language_name"];
$skills=$_POST["skills"];
    while(list($key1,$val1)= each($skills))
    {
        if($val1!=""){
$rs=$db->query("insert into js_skills(js_skill_description,job_seeker_id) values('$val1','$cid')") or die(mysql_error());
        }
    }
/***********Skills*************/

/***********languages*****************/
$db->query("delete from js_languages where Job_Seeker_Id=$cid");
$language_name=$_POST["language_name"];
if(is_array($language_name))
{
    $llc=0;
    while(list($key1,$val1)= each($language_name))
    {
$llc++;
if($val1!=""){
try{            
    echo "";
    echo "<br/>";
echo $profficiency_level=$_POST["profficiency_level".$llc];
echo $lang_read=$_POST["lang_read".$llc];
echo $writes=$_POST["writes".$llc];
echo $speaks=$_POST["speaks".$llc];
//exit();
$rs=$db->query("insert into js_languages(language_name,profficiency_level,lang_read,writes,speaks,job_seeker_id) values('$val1','$profficiency_level','$lang_read','$writes','$speaks','$cid')") or die(mysql_error());
}
catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}

        }
    }
}
/***********languages*****************/


/*********************Education Starts*************************/
$db->query("delete from  js_educational_information where job_seeker_id=$cid");
$js_qualification_name=$_POST["js_qualification_name"];
if(is_array($js_qualification_name))
{
    $llc=0;
    while(list($key1,$val1)= each($js_qualification_name))
    {
$llc++;
if($val1!=""){
try{            
    echo "";
    echo "<br/>";
echo $js_course=$_POST["js_course".$llc];
echo $js_institution_name=$_POST["js_institution_name".$llc];
echo $js_percentage=$_POST["js_percentage".$llc];
echo $js_start_date=$_POST["js_start_date".$llc];
echo $js_end_date=$_POST["js_end_date".$llc];
//exit();
$rs=$db->query("insert into js_educational_information(js_qualification_name,js_course,js_institution_name,js_percentage,js_start_date,js_end_date,job_seeker_id) values('$val1','$js_course','$js_institution_name','$js_percentage','$js_start_date','$js_end_date','$cid')") or die(mysql_error());
}
catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}

        }
    }
}


/*********************Education Ends*************************/



/********************* js_work_experience Starts*************************/
$db->query("delete from   js_work_experience where job_seeker_id=$cid");
$Company_Name=$_POST["Company_Name"];
if(is_array($Company_Name))
{
    $llc=0;
    while(list($key1,$val1)= each($Company_Name))
    {
$llc++;
if($val1!=""){
try{            
    echo "";
    echo "<br/>";
echo $Current_CTC=$_POST["Current_CTC".$llc];
echo $Designation=$_POST["Designation".$llc];
echo $Expected_CTC=$_POST["Expected_CTC".$llc];
echo $Start_date=$_POST["Start_date".$llc];
echo $End_date=$_POST["End_date".$llc];
//exit();
$rs=$db->query("insert into  js_work_experience(Company_Name,Current_CTC,Designation,Expected_CTC,Start_date,End_date,job_seeker_id) values('$val1','$Current_CTC','$Designation','$Expected_CTC','$Start_date','$End_date','$cid')") or die(mysql_error());
}
catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}

        }
    }
}


/********************* js_work_experience Ends*************************/



if($jsinsert)
{    
  header('Location:manage_jobseekers.php?msg=updated');
}
else {
    header('Location:manage_jobseekers.php?msg=non');
}
}
ob_end_flush();
?>  
<?php
}
else 
{
header("location:home.php");
}
?>

		

		