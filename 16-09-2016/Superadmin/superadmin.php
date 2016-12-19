<?php
include 'header.php'; 

$type=$_GET['type'];
if($type == 'home'){
include 'dashboard.php';
}
else if($type == 'profile'){
include 'my_profile.php';
}
else if($type == 'cp'){
include 'candidate_profile.php';
}
else if($type == 'cwp'){
include 'content_writter_profile.php';
}
else if($type == 'aa'){
include 'add_admin.php';
}
else if($type == 'ap'){
include 'admin_master.php';
}
else if($type == 'pwd'){
include 'change_password.php';
}
else if($type == 'rbo'){
include 'resume_by_own.php';
}
else if($type == 'rcw'){
include 'resume_content_writer.php';
}
else if($type == 'logout'){
include 'logout.php';
}
include 'footer.php';
?>