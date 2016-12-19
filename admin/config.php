<?php
include "../db.php";
$dbcnx = @mysql_connect ("$DB_host", "$DB_user", "$DB_pass");
if (!$dbcnx)
  {
    echo ("<P>Unable to connect to the "."database server at this time.</P>".
	  mysql_error ());
    exit ();
  }
if (!@mysql_select_db ("$DB_name"))
  {
    echo ("<P>Unable to locate the database</P>");
    exit ();
  }
//$con_logo=mysql_query("select * from logo_info where lid=1") or die(mysql_error());
//$logo_info=mysql_fetch_assoc($con_logo);
//$compnay_name=$logo_info["title"];
//$company_url="#";
//$compnay_small_name=$logo_info["short_title"];
//$logo_img_url=$logo_info["logo"];
//$fav_icon_url=$logo_info["fav_icon"];
//$path="http://localhost/travel/";
//$my_path="http://localhost/travel";
//




?>