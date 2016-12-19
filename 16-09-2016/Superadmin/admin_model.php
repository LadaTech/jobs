<?php

class admin
{
	private $db;
	
	function __construct($db)
	{
		$this->db = $db;
	}
	
	public function create($ADMIN_USERNAME,$ADMIN_PSW,$ADMIN_CPSW,$ADMIN_EMAIL_ID,$ADMIN_GENDER,$ADMIN_STATUS)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO admin(
ADMIN_USERNAME,ADMIN_PSW,ADMIN_CPSW,EMAIL,ADMIN_GENDER,ADMIN_STATUS) VALUES(:ADMIN_USERNAME,  :ADMIN_PSW, :ADMIN_CPSW, :ADMIN_EMAIL_ID, :ADMIN_GENDER, :ADMIN_STATUS)");
//echo $stmt;
//exit();
			$stmt->bindparam(":ADMIN_USERNAME",$ADMIN_USERNAME);
			$stmt->bindparam(":ADMIN_PSW",$ADMIN_PSW);
			$stmt->bindparam(":ADMIN_CPSW",$ADMIN_CPSW);
			$stmt->bindparam(":ADMIN_EMAIL_ID",$ADMIN_EMAIL_ID);
			$stmt->bindparam(":ADMIN_GENDER",$ADMIN_GENDER);
			$stmt->bindparam(":ADMIN_STATUS",$ADMIN_STATUS);
			
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	
	public function getID($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM admin WHERE ADMIN_ID=:id");
		
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update($id,$ADMIN_USERNAME,$ADMIN_PSW,$ADMIN_CPSW,$ADMIN_EMAIL_ID,$ADMIN_GENDER,$ADMIN_STATUS)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE admin SET ADMIN_USERNAME=:ADMIN_USERNAME,  ADMIN_PSW=:ADMIN_PSW, ADMIN_CPSW=:ADMIN_CPSW, EMAIL=:ADMIN_EMAIL_ID, ADMIN_GENDER=:ADMIN_GENDER, ADMIN_STATUS=:ADMIN_STATUS
            WHERE ADMIN_ID=:id ");
			$stmt->bindparam(":ADMIN_USERNAME",$ADMIN_USERNAME);
			
			$stmt->bindparam(":ADMIN_PSW",$ADMIN_PSW);
			$stmt->bindparam(":ADMIN_CPSW",$ADMIN_CPSW);
			$stmt->bindparam(":ADMIN_EMAIL_ID",$ADMIN_EMAIL_ID);						
			$stmt->bindparam(":ADMIN_GENDER",$ADMIN_GENDER);
			$stmt->bindparam(":ADMIN_STATUS",$ADMIN_STATUS);
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function delete($id)
	{
		$stmt = $this->db->prepare("DELETE FROM admin WHERE ADMIN_ID=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	
	/* paging */
	
	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			$sno=1;
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
				<td><?php print($sno); ?></td>
                <td><?php print($row['ADMIN_USERNAME']); ?></td>
                <td><?php print($row['EMAIL']); ?></td>
               <!-- <td><?php // print($row['ADMIN_GENDER']); ?></td>-->
                <td><?php if($row['ADMIN_STATUS']==1)
									{
										echo "Active";									}
									else
									{
										echo "Inactive";
									}
                 ?></td>
                <td align="center">
                <a href="edit_admin.php?edit_id=<?php print($row['ADMIN_ID']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="delete_admin.php?delete_id=<?php print($row['ADMIN_ID']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>
                <?php  $sno++;
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}
	
	/* paging */
	
}
