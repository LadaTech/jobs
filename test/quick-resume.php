<?php
ob_start();
$page = 'Fresher Quick Resume';
include_once 'header.php';
include_once 'js-session-check.php';
if(isset($_POST['submit'])){
//    echo "<pre>";
//    print_r($_POST);
    $count = count($_POST['company_name']);
    $fvaluesList = '';
    for($i=0;$i<$count;$i++){
        if($_POST['company_name'][$i] != ''){
            if(isset($_POST['to_date'][$i]) && $_POST['to_date'][$i] == 'on') $_POST['to_date'][$i] = '0000-00-00 11:11:11';
            $fvaluesList .= "('".$user_info['Job_Seeker_Id'] ."','".$_POST['company_name'][$i] ."','". $_POST['role'][$i] ."','". $_POST['from_date'][$i] ."','". 
                            $_POST['to_date'][$i]. "','" .$_POST['job_description'][$i] . "','". $_POST['reason_for_leaving'][$i] . "','" .$user_info['Job_Seeker_Id']
                            . "','" .date('Y-m-d H:i:s')
                            ."'),";
        }
    }
    $fvaluesList = substr($fvaluesList,0,-1);
    $qry = "INSERT INTO js_companies (job_seeker_id,company_name,role,from_date,to_date,job_description,reason_for_leaving,inserted_by,inserted_date) VALUES".
                        $fvaluesList;
    if($fvaluesList != '') $db->query($qry);
    
    //About You
    $about_you =  $_POST['about_you'];
    $jsinsert = $db->query("update job_seeker set exp_about_you='$about_you' where Job_Seeker_Id=$user_info[Job_Seeker_Id]"); 
    
    $url = $my_path."/quick-resume-step1.php";
    header("Location: $url");
}
//Roles 
$qry = "SELECT * FROM `roles`";
$roles_obj = $db->query($qry);
if ($roles_obj->rowCount() >= 1) {
    $roles = $roles_obj->fetchAll(PDO::FETCH_ASSOC);
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
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Brief About Your Experience</label>
                                    <textarea class="form-control" rows="2" name="about_you"></textarea>
                                </div>
                                <div>
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
                                            <ul class="list-unstyled" style="line-height: 14px;font-size: 10px;color: #383737;margin-top: 5px;">
                                                <li>1. Screen readers will have trouble with your forms if you don't include</li>
                                                <li>2. methods of providing a label for assistive technologies, such as the attribute. If none of these is present</li>
                                                <li>3. as a replacement for other labelling methods is not advised.</li>
                                            </ul>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                    <label for="">Reason for Leaving</label>
                                    <textarea class="form-control" rows="2" name="reason_for_leaving[]"></textarea>
                                    <span>
                                        <ul class="list-unstyled" style="line-height: 14px;font-size: 10px;color: #383737;margin-top: 5px;">
                                            <li>1. Screen readers will have trouble with your forms if you don't include</li>
                                            <li>2. methods of providing a label for assistive technologies, such as the attribute. If none of these is present</li>
                                            <li>3. as a replacement for other labelling methods is not advised.</li>
                                        </ul>
                                    </span>
                                    </div>
                                </div>
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
            <ul class="list-unstyled" style="line-height: 14px;font-size: 10px;color: #383737;margin-top: 5px;">
                <li>1. Screen readers will have trouble with your forms if you don't include</li>
                <li>2. methods of providing a label for assistive technologies, such as the attribute. If none of these is present</li>
                <li>3. as a replacement for other labelling methods is not advised.</li>
            </ul>
        </span>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Reason for Leaving</label>
        <textarea class="form-control" rows="2" name="reason_for_leaving[]"></textarea>
        <span>
            <ul class="list-unstyled" style="line-height: 14px;font-size: 10px;color: #383737;margin-top: 5px;">
                <li>1. Screen readers will have trouble with your forms if you don't include</li>
                <li>2. methods of providing a label for assistive technologies, such as the attribute. If none of these is present</li>
                <li>3. as a replacement for other labelling methods is not advised.</li>
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