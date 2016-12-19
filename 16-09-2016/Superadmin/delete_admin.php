<?php
include_once '../db.php';
include_once 'admin_model.php';

$admin = new admin($db);

if(isset($_POST['btn-del']))
{
	$id = $_GET['delete_id'];
	$admin->delete($id);
	header("Location: admin_master.php?deleted");	
}

?>

<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">

		
</div>

<div class="clearfix"></div>

<div class="container">
 	
	 <?php
	 if(isset($_GET['delete_id']))
	 {
		 ?>
         <table class='table table-bordered'>
         <tr>
         <th>S.No</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>E - mail ID</th>
         <th>Gender</th>
         </tr>
         <?php
         $stmt = $db->prepare("SELECT * FROM admin WHERE ADMIN_ID=:id");
         $stmt->execute(array(":id"=>$_GET['delete_id']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
             <td><?php print($row['ADMIN_ID']); ?></td>
             <td><?php print($row['ADMIN_USERNAME']); ?></td>
             <td><?php print($row['EMAIL']); ?></td>
             <td><?php print($row['ADMIN_GENDER']); ?></td>
         	 <td><?php print($row['ADMIN_STATUS']); ?></td>
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
	 }
	 ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['delete_id']))
{
	?>
  	<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['ADMIN_ID']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="admin_master.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
	<?php
}
else
{
	?>
    <a href="admin_master.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back</a>
    <?php
}
?>
</p>
</div>	
<?php include_once 'footer.php'; ?>