<?php
ob_start();
include "db.php";
$q=$_GET["q"];
?>
<option value="">Select Domain</option>
<?php
$sql1=$db->query("select * from  domains where iid='$q'  order by name asc") or die(mysql_error());
if ($sql1->rowCount() > 0){
while($row_dom = $sql1->fetch(PDO::FETCH_ASSOC)){
    //echo $row_dom['domain_name']; ?>

<option  value="<?php echo $row_dom['id']; ?>"><?php echo $row_dom['name']; ?></option>
<?php
    }
}
?>

