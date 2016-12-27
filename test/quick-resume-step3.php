<?php
    ob_start();
    $page = 'Fresher Quick Resume';
    include_once 'header.php';
    include_once 'js-session-check.php';

    if(isset($_POST['submit'])){
        $Industry = $_POST["Industry"];
        $Domain = $_POST['Domain'];
        $Address = $_POST["Address"];
        $qr_exp_expecting_comp = $_POST['exp_expecting_comp'];
        $qr_exp_job_offers = $_POST["exp_job_offers"];
        $jsinsert = $db->query("update job_seeker set 
                    Industry='$Industry',Domain='$Domain',Address='$Address',qr_exp_expecting_comp='$qr_exp_expecting_comp',qr_exp_job_offers='$qr_exp_job_offers' "
                        . "where Job_Seeker_Id=$user_info[Job_Seeker_Id]");    
        $url = $my_path."/view-resume.php";
        header("Location: $url");
    }
    $sql_dom = 'SELECT * FROM industry  order by name asc';
    $industries = $db->query($sql_dom);
    $sql_dom = "SELECT * FROM domains where iid='$user_info[Industry]'";
    $domains = $db->query($sql_dom);
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
                                    <textarea class="form-control" rows="2" name="Address"><?php echo $user_info["Address"]; ?></textarea>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Reason For Change: Vs mention What you are expecting from the new company</label>
                                <textarea class="form-control" rows="2" name="exp_expecting_comp"></textarea>
                                <span>
                                    <ul class="list-unstyled" style="line-height: 14px;font-size: 10px;color: #383737;margin-top: 5px;">
                                        <li>1. Screen readers will have trouble with your forms if you don't include</li>
                                        <li>2. methods of providing a label for assistive technologies, such as the attribute. If none of these is present</li>
                                        <li>3. as a replacement for other labelling methods is not advised.</li>
                                    </ul>
                                </span>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Any Offers In Hand? If Yes - Please mention the details why you are still looking out for a change?</label>
                                <textarea class="form-control" rows="2" name="exp_job_offers"></textarea>
                                <span>
                                    <ul class="list-unstyled" style="line-height: 14px;font-size: 10px;color: #383737;margin-top: 5px;">
                                        <li>1. Screen readers will have trouble with your forms if you don't include</li>
                                        <li>2. methods of providing a label for assistive technologies, such as the attribute. If none of these is present</li>
                                        <li>3. as a replacement for other labelling methods is not advised.</li>
                                    </ul>
                                </span>
                                </div>
                                <div align="center" class="form-group">
                                        <a href="quick-resume-fresher-step1.php" class="btn btn-default-custom open2">Back</a>
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
<?php include_once 'footer.php'; ?>
		 