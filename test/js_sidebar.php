<?php 
if(isset($_POST['submit1'])){
    if(isset($_POST['Industry'])) $_SESSION['qr_industry'] = $_POST['Industry'];
    if(isset($_POST['Domain'])) $_SESSION['qr_domain'] = $_POST['Domain'];
    if(isset($_POST['p_type']) && $_POST['p_type'] == 'Fresher'){
        $url = $my_path."/quick-resume-fresher.php";
        header("Location: $url");
    } else {
        $url = $my_path."/quick-resume.php";
        header("Location: $url");
    }
}
?>
<style>
    .custom.btn-primary, .btn-default {
        padding: 16px 15px;
        background: #e48f1a;
        font-size: 20px;
        color: #fff;
        text-transform: uppercase;
        border-radius: 0px;
        border: none;
        margin-top: 5px;
    }
    .custom.btn-default-custom {
        padding: 16px 15px;
        background-color: #d0cdcd;
        font-size: 20px;
        color: #000;
        text-transform: uppercase;
        border-radius: 0px;
        border: none;
        margin-top: 5px;
    }
</style>
<div class="widgets resume-teplates">
    <h3 style="text-align: left;padding-left: 15px;">Resumes</h3>
    <div style="padding-left: 15px;padding-right: 15px;">
        <a class="custom btn btn-primary btn-open1 btn-block" href="<?php echo $my_path; ?>/quick-resume.php">Quick Resumes</a>
    </div>
    <hr/>
    <div style="padding-left: 15px;padding-right: 15px;">
        <a class="custom btn btn-default-custom btn-block" href="<?php echo $my_path; ?>/job-seeker/resume-templates.aspx">Detailed Resume</a>
    </div>
    <!-- <form name="" method="post" id="resume_templates" action="<?php echo $my_path; ?>/job-seeker/resume-templates.aspx">
        <div class="form-group">                
            <div class="col-sm-12">
                <label class="control-label" for="address">Profile Type <span class="imp">*</span> </label>

                <select class="form-control" id="p_type" name="p_type" required>
                    <option value="">Select Profile Type</option>
                    <option value="Fresher">Fresher</option>
                    <option value="Experienced">Experienced</option>
                </select>
            </div>
            <div class="clear"></div>
        </div>   <div class="clear"></div>
        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label" for="address">Industry <span class="imp">*</span> </label>

                <select class="form-control" id="Industry1" name="Industry" required>
                    <option value="">Select Industry</option>
                    <?php
                    $sql_dom = 'SELECT * FROM industry order by name asc';
                    $stmt_dom = $db->query($sql_dom);

                    if ($stmt_dom->rowCount() > 0) {
                        while ($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)) {
                            ?>

                            <option  value="<?php echo $row_dom['id']; ?>"><?php echo $row_dom['name']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div><div class="clear"></div>
        </div>  

        <div class="form-group">
            <div class="col-sm-12">
                <label class="control-label" for="address">Domain </label>

                <select class="form-control" id="Domain1" name="Domain">
                    <option value="">Select Domain</option>
                </select>
            </div><div class="clear"></div>
        </div>  
        <div class="form-group">
            <div class="col-sm-6">
                <input type="submit" name="submit1" value="Quick Resumes" onclick="checkProfile()" class="btn btn-primary btn-full open2">
            </div>
            <div class="col-sm-6">
                <input type="submit" name="submit" value="Get Resumes" class="btn btn-primary btn-full open2">
            </div>
        </div>

        <div class="clear"></div>
    </form> -->
</div>

<div class="widgets resume-teplates">
    <h3>Our Experts</h3>
    <div class="accordion cw-accordian">    
        <div class="panel-group" id="accordion1">
            <?php
            $oe = $db->query("select * from content_writer where Content_writer_id in(select cwid from cw_payment_info where general_fresher!='') order by online desc  limit 0,20");
            if ($oe->rowCount() != 0) {
                $tc = 1;
                while ($experts = $oe->fetch(PDO::FETCH_ASSOC)) {
                    ?>   
                    <div class="panel panel-default">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne<?php echo $tc; ?>">
                            <span class="<?php
                            if ($experts['online'] == "1") {
                                echo "isonline";
                            } else {
                                ?>isoffline<?php } ?>"></span>                  
                            <span class="smpic"><?php if ($experts['profile_pic'] != 0 && $experts['profile_pic'] != "") { ?><img src="<?php echo $my_path; ?>/images/cw/<?php echo $experts['profile_pic']; ?>" alt="" /><?php } else { ?> <img src="<?php echo $my_path; ?>/images/user.png" alt=""><?php } ?></span>
        <?php echo $experts['First_name']; ?>

                        </a>    
                        <div id="collapseOne<?php echo $tc; ?>" class="panel-collapse collapse">  
                    <?php include "cw-single.php"; ?>
                        </div>
                    </div>
                    <?php
                    $tc++;
                }
            }
            ?>       
        </div>


    </div> 



    <div class="buttons">
        <div class="col-sm-10 col-sm-offset-1"> <a class="btn btn-primary open2 btn-full view-more" href="<?php echo $my_path; ?>/job-seeker/our-experts.aspx"><i class="fa fa-repeat" aria-hidden="true"></i> View More Experts</a></div>     <div class="clear"></div>
    </div>
</div>

<script>
    function checkProfile(){
        $('#resume_templates').attr('action','');
    }
</script>