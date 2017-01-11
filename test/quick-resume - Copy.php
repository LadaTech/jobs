<?php
ob_start();
$page = 'Fresher Quick Resume';
include_once 'header.php';
include_once 'js-session-check.php';
if(isset($_POST['submit'])){
//    echo "<pre>";
//    print_r($_POST);
    $jobSeekerId = $user_info['Job_Seeker_Id'];
    $about_you = $_POST['about_you'];
    if($_POST['qr_id'] > 0){
        $qrLastId = $_POST['qr_id'];
        //Delete all records in js_projects
        $sql_dom = "delete FROM js_companies where quick_resume_id = '$qrLastId' ";
        $db->query($sql_dom);
    } else { 
        $resumeType = 'qr_exp';
        $dateTime = date('Y-m-d H:i:s');
        $qry = "INSERT INTO quick_resumes (job_seeker_id,resume_type,about_you,inserted_date) VALUES"
                . "('$jobSeekerId','$resumeType','$about_you','$dateTime')";
        $db->query($qry);
        $_SESSION['qr_last_id'] = $qrLastId = $db->lastinsertid();
    }
    
    //Companies
    $count = count($_POST['company_name']);
    $fvaluesList = '';
    for($i=0;$i<$count;$i++){
        if($_POST['company_name'][$i] != ''){
            if(isset($_POST['to_date'][$i]) && $_POST['to_date'][$i] == 'on') $_POST['to_date'][$i] = '0000-00-11';
            $fvaluesList .= "('".$jobSeekerId ."','". $qrLastId . "','".$_POST['company_name'][$i] ."','". $_POST['role'][$i] ."','". $_POST['from_date'][$i] ."','". 
                            $_POST['to_date'][$i]. "','" .$_POST['job_description'][$i] . "','". $_POST['reason_for_leaving'][$i] . "','" .$jobSeekerId
                            . "','" .$dateTime
                            ."'),";
        }
    }
    $fvaluesList = substr($fvaluesList,0,-1);
    $qry = "INSERT INTO js_companies (job_seeker_id,quick_resume_id,company_name,role_id,from_date,to_date,job_description,reason_for_leaving,inserted_by,inserted_date) VALUES".
                        $fvaluesList;
    if($fvaluesList != '') $db->query($qry);
    
    $url = $my_path."/quick-resume-step1.php";
    header("Location: $url");
}
//Roles 
$qry = "SELECT * FROM `roles`";
$roles_obj = $db->query($qry);
if ($roles_obj->rowCount() >= 1) {
    $roles = $roles_obj->fetchAll(PDO::FETCH_ASSOC);
} 
//Get Companies
if(isset($_GET['qr_last_id'])) $_SESSION['qr_last_id'] =  $_GET['qr_last_id'];
if(isset($_SESSION['qr_last_id']) && $_SESSION['qr_last_id'] > 0){
    $qrLastId = $_SESSION['qr_last_id'];
    $qry = "select * from js_companies where quick_resume_id = '$qrLastId'";
    $companies_obj = $db->query($qry);
    if ($companies_obj->rowCount() >= 1) {
        $companies = $companies_obj->fetchAll(PDO::FETCH_ASSOC);
    }
    $qry = "select about_you from quick_resumes where quick_resume_id = '$qrLastId'";
    $qr_data_obj = $db->query($qry);
    if ($qr_data_obj->rowCount() >= 1) {
        $qr_data = $qr_data_obj->fetchAll(PDO::FETCH_ASSOC);
    }
    $qr_data = $qr_data[0];
}

?>
<style>
    .navbar-nav>li {
        padding-bottom: 20px;
    }
    #experience {
        display: none;
    }
