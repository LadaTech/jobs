<?php
ob_start();
$page = 'Edit Job seeker profile';
include_once "header.php";

$id = $_GET['uid'];
//Remove profile picture 
if(isset($_GET['r']) && $_GET['r'] == 's' ){
    $uploaded_dir = "images/jobseeker/";
    $profPic = $user_info['profile_pic'];
    $fullPath = $uploaded_dir.$profPic;
    unlink($fullPath);
    $removeProfPic = $db->query("update job_seeker set profile_pic='' where Job_Seeker_Id = $id");    
    if($removeProfPic){
        $errorMsg = "Profile picture removed successfully";
        $msg->error($errorMsg);
    } else {
        $errorMsg = "Profile picture not removed ";
        $msg->error($errorMsg);
    }
    header("Location: edit_jobseeker.php?uid=$id");
}


$cid = $id;
$sql = $db->query("select * from job_seeker where Job_Seeker_Id=$id") or die(mysql_error());
if ($sql->rowCount() == 1) {
    $user_info = $sql->fetch(PDO::FETCH_ASSOC);
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
                        <?php if ($msg->hasErrors()) { ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> 
                                    <?php echo $msg->display(); ?>
                                </h4>
                            </div>
                        <?php } ?>
                        <!--vb_classifieds  forms values stores here-->
                        <form name="submenus" action="" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data">
                            <input type="hidden" name="sid" id="pid_v" value="<?php echo $user_info['Job_Seeker_Id']; ?>" />
                            <input type="hidden" name="old_img1" id="pid_v" value="<?php echo $user_info['profile_pic']; ?>" />
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

                                                    <div class="padding-10">  <input type="radio"  id="ptype" name="Experience_level" class="" value="Fresher" required="" <?php
    if ($user_info["Experience_level"] == "Fresher") {
        echo "checked";
    }
    ?>> Fresher
                                                        &nbsp;&nbsp;&nbsp;
                                                        <input type="radio"  id="ptype" name="Experience_level" class="" value="Experienced" required="" <?php
                                                               if ($user_info["Experience_level"] == "Experienced") {
                                                                   echo "checked";
                                                               }
                                                               ?>> Experienced </div>

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

                                                                <option  value="<?php echo $row_dom['id']; ?>" <?php
                                                                         if ($user_info["Industry"] == $row_dom['id']) {
                                                                             echo "selected";
                                                                         }
                                                                         ?>><?php echo $row_dom['name']; ?></option>
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

                                                                <option  value="<?php echo $row_dom['id']; ?>" <?php
                                                                         if ($user_info["Domain"] == $row_dom['id']) {
                                                                             echo "selected";
                                                                         }
                                                                         ?>><?php echo $row_dom['name']; ?></option>
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
                                                <div class="col-lg-4 dp">
                                                    <?php if($user_info['profile_pic']!=0 && $user_info['profile_pic']!="") { ?>
                                                        <img src="<?php echo $my_path; ?>/images/jobseeker/<?php echo $user_info['profile_pic']; ?>" height="130px">
                                                    <?php } else { ?>
                                                        <img src="<?php echo $my_path; ?>/images/user.png" height="130px"> 
                                                    <?php } ?>
                                                    <input type="file" name="image1" id=""  class="form-control1" />

                                                    <?php if(isset($user_info['profile_pic']) && $user_info['profile_pic'] != '' ) { ?>
                                                        <a href="edit_jobseeker.php?r=s&uid=<?php echo $user_info['Job_Seeker_Id']; ?>">Remove</a>
                                                    <?php } ?>
                                                </div>

                                                <div class="clear"></div>
                                            </div>   



    <?php
    $lc = 0;
    $lang = $db->query("select * from js_languages where job_seeker_id='$cid'");
    if ($lang->rowCount() == 0) {
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
                                                                <input type="hidden" name="lang_read1[]" value="0" />
                                                                <input type="checkbox" name="lang_read1[]" class="radio_read"> Read </label> &nbsp;

                                                            <label>
                                                                <input type="hidden" name="speaks1[]" value="0" />
                                                                <input type="checkbox" name="speaks1[]"  class="radio_speaks"> Speak </label> &nbsp;
                                                            <label>
                                                                <input type="hidden" name="writes1[]" value="0" />
                                                                <input type="checkbox" name="writes1[]"  class="radio_writes"> Write </label> &nbsp;
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div> 
                                                </div><!-- end #entry1 -->
                                                <?php
                                            } else {

//$tc=$lang->rowCount();
                                                while ($rec_j = $lang->fetch(PDO::FETCH_ASSOC)) {
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
                                                                <select data-error="This field is required" name="profficiency_level[]" class="form-control select_prof">
                                                                    <option value="">Select</option>
                                                                    <option value="Beginner"  <?php if ($rec_j["profficiency_level"] == "Beginner") {
                                                        echo "selected";
                                                    } ?>>Beginner</option>
                                                                    <option value="Intermediate" <?php if ($rec_j["profficiency_level"] == "Intermediate") {
                                                        echo "selected";
                                                    } ?>>Intermediate</option>
                                                                    <option value="Expert" <?php if ($rec_j["profficiency_level"] == "Expert") {
                                                        echo "selected";
                                                    } ?>>Expert</option>
                                                                    <option value="Professional" <?php if ($rec_j["profficiency_level"] == "Professional") {
                                                        echo "selected";
                                                    } ?>>Professional</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-sm-4"> 
                                                                <label class="control-label">Language Skills</label><br/>
                                                                <label>
                                                                    <input type="hidden" name="lang_read<?php echo $lc;?>[]" value="0" />
                                                                    <input type="checkbox" name="lang_read<?php echo $lc;?>[]" class="radio_read" <?php echo ($rec_j["lang_read"] == "1")?'checked':'';?> > Read </label> &nbsp;
                                                                <label>
                                                                    <input type="hidden" name="speaks<?php echo $lc;?>[]" value="0" />
                                                                    <input type="checkbox" name="speaks<?php echo $lc;?>[]"   class="radio_speaks" <?php echo ($rec_j["speaks"] == "1")?'checked':'';?> > Speak </label> &nbsp;
                                                                <label>
                                                                    <input type="hidden" name="writes<?php echo $lc;?>[]" value="0" />
                                                                    <input type="checkbox" name="writes<?php echo $lc;?>[]"   class="radio_writes" <?php echo ($rec_j["writes"] == "1")?'checked':''; ?> > Write </label> &nbsp;
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>   
                                                    </div>   
            <?php
        }
    }
    ?>
                                            <div class="cloning-lang-data"> </div>

                                            <div class="form-group">
                                                <div class="col-sm-6">    
                                                    <button type="button" id="add-lang" name="btnAdd_2" class="btn btn-info btn-full">Add section</button>
                                                </div>  <div class="clearfix"></div>
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
    $lc = 0;
    $lang = $db->query("select * from js_educational_information where job_seeker_id='$cid'");
    if ($lang->rowCount() == 0) {
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
                                                                <input type="date" data-error="Start date" name="js_start_date" class="form-control js_start_date" >
                                                            </div>
                                                            <div class="col-sm-6">   
                                                                <label class="control-label">End date</label>
                                                                <input type="date" data-error="End date " name="js_end_date" class="form-control js_end_date">
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>        
                                                </div><!-- end #entry1 -->
        <?php
    } else {

//$tc=$lang->rowCount();
        while ($rec_j = $lang->fetch(PDO::FETCH_ASSOC)) {
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


                                                                        <option value="Ph.D" <?php if ($rec_j["js_qualification_name"] == "Ph.D") {
                echo "selected";
            } ?>>Ph.D</option>
                                                                        <option value="Post Graduation" <?php if ($rec_j["js_qualification_name"] == "Post Graduation") {
                echo "selected";
            } ?>>Post Graduation</option>
                                                                        <option value="Graduation" <?php if ($rec_j["js_qualification_name"] == "Graduation") {
                echo "selected";
            } ?>>Graduation</option>
                                                                        <option value="Diploma" <?php if ($rec_j["js_qualification_name"] == "Diploma") {
                echo "selected";
            } ?>>Diploma</option>
                                                                        <option value="Intermediate" <?php if ($rec_j["js_qualification_name"] == "Intermediate") {
                echo "selected";
            } ?>>Intermediate</option>
                                                                        <option value="SSC" <?php if ($rec_j["js_qualification_name"] == "SSC") {
                echo "selected";
            } ?>>SSC</option>
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
                                                                <div class="clearfix"></div>
                                                            </div>        
                                                    </div><!-- end #entry1 -->
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            <div class="cloning-edu-data"> </div> 
                                            <div class="form-group">
                                                <div class="col-sm-6">    
                                                    <button type="button" id="add-edu" name="btnAdd_2" class="btn btn-info btn-full">Add section</button>
                                                </div>
                                                <div class="clearfix"></div>
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
    $lc = 0;
    $lang = $db->query("select * from js_work_experience where Job_Seeker_Id='$cid'");
    if ($lang->rowCount() == 0) {
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
                                                                <input type="date" data-error="Start date" name="Start_date[]" class="form-control Start_date">
                                                            </div>
                                                            <div class="col-sm-6">   
                                                                <label class="control-label">End date</label>
                                                                <input type="date" data-error="End date " name="End_date[]" class="form-control End_date endDate">
                                                                <div> <input type="checkbox" class="till_date" name="End_date[]" > Till Date </div>
                                                            </div>
                                                            
                                                            <div class="clearfix"></div>
                                                        </div>        
                                                </div><!-- end #entry1 -->
                                                    <?php
                                                } else {
                                            //$tc=$lang->rowCount();
                                                    while ($rec_j = $lang->fetch(PDO::FETCH_ASSOC)) {
                                                        $lc++;
                                                        $end_date = ($rec_j["End_date"] == '0000-00-11') ? 'checked' : $rec_j["End_date"];
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
                                                                    <input type="date" data-error="End date" <?php echo ($end_date != 'checked') ? "value='$end_date'" : 'disabled'; ?> name="End_date[]" class="form-control End_date endDate">
                                                                    <div> <input type="checkbox" <?php echo ($end_date == 'checked') ? 'checked' : ''; ?> class="till_date" name="End_date[]" > Till Date </div>
                                                                </div>
                                                                
                                                                <div class="clearfix"></div>
                                                            </div>        
                                                    </div><!-- end #entry1 -->
                                                        <?php
                                                    }
                                                }
                                                ?>
                                           <div class="cloning-exp-data"> </div>              
                                            <div class="form-group">
                                                <div class="col-sm-6">    
                                                    <button type="button" id="add-exp" name="btnAdd_1" class="btn btn-info btn-full">Add section</button>
                                                </div>
                                                <div class="clearfix"></div>
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
    $lang = $db->query("select * from js_skills where job_seeker_id='$cid'");
    $lc = 0;
    if ($lang->rowCount() == 0) {
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
    } else {

//$tc=$lang->rowCount();
        while ($rec_j = $lang->fetch(PDO::FETCH_ASSOC)) {
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
                                        <div class="cloning-skill-data"> </div>              
                                            <div class="form-group">
                                                <div class="col-sm-6">    
                                                    <button type="button" id="add-skill" name="btnAdd_4" class="btn btn-info btn-full">Add section</button>
                                                </div>
                                                <div class="clearfix"></div>
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
    <?php
    ob_start();
    if (isset($_POST['submit'])) {
        $fname = ucwords($_POST['First_name']);
        $cid = ucfirst(($_POST['sid']));
        $lname = ucwords($_POST['Last_name']);
        $Industry = $_POST["Industry"];
        $Alternate_email = $_POST["Alternate_email"];
        $Alternate_Phone_no = $_POST["Alternate_Phone_no"];
        $Father_Name = $_POST["Father_Name"];
        $Domain = $_POST["Domain"];
        $Phone_No = $_POST["Phone_No"];
        $Address = $_POST["Address"];
        $Objective = $_POST["Objective"];
        $old_img1=$_POST['old_img1'];
        $uploaded_dir = "../images/jobseeker/";
        $filename = $_FILES["image1"]["name"];
        $filename=rand(100,999)."_".$filename;
        $path = $uploaded_dir.$filename;
        $imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
        if($imageFileType != '' && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"  ) {
            $errorMsg = "Sorry, only JPG, JPEG, PNG  files are allowed";
            $msg->error($errorMsg);
            header("Location: edit_jobseeker.php?uid=$cid");
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
        $Experience_level = $_POST['Experience_level'];
        $jsinsert = $db->query("update job_seeker set 
                   First_name='$fname',Last_name='$lname',Phone_No='$Phone_No',Industry='$Industry',Domain='$Domain',Experience_level='$Experience_level',"
                . "Alternate_email='$Alternate_email',Alternate_Phone_no='$Alternate_Phone_no',Father_Name='$Father_Name',Address='$Address',"
                . "Objective='$Objective',profile_pic='$image1' where Job_Seeker_Id=$cid");

        /*         * ********Skills*********** */
        $db->query("delete from  js_skills where job_seeker_id=$cid");
        $language_name = $_POST["language_name"];
        $skills = $_POST["skills"];
        while (list($key1, $val1) = each($skills)) {
            if ($val1 != "") {
                $rs = $db->query("insert into js_skills(js_skill_description,job_seeker_id) values('$val1','$cid')") or die(mysql_error());
            }
        }
        /*         * *********Skills************ */

        /*         * *********languages**************** */
        $db->query("delete from js_languages where Job_Seeker_Id=$cid");
        $totalLang = count($_POST["language_name"]);
//        echo "<pre>";print_r($_POST);
        for($llc = 0;$llc < $totalLang;$llc++) {
            try {
                $language_name = $_POST["language_name"][$llc];
                $profficiency_level = $_POST["profficiency_level"][$llc];
                $index = $llc + 1;
                $lang_read = (count($_POST["lang_read$index"]) == 2) ? '1' : '0';
                $writes = (count($_POST["writes$index"]) == 2) ? '1' : '0';
                $speaks = (count($_POST["speaks$index"]) == 2) ? '1' : '0';
                $qry = "insert into js_languages(language_name,profficiency_level,lang_read,writes,speaks,job_seeker_id)"
                        . " values('$language_name','$profficiency_level','$lang_read','$writes','$speaks','$cid')";
                $rs = $db->query($qry) or die(mysql_error());
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        /*         * *********languages**************** */


        /*         * *******************Education Starts************************ */
        $db->query("delete from  js_educational_information where job_seeker_id=$cid");
//        echo "<pre>";print_r($_POST);
        $totalEdu = count($_POST["js_qualification_name"]);
            for($llc = 0;$llc < $totalEdu;$llc++) {
                try {
                    $val1 = $_POST["js_qualification_name"][$llc];
                    $js_course = $_POST["js_course"][$llc];
                    $js_institution_name = $_POST["js_institution_name"][$llc];
                    $js_percentage = $_POST["js_percentage"][$llc];
                    $js_start_date = $_POST["js_start_date"][$llc];
                    $js_end_date = $_POST["js_end_date"][$llc];
                   $qry = "insert into js_educational_information(js_qualification_name,js_course,js_institution_name,js_percentage,js_start_date,js_end_date,job_seeker_id)"
                            . " values('$val1','$js_course','$js_institution_name','$js_percentage','$js_start_date','$js_end_date','$cid')";
                    $rs = $db->query($qry) or die(mysql_error());
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
            }
        /*         * *******************Education Ends************************ */



        /*         * ******************* js_work_experience Starts************************ */
        $db->query("delete from   js_work_experience where job_seeker_id=$cid");
        $totalExp = count($_POST["Company_Name"]);
        for($llc = 0;$llc < $totalExp;$llc++) {
            try {
                $val1 = $_POST["Company_Name"][$llc];
                $Current_CTC = $_POST["Current_CTC"][$llc];
                $Designation = $_POST["Designation"][$llc];
                $Expected_CTC = $_POST["Expected_CTC"][$llc];
                $Start_date = $_POST["Start_date"][$llc];
                if(isset($_POST['End_date'][$llc]) && $_POST['End_date'][$llc] == 'on') {
                    $End_date = '0000-00-11';
                } else {
                    $End_date = $_POST['End_date'][$llc];
                }
                if($val1 != ''){
                    $rs = $db->query("insert into  js_work_experience(Company_Name,Current_CTC,Designation,Expected_CTC,Start_date,End_date,job_seeker_id) "
                        . "values('$val1','$Current_CTC','$Designation','$Expected_CTC','$Start_date','$End_date','$cid')") or die(mysql_error());
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        /*         * ******************* js_work_experience Ends************************ */



        if ($jsinsert) {
            header('Location:manage_jobseekers.php?msg=updated');
        } else {
            header('Location:manage_jobseekers.php?msg=non');
        }
    }
    ob_end_flush();
    ?>  
    <?php
} else {
    header("location:home.php");
}
?>

<div  class="hide  cloned-lang">  
    <h4 id="reference" name="reference" class="heading-reference">Language #1</h4>
    <fieldset>  
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
                    <input class="lang-read" type="hidden" name="lang_read[]"  value="0"> 
                    <input class="lang-read" type="checkbox" name="lang_read[]"  class="radio_read"> Read </label> &nbsp;
                <label>
                    <input class="speaks" type="hidden" name="speaks[]"  value="0"> 
                    <input class="speaks" type="checkbox" name="speaks[]"  class="radio_speaks"> Speak </label> &nbsp;
                <label>
                    <input class="writes" type="hidden" name="writes[]"  value="0"> 
                    <input class="writes" type="checkbox" name="writes[]"  class="radio_writes"> Write </label> &nbsp;
            </div>
            <button type="button" name="btnDel_4" class="btn btn-danger btn-lang-del pull-right" ><i class='fa fa-trash-o'></i></button> 
            <div class="clearfix"></div>
        </div> 
    </fieldset>
</div>		

<div id="Education1" class="hide cloned-edu">
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
                <input type="date" data-error="Start date" name="js_start_date[]" class="form-control js_start_date" >
            </div>
            <div class="col-sm-6">   
                <label class="control-label">End date</label>
                <input type="date" data-error="End date " name="js_end_date[]" class="form-control js_end_date">
            </div>
            <button type="button" name="btnDel_4" class="btn btn-danger btn-edu-del pull-right" ><i class='fa fa-trash-o'></i></button> 
            <div class="clearfix"></div>
        </div>        
</div>
    
<div id="entry1" class="hide cloned-exp">
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
                <input type="date" data-error="Start date" name="Start_date[]" class="form-control Start_date">
            </div>
            <div class="col-sm-6">   
                <label class="control-label">End date</label>
                <input type="date" data-error="End date " name="End_date[]" class="form-control End_date endDate">
                <div> <input type="checkbox" class="till_date" name="End_date[]" > Till Date </div>
            </div>
            
            <button type="button" name="btnDel_4" class="btn btn-danger btn-exp-del pull-right" ><i class='fa fa-trash-o'></i></button> 
            <div class="clearfix"></div>
        </div>        
</div>
<div id="Skill" class="hide cloned-skill">
    <h4 id="reference" name="reference" class="heading-reference">Skill #1</h4>
    <div class="form-group">
        <div class="col-lg-12">
            <textarea  name="skills[]" id="skill1" placeholder="Skills" class="form-control form-style-small input_skill" ></textarea>
        </div>    
        <button type="button" name="btnDel_4" class="btn btn-danger btn-del pull-right" ><i class='fa fa-trash-o'></i></button> 
        <div class="clear"></div>
    </div>  
</div>    

    
    
<script type="text/javascript">
    $(document).ready(function ()
    {
        $('form').on('click','.till_date',function(){
            if($(this).is(":checked")){
                $(this).parents('.col-sm-6').find('.endDate').attr('disabled',true);
            } else {
                $(this).parents('.col-sm-6').find('.endDate').attr('disabled',false);
            }
        });
//        $('form').on('click','input[name="lang_read[]"]',function(){
//            if($(this).is(":checked")){
//                $(this).attr('value','on');
//            } else {
//                $(this).attr('value','off');
//            }
//        });


        $("#Industry").on('change', function () {
            $("#Domain").empty().append("<image src='images/spinner.gif' />");
            var id = $(this).val();
            $.ajax({
                type: "get",
                url: "<?php echo $my_path; ?>/get_domains.php",
                data: {"q": id},
                success: function (data) {
                    $("#Domain").empty().append(data);
                }
            });
        });
    });
</script>
