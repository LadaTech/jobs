<?PHP
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
    
    //Hobbies and interests
    $hobbies = explode(",",$_POST['hobbies']);
    $fvaluesList = '';
    foreach($hobbies as $hobby){
        $fvaluesList .= "('". $hobby. "','" .$user_info['Job_Seeker_Id'] . "','" .$user_info['Job_Seeker_Id'] . "','" . $dateTime ."'),";
    }
    $fvaluesList = substr($fvaluesList,0,-1);
    $qry = "INSERT INTO js_hobbies (hobby_name,job_seeker_id,inserted_by,inserted_time) VALUES ". $fvaluesList;
    if($fvaluesList != '') $db->query($qry);
    $url = $my_path."/quick-resume-fresher-step2.php";
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
                                        <label for="exampleInputEmail1">IT Proficiency/ Technical Skills</label>
                                        <textarea class="form-control" rows="2" name="tech_skills"></textarea>
                                        <span>
                                            <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                                <li>
                                                    Tip:
                                                    <ul style="list-style: circle;line-height: 17px;">
                                                        <li>
                                                           Make sure you categorize your technical skills into familiar classifications/categories
                                                           - like programming tools, languages, operating systems, etc.
                                                        </li>
                                                        <li>
                                                            Mention how you have used those skills in your workplace/project.
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    Example
                                                    <ul style="list-style: circle;line-height: 17px;">
                                                        <li>
                                                           Tools - JBuilder, Rational Rose, Dreamweaver, UltraEdit, Oracle SQL*Plus, Borland C++Builder
                                                        </li>
                                                        <li>
                                                           Languages - Java, XML, SQL, HTML, UML, C, C++, JavaScript
                                                        </li>
                                                        <li>
                                                           If you're including skills such as Java, UML and Oracle in the skills section, describe
                                                            how you have employed each technology for your respective project.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </span>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Academic Accomplishments:</label>
                                        <textarea class="form-control" rows="2" name="qr_academic_history"></textarea>
                                        <span>
                                            <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                                <li>
                                                  Tip: Write your educational qualifications, preferably in reverse chronological order. In other
                                                  words, start off with mentioning your latest qualifications.
                                                </li>
                                                <li style="margin-top: 10px;">
                                                   Example: ABC College, XYZ University, Mumbai, Bachelor of Science June 2016
                                                   DEF School, Mumbai June 2013
                                                </li>
                                            </ul>
                                        </span>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Activities/Hobbies and Interests</label>
                                        <textarea class="form-control" rows="2" name="hobbies"></textarea>
                                        <span>
                                            <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                                <li>
                                                  Tip: Think of a few selected interests that you can add to your resume, preferably those that
                                                  are indirectly relevant to the skills required for your potential job.
                                                </li>
                                                <li style="margin-top: 10px;">
                                                   Example: Reading, Writing, Travelling, Sports, etc.
                                                </li>
                                            </ul>
                                        </span>
                                        </div>
                                        <div align="center" class="form-group">
                                            <a href="quick-resume-fresher.php" class="btn btn-primary open2">Back</a>
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