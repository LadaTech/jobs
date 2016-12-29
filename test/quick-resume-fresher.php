<?php
ob_start();
$page = 'Fresher Quick Resume';
include_once 'header.php';
include_once 'js-session-check.php';
if (isset($_POST['submit'])) {
    $count = count($_POST['project_name']);
    $fvaluesList = '';
    for ($i = 0; $i < $count; $i++) {
        if ($_POST['project_name'][$i] != '') {
            if (isset($_POST['to_date'][$i]) && $_POST['to_date'][$i] == 'on')
                $_POST['to_date'][$i] = '0000-00-00 11:11:11';
            $fvaluesList .= "('" . $user_info['Job_Seeker_Id'] . "','" . $_POST['project_name'][$i] . "','" . $_POST['team_size'][$i] . "','" . $_POST['from_date'][$i] . "','" .
                    $_POST['to_date'][$i] . "','" . $_POST['project_description'][$i] . "','" . $user_info['Job_Seeker_Id']
                    . "','" . date('Y-m-d H:i:s')
                    . "'),";
        }
    }
    $fvaluesList = substr($fvaluesList, 0, -1);
    $qry = "INSERT INTO js_projects (job_seeker_id,project_name,team_size,from_date,to_date,project_description,inserted_by,inserted_date) VALUES" .
            $fvaluesList;
    if ($fvaluesList != '')
        $db->query($qry);
    $url = $my_path . "/quick-resume-fresher-step1.php";
    header("Location: $url");
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
                                <div style="text-align: center" class="form-group">
                                    <label class="radio-inline" style="margin-right: 30px;">
                                        <input type="radio" name="fresher" id="profileType"  value="fresher" checked> Fresher
                                    </label>
                                    <label class="radio-inline" style="margin-right: 30px;">
                                        <input type="radio" name="experience" id="profileType"  onclick = "document.location.href = '<?PHP echo $my_path ?>/quick-resume.php'" value="experience" > Experience
                                    </label>

                                </div>
                                <div>
                                    <h2 class="text-primary" style="margin-top: -7px;font-weight: 400;">Name of your Project:</h2>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Brief About your Self</label>
                                        <textarea class="form-control" rows="2" name="about_you"></textarea>
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Project Name</label>
                                                <input type="text" required="true" class="form-control" id="" name="project_name[]" placeholder="Project Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Team Size</label>
                                                <input type="text" class="form-control" required="true" type="team-size" name="team_size[]" placeholder="Team Size"> 
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">From</label>
                                                <input required="true" type="date" class="form-control" name="from_date[]" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Due</label>
                                                <input type="date" class="form-control toDate" name="to_date[]">
                                            </div> 
                                            <div> <input type="checkbox" class="on_going" id="till_date[]" name="to_date[]" > On Going </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Project Description</label>
                                        <textarea class="form-control" required="true" rows="2" name="project_description[]"></textarea>
                                        <span>
                                            <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                                <li>
                                                    Tip:
                                                    <ul style="list-style: circle;line-height: 17px;">
                                                        <li>
                                                            If you're a fresher, it is imperative that you show your projects, assignments
                                                            undertaken at the time of internship.
                                                        </li>
                                                        <li>
                                                            Mention briefly about the entire project, your role, your contribution and module.
                                                            Also, don't forget to mention the tools, technologies, platforms used and
                                                            commendation/rewards, if any.
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li style="margin-top: 10px;">
                                                    For example : if you have worked on mobile text messaging, you can mention like this -A mobile app for sending across text messages on various mobile devices. You
                                                    could mention the technology that you have used - like J2ME and J2me Wireless Toolkit (in this case).
                                                </li>
                                            </ul>
                                        </span>
                                    </div>
                                </div>
                                <div id="add_projects"></div>

                                <div>
                                    <button type="button" class="btn btn-primary" onclick="javascript:addDiv()">Add</button>
                                    <!--<button type="button" class="btn btn-default-custom open2" onclick="removeDiv()">Delete</button>-->
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
                    <label>Team Size</label>
                    <input class="form-control" type="team-size" name="team_size[]" placeholder="Team Size"> 
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
                <div> <input type="checkbox" class="on_going"   name="to_date[]"> On Going </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Project Description</label>
            <textarea class="form-control" rows="2" name="project_description[]"></textarea>
            <span>
                <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                    <li>
                        Tip:
                        <ul style="list-style: circle;line-height: 17px;">
                            <li>
                                If you're a fresher, it is imperative that you show your projects, assignments
                                undertaken at the time of internship.
                            </li>
                            <li>
                                Mention briefly about the entire project, your role, your contribution and module.
                                Also, don't forget to mention the tools, technologies, platforms used and
                                commendation/rewards, if any.
                            </li>
                        </ul>
                    </li>
                    <li style="margin-top: 10px;">
                        For example : if you have worked on mobile text messaging, you can mention like this -A mobile app for sending across text messages on various mobile devices. You
                        could mention the technology that you have used - like J2ME and J2me Wireless Toolkit (in this case).
                    </li>
                </ul>
            </span>
        </div>
    </div>
    <button type="button" name="btnDel_4" class="btn btn-danger btn-proj-del pull-right" ><i class='fa fa-trash-o'></i></button> 
</div>
<?php include_once 'footer.php'; ?>
<script>

    $(function () {
        $('form').on('click', '.on_going', function () {
            if ($(this).is(":checked")) {
                $(this).parents('.col-md-6').find('.toDate').attr('disabled', true);
            } else {
                $(this).parents('.col-md-6').find('.toDate').attr('disabled', false);
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