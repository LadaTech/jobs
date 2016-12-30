<?php
ob_start();
$page = "my-resumes";
include "header.php";
include 'js-session-check.php';
?>
<!--<link href="<?php echo $my_path; ?>/templates/css/extra_styles.css" rel="stylesheet">
<link href="<?php echo $my_path; ?>/templates/Css.jtp" rel="stylesheet">-->
<style>
    div.papersheet-outer{
        margin-right: 0px;
        margin-left: 0px;
        width: 100%;
    }
    table.table-wrapper, table.table-wrapper th {
        text-align: center;
    }
    table.table-wrapper td a {
        padding: 3px;
    }
    .down-dropdown {
        display: inline;
        margin: 8px;
    }
    table.table-wrapper .dropdown-menu {
        margin-top: -1px;
        min-width: 98px;
    }
</style>
<section class="inner_page_info">
    <div class="gmap-area1">

        <div class="container">
            <div class="row profile">
                <div class="col-sm-8">
                    <h3 class="main-heading">My Resumes 
                        <form class="s_form" action="<?php echo $my_path; ?>/job-seeker/my-resumes.aspx">
                            <div class="">
                                <input type="text" class="form-control" name="q" placeholder="Search Keyword"   value="<?php
                                if (isset($_GET["q"])) {
                                    echo $_GET["q"];
                                }
                                ?>"/>
                                <input type="submit" name="" value="Search" class="btn btn4" />
                            </div>   
                            <div class="clearfix"></div>
                        </form>

                    </h3>

                    <?php
                    if (isset($_GET['msg'])) {
                        $msg = $_GET['msg'];
                        if ($msg == 'resume-saved') {
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
                            ?>

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>	<i class="icon fa fa-check"></i> New Resume has been saved.</h4>

                            </div>
                            <?php
                        }
                        if ($msg == 'resume-updated') {
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
                            ?>

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>	<i class="icon fa fa-check"></i> Resume has been updated.</h4>

                            </div>
                            <?php
                        }
                        if ($msg == 'payment-success') {
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
                            ?>

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>	<i class="icon fa fa-check"></i> Congrats! Payment has been completed. Download your Resume</h4>

                            </div>
                            <?php
                        }
                        if ($msg == 'resume-deleted') {
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
                            ?>

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>	<i class="icon fa fa-check"></i> Resume has been deleted.</h4>

                            </div>
                            <?php
                        }
                        /*                         * *********************Resend  activatelinksent ********************************** */

                        if ($msg == 'payment-cancelled') {
//echo "<p class='msg'></p>";
//  $_SESSION["email"]="nagprasad4u@gmail.com";
                            ?>

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>	<i class="icon fa fa-check"></i> Sorry, Your payment has been cancelled! Please try again.</h4>

                            </div>
                            <?php
                        }
                        /*                         * *********************Payment Cancelled  activatelinksent ********************************** */
                    }
                    ?>

                    <div class="row my-resumes">
                        <?php
                        /*                         * ************** */
                        $ur = $db->query("update js_my_resumes set jsread=1 where jsid='$user_info[Job_Seeker_Id]'");
                        /*                         * ******************** */
                        if (isset($_GET["q"])) {
                            $q = $_GET["q"];

                            $forrid = (strlen($q) > 3) ? substr($q, -3) : $q;
//$rr="0";
//if(strpos("Self", $q) !== false) { echo $rr="1"; } 
                            $rr = "";
                            if ($q != "") {
//if(strpos('Content Writer',$q) !== false) { echo $rr="or cwid='1'"; }
                                if (strpos('content writer', strtolower($q)) !== false) {
                                    $rr = "or cwid!='0'";
                                }
                                if (strpos('self', strtolower($q)) !== false) {
                                    $rr = "or cwid='0'";
                                }
                            }

                            $sql1 = "SELECT * FROM js_my_resumes where jsid='$user_info[Job_Seeker_Id]' and (id like '%$q%' or status like '%$q%' or id='$forrid'  $rr ) order by id desc";
                            $stmt_dom = $db->query("$sql1");
                        } else {
                            $sql1 = "SELECT * FROM js_my_resumes where jsid='$user_info[Job_Seeker_Id]' order by id desc";
                            $stmt_dom = $db->query("$sql1 limit $id,$no");
                        }

