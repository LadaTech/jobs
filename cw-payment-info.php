<?php
ob_start();
$page = "";
$pageTitle = "Payment Info";
include_once "header.php";
include_once 'cw-session-check.php';
$p1 = $db->query("select * from cw_payment_info where cwid=$_SESSION[cwid]");
if ($p1->rowCount() != 1) {
    $pa = $my_path . "/cw/dashboard.aspx";
//header("Location: $pa");   
}
$payment = $p1->fetch(PDO::FETCH_ASSOC);
?>

<section class="inner_page_info">
    <div class="gmap-area1">

        <div class="container">
            <div class="row profile">
                <div class="col-sm-8">
                    <h3 class="main-heading">Payment Info</h3>
                    <?php
                    if (isset($_GET['msg'])) {
                        $msg = $_GET['msg'];
                        if ($msg == 'updated') {
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
                            ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>	<i class="icon fa fa-check"></i> Payment Info has been updated!</h4>

                            </div>
                            <?php
                        }
                    }
                    ?>

                    <form name="submenus" action="<?php echo $my_path; ?>/cw/payment-info.aspx" method="post" class="form-horizontal" id="cwEditPaymentInfo" enctype="multipart/form-data">     
                        <div class="tabs-wrap profile_tabs_wrapper">

                            <div class="tab-content">

                                <div role="tabpanel" class=" active" id="personal_details">
                                    <h3 class="sub_heading">For Specific Domain</h3>
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">Industry </label>

                                            <select class="form-control" id="Industry" name="iid">
                                                <option value="">Select Industry</option>
                                                <?php
                                                $sql_dom = 'SELECT * FROM industry  order by name asc';
                                                $stmt_dom = $db->query($sql_dom);
//$stmt_dom->execute();

                                                if ($stmt_dom->rowCount() > 0) {
                                                    while ($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)) {
                                                        echo $row_dom['domain_name'];
                                                        ?>

                                                        <option  value="<?php echo $row_dom['id']; ?>" <?php
                                                        if ($payment["iid"] == $row_dom['id']) {
                                                            echo "selected";
                                                        }
                                                        ?>><?php echo $row_dom['name']; ?></option>
                                                                 <?php
                                                             }
                                                         }
                                                         ?>
                                            </select>
                                        </div>  
                                        <div class="col-lg-6">
                                            <label class="control-label" for="address">Domain  </label>

                                            <select class="form-control" id="Domain" name="Domain">
                                                <option value="">Select Domain</option>
                                                <?php
//    echo $user_info['Industry']."abc";
                                                $sql_dom = "SELECT * FROM domains where iid='$payment[iid]'";
                                                $stmt_dom = $db->query($sql_dom);
