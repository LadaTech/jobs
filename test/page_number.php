<?php
    $no=20;
    if(isset($_GET['page']) && $_GET['page']!=1)
        {
            $pid=$_GET['page']-1;
            $id=$pid*$no;
        }
        else 
        {
            $id=0;
        }
?>
