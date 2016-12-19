<?php
include "header.php";
include_once 'page_number.php';
?>
<div class="content-wrapper"><!-- Content Header (Page header) -->
    <section class="content-header"><h1>Manage  Templates</h1><ol class="breadcrumb"><li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Manage Templates</li></ol></section><section class="content"><!-- Small boxes (Stat box) --><?php if(isset($_GET['msg'])){$msg = $_GET['msg'];
if($msg=='created'){//echo "<p class='msg'></p>"; ?><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>	<i class="icon fa fa-check"></i> New Template has been added</h4></div><?php }if ($msg == 'updated') {//echo "<p class='msg'>user has been updated</p>"; ?><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>	<i class="icon fa fa-check"></i> Template has been updated</h4></div><?php }if ($msg == 'delete') {//echo "<p class='msg'>user has been deleted</p>"; ?><div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>	<i class="icon fa fa-check"></i> Template has been deleted</h4></div><?php }if ($msg == 'non') {//echo "<p class='rmsg'>Sorry, unable to add new user</p>"; ?><div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>	<i class="icon fa fa-check"></i> Sorry, unable to add new Template!</h4></div><?php }if ($msg == 'nopl') {//echo "<p class='rmsg'>Sorry, This email already exist</p>"; ?><div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>	<i class="icon fa fa-check"></i> Sorry, This Template already exist!</h4></div><?php }} ?><div class="row margin-bottom"><div class="col-xs-6"> <form method='GET' name='regform' action=''><table width="530"><tr>        <td width="50"><select name="ad_cat" id="" value="" class="form-control" required="required" >    <option value="">Select Industry</option><?php $sql = $db->query("select * from industry order by name asc");
if ($sql->rowCount() > 0) {
    while ($row_dom = $sql->fetch(PDO::FETCH_ASSOC)) {    //echo $row_dom['domain_name'];  ?><option  value="<?php echo $row_dom['id']; ?>" <?php if (isset($_GET['ad_cat'])) {
            if ($_GET['ad_cat'] == $row_dom['id']) {
                echo "selected";
            }
        } ?>><?php echo $row_dom['name']; ?></option><?php }
} ?>    </select>        </td>                 <td width="50"><input type="submit"   id="" value="GO" placeholder="Search School" class="btn btn-primary" required="required" /></td></tr></table></form>	</div><div class="col-xs-6">    <?php if (isset($_GET['ad_cat'])) { ?><div class="col-xs-3"><div class="input-group">    <a href="manage_templates.php" class="btn btn-success">View All</a></div></div><?php } ?>

                <a href="add_template.php" class="btn bg-purple pull-right fc-right">Add New Template</a></div></div><div class="row"><div class="col-xs-12">					<div class="box"><div class="box-header"></div><div class="box-body"><table id="example2" class="table table-bordered table-hover"><thead><tr class="tr-header">										
                                    <th>Template</th>      
                                    <th>Template Name</th>      
                                    <th>Industry</th>   
                                    <th>Domain</th>   
                                    <th>Actions</th></tr></thead><tbody>
<?php $loop_page = 'template';
if (isset($_GET['ad_cat'])) {
    $q = $_GET['ad_cat'];
    $sql1 = "select *,(select name from industry where  id=i.iid) as iname,(select name from domains where  id=i.did) as dname from templates i where iid like '%$q%'  order by  name asc";
    $rs = $db->query("$sql1 limit $id,$no") or die(mysql_error());
    include "loop_hub.php";
} else {
    $sql1 = "select *,(select name from industry where  id=i.iid) as iname,(select name from domains where  id=i.did) as dname from templates i order by  id asc";
    $rs = $db->query("$sql1 limit $id,$no") or die(mysql_error());
    include "loop_hub.php";
} ?>																			</tbody></table> <div class="pull-right margin-right" >
    <ul class="pagination"><?php if(isset($_GET['ad_cat'])){include 'pagination.php'; // echo $_SERVER['REQUEST_URI'];
    $r_url="manage_templates.php?ad_cat=$_GET[ad_cat]";$obj->page1($sql1,$no,$r_url,$db);}else  {  include 'pagination.php';  $obj->page($sql1,$no,"manage_templates",$db);
    } ?>
    </ul></div>   </div>    </div></div></div>			</section><!-- /.content --><!-- content pages -->							

<?php
    
include "footer.php"; 
?>		