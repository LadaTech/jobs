<?php
ob_start();
$page = 'Fresher Quick Resume';
include_once 'header.php';
include_once 'js-session-check.php';

if($_SESSION['qr_last_id'] != '') $_SESSION['vh_qr_last_id'] = $_SESSION['qr_last_id'];

//Unset qr_last_id from session
if(isset($_SESSION['qr_last_id'])) {
    $_SESSION['qr_last_id'] = '';
}


// If qr_last_id is not set, redirect to dashboard
if(!isset($_SESSION['vh_qr_last_id']) || $_SESSION['vh_qr_last_id'] == ''){
    $url = $my_path. "/job-seeker/dashboard.aspx";
    header("Location: $url");
}
if(isset($_POST['submit1'])){
    $qrFileName = $_POST['qrFileName'];
    $quickResumeId = $_POST['quickResumeId'];
    $quickResumeType = 'qr_fresher';
    $qry = "INSERT INTO  js_my_resumes (jsid,selected_template,quick_resume_id,quick_resume_type,qr_file_name,status) "
            . "VALUES('$user_info[Job_Seeker_Id]','$selected_template','$quickResumeId','$quickResumeType','$qrFileName','Saved')";
    $db->query($qry) or die(mysql_error());
    $myResumeId = $db->lastinsertid();
    
    //Unset vh_qr_last_id from session
    if(isset($_SESSION['vh_qr_last_id'])) $_SESSION['vh_qr_last_id'] = '';
    
    //Product Info
    $orderInfo = array();
    $orderInfo['item_number'] = $myResumeId;
    $orderInfo['item_name'] = '0';
    $orderInfo['jsid'] = $user_info['Job_Seeker_Id'];
    $orderInfo['rtype'] = $quickResumeType;
    include_once 'library/ccavenue_gateway/CCAvenue.php';
    $ccpayObj = new CCAvenue();
    $formData['tid'] = date('YmdHis');
    $formData['order_id'] = date('YmdHis');
    $formData['merchant_param1'] = str_replace(array('&', '='), array('|', ','), http_build_query($orderInfo));
    $formData['order_id'] = date('YmdHis');
    $formData['amount'] = $_POST['price'] = $default_price;
    $formData['redirect_url'] = $my_path . '/js-payment-success.php';
    $formData['cancel_url'] = $my_path . '/js-payment-failure.php';
    $ccpayObj->request($formData);
}
//echo "<pre>";
//Personal info
$job_seeker_id = $user_info["Job_Seeker_Id"];
if(isset($_SESSION['vh_qr_last_id'])) $qrLastId = $_SESSION['vh_qr_last_id'];
$qry = "SELECT js.First_name,js.Last_name,js.Email_id,js.Phone_No,js.profile_pic,qr.* FROM `job_seeker` js LEFT JOIN quick_resumes qr "
        . "ON js.Job_Seeker_Id = qr.job_seeker_id where qr.job_seeker_id = '$job_seeker_id' and qr.quick_resume_id = '$qrLastId'";
$personal_info_obj = $db->query($qry);
if ($personal_info_obj->rowCount() == 1) {
    $personal_info = $personal_info_obj->fetchAll(PDO::FETCH_ASSOC);
}
$personal_info = $personal_info['0'];
//print_r($personal_info);

// Academic history
$qry = "select 	js_accomplishments_id,	accomplishment_name from  js_accomplishments where quick_resume_id= '$qrLastId' order by inserted_time desc limit 1";
$academic_history_obj = $db->query($qry);
if ($academic_history_obj->rowCount() == 1) {
    $academic_history = $academic_history_obj->fetch(PDO::FETCH_ASSOC);
}
//print_r($academic_history);
//Technical Skills
$qry = "SELECT js_skills_id,GROUP_CONCAT(skill_title) as skills FROM `js_skills` where quick_resume_id= '$qrLastId' group by inserted_date order by inserted_date DESC limit 1";
$technical_skills_obj = $db->query($qry);
if ($technical_skills_obj->rowCount() == 1) {
    $technical_skills = $technical_skills_obj->fetch(PDO::FETCH_ASSOC);
}
//print_r($technical_skills);
//Hobbies
$qry = "SELECT js_hobbies_id,GROUP_CONCAT(hobby_name) as hobbies FROM `js_hobbies` where quick_resume_id= '$qrLastId' group by inserted_time order by inserted_time DESC limit 1";
$hobbies_obj = $db->query($qry);
if ($hobbies_obj->rowCount() == 1) {
    $hobbies = $hobbies_obj->fetch(PDO::FETCH_ASSOC);
}
//print_r($hobbies);

