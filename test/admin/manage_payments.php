<?php
$page = 'Payments';
include "header.php";
include_once 'page_number.php';
?>
<script type="text/javascript">
    $(document).ready(function () {
        $('.myonoffswitch').click(function () {
            var abc = $(this).data('value');
//alert(abc);
            $v = "#myonoffswitch" + abc;
//alert($v);
            var myonoffswitch = $($v).val();
//alert(myonoffswitch);
            if ($($v + ":checked").length == 0)
            {
                var a = "0";
            }
            else
            {
                var a = "1";
            }

//alert(a);
            $.ajax({
                type: "POST",
                url: "change_listings_status.php",
                data: "value=" + a + "&id=" + abc + "&pname=batches",
                success: function (html) {
                    // alert(html);
                    $("#display").html(html).show();
                    if (html == "error")
                    {
                        $('.my_alertn').show();

                        $($v).removeAttr('checked');
                    }
                }
            });
        });
    });
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage  Payments
        </h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Payments</li>
        </ol>
    </section>

    <section class="content">
        <!-- Small boxes (Stat box) -->
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            if ($msg == 'created') {
//echo "<p class='msg'></p>";
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> New Domain has been added</h4>

                </div>
        <?php
    }
    if ($msg == 'updated') {
//echo "<p class='msg'>user has been updated</p>";
        ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Domain has been updated</h4>

                </div>
        <?php
    }
    if ($msg == 'delete') {
//echo "<p class='msg'>user has been deleted</p>";
        ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Domain has been deleted</h4>

                </div>
        <?php
    }
    if ($msg == 'non') {
//echo "<p class='rmsg'>Sorry, unable to add new user</p>";
        ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Sorry, unable to add new Domain!</h4>

                </div>
        <?php
    }
    if ($msg == 'nopl') {
//echo "<p class='rmsg'>Sorry, This email already exist</p>";
        ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Sorry, This Domain already exist!</h4>

                </div>
                <?php
            }
        }
        ?>
        <div class="row margin-bottom">
            <div class="col-xs-6"> 
                <form method='GET' name='regform' action=''>
                    <table width="530">
                        <tr>
                            <td width="50">
                                <input type="text" class="form-control date" autocomplete="off" placeholder="Search by  date" name="ad_cat" style="margin-right: 15px" value="<?php if (isset($_GET['ad_cat'])) {
            echo $_GET['ad_cat'];
        } ?>" id="post_cat" required="required">
                            </td>

                            <td width="50"><input type="submit"   id="" value="GO" placeholder="Search School" class="btn btn-primary" required="required" /></td>
                        </tr>
                    </table>
                </form>	
            </div>
            <div class="col-xs-6">
<?php if (isset($_GET['ad_cat'])) { ?>
                    <div class="col-xs-3">
                        <div class="input-group">
                            <a href="manage_payments.php" class="btn btn-success">View All</a>
                        </div>
                    </div>
<?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="mand_indu col-xs-12">					
                <div class="box">
                    <div class="box-header">
                    </div>

                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr class="tr-header">												
                                    <th>Job Seeker Name</th>
                                    <th>Resume Type</th>
                                    <th>Content Writer Name</th>
                                    <th>Transaction No</th>
                                    <th>Payment Status</th>
                         <!--            <th>PDF File</th>-->
                                    <th>Amount</th>
                                    <th>Transaction On</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
$loop_page = 'payments';
if (isset($_GET['ad_cat'])) {
    $q = $_GET['ad_cat'];
    $sql1 = "SELECT *, (select First_name from job_seeker where Job_Seeker_Id=i.jsid) as jname FROM  payments i where created_on like '%$q%'  order by  id desc";
    $rs = $db->query("$sql1 limit $id,$no") or die(mysql_error());
    include "loop_hub.php";
} else {
    
    
//    $sql1 = "SELECT *, (select First_name from job_seeker where Job_Seeker_Id=i.jsid) as jname FROM  payments i  order by id desc";
    
    $sql1 = "SELECT p.*,js.First_name,cwo.cwid,case when cwo.cwid AND p.rtype='cw'  then concat(cw.First_name,' ',cw.Last_name) else '' END cw_name 
        FROM  payments p LEFT JOIN job_seeker js ON p.jsid=js.Job_Seeker_Id LEFT JOIN 
        (SELECT cwo.cwid as cwid,cwo.jid from payments p LEFT JOIN cw_ordernow cwo ON p.jsid=cwo.jid  
        where p.rtype='cw' and p.item_number = cwo.selected_template) as cwo ON cwo.jid = p.jsid 
        LEFT JOIN content_writer cw ON cw.Content_writer_id = cwo.cwid order by p.created_on DESC;
        ";
    
    $rs = $db->query("$sql1 limit $id,$no") or die(mysql_error());
    include "loop_hub.php";
}
?>																			
                            </tbody>
                        </table>
                        <div class="pull-right margin-right" >
                            <ul class="pagination">
                                <?php
                                if (isset($_GET['ad_cat'])) {
                                    include 'pagination.php';
// echo $_SERVER['REQUEST_URI'];
                                    $r_url = "manage_payments.php?ad_cat=$_GET[ad_cat]";
                                    $obj->page1($sql1, $no, $r_url, $db);
                                } else {
                                    include 'pagination.php';
                                    $obj->page($sql1, $no, "manage_payments", $db);
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>			

    </section><!-- /.content -->
    <!-- content pages -->							
<?php
include "footer.php";
?>		

    <!-- Preview Popup-->  
    <div class="modal fade in" id="preview-popup" role="dialog" aria-hidden="false">
        <div class="modal-dialog">

            <!-- Preview  POPUP  content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>

                    <h3><span>Details</span></h3> 
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
    <script>
        $(".jspreview").click(function () {
            $id = $(this).data("rid");
    //alert($id);
            $.ajax({
                type: "get",
                url: "<?php echo $path; ?>/get_js_details.php",
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

    <script>
        $(".cwpreview").click(function () {
            $id = $(this).data("rid");
    //alert($id);
            $.ajax({
                type: "get",
                url: "<?php echo $path; ?>/get_cw_details.php",
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

        $(function () {
            $('.date').datepicker({
                dateFormat: "yy-mm-dd"
            });

        });
    </script>