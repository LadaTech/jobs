<?php
ob_start();
$page = 'Fresher Quick Resume';
include_once 'header.php';
include_once 'js-session-check.php';

//echo "<pre>";
//Personal info
$job_seeker_id = $user_info["Job_Seeker_Id"];
$qry = "select * from job_seeker where job_Seeker_Id= '$job_seeker_id' ";
$personal_info_obj = $db->query($qry);
if ($personal_info_obj->rowCount() == 1) {
    $personal_info = $personal_info_obj->fetch(PDO::FETCH_ASSOC);
}
//print_r($personal_info);
// Academic history
$qry = "select 	js_accomplishments_id,	accomplishment_name from  js_accomplishments where job_seeker_id= '$job_seeker_id' order by inserted_time desc limit 1";
$academic_history_obj = $db->query($qry);
if ($academic_history_obj->rowCount() == 1) {
    $academic_history = $academic_history_obj->fetch(PDO::FETCH_ASSOC);
}
//print_r($academic_history);
//Technical Skills
$qry = "SELECT js_skills_id,GROUP_CONCAT(skill_title) as skills FROM `js_skills` where job_seeker_id = $job_seeker_id group by inserted_date order by inserted_date DESC limit 1";
$technical_skills_obj = $db->query($qry);
if ($technical_skills_obj->rowCount() == 1) {
    $technical_skills = $technical_skills_obj->fetch(PDO::FETCH_ASSOC);
}
//print_r($technical_skills);
//Hobbies
$qry = "SELECT js_hobbies_id,GROUP_CONCAT(hobby_name) as hobbies FROM `js_hobbies` where job_seeker_id = $job_seeker_id group by inserted_time order by inserted_time DESC limit 1";
$hobbies_obj = $db->query($qry);
if ($hobbies_obj->rowCount() == 1) {
    $hobbies = $hobbies_obj->fetch(PDO::FETCH_ASSOC);
}
//print_r($hobbies);

//Projects
$qry = "SELECT * FROM `js_projects` where job_seeker_id = $job_seeker_id  order by inserted_date DESC";
$projects_obj = $db->query($qry);
if ($projects_obj->rowCount() >= 1) {
    $projects = $projects_obj->fetchAll(PDO::FETCH_ASSOC);
}
//print_r($projects);
//echo "</pre>";
?>
<style>
    h3{
        font-weight: bold;
    }
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<body style="font-family: 'Oswald', sans-serif;">
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
                                                                        <?php echo $personal_info['Address']; ?>
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
                                        <img src="<?php echo "images/jobseeker/".$personal_info['profile_pic']; ?>" style="border: 1px solid #ccc;border-radius: 50%;width: 140px;height: 140px;">
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
                                            <?php foreach ($projects as $project) { ?>
                                            <div style="margin-bottom: 15px;">
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <td style="vertical-align: top;">
                                                            <h2 style="    font-size: 16px;color: #444343;margin-top: 0px;margin-bottom: 3px;"><?php echo $project['project_name']; ?></h2>
                                                            <label style="color: #e48f1a;margin-top: 3px;font-weight: 600;font-size: 13px;"><?php echo $project['team_size']; ?> Members Team</label>
                                                        </td>
                                                        <td align="right" style="width: 200px;vertical-align: top;">
                                                            <label style="font-size: 11px;font-weight: normal;"><?php echo date('M Y', strtotime($project['from_date'])) . " to " . date('M Y', strtotime($project['to_date'])); ?></label>
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
                                            <?php echo $personal_info['qr_expecting_comp']; ?>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="width: 200px;vertical-align: top;border-right: 2px solid #e48f1a;padding-right: 10px;">
                                        <h3 style="margin-top: 0px;font-size: 15px;margin-bottom: 0px;font-style: italic;">Any Offers In Hand?</h3>
                                    </td>
                                    <td align="left" style="width: 800px;vertical-align: top;padding-left: 10px;">
                                        <p style="font-size: 12px;line-height: 18px;margin-top: 20px;color: #8e8e8e;    letter-spacing: 0.5px;margin-top: 0px;margin-bottom: 0px;padding-bottom: 20PX;">
                                            <?php echo $personal_info['qr_job_offers']; ?>
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
</body>        
<?php include_once 'footer.php'; ?>