//$stmt_dom->execute();

                        if ($stmt_dom->rowCount() == 0) {
                            ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4>	<i class="icon fa fa-times"></i> Sorry, No Resumes Found!</h4>
                            </div>
                            <?php
                        } else {
                            ?>
                            <table class="table-wrapper">
                                <thead>
                                <th>Resume ID</th>
                                <th>Created By</th>
                    <!--            <th>PDF File</th>-->
                    <!--            <th>Preview</th>-->
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
//$lor="001";
                                    while ($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)) {
                                            if($row_dom['quick_resume_type'] == 'qr_fresher'){
                                                $editPath = $my_path. "/quick-resume-fresher.php?qr_last_id=".$row_dom["quick_resume_id"];
                                            } else if($row_dom['quick_resume_type'] == 'qr_exp') {
                                                $editPath = $my_path. "/quick-resume.php?qr_last_id=".$row_dom["quick_resume_id"];
                                            } else {
                                                $editPath = '';
                                            }
                                        ?>    
                                        <tr>
                                            <td>JR<?php echo date("dmy", strtotime($row_dom['created_on'])); ?><?php echo sprintf("%03d", $row_dom['id']); ?>
                                            </td>
                                            <td><?php
                                                if ($row_dom["cwid"] != "0") {
                                                    echo "Content Writer";
                                                } else if ($row_dom["quick_resume_id"] != "0") {
                                                    echo "Quick Resume";
                                                } else {
                                                    echo "Self";
                                                }
                                                ?></td>
                            <!--                <td><?php
                                            if ($row_dom["pdf_file"] != "") {
                                                echo "";
                                            } else {
                                                echo "-";
                                            }
                                            ?></td>-->
                            <!--<td><a class="preview" data-rid="<?php echo $row_dom["id"]; ?>"><i class="fa fa-eye"></i> Preview</a></td>                -->
                                            <td>
                                                <?php echo $row_dom["status"]; ?></td><td>
                                                <a title='Preview' class="preview" data-rid="<?php echo $row_dom["id"]; ?>"><i class="fa fa-eye"></i></a> 
                                                <a  href="<?php echo $editPath  ; ?>">Edit</a> 
                                                <div class="dropdown down-dropdown">
                                                    <button class="btn btn-primary dropdown-toggle download-btn" type="button" data-toggle="dropdown"><i class="fa fa-download"></i>
                                                        <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a  href="<?php echo $my_path; ?>/job-seeker/r-<?php echo $row_dom["id"]; ?>/pdf-download.aspx" ><i class="fa fa-download"></i> As PDF</a> 
                                                        </li>
                                                        <!--<li>
                                                         <a class="doc-download" data-rid="<?php echo $row_dom["id"]; ?>"><i class="fa fa-download"></i> As Doc</a>   
                                                        </li>-->
                                                    </ul>
                                                </div>  
                                                <a href="<?php echo $my_path; ?>/job-seeker/r-<?php echo $row_dom["id"]; ?>/delete-resume.aspx" onclick="javascript:return confirm('Do you want Delete This?');" class="btn-rsms" title='Delete'><i class="fa fa-trash-o"></i></a>
                                            </td></tr>
                                    <?php } ?> 
                                </tbody>
                            </table>


                        <?php } ?>
                    </div>


                    <div class="clearfix"></div>                
                    <div class="center">
                        <ul class="pagination">
                            <?php
                            include 'pagination.php';
                            if (!isset($_GET["q"])) {
                                $r_url = $my_path . "/job-seeker/my-resumes";
                                $obj->page($sql1, $no, $r_url, $db);
                            }
                            ?>
                        </ul><!-- End Pagination -->                     
                    </div>          


                </div>
                <div class="col-sm-4">

                    <?php require_once 'js_sidebar.php'; ?>      

                </div>

            </div>
        </div>
    </div>
</section>  <!--/gmap_area -->


<!-- Preview Popup-->  
<div class="modal fade in" id="preview-popup" role="dialog" aria-hidden="false">
    <div class="modal-dialog">

        <!-- Preview  POPUP  content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>

                <h3><span>Resume Preview</span></h3> 
            </div>
            <div class="papersheet-outer" id="resume">    
                <div class="modal-body" id="resume-viewer">


                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- Preview POPUP  content End-->
    </div>
</div>
<!-- Preview Popup End-->  

<!--For Document Download-->
<div id="docresume_css" class="hide">

</div>
<div class="hide doc-resume" id="resume-viewer">


</div>
<!--For Document End Download-->

<?php
include "footer.php";
?>

<script src="<?php echo $my_path; ?>/js/FileSaver.js"></script>
<script src="<?php echo $my_path; ?>/js/jquery.wordexport.js"></script>
<script>
$(".doc-download").click(function () {
    $id = $(this).data("rid");
    $.ajax({
        type: "get",
        url: "<?php echo $path; ?>/get_js_resume.php",
        data: {"id": $id},
        success: function (data) {
//alert(data);
            $(".doc-resume").empty().html(data);
            $("#docresume_css").empty().html($(".doc-resume style").text());
            $(".doc-resume style").text("");
//$("#preview-popup").modal("show");
            $resumeName = "Resume-" + $id + ".doc";
            saveDoc();
//alert($(".doc-resume").html());
//$(".doc-resume").wordExport();
        }
    });
});

$(".preview").click(function () {
    $id = $(this).data("rid");
    $.ajax({
        type: "get",
        url: "<?php echo $path; ?>/get_js_resume.php",
        data: {"id": $id},
        success: function (data) {
                //alert(data);
            $(".modal-body").empty().html(data);
            $("#preview-popup").modal("show");
        }
    });
//    $(this).closest(".preview_content").html();
//    $(".modal-header").html()
});
</script>






<?php
//if($row_dom["amount"]!="paid"){
?>
<!--<a href="<?php echo $my_path; ?>/job-seeker/r-<?php echo $row_dom["id"]; ?>/edit-resume.aspx" class="btn-rsms"><i class="fa fa-pencil"></i> Edit</a> 

<a href="<?php echo $my_path; ?>/job-seeker/r-<?php echo $row_dom["id"]; ?>/order-now.aspx" class="btn-rsms" title='Pay Now'><i class="fa fa-money"></i></a> 

<a href="<?php echo $my_path; ?>/job-seeker/r-<?php echo $row_dom["id"]; ?>/delete-resume.aspx" onclick="javascript:return confirm('Do you want Delete This?');" class="btn-rsms" title='Delete'><i class="fa fa-trash-o"></i></a>
-->
<?php //} else {    ?>
<!--
<div class="dropdown down-dropdown">
    <button class="btn btn-primary dropdown-toggle download-btn" type="button" data-toggle="dropdown"><i class="fa fa-download"></i>
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <li>
           <a  href="<?php echo $my_path; ?>/job-seeker/r-<?php echo $row_dom["id"]; ?>/pdf-download.aspx" ><i class="fa fa-download"></i> As PDF</a> 
        </li>
        <li>
         <a class="doc-download" data-rid="<?php echo $row_dom["id"]; ?>"><i class="fa fa-download"></i> As Doc</a>   
        </li>
    </ul>
  </div>
-->
<?php //} 
?>