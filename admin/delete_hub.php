<?php

ob_start();

include "header.php";



if(isset($_GET['uid']) && isset($_GET['pname']))

{

$id=$_GET['uid'];

$pname=$_GET["pname"];

/*

 * batches

 * 

 */

if($pname=='industry')

{

 $sql=$db->query("delete from industry where id='$id'") or die(mysql_error());

header("Location: manage_industries.php?msg=delete");     

}

/*

 * industry  Ends

 */



/*

 * domains

 * 

 */

if($pname=='domains')

{

 $sql=$db->query("delete from domains where id='$id'") or die(mysql_error());

header("Location: manage_domains.php?msg=delete");     

}

/*

 * domains  Ends

 */

/*

 * jobseeker

 * 

 */

if($pname=='jobseeker')

{

$db->query("delete from  js_skills where job_seeker_id=$id");

$db->query("delete from js_languages where Job_Seeker_Id=$id");

$db->query("delete from  js_educational_information where job_seeker_id=$id");

$db->query("delete from   js_work_experience where job_seeker_id=$id");

$sql=$db->query("delete from job_seeker where Job_Seeker_Id='$id'") or die(mysql_error());

header("Location: manage_jobseekers.php?msg=delete");     

}

/*

 * flight  Ends

 */



/*

 * CW
 * 
 */

if($pname=='cw')
{
$db->query("delete from  cw_skills where cwid=$id");
$db->query("delete from  cw_payment_info where cwid=$id");
$sql=$db->query("delete from content_writer where Content_writer_id='$id'") or die(mysql_error());
header("Location: manage_cw.php?msg=delete");     
}

/*
 * CW  Ends
 */



/*

 * domains

 * 

 */

if($pname=='template')

{

$sql=$db->query("select * from templates where id=$id") or die(mysql_error());

if($sql->rowCount()==1)

{

$res=$sql->fetch(PDO::FETCH_ASSOC);

$uploaded_dir="../images/templates/";

 $old_img1=$res['image1'];

 unlink($uploaded_dir.$old_img1);

 $sql=$db->query("delete from templates where id='$id'") or die(mysql_error());

}

header("Location: manage_templates.php?msg=delete");     

}

/*

 * template  Ends

 */







}

else{

	header("location:home.php");

}

?>