<?php
ob_start();
$page="dashboard";
include "header.php";
include 'js-session-check.php';
?>
<section class="inner_page_info">
<div class="gmap-area1">
    <div class="container">
        <div class="row profile">
            <div class="col-sm-8">
                <div class="alert alert-info">
                    <p>Congrats! Your payment has done. To download resume as pdf format, <a href="get_js_resume_pdf_download.php?id=<?php echo $_GET['q'];?>">Click here </a> <p>
                </div>
            </div>
            <div class="col-sm-4">
            <?php require_once 'js_sidebar.php'; ?>      
            </div>
        </div>
    </div>
</div>
</section>

<?php include "footer.php"; ?>