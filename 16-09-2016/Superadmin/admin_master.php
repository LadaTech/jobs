<?php
include_once '../db.php';

include_once 'admin_model.php';

$admin = new Admin($db);


?>
<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>Record was inserted successfully..</strong>  
	</div>
	</div>
    <?php
}
else if(isset($_GET['in_failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong>SORRY!</strong> ERROR while inserting record !
	</div>
	</div>
    <?php
}
?>
<?php
if(isset($_GET['updated']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>Record was updated successfully..</strong>  
	</div>
	</div>
    <?php
}
else if(isset($_GET['up_failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong>SORRY!</strong> ERROR while updating record !
	</div>
	</div>
    <?php
}
?>

<?php
	if(isset($_GET['deleted']))
	{
		?>
        <div class="alert alert-success">
    	<strong>Success!</strong> record was deleted... 
		</div>
        <?php
	}
	
	?>
<div class="clearfix"></div>

<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="" style="">

 	<section class="forms-basic">
        <div class="page-header">
              <h1>      <i class="md md-input"></i>      Create Contentwriter    </h1>
            </div>
<div class="well white">
<a href="add_admin.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Admin</a>

<div class="clearfix"></div>


<br />

	 <table class='table table-bordered table-responsive'>
     <tr>
     <th>S.No</th>
     <th>Admin Name</th>
     <th>Email ID</th>
     <th>Status</th>
     <th colspan="2" align="center">Actions</th>
     </tr>
     <?php
		$query = "SELECT * FROM admin order by ADMIN_ID asc";       
		$records_per_page=10;
		$newquery = $admin->paging($query,$records_per_page);
		$admin->dataview($newquery);
	 ?>
    <tr>
        <td colspan="7" align="center">
 			<div class="pagination-wrap">
            <?php $admin->paginglink($query,$records_per_page); ?>
        	</div>
        </td>
    </tr>
 
</table>
   </div>
       


    </section>
</div>