//Projects
$qry = "SELECT * FROM `js_projects` where quick_resume_id= '$qrLastId'  order by inserted_date DESC";
$projects_obj = $db->query($qry);
if ($projects_obj->rowCount() >= 1) {
    $projects = $projects_obj->fetchAll(PDO::FETCH_ASSOC);
}
//print_r($projects);
//echo "</pre>";
$qrFileName = $job_seeker_id .'_'. $qrLastId .'.txt';

?>
<style>
    h3{
        font-weight: bold;
    }
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<body style="font-family: 'Oswald', sans-serif;">
    <div class="col-md-6 col-md-offset-7">
        <div class="form-group">
            <a class="btn btn-primary open2" style="float:left;" href="<?php echo $my_path; ?>/quick-resume-fresher.php?qr_last_id=<?php echo $qrLastId; ?>">Edit</a>
            <form id="qr_pay_form" action="<?php echo $my_path;?>/view-resume-fresher.php" method="post">
                <input type="hidden" name="quickResumeId" value="<?php echo $qrLastId; ?>" />
                <input type="hidden" name="qrFileName" value="<?php echo $qrFileName; ?>" />
                <input type="submit" id="qr_pay_form_btn"  style="margin-left:10px;" name="submit1" value="Pay & Download" class=" qr_pay_form_cls btn btn-primary open2"/>
            </form>
        </div>
    </div>
    <div id="qr_fresher">
    <table align="center" cellpadding="0" cellspacing="0" style="min-height: 400px;border: 1px solid #ccc;border-radius: 3px;width: 630px;">
        <tr>
            <td style="vertical-align: top;">
                <table cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tr>
                        <td style="vertical-align: top;height: 20px;">
                            <div style="width: 100%;height: 20px;background: rgb(228, 143, 26);"></div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top">
                            <table style="padding-right: 10px;padding-left: 10px;padding-top: 10px;">
                                <tr>
                                    <td style="vertical-align: top;width: 480px;">
                                        <div>
                                            <h3 style="margin-top: 0;margin-bottom: 5px;font-size: 30px;font-weight: 300;"><?php echo $personal_info['First_name'] . " " . $personal_info['Last_name']; ?></h3>
                                            <label style="color: #e48f1a;font-size: 15px;">WEB DEVLOPER</label>
                                        </div>
                                        <div style="margin-top: 20px;">
                                            <table style="width: 100%">
                                                <tr>
                                                    <td style="vertical-align: top;width: 50%">
                                                        <div>
                                                            <label style="font-weight: 300;font-size: 13px;color: #000;"><i class="fa fa-phone" style="margin-right: 5px;color: #e48f1a"></i><?php echo $personal_info['Phone_No']; ?></label><br/>
                                                            <label style="font-weight: 300;font-size: 13px;color: #000;"><i class="fa fa-envelope-o" style="margin-right: 5px;color: #e48f1a"></i><?php echo $personal_info['Email_id']; ?></label>
                                                        </div>
                                                    </td>
                                                    <td style="vertical-align: top;width: 50%">
                                                        <table>
                                                            <tr>
                                                                <td style="vertical-align: top"><i class="fa fa-home" style="color: #e48f1a"></i></td>
                                                                <td style="vertical-align: top">
                                                                    <p style="font-weight: 500;color: #000;margin-bottom: 0px;font-size: 12px;margin-top: 0px;padding-top: 0px;line-height: 19px;">
                                                                        <?php echo $personal_info['address']; ?>
                                                                    </p>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                    <td style="width: 150px;vertical-align: top;">
                                        <img src="<?php echo $my_path."/images/jobseeker/".$personal_info['profile_pic']; ?>" style="border: 1px solid #ccc;border-radius: 50%;width: 140px;height: 140px;">
                                    </td>
                                </tr>
                            </table>
                            <table cellpadding="0" cellspacing="0" style="margin-top: 20px;width: 100%;padding-left: 10px;padding-right: 10px;">
                                <tr>
                                    <td align="right" style="width: 200px;vertical-align: top;border-right: 2px solid #e48f1a;padding-right: 10px;">
                                        <h3 style="margin-top: 0px;font-size: 15px;margin-bottom: 0px;font-style: italic;">Academic History </h3>
                                    </td>
                                    <td align="left" style="width: 800px;vertical-align: top;padding-left: 10px;">
                                        <p style="font-size: 12px;line-height: 18px;margin-top: 10px;color: #8e8e8e;    letter-spacing: 0.5px;margin-top: 0px;margin-bottom: 0px;padding-bottom: 20PX;">
                                            <?php echo $academic_history['accomplishment_name']; ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="width: 200px;vertical-align: top;border-right: 2px solid #e48f1a;padding-right: 10px;">
                                        <h3 style="margin-top: 0px;font-size: 15px;margin-bottom: 0px;font-style: italic;">Skills</h3>
                                    </td>
                                    <td align="left" style="width: 800px;vertical-align: top;padding-left: 10px;">
                                        <p style="font-size: 12px;line-height: 18px;margin-top: 10px;color: #8e8e8e;    letter-spacing: 0.5px;margin-top: 0px;margin-bottom: 0px;padding-bottom: 20PX;">
                                            <?php echo $technical_skills['skills']; ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="width: 200px;vertical-align: top;border-right: 2px solid #e48f1a;padding-right: 10px;">
                                        <h3 style="margin-top: 0px;font-size: 15px;margin-bottom: 0px;font-style: italic;">Projects</h3>
                                    </td>
                                    <td align="left" style="width: 800px;vertical-align: top;padding-left: 10px;">
                                            <?php foreach ($projects as $project) { 
                                                $to_date = ($project['to_date'] == '0000-00-11') ? 'On Going' : date('M Y', strtotime($project['to_date']));
                                                ?>
                                            <div style="margin-bottom: 15px;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td style="vertical-align: top;">
                                                            <h2 style="    font-size: 16px;color: #444343;margin-top: 0px;margin-bottom: 3px;"><?php echo $project['project_name']; ?></h2>
                                                            <label style="color: #e48f1a;margin-top: 3px;font-weight: 600;font-size: 13px;"><?php echo $project['team_size']; ?> Members Team</label>
                                                        </td>
                                                        <td align="right" style="width: 200px;vertical-align: top;">
                                                            <label style="font-size: 11px;font-weight: normal;"><?php echo date('M Y', strtotime($project['from_date'])) . " to " . $to_date; ?></label>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table>
                                                    <tr style="width: 100%;">
                                                        <td>
                                                            <p style="margin-top: 0px;font-size: 12px;line-height: 18px;color: #8e8e8e;margin-bottom: 0px;">
                                                                <?php echo $project['project_description']; ?>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                                            <?php } ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="width: 200px;vertical-align: top;border-right: 2px solid #e48f1a;padding-right: 10px;">
                                        <h3 style="margin-top: 0px;font-size: 15px;margin-bottom: 0px;font-style: italic;">Hobbies & Interests</h3>
                                    </td>
                                    <td align="left" style="width: 800px;vertical-align: top;padding-left: 10px;">
                                        <p style="font-size: 12px;line-height: 18px;margin-top: 20px;color: #8e8e8e;    letter-spacing: 0.5px;margin-top: 0px;margin-bottom: 0px;padding-bottom: 20PX;">
                                            <?php echo $hobbies['hobbies']; ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="width: 200px;vertical-align: top;border-right: 2px solid #e48f1a;padding-right: 10px;">
                                        <h3 style="margin-top: 0px;font-size: 15px;margin-bottom: 0px;font-style: italic;">Expectations</h3>
                                    </td>
                                    <td align="left" style="width: 800px;vertical-align: top;padding-left: 10px;">
                                        <p style="font-size: 12px;line-height: 18px;margin-top: 20px;color: #8e8e8e;    letter-spacing: 0.5px;margin-top: 0px;margin-bottom: 0px;padding-bottom: 20PX;">
                                            <?php echo $personal_info['expecting_comp']; ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="width: 200px;vertical-align: top;border-right: 2px solid #e48f1a;padding-right: 10px;">
                                        <h3 style="margin-top: 0px;font-size: 15px;margin-bottom: 0px;font-style: italic;">Any Offers In Hand?</h3>
                                    </td>
                                    <td align="left" style="width: 800px;vertical-align: top;padding-left: 10px;">
                                        <p style="font-size: 12px;line-height: 18px;margin-top: 20px;color: #8e8e8e;    letter-spacing: 0.5px;margin-top: 0px;margin-bottom: 0px;padding-bottom: 20PX;">
                                            <?php echo $personal_info['job_offers']; ?>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>   
<br>
<?php include_once 'footer.php'; ?>
<script>
    $(function(){
        $('#qr_pay_form_btn').click(function(){
            var htmlCode = $('#qr_fresher').html();
            $.ajax({
                'type':'post',
                'url' : '<?php echo $my_path; ?>/get_html_code.php',
                'data': {'htmlCode':htmlCode,'filename':'<?php echo $qrFileName; ?>'},
                'success': function(r){
                    if(r == 'done'){
                        $('.qr_pay_form_cls').submit();
                    }
                }
            });
        });
    });
</script>