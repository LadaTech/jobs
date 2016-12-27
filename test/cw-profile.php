<?php
ob_start();
$page = "";
$pageTitle = "Content Writer Profile";
include_once "header.php";
include_once 'cw-session-check.php';
?>

<section class="inner_page_info">
    <div class="gmap-area1">

        <div class="container">
            <div class="row profile">
                <div class="col-sm-8">
                    <h3 class="main-heading">Complete Your Profile</h3>
                    <?php
                    if (isset($_GET['msg'])) {
                        $msg = $_GET['msg'];
                        if ($msg == 'updated') {
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
                            ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>	<i class="icon fa fa-check"></i> Profile has been updated!</h4>

                            </div>
                            <?php
                        }
                    }
                    ?>

                    <form name="submenus" action="<?php echo $my_path; ?>/cw/edit-profile.aspx" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data">     
                        <div class="tabs-wrap profile_tabs_wrapper">
                            <input type="hidden" name="old_img1" id="pid_v" value="<?php echo $user_info['profile_pic']; ?>" />
                            <div class="tab-content">

                                <div role="tabpanel" class=" active" id="personal_details">


                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">First Name </label>
                                            <input type="text" name="First_name" id="" placeholder="First Name" value="<?php echo $user_info["First_name"]; ?>" class="form-control" required="required" readonly=""> 
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">Last Name </label>
                                            <input type="text" name="Last_name" id="" placeholder="Last Name" value="<?php echo $user_info["Last_name"]; ?>" class="form-control" required="required" readonly=""> 
                                        </div>    
                                        <div class="clear"></div>
                                    </div>  
                                    <div class="form-group email_weapper">
                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">Email <span class="imp">*</span> </label>
                                            <input type="email" name="email" id="email_a" placeholder="Email" value="<?php echo $user_info["Email_id"]; ?>" class="form-control" required="required" autocomplete="off" readonly>
                                            <p class="progress_bar"><span class="m_error mail_check"><input type="hidden" name="cf" id="email_check" value="2"></span>
                                            </p>
                                            <span class="email-block imp" style="display: none;">Please enter a the Valid Email.</span>      

                                        </div>
                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">Alternate Email </label>
                                            <input type="email" name="Alternate_email" id="Alternate_email" placeholder="Alternate_email" value="<?php echo $user_info["Alternate_email"]; ?>" class="form-control"  autocomplete="off">
                                        </div>    
                                        <div class="clear"></div>
                                    </div>  


                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">Contact Number <span class="imp">*</span> </label>

                                            <input type="text" name="Phone_No" id="popupDatepicker" placeholder="Contact Number" value="<?php echo $user_info["Phone_No"]; ?>" class="form-control form-style-small" required="required" autocomplete="off">
                                        </div>    

                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">Alternate Contact Number </label>

                                            <input type="text" name="Alternate_Phone_no" id="popupDatepicker" placeholder="Alternate Contact Number" value="<?php echo $user_info["Alternate_Phone_no"]; ?>" class="form-control form-style-small"  autocomplete="off">
                                        </div>    
                                        <div class="clear"></div>
                                    </div>  

                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">Gender <span class="imp">*</span> </label> <br/>

                                            <div class="padding-10">  <input type="radio"  id="ptype" name="Gender" class="" value="Male" required="" <?php
                                                if ($user_info["Gender"] == "Male") {
                                                    echo "checked";
                                                }
                                                ?>> Male
                                                &nbsp;&nbsp;&nbsp;
                                                <input type="radio"  id="ptype" name="Gender" class="" value="Female" required="" <?php
                                                if ($user_info["Gender"] == "Female") {
                                                    echo "checked";
                                                }
                                                ?>> Female </div>

                                        </div>

                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">Address </label>
                                            <textarea class="form-control vertical" id="textArea" placeholder="Address" rows="1" name="Address"><?php echo $user_info["Address"]; ?></textarea>
                                        </div>   

                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">Profile Summary </label>
                                            <textarea class="form-control vertical" id="textArea" placeholder="Profile Summary" rows="1" name="Profile_summary"><?php echo $user_info["Profile_summary"]; ?></textarea>
                                        </div>   

                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">Experience <span class="imp">*</span> </label>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <select class="form-control" id="exp_years" name="exp_yrs" required>
                                                        <option value="">Years</option>
                                                        <?php for ($k = 0; $k < 50; $k++) { ?> <option value="<?php echo $k; ?>" <?php
                                                            if ($k == $user_info["exp_yrs"]) {
                                                                echo "selected";
                                                            }
                                                            ?> ><?php echo $k; ?> Years</option><?php } ?>

                                                    </select>
                                                </div>
                                                <div class="col-xs-6">
                                                    <select class="form-control" id="exp_months" name="exp_mnths" required>
                                                        <option value="">Months</option>
                                                        <?php for ($k = 0; $k < 12; $k++) { ?> <option value="<?php echo $k; ?>" 
                                                            <?php
                                                            if ($k == $user_info["exp_mnths"]) {
                                                                echo "selected";
                                                            }
                                                            ?>        
                                                                    ><?php echo $k; ?> Months</option><?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>    
                                        <div class="clear"></div>
                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">Education <span class="imp">*</span> </label>
                                            <select type="text" name="Education" id="popupDatepicker" class="form-control form-style-small" required="required" >
                                                <option value="">-Select-</option>
                                                <option value="PG" <?php
                                                        if ($user_info["Education"] == "PG") {
                                                            echo "selected";
                                                        }
                                                        ?>>PG</option>
                                                <option value="Degree" <?php
                                                if ($user_info["Education"] == "Degree") {
                                                    echo "selected";
                                                }
                                                ?>>Degree</option>
                                                <option value="Inter" <?php
                                                if ($user_info["Education"] == "Inter") {
                                                    echo "selected";
                                                }
                                                ?>>Inter</option>
                                                <option value="SSC" <?php
                                                if ($user_info["Education"] == "SSC") {
                                                    echo "selected";
                                                }
                                                ?>>SSC</option>
                                            </select>
                                        </div>     
                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">Certifications </label>
                                            <textarea class="form-control vertical" id="Certifications" placeholder="Certifications" rows="1" name="Certifications"><?php echo $user_info["Certifications"]; ?></textarea>
                                        </div>   

                                        <div class="clear"></div>
                                    </div>   

                                </div>
                                <div class="form-group" id="imagead">
                                    <div class="col-sm-8">      
                                        <label for="inputPassword3" class="control-label">Profile Pic</label>

                                        <input type="file" name="image1" id=""  class="form-control" />
                                    </div>
                                    <div class="col-sm-4">
<?php if ($user_info['profile_pic'] != 0 && $user_info['profile_pic'] != "") { ?><img src="<?php echo $my_path; ?>/images/cw/<?php echo $user_info['profile_pic']; ?>" height="65px"><?php } else { ?><img src="<?php echo $my_path; ?>/images/user.png" height="65px"> <?php } ?>
                                    </div>
                                </div>

                                <div role="tabpanel" class="" id="skills">
<?php
$lang = $db->query("select * from cw_skills where cwid='$user_info[Content_writer_id]'");
$lc = 0;
if ($lang->rowCount() == 0) {
    ?>
                                        <div id="Skill1" class="clonedInput_4 clone-skill-div">
                                            <h4 id="reference" name="reference" class="heading-reference">Skill #1</h4>
                                            <div class="form-group">
                                                <div class="col-lg-12">
                                                    <textarea  name="skills[]" id="skill1" placeholder="Skills" class="form-control form-style-small input_skill" ></textarea>
                                                </div>    
                                                <div class="clear"></div>
                                            </div>  
                                        </div>    
    <?php
} else {

//$tc=$lang->rowCount();
    while ($rec_j = $lang->fetch(PDO::FETCH_ASSOC)) {
        $lc++;
        ?>   
                                            <div id="Skill<?php echo $lc; ?>" class="clonedInput_4 clone-skill-div">
                                                <h4 id="reference" name="reference" class="heading-reference">Skill #<?php echo $lc; ?></h4>
                                                <div class="form-group">
                                                    <div class="col-lg-12">
                                                        <textarea  name="skills[]" id="" placeholder="Skills" class="form-control form-style-small input_skill" ><?php echo $rec_j["cw_skill_description"]; ?></textarea>
                                                    </div>
                                                    <button type="button" name="btnDel_4" class="btn btn-danger btn-del pull-right" ><i class='fa fa-trash-o'></i></button>    
                                                    <div class="clear"></div>
                                                </div>  
                                            </div>
        <?php
    }
}
?>
                                    <div class="cloning-data">


                                    </div>    
                                    <div class="form-group">
                                        <div class="col-sm-2 col-sm-offset-10">   
                                            <button type="button" id="add-skill" name="btnAdd_4" class="btn btn-info"><i class='fa fa-plus'></i></button>
                                        </div>  <div class="clearfix"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4 col-sm-offset-4">
                                            <input type="submit" name="submit" value="Submit"  class="btn btn-primary btn-full open2 continue"/>
                                        </div> 

                                        <div class="clearfix"></div>
                                    </div>  
                                </div>  

                            </div>

                        </div>
                    </form>





                </div>
                <div class="col-sm-4">

<?php require_once 'cw_sidebar.php'; ?>      

                </div>

            </div>
        </div>
    </div>
</section>  <!--/gmap_area -->


<div  class="cloned-skill hide">
    <h4 id="reference" name="reference" class="heading-reference">Skill</h4>
    <div class="form-group">
        <div class="col-lg-12">
            <textarea  name="skills[]" placeholder="Skills" class="form-control form-style-small input_skill" ></textarea>
        </div>  
        <button type="button" name="btnDel_4" class="btn btn-danger btn-del pull-right" ><i class='fa fa-trash-o'></i></button> 
        <div class="clear"></div>
    </div>  
</div>  

<?php
include "footer.php";
?>
<script type="text/javascript" src="<?php echo $my_path; ?>/js/clone-form-td-multiple.js"></script>
<script type="text/javascript">
//  alert();
    $(document).ready(function ()
    {
        $("#Industry").on('change', function () {
            $("#Domain").empty().append("<image src='images/spinner.gif' />");
            var id = $(this).val();
//  alert("ff");
            $.ajax({
                type: "get",
                url: "<?php echo $my_path; ?>/get_domains.php",
                data: {"q": id},
                success: function (data) {
//  alert(data);
                    $("#Domain").empty().append(data);
                }
            });
        });

        $(document).on("click", ".btn-del", function () {
            var r = confirm("Do you want to delete this section");
            var num = $(".clone-skill-div").length;
            if (r == true) {
                if (num > 1) {
                    $(this).closest(".clone-skill-div").remove();
                }
            }
        });
    });
</script>

<?php
ob_start();
if (isset($_POST['submit'])) {
    $fname = ucwords($_POST['First_name']);
    $lname = ucwords($_POST['Last_name']);
    $Industry = $_POST["Industry"];
    $Gender = $_POST["Gender"];
    $Alternate_email = $_POST["Alternate_email"];
    $Alternate_Phone_no = $_POST["Alternate_Phone_no"];
    $Father_Name = $_POST["Father_Name"];
    $Domain = $_POST["Domain"];
    $Phone_No = $_POST["Phone_No"];
    $Address = $_POST["Address"];
    $Profile_summary = $_POST["Profile_summary"];
    $exp_yrs = $_POST["exp_yrs"];
    $exp_mnths = $_POST["exp_mnths"];
    $Education = $_POST["Education"];
    $Certifications = $_POST["Certifications"];
//exit();
    $old_img1 = $_POST['old_img1'];
    $uploaded_dir = "images/cw/";
    $filename = $_FILES["image1"]["name"];
    $filename = rand(100, 999) . "_" . $filename;
    $path = $uploaded_dir . $filename;
    if (move_uploaded_file($_FILES["image1"]["tmp_name"], $path)) {
        unlink($uploaded_dir . $old_img1);
        $image1 = $filename;
    } else {
        $image1 = $old_img1;
    }
    $Experience_level = $_POST['Experience_level'];
    $jsinsert = $db->query("update content_writer set 
First_name='$fname',Last_name='$lname',Phone_No='$Phone_No',Alternate_email='$Alternate_email',Alternate_Phone_no='$Alternate_Phone_no',Address='$Address',Profile_summary='$Profile_summary',exp_yrs='$exp_yrs',exp_mnths='$exp_mnths',Education='$Education',Certifications='$Certifications',Gender='$Gender',profile_pic='$image1' where Content_writer_id=$user_info[Content_writer_id]");

    /*     * ********Skills*********** */
    $db->query("delete from  cw_skills where cwid=$user_info[Content_writer_id]");
    $language_name = $_POST["language_name"];
    $skills = $_POST["skills"];
    while (list($key1, $val1) = each($skills)) {
        if ($val1 != "") {
            $rs = $db->query("insert into cw_skills(cw_skill_description,cwid) values('$val1','$user_info[Content_writer_id]')") or die(mysql_error());
        }
    }
    /*     * *********Skills************ */

    if ($jsinsert) {
        $pa = $my_path . "/cw/profile-updated.aspx";
        header("Location: $pa");
    } else {
        $pa = $my_path . "/cw/edit-profile.aspx";
        header("Location: $pa");
    }
}
ob_end_flush();
?>  