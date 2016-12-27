<?php
ob_start();
$page = "my-resumes";
include "header.php";
include 'js-session-check.php';
if (!isset($_GET["id"])) {
    $p_a = $my_path . "/job-seeker/dashboard.aspx";
    header("Location: $p_a");
}
if (isset($_POST['submit'])) {
    //Product Info
    $orderInfo = array();
    $orderInfo['item_number'] = $_POST['item_number'];
    $orderInfo['item_name'] = $_POST['item_name'];
    $orderInfo['jsid'] = $user_info['Job_Seeker_Id'];
    $orderInfo['rtype'] = 'self';
    include_once 'library/ccavenue_gateway/CCAvenue.php';
    $ccpayObj = new CCAvenue();
    $formData['tid'] = date('YmdHis');
    $formData['order_id'] = date('YmdHis');
    $formData['merchant_param1'] = str_replace(array('&', '='), array('|', ','), http_build_query($orderInfo));
    $formData['order_id'] = date('YmdHis');
    $formData['amount'] = $_POST['price'] = '1.00';
    $formData['redirect_url'] = $my_path . '/js-payment-success.php';
    $formData['cancel_url'] = $my_path . '/js-payment-failure.php';
    $ccpayObj->request($formData);
}
?>
<style>
    div.papersheet-outer{
        margin-right: 0px;
        margin-left: 0px;
        width: 100%;
    }
</style>
<section class="inner_page_info">
    <div class="gmap-area1">

        <div class="container">
            <div class="row profile">
                <div class="col-sm-12">
                    <h3 class="main-heading">Order Confirmation</h3>

                    <?php
                    if (isset($_GET['msg'])) {
                        $msg = $_GET['msg'];
                        if ($msg == 'approved') {
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
                            ?>

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>	<i class="icon fa fa-check"></i> Invitation has been approved.</h4>
                            </div>
                            <?php
                        }
                        if ($msg == 'canceled') {
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
                            ?>

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Invitation has been canceled.</h4>
                            </div>
                            <?php
                        }
                    }
                    ?>

                    <div class="row my-resumes">
                        <div class="col-sm-6 resume_preview" id="resume-viewer">
                            <?php
                            $sql_dom = "SELECT m.*,t.name,m.id myId FROM js_my_resumes m LEFT JOIN templates t ON m.selected_template = t.id where m.jsid='$user_info[Job_Seeker_Id]' and m.id=$_GET[id]";
                            $stmt_dom = $db->query($sql_dom);
//$stmt_dom->execute();
                            if ($stmt_dom->rowCount() == 1) {
                                $rt = $stmt_dom->fetch(PDO::FETCH_ASSOC);
                                echo $rt["resume_text"];
                            } else {
                                $p_a = $my_path . "/job-seeker/dashboard.aspx";
                                header("Location: $p_a");
                            }
                            ?>       
                        </div>
                        <div class="col-sm-6" >
                            <div id="mblfireworks">
                                <div class="order-confirm">
                                    <p style="padding:5px; background-color:#FFFFCC" >
                                        To download the resume as PDF format, Pay Rs.130/-
                                    </p>
                                </div>
                            </div>
                            <form name="customerData" action="" class="display-inline" method="post">
                                <input type="hidden" name="item_number" value="<?php echo $rt["myId"]; ?>" /> 
                                <input type="hidden" name="item_name" value="<?php echo $rt["name"]; ?>" />   
                                <div class="col-sm-6 col-sm-offset-3 div-paynow">
                                    <input type="submit" name="submit" class="btn  toolbar btn btn-primary open2 btn-full" value="Pay Now">
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
                <!--    <div class="col-sm-4">
                      
                <?php //require_once 'cw_sidebar.php';  ?>      
                        
                    </div>-->

            </div>
        </div>
    </div>
</section>  <!--/gmap_area -->
<?php
include "footer.php";
?>
<script>
    $(".btn-paynow").click(function () {
        $(".div-paynow").empty().html("<img src='<?php echo $my_path; ?>/images/loading.gif' alt='Processing' />");
        $("form").submit();
    });
</script>
<script src="http://mybloggerlab.com/Scripts/fireworks.js" type="text/javascript"></script>

<script>
    /*Fire Works By MyBloggerLab.com*/
    jQuery(function ($) {
        Xteam.fireworkShow('#mblfireworks', 50);
    });

    var blink_speed = 200;
    var t = setInterval(function () {
        var ele = document.getElementById('blinker');
        ele.style.color = (ele.style.color == 'orange' ? '#cccc00' : ele.style.color == 'red' ? 'orange' : 'red');
    }, blink_speed);
</script>

<script>
    window.onload = function () {
        var d = new Date().getTime();
        document.getElementById("tid").value = d;
    };
</script>