<?php 
include_once 'db.php';
if(isset($_POST['htmlCode']) && $_POST['htmlCode'] != ''  ) {
    $filename = $qr_files_path . $_POST['filename'];
    if(file_put_contents($filename, $_POST['htmlCode'])){
        echo "done";
    } else {
        echo "0";
    }
}

?>