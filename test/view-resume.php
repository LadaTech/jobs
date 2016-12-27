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

//Companies
$qry = "SELECT * FROM `js_companies` where job_seeker_id = $job_seeker_id  order by inserted_date DESC";
$companies_obj = $db->query($qry);
if ($companies_obj->rowCount() >= 1) {
    $companies = $companies_obj->fetchAll(PDO::FETCH_ASSOC);
}
//print_r($companies);

//Projects
$qry = "SELECT * FROM `js_projects` where job_seeker_id = $job_seeker_id  order by inserted_date DESC";
$projects_obj = $db->query($qry);
if ($projects_obj->rowCount() >= 1) {
    $projects = $projects_obj->fetchAll(PDO::FETCH_ASSOC);
}
//print_r($projects);

//Roles
$qry = "SELECT * FROM `roles`";
$roles_obj = $db->query($qry);
if ($roles_obj->rowCount() >= 1) {
    $roles = $roles_obj->fetchAll(PDO::FETCH_ASSOC);
}
foreach($roles as $role){
    $rolesArr[$role['role_id']] = $role['role_name'];
}
//echo "</pre>";
?>		
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<body style="font-family: 'Oswald', sans-serif;">
    <table align="center" cellpadding="0" cellspacing="0" style="min-height: 400px;border: 1px solid #ccc;border-radius: 3px;">
        <tr>
            <td style="width: 230px;vertical-align: top;background-color: #ccc;">
                <div align="center" style="padding-left: 15px;padding-right: 15px;">
                    <div style="margin-top: 10px;">
                        <img src="<?php echo "images/jobseeker/".$personal_info['profile_pic']; ?>" style="border: 1px solid #fff;border-radius: 50%;width: 140px;height: 140px;">
                        <div style="margin-top: 10px;margin-bottom: 5px;">
                            <label style="font-weight: 300;font-size: 13px;color: #000;"><i class="fa fa-phone" style="margin-right: 5px;"></i><?php echo $personal_info['Phone_No']; ?></label><br/>
                            <label style="font-weight: 300;font-size: 13px;color: #000;"><i class="fa fa-envelope-o" style="margin-right: 5px;"></i><?php echo $personal_info['Email_id']; ?></label>
                        </div>
                        <div style="border-bottom: 1px solid #efefef"></div>
                        <div>
                            <p style="font-weight: 500;color: #000;margin-bottom: 0px;font-size: 12px;margin-top: 7px;padding-top: 0px;line-height: 19px;">
                                <?php echo $personal_info['Address']; ?>
                            </p>
                        </div>
                    </div>
                    <div align="left">
                        <div>
                            <h3 style="color: #000;border-bottom: 1px solid #e0dede;margin-bottom: 5px;font-size: 15px;padding-bottom: 5px;"><b>Technical Skills</b></h3>
                            <div class="content">
                                <p style="margin-top: 7px;font-size: 11px;line-height: 16px;">
                                    <?php echo $technical_skills['skills']; ?>
                                </p>
                            </div>
                        </div>
                        <div>
                            <h3 style="color: #000;border-bottom: 1px solid #e0dede;margin-bottom: 5px;font-size: 15px;padding-bottom: 5px;"><b>Academic History</b></h3>
                            <div class="content">
                                <p style="margin-top: 7px;font-size: 11px;line-height: 16px;">
                                    <?php echo $academic_history['accomplishment_name']; ?>
                                </p>
                            </div>
                        </div>
                        <div>
                            <h3 style="color: #000;border-bottom: 1px solid #e0dede;margin-bottom: 5px;font-size: 15px;padding-bottom: 5px;"><b>Success Stories</b></h3>
                            <div class="content">
                                <p style="margin-top: 7px;font-size: 11px;line-height: 16px;">
                                    <?php echo $personal_info['qr_exp_success_stories']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td style="width: 400px;vertical-align: top;padding-left: 15px;padding-right: 15px;">
                <div align="center">
                    <h1 style="margin-top: 10px;margin-bottom: 0px;font-weight: 400;text-align: center;color: #000;    font-size: 30px;"><?php echo $personal_info['First_name'] . " " . $personal_info['Last_name']; ?></h1>
                    <div style="border-bottom: 1px solid #ccc;position: relative;margin-bottom: 25px;margin-top: 20px;">
                        <span style="position: absolute;top: -9px;padding: 0 10px;background: #fff;display: inline-block;left: 30%;right: 30%;margin-left: 0px;text-align: center;text-transform: uppercase;color: #e48f1a;font-weight: 600;font-size: 15px;">Web Devloper</span>
                    </div>
                </div>
                <div align="left">
                    <h3 style="margin-top: 0px;margin-bottom: 0px;font-weight: 500;color: #000;font-size: 20px;border-bottom: 1px solid #efefef;padding-bottom: 5px;">Professional Experience</h3>
                    <p style="font-size: 12px;line-height: 18px;margin-top: 10px;color: #8e8e8e;letter-spacing: 0.5px;">
                        <?php echo $personal_info['exp_about_you']; ?>
                    </p>
                    <?php foreach($companies as $comapny) { ?>
                    <div>
                        <table style="width: 100%;">
                            <tr>
                                <td style="vertical-align: top;">
                                    <h2 style="    font-size: 16px;color: #444343;margin-top: 0px;margin-bottom: 3px;"><?php echo $comapny['company_name']; ?></h2>
                                    <label style="color: #e48f1a;margin-top: 3px;font-weight: 600;font-size: 13px;"><?php echo $rolesArr[$comapny['role']]; ?></label>
                                </td>
                                <td align="right" style="width: 200px;vertical-align: top;">
                                    <label style="font-size: 11px;font-weight: normal;"><?php echo date('M Y', strtotime($comapny['from_date'])) . " to " . date('M Y', strtotime($comapny['to_date'])); ?></label>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr style="width: 100%;">
                                <td>
                                    <p style="margin-top: 0px;font-size: 12px;line-height: 18px;color: #8e8e8e;margin-bottom: 0px;">
                                        <?php echo $comapny['job_description']; ?>
                                    </p>
                                </td>
                            </tr>
                        </table>
                        <table style="vertical-align: top;width: 100%;">
                            <tr>
                                <td>
                                    <h2 class="reason" style="color: #444343;margin-top: 3px;font-weight: bold;font-size: 13px;">Reason for Leaving</h2>
                                    <p class="content" style="margin-top: 0px;font-size: 12px;line-height: 18px;color: #8e8e8e;">
                                        <?php echo $comapny['reason_for_leaving']; ?>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <?php } ?>
                </div> 
                <div align="left">
                    <h3 style="margin-top: 0px;margin-bottom: 7px;font-weight: 500;color: #000;font-size: 20px;border-bottom: 1px solid #efefef;padding-bottom: 5px;">Projects & Domains</h3>
                    <?php foreach($projects as $project) { ?>
                    <table style="width: 100%;">
                        <tr>
                            <td style="vertical-align: top;">
                                <h2 style="    font-size: 16px;color: #444343;margin-top: 0px;margin-bottom: 3px;"><?php echo $project['project_name']; ?></h2>
                                <label style="color: #e48f1a;margin-top: 3px;font-weight: 600;font-size: 13px;"><?php echo $rolesArr[$project['role_id']]; ?></label>
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
                    <?php } ?>
                </div>
                <div align="left">
                    <h3 style="margin-top: 10px;margin-bottom: 7px;font-weight: 500;color: #000;font-size: 20px;border-bottom: 1px solid #efefef;padding-bottom: 5px;">Reason For Change</h3>
                    <table style="width: 100%;">
                        <tr style="width: 100%;">
                            <td>
                                <p style="margin-top: 0px;font-size: 12px;line-height: 18px;color: #8e8e8e;margin-bottom: 0px;">
                                    <?php echo $personal_info['qr_exp_expecting_comp']; ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div align="left">
                    <h3 style="margin-top: 10px;margin-bottom: 7px;font-weight: 500;color: #000;font-size: 20px;border-bottom: 1px solid #efefef;padding-bottom: 5px;">Any Offers In Hand?</h3>
                    <table style="width: 100%;">
                        <tr style="width: 100%;">
                            <td>
                                <p style="margin-top: 0px;font-size: 12px;line-height: 18px;color: #8e8e8e;margin-bottom: 0px;">
                                    <?php echo $personal_info['qr_exp_job_offers']; ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</body>
<?php include_once 'footer.php'; ?>