<?php
ob_start();
include "db.php";
$q=$_GET["q"];
$r=$_GET["r"];
?>
<?php    
$jt=$db->query("select * from templates where iid=$q and did=$r");    
if($jt->rowCount()==0)
{
?>
 <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>
    <i class="icon fa fa-times"></i> Sorry, No templates found!</h4>
</div>   
<?php
}
else{
while($row_dom = $jt->fetch(PDO::FETCH_ASSOC)){    
?>
<div class="col-sm-4">
    <div class="s_template s_t1">    
<a><img class="thumb template-T1 img-responsive" data-key="T1" src="<?php echo $my_path; ?>/images/templates/<?php echo $row_dom["image1"]; ?>" >
    <h4> <input type="radio" name="selected_template" value="<?php echo $row_dom['id']; ?>" >Select This</h4>
</a>
</div>
</div>  
    
<?php
        }
    }
 ?>  