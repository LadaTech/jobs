<?php
include ("db.php");
$sql_dom="ALTER TABLE `js_skills` ADD `skill_title` TEXT NOT NULL AFTER `updated_time`;";
$stmt_dom = $db->query($sql_dom);
?>



