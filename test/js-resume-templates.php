<?php
ob_start();
$page="resume-templates";
include "header.php";

?>
<section class="inner_page_info">
<div class="gmap-area1">

<div class="container">
<div class="row profile">
<div class="col-sm-12">
<h3 class="main-heading">Resume Templates</h3>

<div class="resume-search-form">
   <form id="search_resumes" method="post" action="<?php echo $my_path; ?>/job-seeker/resume-templates.aspx">
<div class="form-group">                
<div class="col-sm-3">
<label class="control-label" for="address">Profile Type <span class="imp">*</span> </label>

<select class="form-control" id="Domain" name="p_type">
      <option value="">Select Profile Type</option>
      <option value="Fresher" <?php if(isset($_POST["p_type"])) { if($_POST["p_type"]=="Fresher") { echo "selected"; }} ?>>Fresher</option>
      <option value="Experienced" <?php if(isset($_POST["p_type"])) { if($_POST["p_type"]=="Experienced") { echo "selected"; }} ?>>Experienced</option>
</select>
</div>
<div class="col-sm-3">
<label class="control-label" for="address">Industry <span class="imp">*</span> </label>

<select class="form-control" id="Industry1" name="Industry">
      <option value="">Select Industry</option>
<?php

$sql_dom='SELECT * FROM industry  order by name asc';
$stmt_dom = $db->query($sql_dom);
//$stmt_dom->execute();

if ($stmt_dom->rowCount() > 0){
while($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)){
   // echo $row_dom['domain_name']; ?>

<option  value="<?php echo $row_dom['id']; ?>" <?php if(isset($_POST["Industry"])) { if($_POST["Industry"]==$row_dom['id']) { echo "selected"; }} ?>> <?php echo $row_dom['name']; ?></option>
<?php
    }
}
    ?>
</select>
</div>  
    
 <div class="col-sm-3">
<label class="control-label" for="address">Domain</label>

<select class="form-control" id="Domain1" name="Domain">
      <option value="">Select Domain</option>
<?php if(isset($_POST["Domain"])) { 
$sql_dom = "SELECT * FROM domains where iid='$_POST[Industry]'";
$stmt_dom = $db->query($sql_dom);
//$stmt_dom->execute();

if ($stmt_dom->rowCount() > 0){
while($row_dom = $stmt_dom->fetch(PDO::FETCH_ASSOC)){
   // echo $row_dom['domain_name']; ?>

<option  value="<?php echo $row_dom['id']; ?>" <?php if(isset($_POST["Domain"])) { if($_POST["Domain"]==$row_dom['id']) { echo "selected"; }} ?>> <?php echo $row_dom['name']; ?></option>
<?php
    }
}
}
    ?>
</select>
</div>     
    
    <div class="col-sm-3">
    <input type="submit" name="submit" value="Get Resumes"  class="btn btn-primary btn-full open2"/>
</div>
    <div class="clear"></div>
 </div>   <div class="clear"></div>
            </form>
</div>

<div class="row dashboard resumes-wrapper">
<?php
if(isset($_POST["p_type"])) {
if($_POST['Industry']!=""){    
   
$jt=$db->query("select * from templates where iid='$_POST[Industry]' or did='$_POST[Domain]'");    
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
<div class="col-sm-3">
    <div class="s_template">    
<a href="<?php echo $my_path; ?>/job-seeker/t-<?php echo $row_dom["id"]; ?>/create-resume.aspx"><img class="thumb template-T1 img-responsive" data-key="T1" src="<?php echo $my_path; ?>/images/templates/<?php echo $row_dom["image1"]; ?>" >
    <h4>Select This</h4>
</a>
</div>
</div>  
    
<?php
        }
    }
}
else{
?>
 <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4>
    <i class="icon fa fa-times"></i> Sorry, No templates found!</h4>
</div>   
<?php    
}
}
?>

</div>





</div>


</div>
</div>
</div>
</section>  <!--/gmap_area -->

<?php
include "footer.php";
?>