//$stmt_dom->execute();

                                                if ($stmt_dom->rowCount() > 0) {
                                                    while ($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)) {
                                                        //   echo $row_dom['domain_name'];
                                                        ?>

                                                        <option  value="<?php echo $row_dom['id']; ?>" <?php
                                                        if ($payment["did"] == $row_dom['id']) {
                                                            echo "selected";
                                                        }
                                                        ?>><?php echo $row_dom['name']; ?></option>
                                                                 <?php
                                                             }
                                                         }
                                                         ?>
                                            </select>
                                        </div>   
                                        <div class="clear"></div>
                                    </div>  
                                    <div class="form-group email_weapper">
                                        <div class="col-lg-6">
                                            <label class="control-label" for="special_fresher">Fresher Price </label>
                                            <input type="number" name="special_fresher" id="email_a" placeholder="Fresher Price" value="<?php echo $payment["special_fresher"]; ?>" class="form-control"  autocomplete="off">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="control-label" for="special_1_exp">1-3 Experience </label>
                                            <input type="number" name="special_1_exp" id="special_1_exp" placeholder="1-3 Experience" value="<?php echo $payment["special_1_exp"]; ?>" class="form-control"  autocomplete="off">
                                        </div>   
                                        <div class="col-lg-6">
                                            <label class="control-label" for="special_2_exp">3-5 Experience </label>
                                            <input type="number" name="special_2_exp" id="special_2_exp" placeholder="3-5 Experience" value="<?php echo $payment["special_2_exp"]; ?>" class="form-control"  autocomplete="off">
                                        </div> 
                                        <div class="col-lg-6">
                                            <label class="control-label" for="special_3_exp">5-10 Experience </label>
                                            <input type="number" name="special_3_exp" id="special_3_exp" placeholder="5-10 Experience" value="<?php echo $payment["special_3_exp"]; ?>" class="form-control"  autocomplete="off">
                                        </div>   
                                        <div class="col-lg-6">
                                            <label class="control-label" for="special_4_exp">10+ Experience </label>
                                            <input type="number" name="special_4_exp" id="special_4_exp" placeholder="10+ Experience" value="<?php echo $payment["special_4_exp"]; ?>" class="form-control"  autocomplete="off">
                                        </div> 
                                        <div class="col-lg-6">
                                            <label class="control-label" for="expected_special_delivery">Expected Delivery </label>
                                            <select class="form-control" id="expected_special_delivery" name="expected_special_delivery">
                                                <option value="3" <?php
                                                if ($payment["expected_special_delivery"] == "3") {
                                                    echo "selected";
                                                }
                                                ?>>0-3 Business Days</option>
                                                <option value="5" <?php
                                                if ($payment["expected_special_delivery"] == "5") {
                                                    echo "selected";
                                                }
                                                ?>>3-5 Business Days</option>
                                                <option value="7" <?php
                                                if ($payment["expected_special_delivery"] == "7") {
                                                    echo "selected";
                                                }
                                                ?>>5-7 Business Days</option>
                                            </select>
                                        </div>     
                                        <div class="clear"></div>
                                    </div>  

                                    <h3 class="sub_heading">For General Price</h3>

                                    <div class="form-group email_weapper">
                                        <div class="col-lg-6">
                                            <label class="control-label" for="general_fresher">Fresher Price <span class="imp">*</span> </label>
                                            <input type="number" name="general_fresher" id="email_a" placeholder="General Fresher Price" value="<?php echo $payment["general_fresher"]; ?>" class="form-control" required="required" autocomplete="off">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="control-label" for="general_1_exp">1-3 Experience <span class="imp">*</span></label>
                                            <input type="number" name="general_1_exp" id="general_1_exp" placeholder="1-3 Experience" value="<?php echo $payment["general_1_exp"]; ?>" class="form-control"  autocomplete="off" required>
                                        </div>   
                                        <div class="col-lg-6">
                                            <label class="control-label" for="general_2_exp">3-5 Experience <span class="imp">*</span></label>
                                            <input type="number" name="general_2_exp" id="general_2_exp" placeholder="3-5 Experience" value="<?php echo $payment["general_2_exp"]; ?>" class="form-control"  autocomplete="off" required>
                                        </div> 
                                        <div class="col-lg-6">
                                            <label class="control-label" for="general_3_exp">5-10 Experience <span class="imp">*</span></label>
                                            <input type="number" name="general_3_exp" id="general_3_exp" placeholder="5-10 Experience" value="<?php echo $payment["general_3_exp"]; ?>" class="form-control"  autocomplete="off" required>
                                        </div>   
                                        <div class="col-lg-6">
                                            <label class="control-label" for="general_4_exp">10+ Experience <span class="imp">*</span></label>
                                            <input type="number" name="general_4_exp" id="general_4_exp" placeholder="10+ Experience" value="<?php echo $payment["general_4_exp"]; ?>" class="form-control"  autocomplete="off" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="control-label" for="expected_delivery">Expected Delivery </label>
                                            <select class="form-control" id="expected_special_delivery" name="expected_delivery">
                                                <option value="3" <?php
                                                if ($payment["expected_delivery"] == "3") {
                                                    echo "selected";
                                                }
                                                ?>>0-3 Business Days</option>
                                                <option value="5" <?php
                                                if ($payment["expected_delivery"] == "5") {
                                                    echo "selected";
                                                }
                                                ?>>3-5 Business Days</option>
                                                <option value="7" <?php
                                                if ($payment["expected_delivery"] == "7") {
                                                    echo "selected";
                                                }
                                                ?>>5-7 Business Days</option>
                                            </select>
                                        </div>       
                                        <div class="clear"></div>
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
    });
</script>

<?php
ob_start();
if (isset($_POST['submit'])) {
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
    $expected_special_delivery = $_POST['expected_special_delivery'];
    $did = $_POST['Domain'];
    $expected_delivery = $_POST['expected_delivery'];

    $jsinsert = $db->query("update  cw_payment_info set 
iid='$iid',special_fresher='$special_fresher',special_1_exp='$special_1_exp',special_2_exp='$special_2_exp',special_3_exp='$special_3_exp',special_4_exp='$special_4_exp',general_fresher='$general_fresher',general_1_exp='$general_1_exp',general_2_exp='$general_2_exp',general_3_exp='$general_3_exp',general_4_exp='$general_4_exp',expected_special_delivery='$expected_special_delivery',expected_delivery='$expected_delivery',did='$did' where cwid=$user_info[Content_writer_id]");

    if ($jsinsert) {
        $pa = $my_path . "/cw/payment-info-updated.aspx";
        header("Location: $pa");
    } else {
        $pa = $my_path . "/cw/payment-info.aspx";
        header("Location: $pa");
    }
}
ob_end_flush();
?>  