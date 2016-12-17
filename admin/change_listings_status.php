<?php
ob_start();
session_start();
require_once '../db.php';
$v=$_POST["value"];
$q=$_POST["id"];
$pname=$_POST["pname"];
if($q!="")
{
                  /**************batches listings change status***************/
    if($pname=='batches') {
    $quer4=$db->query("update batches set status='$v' where bid=$q") or die(mysql_error());
   }
                   /**************Cities listings change status***************/
    if($pname=='cities') {
    $quer4=$db->query("update cities set status='$v' where bid=$q") or die(mysql_error());
   }
             /**************jobseeker listings change status***************/
    if($pname=='jobseeker') {
    $quer4=$db->query("update job_seeker set status='$v' where Job_Seeker_Id=$q") or die(mysql_error());
   }
    if($pname=='cw') {
    $quer4=$db->query("update content_writer set status='$v' where Content_writer_id=$q") or die(mysql_error());
   }
}
?>