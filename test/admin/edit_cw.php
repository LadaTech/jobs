<?php
$page = 'Edit Content Writer';
ob_start();
include "header.php";
$id = $_GET['uid'];
$cid = $id;
$sql = $db->query("select * from content_writer where Content_writer_id=$id") or die(mysql_error());
if ($sql->rowCount() == 1) {
    $user_info = $sql->fetch(PDO::FETCH_ASSOC);
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Edit  Content Writer</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="manage_cw.php"><i class="fa fa-tree text-aqua"></i>Manage Content Writers</a></li>
                <li class="active">Edit  Content Writer</li>
            </ol>
        </section><!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">  
                <div class="col-md-1"></div>  
                <!-- left column -->       
                <div class="col-md-9">       
                    <!-- Horizontal Form -->              
                    <div class="box box-warning">       

                        <div class="box-header with-border">     

                            <h3 class="box-title">Please fill the following details</h3>   
                        </div><!-- /.box-header -->     
                        <!--vb_classifieds  forms values stores here-->

                        <form name="submenus" action="" method="post" class="form-horizontal" id="identicalForm" enctype="multipart/form-data">  

                            <input type="hidden" name="sid" id="pid_v" value="<?php echo $user_info['Content_writer_id']; ?>" />
                            <div class="box-body">
                                <div class="tabs-wrap profile_tabs_wrapper">
                                    <input type="hidden" name="old_img1" id="pid_v" value="<?php echo $user_info['profile_pic']; ?>" />
                                    <div class="tab-content">
                                        <div role="tabpanel" class=" active" id="personal_details">
                                            <div class="form-group">
                                                <div class="col-lg-6">
                                                    <label class="control-label" for="address">First Name <span class="imp">*</span> </label>
                                                    <input type="text" name="First_name" id="" placeholder="First Name" value="<?php echo $user_info["First_name"]; ?>" class="form-control" required="required"> 
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="control-label" for="address">Last Name <span class="imp">*</span> </label>
                                                    <input type="text" name="Last_name" id="" placeholder="Last Name" value="<?php echo $user_info["Last_name"]; ?>" class="form-control" required="required"> 
                                                </div> 
                                                <div class="clear"></div></div> 
                                            <div class="form-group email_weapper"><div class="col-lg-6"><label class="control-label" for="address">Email <span class="imp">*</span> </label><input type="email" name="email" id="email_a" placeholder="Email" value="<?php echo $user_info["Email_id"]; ?>" class="form-control" required="required" autocomplete="off" readonly><p class="progress_bar"><span class="m_error mail_check"><input type="hidden" name="cf" id="email_check" value="2"></span></p><span class="email-block imp" style="display: none;">Please enter a the Valid Email.</span>      </div><div class="col-lg-6"><label class="control-label" for="address">Alternate Email </label><input type="email" name="Alternate_email" id="Alternate_email" placeholder="Alternate_email" value="<?php echo $user_info["Alternate_email"]; ?>" class="form-control"  autocomplete="off"></div>    <div class="clear"></div></div>
                                            <div class="form-group"><div class="col-lg-6"><label class="control-label" for="address">Contact Number <span class="imp">*</span> </label><input type="text" name="Phone_No" id="popupDatepicker" placeholder="Contact Number" value="<?php echo $user_info["Phone_No"]; ?>" class="form-control form-style-small" required="required" autocomplete="off"></div>    <div class="col-lg-6"><label class="control-label" for="address">Alternate Contact Number </label><input type="text" name="Alternate_Phone_no" id="popupDatepicker" placeholder="Alternate Contact Number" value="<?php echo $user_info["Alternate_Phone_no"]; ?>" class="form-control form-style-small"  autocomplete="off"></div>    <div class="clear"></div></div>  
                                            <div class="form-group"><div class="col-lg-6"><label class="control-label" for="address">Gender <span class="imp">*</span> </label> <br/><div class="padding-10">  <input type="radio"  id="ptype" name="Gender" class="" value="Male" required="" <?php if ($user_info["Gender"] == "Male") {
        echo "checked";
    } ?>> Male    &nbsp;&nbsp;&nbsp;    <input type="radio"  id="ptype" name="Gender" class="" value="Female" required="" <?php if ($user_info["Gender"] == "Female") {
                                            echo "checked";
                                        } ?>> Female </div></div><div class="col-lg-6"><label class="control-label" for="address">Address </label><textarea class="form-control vertical" id="textArea" placeholder="Address" rows="1" name="Address"><?php echo $user_info["Address"]; ?></textarea></div>       <div class="col-lg-6"><label class="control-label" for="address">Profile Summary </label><textarea class="form-control vertical" id="textArea" placeholder="Profile Summary" rows="1" name="Profile_summary"><?php echo $user_info["Profile_summary"]; ?></textarea></div>      <div class="col-lg-6"><label class="control-label" for="address">Experience <span class="imp">*</span> </label><div class="row"><div class="col-xs-6"><select class="form-control" id="exp_years" name="exp_yrs" required><option value="">Years</option><?php for ($k = 0; $k < 50; $k++) { ?> <option value="<?php echo $k; ?>" <?php if ($k == $user_info["exp_yrs"]) {
                                                echo "selected";
                                            } ?> ><?php echo $k; ?> Years</option><?php } ?></select></div><div class="col-xs-6"><select class="form-control" id="exp_months" name="exp_mnths" required><option value="">Months</option><?php for ($k = 0; $k < 12; $k++) { ?> <option value="<?php echo $k; ?>" <?php if ($k == $user_info["exp_mnths"]) {
                                                echo "selected";
                                            } ?>                ><?php echo $k; ?> Months</option><?php } ?></select></div></div></div>    <div class="clear"></div><div class="col-lg-6"><label class="control-label" for="address">Education <span class="imp">*</span> </label><select type="text" name="Education" id="popupDatepicker" class="form-control form-style-small" required="required" >    <option value="">-Select-</option><option value="PG" <?php if ($user_info["Education"] == "PG") {
                                            echo "selected";
                                        } ?>>PG</option><option value="Degree" <?php if ($user_info["Education"] == "Degree") {
                                            echo "selected";
                                        } ?>>Degree</option><option value="Inter" <?php if ($user_info["Education"] == "Inter") {
                                        echo "selected";
                                    } ?>>Inter</option><option value="SSC" <?php if ($user_info["Education"] == "SSC") {
                                        echo "selected";
                                    } ?>>SSC</option></select></div>     <div class="col-lg-6"><label class="control-label" for="address">Certifications </label><textarea class="form-control vertical" id="Certifications" placeholder="Certifications" rows="1" name="Certifications"><?php echo $user_info["Certifications"]; ?></textarea></div>       <div class="clear"></div></div>  
                                        </div><div class="form-group" id="imagead"><div class="col-sm-8">      <label for="inputPassword3" class="control-label">Profile Pic</label><input type="file" name="image1" id=""  class="form-control" /></div><div class="col-sm-4"><?php if ($user_info['profile_pic'] != 0 && $user_info['profile_pic'] != "") { ?><img src="<?php echo $my_path; ?>/images/cw/<?php echo $user_info['profile_pic']; ?>" height="65px"><?php } else { ?><img src="<?php echo $my_path; ?>/images/user.png" height="65px"> <?php } ?></div></div>
                                        <div role="tabpanel" class="" id="skills"><?php $lang = $db->query("select * from cw_skills where cwid='$user_info[Content_writer_id]'");
                                    $lc = 0;
                                    if($lang->rowCount()==0){ ?><div id="Skill1" class="clonedInput_4"><h4 id="reference" name="reference" class="heading-reference">Skill #1</h4><div class="form-group"><div class="col-lg-12"><textarea  name="skills[]" id="skill1" placeholder="Skills" class="form-control form-style-small input_skill" ></textarea></div>    <div class="clear"></div></div>  </div>    <?php } else { //$tc=$lang->rowCount();
                                    while ($rec_j = $lang->fetch(PDO::FETCH_ASSOC)) {
                                        $lc++;
                                        ?>  
                                                <div id="Skill<?php echo $lc; ?>" class="clonedInput_4">
                                                    <h4 id="reference" name="reference" class="heading-reference">Skill #<?php echo $lc; ?></h4>
                                                    <div class="form-group"><div class="col-lg-12"><textarea  name="skills[]" id="" placeholder="Skills" class="form-control form-style-small input_skill" ><?php echo $rec_j["cw_skill_description"]; ?></textarea></div>    <div class="clear"></div></div> 
                                                </div> <?php }
                                } ?>    
                                        <div class="form-group"><div class="col-sm-6">    <button type="button" id="btnAdd_4" name="btnAdd_4" class="btn btn-info btn-full">add section</button></div><div class="col-sm-6">  
                                                <button type="button" id="btnDel_4" name="btnDel_4" class="btn btn-danger  btn-full"  <?php if ($lc == 0 || $lc == 1) {
                                    echo "disabled";
                                } ?>>remove section above</button> </div>  
                                            <div class="clearfix"></div></div> 
                                    </div>  
                                    <h4 class='main_heading'>Payment Info</h4>
    <?php
    $p1 = $db->query("select * from cw_payment_info where cwid=$_GET[uid]");
    if ($p1->rowCount() != 1) {
        $pa = $my_path . "/cw/dashboard.aspx";
//        header("Location: $pa");
    }
    $payment = $p1->fetch(PDO::FETCH_ASSOC);
    ?><div role="tabpanel" class=" active" id="personal_details"><h3 class="sub_heading">For Specialized</h3><div class="form-group">    <div class="col-lg-6"><label class="control-label" for="address">Industry </label><select class="form-control" id="Industry" name="iid">    <option value="">Select Industry</option>    <?php
    $sql_dom = 'SELECT * FROM industry order by name asc';
    $stmt_dom = $db->query($sql_dom);
    $stmt_dom->execute();
    if ($stmt_dom->rowCount() > 0) {
        while ($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)) {
            echo $row_dom['domain_name'];
            ?>            <option  value="<?php echo $row_dom['id']; ?>" <?php if ($payment["iid"] == $row_dom['id']) {
            echo "selected";
        } ?>><?php echo $row_dom['name']; ?></option><?php }} ?></select></div>    <div class="clear"></div></div>  <div class="form-group email_weapper"><div class="col-lg-6"><label class="control-label" for="address">Fresher Price </label><input type="number" name="special_fresher" id="email_a" placeholder="Fresher Price" value="<?php echo $payment["special_fresher"]; ?>" class="form-control"  autocomplete="off"></div><div class="col-lg-6"><label class="control-label" for="address">1-3 Experience </label><input type="number" name="special_1_exp" id="Alternate_email" placeholder="1-3 Experience" value="<?php echo $payment["special_1_exp"]; ?>" class="form-control"  autocomplete="off"></div>   <div class="col-lg-6"><label class="control-label" for="address">3-5 Experience </label><input type="number" name="special_2_exp" id="Alternate_email" placeholder="3-5 Experience" value="<?php echo $payment["special_2_exp"]; ?>" class="form-control"  autocomplete="off"></div> <div class="col-lg-6"><label class="control-label" for="address">5-10 Experience </label><input type="number" name="special_3_exp" id="Alternate_email" placeholder="5-10 Experience" value="<?php echo $payment["special_3_exp"]; ?>" class="form-control"  autocomplete="off"></div>   <div class="col-lg-6"><label class="control-label" for="address">10+ Experience </label><input type="number" name="special_4_exp" id="Alternate_email" placeholder="10+ Experience" value="<?php echo $payment["special_4_exp"]; ?>" class="form-control"  autocomplete="off"></div>       <div class="clear"></div></div>  <h3 class="sub_heading">For General Price</h3><div class="form-group email_weapper"><div class="col-lg-6"><label class="control-label" for="address">Fresher Price <span class="imp">*</span> </label><input type="number" name="general_fresher" id="email_a" placeholder="Fresher Price" value="<?php echo $payment["general_fresher"]; ?>" class="form-control" required="required" autocomplete="off"></div><div class="col-lg-6"><label class="control-label" for="address">1-3 Experience <span class="imp">*</span></label><input type="number" name="general_1_exp" id="Alternate_email" placeholder="1-3 Experience" value="<?php echo $payment["general_1_exp"]; ?>" class="form-control"  autocomplete="off" required></div>   <div class="col-lg-6"><label class="control-label" for="address">3-5 Experience <span class="imp">*</span></label><input type="number" name="general_2_exp" id="Alternate_email" placeholder="3-5 Experience" value="<?php echo $payment["general_2_exp"]; ?>" class="form-control"  autocomplete="off" required></div> <div class="col-lg-6"><label class="control-label" for="address">5-10 Experience <span class="imp">*</span></label><input type="number" name="general_3_exp" id="Alternate_email" placeholder="5-10 Experience" value="<?php echo $payment["general_3_exp"]; ?>" class="form-control"  autocomplete="off" required></div>   <div class="col-lg-6"><label class="control-label" for="address">10+ Experience <span class="imp">*</span></label><input type="number" name="general_4_exp" id="Alternate_email" placeholder="10+ Experience" value="<?php echo $payment["general_4_exp"]; ?>" class="form-control"  autocomplete="off" required></div>       <div class="clear"></div></div>  <div class="clear"></div><br/><div class="form-group"><div class="col-sm-4 col-sm-offset-4"><input type="submit" name="submit" value="Submit"  class="btn btn-primary btn-full open2 continue"/></div> <div class="clearfix"></div></div>  </div>  </div><!-- /.box-body --><!--<div class="box-footer"><button type="submit" name="submit" class="btn btn-info pull-right">Submit</button></div> /.box-footer              -->
                                        </form>

                                    </div><!-- /.box --></div>

                        </div></div><!-- /.box-header -->
            </section><!-- /.content --><!-- content pages -->	<?php include "footer.php"; ?><script type="text/javascript" src="<?php echo $my_path; ?>/js/clone-form-td-multiple.js"></script>
            <script type="text/javascript">//  alert();
                $(document).ready(function() {
                    $("#Industry").on('change', function() {
                        $("#Domain").empty().append("<image src='images/spinner.gif' />");
                        var id = $(this).val(); //  alert("ff");
                        $.ajax({type: "get", url: "<?php echo $my_path; ?>/get_domains.php", data: {"q": id}, success: function(data) {
                                //alert(data);
                                $("#Domain").empty().append(data);
                            }});
                    });
                });
            </script>

            <?php
            ob_start();
            if (isset($_POST['submit'])) {
                $cid = ucfirst(($_POST['sid']));
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
                $uploaded_dir = "../images/cw/";
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
                $jsinsert = $db->query("update content_writer set First_name='$fname',Last_name='$lname',Phone_No='$Phone_No',Alternate_email='$Alternate_email',Alternate_Phone_no='$Alternate_Phone_no',Address='$Address',Profile_summary='$Profile_summary',exp_yrs='$exp_yrs',exp_mnths='$exp_mnths',Education='$Education',Certifications='$Certifications',Gender='$Gender',profile_pic='$image1' where Content_writer_id=$cid");
                /*                 * ********Skills*********** */
                $db->query("delete from  cw_skills where cwid=$cid");
                $language_name = $_POST["language_name"];
                $skills = $_POST["skills"];
                while (list($key1, $val1) = each($skills)) {
                    if ($val1 != "") {
                        $rs = $db->query("insert into cw_skills(cw_skill_description,cwid) values('$val1','$cid')") or die(mysql_error());
                    }
                }
                /*                 * *********Skills************ */ /*                 * **************** */
                $iid = $_POST['iid'];
                $special_fresher = $_POST['special_fresher'];
                $special_1_exp = $_POST['special_1_exp'];
                $special_2_exp = $_POST['special_2_exp'];
                $special_3_exp = $_POST['special_3_exp'];
                $special_4_exp = $_POST['special_4_exp'];
                $general_fresher = $_POST['general_fresher'];
                $general_1_exp = $_POST['general_1_exp'];
                $general_2_exp = $_POST['general_2_exp'];
                $general_3_exp = $_POST['general_3_exp'];
                $general_4_exp = $_POST['general_4_exp'];
                $jsinsert = $db->query("update  cw_payment_info set iid='$iid',special_fresher='$special_fresher',special_1_exp='$special_1_exp',special_2_exp='$special_2_exp',special_3_exp='$special_3_exp',special_4_exp='$special_4_exp',general_fresher='$general_fresher',general_1_exp='$general_1_exp',general_2_exp='$general_2_exp',general_3_exp='$general_3_exp',general_4_exp='$general_4_exp' where cwid=$cid");
                /*                 * *************************** */
                if ($jsinsert) {
                    header('Location:manage_cw.php?msg=updated');
                } else {
                    header('Location:manage_cw.php?msg=non');
                }
            }
            ob_end_flush();
            ?>  
        <?php
    }
    ?>				