</style>
<section class="inner_page_info">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="quick-resume">
                            <h1 class="heading">Quick Resume</h1>
                            <form id="qr_experience" method="post" action="">
                                <input type="hidden" name="qr_id" value="<?php echo $qrLastId; ?>" />
                                <div style="text-align: center" class="form-group">
                                    <label class="radio-inline" style="margin-right: 30px;">
                                        <input type="radio" name="fresher" id="fresher" onclick = "document.location.href='<?PHP echo $my_path ?>/quick-resume-fresher.php'" value="fresher"> Fresher
                                     </label>
                                    <label class="radio-inline" style="margin-right: 30px;">
                                        <input type="radio" name="experience" id="" value="experience" checked> Experience
                                     </label>
                                    
                                 </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brief Summary of Experience</label>
                                    <textarea class="form-control" rows="2" name="about_you"><?php echo $qr_data['about_you']; ?></textarea>
                                    <span>
                                        <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                            <li>
                                               Tip: Your experience description must be precise, concise yet descriptive. The goal is to let your
                                                prospective employer know your responsibilities, the skills you have developed over the years, your
                                                key strengths and achievements.
                                            </li>
                                            <li style="margin-top: 10px;">
                                                Example: An effective, highly organized, confident professional with a passion to accomplish
                                                assigned projects while staying calm yet productive under pressure.
                                            </li>
                                        </ul>
                                    </span>
                                </div>
                                
                                <?php  if(!empty($companies)) { ?>
                                <?php foreach($companies as $company){ 
                                            $to_date = ($company['to_date'] == '0000-00-11') ? 'checked' : $company['to_date'];
                                        ?>
                                <div class="single_block">
                                    <h3 class="text-primary" style="font-weight: 400;">Companies Worked with Duration With Reason for leaving from each company</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Company Name</label>
                                                <input type="text" value="<?php echo $company['company_name']; ?>" class="form-control" id="" name="company_name[]" placeholder="Company Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Role</label>
                                                <select class="form-control" name="role[]">
                                                    <option>Select Role</option>
                                                    <?php foreach($roles as $role) { ?>
                                                    <option <?php echo ($role['role_id'] == $company['role_id']) ? 'selected':''; ?>  value="<?php echo $role['role_id']; ?>"> <?php echo $role['role_name']; ?></option>
                                                    <?php } ?>
                                                </select> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="">From</label>
                                                <input type="date" value="<?php echo $company['from_date']; ?>" class="form-control" name="from_date[]" >
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Due</label>
                                                <input type="date" <?php echo ($to_date != 'checked') ? "value='$to_date'" : 'disabled'; ?> class="form-control toDate" name="to_date[]">
                                            </div> 
                                            <div> <input type="checkbox" <?php echo ($to_date == 'checked') ? 'checked' : ''; ?> class="till_date" name="to_date[]" > Till Date </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Job Description</label>
                                        <textarea class="form-control" rows="2" name="job_description[]"><?php echo $company['job_description']; ?></textarea>
                                        <span>
                                            <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                                <li>
                                                   Tip: Enlist your achievements; write impactful statements that highlight your skills and
                                                   accomplishments.
                                                </li>
                                                <li style="margin-top: 10px;">
                                                    Example: Used strong interpersonal skills to serve customers in dealing with their concerns
                                                    effectively; received employee of the month award twice for performance excellence.
                                                </li>
                                            </ul>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                    <label for="">Reason for Job Change</label>
                                    <textarea class="form-control" rows="2" name="reason_for_leaving[]"><?php echo $company['reason_for_leaving']; ?></textarea>
                                    <span>
                                        <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                            <li>
                                               Tip: Never talk negatively about your previous company, always be positive. You can mention that
                                               your idea is to move towards companies that give you a chance to grow big and reward you
                                               accordingly for the extra efforts.
                                            </li>
                                            <li style="margin-top: 10px;">
                                                Example: I wish to explore various technologies and take my career to the next level. I see a great
                                                opportunity in XYZ company and hence would like to prove myself.
                                            </li>
                                        </ul>
                                    </span>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php  } else { ?>
                                <div class="single_block">
                                    <h3 class="text-primary" style="font-weight: 400;">Companies Worked with Duration With Reason for leaving from each company</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Company Name</label>
                                                <input type="" class="form-control" id="" name="company_name[]" placeholder="Company Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Role</label>
                                                <select class="form-control" name="role[]">
                                                    <option>Select Role</option>
                                                    <?php foreach($roles as $role) { ?>
                                                    <option  value="<?php echo $role['role_id']; ?>"> <?php echo $role['role_name']; ?></option>
                                                    <?php } ?>
                                                </select> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="">From</label>
                                                <input type="date" class="form-control" name="from_date[]" >
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Due</label>
                                                <input type="date" class="form-control toDate" name="to_date[]">
                                            </div> 
                                            <div> <input type="checkbox" class="till_date" name="to_date[]" > Till Date </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Job Description</label>
                                        <textarea class="form-control" rows="2" name="job_description[]"></textarea>
                                        <span>
                                            <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                                <li>
                                                   Tip: Enlist your achievements; write impactful statements that highlight your skills and
                                                   accomplishments.
                                                </li>
                                                <li style="margin-top: 10px;">
                                                    Example: Used strong interpersonal skills to serve customers in dealing with their concerns
                                                    effectively; received employee of the month award twice for performance excellence.
                                                </li>
                                            </ul>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                    <label for="">Reason for Job Change</label>
                                    <textarea class="form-control" rows="2" name="reason_for_leaving[]"></textarea>
                                    <span>
                                        <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                            <li>
                                               Tip: Never talk negatively about your previous company, always be positive. You can mention that
                                               your idea is to move towards companies that give you a chance to grow big and reward you
                                               accordingly for the extra efforts.
                                            </li>
                                            <li style="margin-top: 10px;">
                                                Example: I wish to explore various technologies and take my career to the next level. I see a great
                                                opportunity in XYZ company and hence would like to prove myself.
                                            </li>
                                        </ul>
                                    </span>
                                    </div>
                                </div>
                                <?php } ?>
                                
                                <div id="add_companies"></div>
                                
                            <div>
                                <button type="button" class="btn btn-primary" onclick="javascript:addDiv()">Add</button>
                            </div>
                            <div align="center" class="form-group">
                                <input type="submit" name="submit" value="Save & Continue" class="btn btn-primary open2"/>
                            </div>
                            </form>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
            </div>
    <div class="col-sm-4">
        <?php require_once 'js_sidebar.php'; ?>      
    </div>
</div>
</div>
</section>
<!-- Refernce copy -->
<div id="experience">
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Company Name</label>
                <input type="" class="form-control" id="" name="company_name[]" placeholder="Company Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Role</label>
                <select class="form-control" name="role[]">
                    <option>Select Role</option>
                    <?php foreach($roles as $role) { ?>
                    <option  value="<?php echo $role['role_id']; ?>"> <?php echo $role['role_name']; ?></option>
                    <?php } ?>
                </select> 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">From</label>
                <input type="date" class="form-control" name="from_date[]">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Due</label>
                <input type="date" class="form-control toDate" name="to_date[]">
            </div> 
            <div> <input type="checkbox" class="till_date" name="to_date[]" > Till Date </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Job Description</label>
        <textarea class="form-control" rows="2" name="job_description[]"></textarea>
        <span>
            <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                <li>
                   Tip: Enlist your achievements; write impactful statements that highlight your skills and
                   accomplishments.
                </li>
                <li style="margin-top: 10px;">
                    Example: Used strong interpersonal skills to serve customers in dealing with their concerns
                    effectively; received employee of the month award twice for performance excellence.
                </li>
            </ul>
        </span>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Reason for Leaving</label>
        <textarea class="form-control" rows="2" name="reason_for_leaving[]"></textarea>
        <span>
            <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                <li>
                   Tip: Never talk negatively about your previous company, always be positive. You can mention that
                   your idea is to move towards companies that give you a chance to grow big and reward you
                   accordingly for the extra efforts.
                </li>
                <li style="margin-top: 10px;">
                    Example: I wish to explore various technologies and take my career to the next level. I see a great
                    opportunity in XYZ company and hence would like to prove myself.
                </li>
            </ul>
        </span>
    </div>
</div>
    <button type="button" name="btnDel_4" class="btn btn-danger btn-comp-del pull-right" ><i class='fa fa-trash-o'></i></button>
</div>
<?php include_once 'footer.php'; ?>

<script>
$(function(){
    $('form').on('click','.till_date',function(){
        if($(this).is(":checked")){
            $(this).parents('.col-md-6').find('.toDate').attr('disabled',true);
        } else {
            $(this).parents('.col-md-6').find('.toDate').attr('disabled',false);
        }
    });
});
    
// Add new div
function addDiv() {
    $('#experience').clone().addClass("clone-comp-div").appendTo("#add_companies").fadeIn('slow');
}

//Remove div
$(document).on("click",".btn-comp-del",function(){
    var r = confirm("Do you want to delete this section");
    var num=$(".clone-comp-div").length;
    if (r == true) {
        $(this).closest(".clone-comp-div").remove();
    }
});
</script>