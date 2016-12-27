<?php
ob_start();
include_once "db.php";
$q = $_GET["id"];
?>
<?php
$update = "update enquiry_info set wsread = 1 where id=$_GET[eid] ";
$db->query($update);
$sql1 = $db->query("select *,(select name from industry where id=i.Industry) as iname, (select name from domains where id=i.Domain) as dname  from  job_seeker i where Job_Seeker_Id='$q'");
if ($sql1->rowCount() == 1) {
    $rdata = $sql1->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="row">
        <div class="col-sm-9">
            <div class="col-sm-5 blabel">Full Name : </div><div class="col-sm-7"><?php echo $rdata["First_name"] . " " . $rdata["Last_name"]; ?></div> <div class="clearfix"></div>
            <?php if (!isset($_GET["utype"])) { ?>        
                <div class="col-sm-5 blabel">Email : </div><div class="col-sm-7"><?php echo $rdata["Email_id"]; ?></div><div class="clearfix"></div>
                <div class="col-sm-5 blabel">Alternate Email : </div><div class="col-sm-7"><?php echo $rdata["Alternate_email"]; ?></div><div class="clearfix"></div>
                <div class="col-sm-5 blabel">Contact Number  : </div><div class="col-sm-7"><?php echo $rdata["Phone_No"]; ?></div><div class="clearfix"></div>
                <div class="col-sm-5 blabel">Alternate Contact Number : </div><div class="col-sm-7"><?php echo $rdata["Alternate_Phone_no"]; ?></div><div class="clearfix"></div>
            <!--    <div class="col-sm-5 blabel">Gender : </div><div class="col-sm-7"><?php echo $rdata["Gender"]; ?></div><div class="clearfix"></div>-->
                <div class="col-sm-5 blabel">Address : </div><div class="col-sm-7"><?php echo $rdata["Address"]; ?></div><div class="clearfix"></div>
            <?php } ?>
            <div class="col-sm-5 blabel">Industry : </div><div class="col-sm-7"><?php echo $rdata["iname"]; ?></div><div class="clearfix"></div>
            <div class="col-sm-5 blabel">Domain : </div><div class="col-sm-7"><?php echo $rdata["dname"]; ?></div><div class="clearfix"></div>
        </div>
        <div class="col-sm-3">
            <?php if ($rdata['profile_pic'] != 0 && $rdata['profile_pic'] != "") { ?><img src="<?php echo $my_path; ?>/images/jobseeker/<?php echo $rdata['profile_pic']; ?>" height="100px"><?php } else { ?><img src="<?php echo $my_path; ?>/images/user.png" height="100px"> <?php } ?>
        </div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="col-sm-12">
            <h4>Language Skills</h4>
            <?php
            $lang = $db->query("select * from js_languages where job_seeker_id='$rdata[Job_Seeker_Id]'");
            $lc = 0;
            if ($lang->rowCount() == 0) {
                ?>
                <b>No records Found</b>
                <?php
            } else {
                ?> <table class="table-wrapper"> <thead><tr><th>Language Name</th> <th>Profficiency Level</th><th>Read</th><th>Write</th><th>Speak</th></tr></thead> <?php
                while ($rec_j = $lang->fetch(PDO::FETCH_ASSOC)) {
                    $lc++;
                    ?> <tr>
                            <td><?php echo $rec_j["language_name"]; ?></td>
                            <td><?php echo $rec_j["profficiency_level"]; ?></td>
                            <td><?php
                                if ($rec_j["lang_read"] == "1") {
                                    echo "Yes";
                                }
                                ?></td>
                            <td><?php
                                if ($rec_j["writes"] == "1") {
                                    echo "Yes";
                                }
                                ?></td>
                            <td><?php
                                if ($rec_j["speaks"] == "1") {
                                    echo "Yes";
                                }
                                ?></td>
                        </tr>
                    <?php } ?></table> <?php } ?>    </div>

        <div class="clearfix"></div>
        <div class="col-sm-12">
            <h4>Educational Details</h4>
            <?php
            $lang = $db->query("select * from js_educational_information where job_seeker_id='$rdata[Job_Seeker_Id]'");
            $lc = 0;
            if ($lang->rowCount() == 0) {
                ?>
                <b>No records Found</b>
                <?php
            } else {
                ?> <table class="table-wrapper"> <thead><tr><th>Education Name</th> <th>Course</th><th>Institute Name</th><th>% or CGPA</th><th>Start date</th><th>End date</th></tr></thead> <?php
                while ($rec_j = $lang->fetch(PDO::FETCH_ASSOC)) {
                    $lc++;
                    ?> <tr>
                            <td><?php echo $rec_j["js_qualification_name"]; ?></td>
                            <td><?php echo $rec_j["js_course"]; ?></td>
                            <td><?php echo $rec_j["js_institution_name"]; ?></td>
                            <td><?php echo $rec_j["js_percentage"]; ?></td>
                            <td><?php echo date("d M Y", strtotime($rec_j["js_start_date"])); ?></td>
                            <td><?php echo date("d M Y", strtotime($rec_j["js_end_date"])); ?></td>

                        </tr>
                    <?php } ?></table> <?php } ?>    </div>

        <div class="clearfix"></div>
        <div class="col-sm-12">
            <h4>Experience Details</h4>
            <?php
            $lang = $db->query("select * from js_work_experience where job_seeker_id='$rdata[Job_Seeker_Id]'");
            $lc = 0;
            if ($lang->rowCount() == 0) {
                ?>
                <b>No records Found</b>
                <?php
            } else {
                ?> <table class="table-wrapper"> <thead><tr><th>Company Name</th><th>Designation</th><th>Current CTC</th><th>Expected CTC</th><th>Start date</th><th>End date</th></tr></thead> <?php
                while ($rec_j = $lang->fetch(PDO::FETCH_ASSOC)) {
                    $lc++;
                    ?> <tr>
                            <td><?php echo $rec_j["Company_Name"]; ?></td>
                            <td><?php echo $rec_j["Designation"]; ?></td>
                            <td><?php echo $rec_j["Current_CTC"]; ?></td>
                            <td><?php echo $rec_j["Expected_CTC"]; ?></td>
                            <td><?php echo date("d M Y", strtotime($rec_j["Start_date"])); ?></td>
                            <td><?php echo date("d M Y", strtotime($rec_j["End_date"])); ?></td>

                        </tr>
                    <?php } ?></table> <?php } ?>    </div>

        <div class="col-sm-12">
            <h4>Skills</h4>
            <?php
            $lang = $db->query("select * from js_skills where job_seeker_id='$rdata[Job_Seeker_Id]'");
            $lc = 0;
            if ($lang->rowCount() == 0) {
                ?>
                <b>No Skills Found</b>
                <?php
            } else {
                ?> <ol> <?php
                    while ($rec_j = $lang->fetch(PDO::FETCH_ASSOC)) {
                        $lc++;
                        ?> 
                        <li><?php echo $rec_j["js_skill_description"]; ?></li>       
                    <?php } ?></ol> <?php } ?>    </div>

        <div class="col-sm-12">
            <h4>Objective</h4>
            <?php echo $rdata["Objective"]; ?>
        </div>
        <?php
    } else {
        echo "No Information found";
    }
    ?>



