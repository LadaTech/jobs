<?php
ob_start();
$page = 'Fresher Quick Resume';
include_once 'header.php';
include_once 'js-session-check.php';

if(isset($_POST['submit'])){
    echo "<pre>";
    $dateTime = date('Y-m-d H:i:s');
    if(isset($_SESSION['qr_last_id'])) $qrLastId = $_SESSION['qr_last_id'];
    
    if($_POST['qr_id'] > 0){
        $qrLastId = $_POST['qr_id'];
        $sql_dom = "delete FROM js_skills where quick_resume_id = '$qrLastId' ";
        $db->query($sql_dom);
        $sql_dom = "delete FROM js_accomplishments where quick_resume_id = '$qrLastId' ";
        $db->query($sql_dom);
       
    }
    
    //Technical Skills
    $techSkills = explode(",",$_POST['tech_skills']);
    $fvaluesList = '';
    foreach($techSkills as $skill){
        if($skill != ''){
            $fvaluesList .= "('". $skill. "','" .$qrLastId . "','" .$user_info['Job_Seeker_Id'] . "','" .$user_info['Job_Seeker_Id'] . "','" . $dateTime ."'),";
        }
    }
    $fvaluesList = substr($fvaluesList,0,-1);
    $qry = "INSERT INTO js_skills (skill_title,quick_resume_id,job_seeker_id,inserted_by,inserted_date) VALUES ". $fvaluesList;
    if($fvaluesList != '') $db->query($qry);
    
    //Academic history
    if($_POST['qr_academic_history'] != ''){
        $qr_academic_history = $_POST['qr_academic_history'];
        $qry = "INSERT INTO js_accomplishments (quick_resume_id,accomplishment_name,job_seeker_id,inserted_by,inserted_time)"
                        . " VALUES ('$qrLastId','$qr_academic_history','$user_info[Job_Seeker_Id]','$user_info[Job_Seeker_Id]','$dateTime' )";
         $db->query($qry);
    }
    //Success Stories in professional career
    if($_POST['success_stories'] != ''){
        $qr_exp_success_stories =  $_POST['success_stories'];
        $jsinsert = $db->query("update quick_resumes set success_stories='$qr_exp_success_stories' where quick_resume_id=$qrLastId"); 
    }
    
    $url = $my_path."/quick-resume-step3.php";
    header("Location: $url");
}


//Get Skills, Accomplishments, hobbies
if(isset($_SESSION['qr_last_id']) && $_SESSION['qr_last_id'] > 0){
    $qrLastId = $_SESSION['qr_last_id'];
    // Academic history
    $qry = "select js_accomplishments_id, accomplishment_name from  js_accomplishments where quick_resume_id = '$qrLastId' order by inserted_time desc limit 1";
    $academic_history_obj = $db->query($qry);
    if ($academic_history_obj->rowCount() == 1) {
        $academic_history = $academic_history_obj->fetch(PDO::FETCH_ASSOC);
    }
    //print_r($academic_history);
    //Technical Skills
    $qry = "SELECT js_skills_id,GROUP_CONCAT(skill_title) as skills FROM `js_skills` where quick_resume_id = $qrLastId group by inserted_date order by inserted_date DESC limit 1";
    $technical_skills_obj = $db->query($qry);
    if ($technical_skills_obj->rowCount() == 1) {
        $technical_skills = $technical_skills_obj->fetch(PDO::FETCH_ASSOC);
    }
    //print_r($technical_skills);
    //Hobbies
    $qry = "SELECT success_stories FROM quick_resumes where quick_resume_id = $qrLastId";
    $qr_data_obj = $db->query($qry);
    if ($qr_data_obj->rowCount() == 1) {
        $qr_data = $qr_data_obj->fetch(PDO::FETCH_ASSOC);
    }
    //print_r($qr_data);
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
                                    <input type="hidden" name="qr_id" value="<?php echo $qrLastId; ?>" />
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Technical Skills and Certifications</label>
                                        <textarea class="form-control" rows="2" name="tech_skills"><?php echo $technical_skills['skills']; ?></textarea>
                                        <span>
                                            <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                                <li>
                                                   Tip: Adding certifications to your resume puts you a step ahead of your peers, besides helping you
                                                   negotiate your salary.
                                                </li>
                                                <li style="margin-top: 10px;">
                                                   Example: Oracle Fusion Customer Relationship Management 11g Presales Specialist
                                                </li>
                                            </ul>
                                        </span>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Academic Accomplishments:</label>
                                        <textarea class="form-control" rows="2" name="qr_academic_history"><?php echo $academic_history['accomplishment_name']; ?></textarea>
                                        <span>
                                            <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                                <li>
                                                    Tip:
                                                    <ul style="list-style: circle;line-height: 17px;">
                                                        <li>
                                                            Write your educational qualifications, preferably in reverse chronological order. In other
                                                        </li>
                                                        <li>
                                                            words, start off with mentioning your latest qualifications.
                                                        </li>
                                                        <li>
                                                            Mentioning about your achievements clearly shows that you were indeed a brilliant student- this reflects your pro-activeness.
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li style="margin-top: 10px;">
                                                   Example: Increased sales considerably by $7,000 during an internship project by dealing with customers in
                                                </li>
                                            </ul>
                                        </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Career Success Stories:</label>
                                            <textarea class="form-control" rows="2" name="success_stories"><?php echo $qr_data['success_stories']; ?></textarea>
                                            <span>
                                                <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                                    <li>
                                                       Tip: Success stories go a long way in drawing the needed attention to your resume. Try to come with
                                                       a story that briefly summarizes your accomplishments, abilities, skills, expertise, characteristics,
                                                       personal traits and values.
                                                    </li>
                                                    <li style="margin-top: 10px;">
                                                       Example: I am a problem solver and often called the dependable one, thanks to my exceptional
                                                       problem-solving skills.
                                                    </li>
                                                </ul>
                                            </span>
                                        </div>
                                        <div align="center" class="form-group">
                                            <a href="quick-resume-step1.php" class="btn btn-primary open2">Back</a>
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