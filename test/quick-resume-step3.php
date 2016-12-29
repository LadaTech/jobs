<?php
    ob_start();
    $page = 'Fresher Quick Resume';
    include_once 'header.php';
    include_once 'js-session-check.php';

     if(isset($_POST['submit'])){
        if(isset($_SESSION['qr_last_id'])) $qrLastId = $_SESSION['qr_last_id'];
        $Industry = $_POST["Industry"];
        $Domain = $_POST['Domain'];
        $Address = $_POST["Address"];
        $qr_exp_expecting_comp = $_POST['expecting_comp'];
        $qr_exp_job_offers = $_POST["job_offers"];
        $jsinsert = $db->query("update quick_resumes set 
                    industry_id='$Industry',domain_id='$Domain',address='$Address',expecting_comp='$qr_exp_expecting_comp',job_offers='$qr_exp_job_offers' "
                        . "where quick_resume_id=$qrLastId");
        $url = $my_path."/view-resume.php";
        header("Location: $url");
    }
    $sql_dom = 'SELECT * FROM industry  order by name asc';
    $industries = $db->query($sql_dom);
    $sql_dom = "SELECT * FROM domains where iid='$user_info[Industry]'";
    $domains = $db->query($sql_dom);
    if(isset($_SESSION['qr_last_id']) && $_SESSION['qr_last_id'] > 0){
        $qrLastId = $_SESSION['qr_last_id'];
        $jobSeekerId = $user_info['Job_Seeker_Id'];
        //get quick_resumes data
        $qr_qry = "select industry_id,domain_id,address,expecting_comp,job_offers from quick_resumes where quick_resume_id = '$qrLastId'";
        $qr_obj = $db->query($qr_qry);
        if ($qr_obj->rowCount() >= 1) {
            $qr_data = $qr_obj->fetch(PDO::FETCH_ASSOC);
        }
        $_SESSION["qr_industry"] = $qr_data['industry_id'];
        $_SESSION["qr_domain"] = $qr_data['domain_id'];
    }
    
?>
<style>
.navbar-nav>li {
        padding-bottom: 20px;
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
                            <form id="qr_fresher_second" method="post" action="">
                                <h2 class="text-primary" style="margin-top: -7px;font-weight: 400;">Personal Details</h2> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first-name">First Name</label>
                                            <input class="form-control" type="first-name" name="first-name" value="<?php echo $user_info["First_name"]; ?>" placeholder="" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first-name">Last Name</label>
                                            <input class="form-control" type="first-name" name="first-name"  value="<?php echo $user_info["Last_name"]; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first-name">Email</label>
                                            <input class="form-control" type="first-name" name="first-name" value="<?php echo $user_info["Email_id"]; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first-name">Contact Number</label>
                                            <input class="form-control" type="first-name" name="first-name" value="<?php echo $user_info["Phone_No"]; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first-name">Industry</label>
                                            <select class="form-control" name="Industry">
                                                <option>Select Industry</option>
                                                <?php
                                                    if ($industries->rowCount() > 0) {
                                                        while ($row_dom = $industries->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option  value="<?php echo $row_dom['id']; ?>" 
                                                        <?php if ($_SESSION["qr_industry"] == $row_dom['id']) {echo "selected";} ?> > <?php echo $row_dom['name']; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6" class="form-control">
                                        <div class="form-group">
                                            <label for="first-name">Domain</label>
                                            <select class="form-control" name="Domain">
                                                <option>Select Domain</option>
                                                <?php
                                                    if ($domains->rowCount() > 0) {
                                                        while ($row_dom = $domains->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <option  value="<?php echo $row_dom['id']; ?>" 
                                                    <?php if ($_SESSION["qr_domain"] == $row_dom['id']) { echo "selected";} ?>><?php echo $row_dom['name']; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Residence Address</label>
                                    <textarea class="form-control" rows="2" name="Address"><?php echo $qr_data["address"]; ?></textarea>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Reason For Change: Vs mention What you are expecting from the new company</label>
                                <textarea class="form-control" rows="2" name="expecting_comp"><?php echo $qr_data['expecting_comp']; ?></textarea>
                                <span>
                                    <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                        <li>
                                            Tip:
                                            <ul style="list-style: circle;line-height: 17px;">
                                                <li>
                                                    This is your chance to portray your personal responsibility to your potential employer.
                                                    You want to assure them of your willingness to work hard and give your best no matter what!
                                                </li>
                                                <li>
                                                    Focus on speaking positively and mention what you can offer to your potential
                                                    organization in terms of putting your aptitude and skills to the best use.
                                                </li>
                                            </ul>
                                        </li>
                                        <li style="margin-top: 10px;">
                                           I expect to perform exceptionally well in my role and hope to be evaluated both in terms of
                                           positive and negative points so that I can work towards perfection in case of deficiencies (if any). I hope to excel in my career by rendering exceptional performance.
                                        </li>
                                    </ul>
                                </span>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Are you interviewing with anyone else? If yes, mention why you are still looking for a change</label>
                                <textarea class="form-control" rows="2" name="job_offers"><?php echo $qr_data['job_offers']; ?></textarea>
                                <span>
                                    <ul class="list-unstyled" style="line-height: 14px;font-size: 12px;color: #383737;margin-top: 10px;">
                                        <li>
                                           Tip: It is not necessary to sound overly available that you have been applying for other jobs
                                           as well. Say something nice about your current organization and mention about why you're
                                           looking for a change. It is also a good idea to remain transparent.
                                        </li>
                                        <li style="margin-top: 10px;">
                                           Example: It's been a great experience, but I see this opportunity well-fitting to take me in the
                                           right career direction.
                                        </li>
                                    </ul>
                                </span>
                                </div>
                                <div align="center" class="form-group">
                                        <a href="quick-resume-step2.php" class="btn btn-primary open2">Back</a>
                                        <input type="submit" name="submit" value="Submit" class="btn btn-primary open2"/>
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
<?php include_once 'footer.php'; ?>
		 