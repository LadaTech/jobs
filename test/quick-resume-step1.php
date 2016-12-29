<?php
ob_start();
$page = 'Fresher Quick Resume';
include_once 'header.php';
include_once 'js-session-check.php';
if (isset($_POST['submit'])) {
    if(isset($_SESSION['qr_last_id'])) $qrLastId = $_SESSION['qr_last_id'];
    $count = count($_POST['project_name']);
    $fvaluesList = '';
    for ($i = 0; $i < $count; $i++) {
        if ($_POST['project_name'][$i] != '') {
            if(isset($_POST['to_date'][$i]) && $_POST['to_date'][$i] == 'on') $_POST['to_date'][$i] = '0000-00-00 11:11:11';
            $fvaluesList .= "('" . $user_info['Job_Seeker_Id'] . "','" . $qrLastId .  "','" . $_POST['project_name'][$i] . "','" . $_POST['role'][$i] . "','" . $_POST['from_date'][$i] . "','" .
                    $_POST['to_date'][$i] . "','" . $_POST['project_description'][$i] . "','" . $user_info['Job_Seeker_Id']
                    . "','" . date('Y-m-d H:i:s')
                    . "'),";
        }
    }
    $fvaluesList = substr($fvaluesList, 0, -1);
    $qry = "INSERT INTO js_projects (job_seeker_id,quick_resume_id,project_name,role_id,from_date,to_date,project_description,inserted_by,inserted_date) VALUES" .
            $fvaluesList;
    if ($fvaluesList != '')
        $db->query($qry);
    $url = $my_path . "/quick-resume-step2.php";
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
                            <form id="fresher_projects" action="" method="post">
                                <div>
                                    <h2 class="text-primary" style="margin-top: -7px;font-weight: 400;">Project(s)</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Project Name</label>
                                                <input type="" class="form-control" id="" name="project_name[]" placeholder="Project Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Role</label>
                                                <select class="form-control" name="role[]">
                                                    <option>Select Role</option>
                                                    <?php foreach ($roles as $role) { ?>
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
                                                <input type="date" class="form-control toDate" name="to_date[]" >
                                            </div>
                                            <div> <input type="checkbox" class="on_going" name="to_date[]" > On Going </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Project Description</label>
                                        <textarea class="form-control" rows="2" name="project_description[]"></textarea>
                                        <span>
                                           <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                                <li>
                                                   Tip: Mention briefly about the entire project, your role, your contribution and module. Also, do not
                                                   forget to mention the tools, technologies, platforms used and commendation/rewards, if any.
                                                </li>
                                                <li style="margin-top: 10px;">
                                                    Example: Ability to measure project performance by utilizing appropriate tools, systems and
                                                    techniques.
                                                </li>
                                            </ul>
                                        </span>
                                    </div>
                                </div>
                                <div id="add_projects"></div>

                                <div>
                                    <button type="button" class="btn btn-primary" onclick="javascript:addDiv()">Add</button>
                                </div>
                                <div align="center" class="form-group">
                                    <input type="submit" name="button" value="Back" onclick = "document.location.href='<?PHP echo $my_path ?>/quick-resume.php'" class="btn btn-primary open2"/>
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
<div id="experience">
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Project Name</label>
                    <input type="" class="form-control" id="" name="project_name[]" placeholder="Project Name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Role</label>
                    <select class="form-control" name="role[]">
                        <option>Select Role</option>
                        <?php foreach ($roles as $role) { ?>
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
                    <input type="date" class="form-control toDate" name="to_date[]" >
                </div> 
                <div> <input type="checkbox" class="on_going" name="to_date[]" > On Going </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Project Description</label>
            <textarea class="form-control" rows="2" name="project_description[]"></textarea>
            <span>
                <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                    <li>
                       Tip: Mention briefly about the entire project, your role, your contribution and module. Also, do not
                       forget to mention the tools, technologies, platforms used and commendation/rewards, if any.
                    </li>
                    <li style="margin-top: 10px;">
                        Example: Ability to measure project performance by utilizing appropriate tools, systems and
                        techniques.
                    </li>
                </ul>
            </span>
        </div>
    </div>
    <button type="button" name="btnDel_4" class="btn btn-danger btn-proj-del pull-right" ><i class='fa fa-trash-o'></i></button>    
</div>
<?php include_once 'footer.php'; ?>
<script>
$(function(){
    $('form').on('click','.on_going',function(){
        if($(this).is(":checked")){
            $(this).parents('.col-md-6').find('.toDate').attr('disabled',true);
        } else {
            $(this).parents('.col-md-6').find('.toDate').attr('disabled',false);
        }
    });
});
// Add new div    
    function addDiv() {
        $('#experience').clone().addClass("clone-proj-div").appendTo("#add_projects").fadeIn('slow');
    }
    //Remove div
    $(document).on("click", ".btn-proj-del", function () {
        var r = confirm("Do you want to delete this section");
        var num = $(".clone-proj-div").length;
        if (r == true) {
            $(this).closest(".clone-proj-div").remove();
        }
    });
</script>