<?php
ob_start();
include_once "db.php";
function check_input($r){
	$r=trim($r);
	$r=strip_tags($r);
	$r=stripslashes($r);
	$r=htmlentities($r);
	$r=mysql_real_escape_string($r);
	return $r;
	}
if (isset($_POST['uname'],$_POST['pwd'])){
	
	$u=$_POST['uname'];
	$p=$_POST['pwd'];	
	echo "usernmae:".$u;
	try{
	//$db=get_db();
	
	//superadmin check 
	$stmts=$db->prepare("SELECT * FROM superadmin WHERE SA_UNAME = :u && SA_PWD = :p");
	
	
	$stmts->execute(array(":u"=>$u,":p"=>$p));
	
	$sa=$stmts->fetch(PDO::FETCH_ASSOC);
	
	
	
	// admin check
	$stmta=$db->prepare("SELECT * FROM admin WHERE ADMIN_USERNAME = :u && ADMIN_CPSW = :p");
	
	$stmta->execute(array(":u"=>$u,":p"=>$p));
	
	$a=$stmta->fetch(PDO::FETCH_ASSOC);
	
	// content writer login check query
	$stmtc=$db->prepare("SELECT * FROM content_writer WHERE User_name = :u && Confirm_password = :p");
	
	$stmtc->execute(array(":u"=>$u,":p"=>$p));
	
	$cw=$stmtc->fetch(PDO::FETCH_ASSOC);
	
	$uname = $cw['User_name'];
	$cid = $cw['Content_writer_id'];

	// job seeker login check query
	$stmtjs=$db->prepare("SELECT * FROM job_seeker WHERE User_name = :u && Confirm_password = :p");
	//$sql='SELECT * FROM job_seeker WHERE User_name like "'.$u.'" && Confirm_password like  "'.$p.'"';
	//echo $sql;
	//$row_countn = $stmtjs->rowCount();
	
	
	$stmtjs->execute(array(":u"=>$u,":p"=>$p));
	
	$js=$stmtjs->fetch(PDO::FETCH_ASSOC);
	
	
	
	if($sa){
		session_start();
		
		$_SESSION['SA_ID']=$sa['SA_ID'];
		$_SESSION['USERTYPE_ID']=$usertype;
		if ($usertype==1){
			header("Location:Superadmin/Superadmin.php?type=home");
			}	
				else{
					header("Location:index.php?err=1&ut=sa");

					}
		}
		
	else
	
	if($a){
		session_start();
		
		$_SESSION['id']=$r['SA_ID'];
		$_SESSION['USERTYPE_ID']=$usertype;
		if ($usertype==2){
			header("Location:administrator\administrator.php?type=home");
			}	
				else{
					header("Location:index.php?err=1&ut=ad");

					}
		}
	
	else
	
	if($cw){
		session_start();
		$usertype=$cw['usertype_id'];
		//$_SESSION['id']=$r['SA_ID'];
        $_SESSION['content_writer_Id']=$cid;
		$_SESSION['USERTYPE_ID']=$usertype;
		if ($usertype==3){
			echo "welcome Content Writer";
            header("Location:ContentWriter\contentwriter.php?type=home");
			}	
				else{
					header("Location:index.php?err=1&ut=cw");
					}
		}
	
	
	else
	
	if($js){
		session_start();
		$usertype=$js['usertype_id'];
		$uname = $js['User_name'];
	$jid = $js['Job_Seeker_id'];
		
		$_SESSION['USERTYPE_ID']=$usertype;
		$_SESSION['User_name']=$uname ;
		$_SESSION['Job_Seeker_Id']=$jid;
		if ($usertype==4){
			
			
			
			//header("Location:jobseeker\jobseeker_dashboard.php?js_id=$jid");
			header("Location:jobseeker\jobseeker.php?type=home");
			}	
				else{
					header("Location:index.php?err=1&ut=js");
					}
		}
	
	
	else{
		header("Location:index.php?err=2");
		}
	}
	catch(PDOException $e){
		die("Database error: ".$e->getMessage());
	}
	
}
else {
	header("Location:index.php");
	}
?>
