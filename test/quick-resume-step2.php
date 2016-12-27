 <?php
ob_start();
$page = 'Fresher Quick Resume';
include_once 'header.php';
include_once 'js-session-check.php';

if(isset($_POST['submit'])){
    echo "<pre>";
    $dateTime = date('Y-m-d H:i:s');
    //Technical Skills
    $techSkills = explode(",",$_POST['tech_skills']);
    $fvaluesList = '';
    foreach($techSkills as $skill){
        $fvaluesList .= "('". $skill. "','" .$user_info['Job_Seeker_Id'] . "','" .$user_info['Job_Seeker_Id'] . "','" . $dateTime ."'),";
    }
    $fvaluesList = substr($fvaluesList,0,-1);
    $qry = "INSERT INTO js_skills (skill_title,job_seeker_id,inserted_by,inserted_date) VALUES ". $fvaluesList;
    if($fvaluesList != '') $db->query($qry);
    
    //Academic history
    $qr_academic_history = $_POST['qr_academic_history'];
    $qry = "INSERT INTO js_accomplishments (accomplishment_name,job_seeker_id,inserted_by,inserted_time)"
                    . " VALUES ('$qr_academic_history','$user_info[Job_Seeker_Id]','$user_info[Job_Seeker_Id]','$dateTime' )";
    if($qr_academic_history != '') $db->query($qry);
    
    //Success Stories in professional career
    $qr_exp_success_stories =  $_POST['qr_exp_success_stories'];
    $jsinsert = $db->query("update job_seeker set qr_exp_success_stories='$qr_exp_success_stories' where Job_Seeker_Id=$user_info[Job_Seeker_Id]"); 

    $url = $my_path."/quick-resume-step3.php";
    header("Location: $url");
}


?>
<style>
.navbar-nav > li {
        padding-bottom: 20px;
}
</style>
 <section class="inner_page_info">
<div class="container">
<div class="row profile">
    <div class="col-sm-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div id="quick-resume">
                                <h1 class="heading">Quick Resume</h1>
                                <form id="qr_fresher_first" action="" method="post">
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Technical Skills</label>
                                        <textarea class="form-control" rows="2" name="tech_skills"></textarea>
                                        <span>
                                            <ul class="list-unstyled" style="line-height: 14px;font-size: 10px;color: #383737;margin-top: 5px;">
                                                    <li>1. Screen readers will have trouble with your forms if you don't include</li>
                                                    <li>2. methods of providing a label for assistive technologies, such as the attribute. If none of these is present</li>
                                                    <li>3. as a replacement for other labelling methods is not advised.</li>
                                            </ul>
                                        </span>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Academic History : with any acheivements</label>
                                        <textarea class="form-control" rows="2" name="qr_academic_history"></textarea>
                                        <span>
                                            <ul class="list-unstyled" style="line-height: 14px;font-size: 10px;color: #383737;margin-top: 5px;">
                                                    <li>1. Screen readers will have trouble with your forms if you don't include</li>
                                                    <li>2. methods of providing a label for assistive technologies, such as the attribute. If none of these is present</li>
                                                    <li>3. as a replacement for other labelling methods is not advised.</li>
                                            </ul>
                                        </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Success Stories from your Professional career</label>
                                            <textarea class="form-control" rows="2" name="qr_exp_success_stories"></textarea>
                                            <span>
                                                <ul class="list-unstyled" style="line-height: 14px;font-size: 10px;color: ##383737;margin-top: 5px;">
                                                    <li>1. Screen readers will have trouble with your forms if you don't include</li>
                                                    <li>2. methods of providing a label for assistive technologies, such as the attribute. If none of these is present</li>
                                                    <li>3. as a replacement for other labelling methods is not advised.</li>
                                                </ul>
                                            </span>
                                        </div>
                                        <div align="center" class="form-group">
                                            <a href="quick-resume-fresher.php" class="btn btn-default-custom open2">Back</a>
                                            <input type="submit" name="submit" value="Save & Continue" class="btn btn-primary open2"/>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
      <?php require_once 'js_sidebar.php'; ?>      
    </div>
    </div>  
</div> 
</section>
<?php include_once 'footer.php'; ?>