<?php

class jobseeker
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function job_seeker_insert($fname,$lname,$email,$Password,$Phone_No,$Industry,$Domain,$Experience_level)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO job_seeker(
First_name,Last_name,Email_id,Password,Phone_No,Industry,Domain,Experience_level,language_name,profficiency_level,lan_read,lan_write,lan_speak,usertype_id,inserted_by,updated_by,status) VALUES(:First_name, :Last_name, :Email_id, :Password, :Phone_No, :Industry, :Domain, :Experience_level, '', '', '', '', '', 1, '', '',1)");

			$stmt->bindparam(":First_name",$fname);
			$stmt->bindparam(":Last_name",$lname);
			$stmt->bindparam(":Email_id",$email);
			$stmt->bindparam(":Password",$Password);	
			$stmt->bindparam(":Phone_No",$Phone_No);
                        $stmt->bindparam(":Industry",$Industry);
			$stmt->bindparam(":Domain",$Domain);
                        $stmt->bindparam(":Experience_level",$Experience_level);
                        //$stmt->bindparam(":language_name",'');
                        //$stmt->bindValue(":null", null, PDO::PARAM_NULL);
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
		$stmt = $this->db->prepare("SELECT * FROM job_seeker WHERE Job_Seeker_Id=:id");
		
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	public function profile_update($id,$Alternate_email,$Alternate_Phone_no,$Address,$Father_Name,$language_name,$profficiency_level,$read,$write,$speak)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE job_seeker SET Alternate_email=:Alternate_email, Alternate_Phone_no=:Alternate_Phone_no, Address=:Address, Father_Name = :Father_Name, language_name = :language_name, profficiency_level = :profficiency_level, lan_read = :read, lan_write = :write, lan_speak = :speak
            WHERE Job_Seeker_Id=:id ");
			$stmt->bindparam(":Alternate_email",$Alternate_email);
			$stmt->bindparam(":Alternate_Phone_no",$Alternate_Phone_no);
			$stmt->bindparam(":Address",$Address);
			$stmt->bindparam(":Father_Name",$Father_Name);
			$stmt->bindparam(":language_name",$language_name);
			$stmt->bindparam(":profficiency_level",$profficiency_level);
			$stmt->bindparam(":read",$read);
			$stmt->bindparam(":write",$write);
			$stmt->bindparam(":speak",$speak);
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
	public function profile_language($language_name,$profficiency_level,$read,$write,$speak,$id)
	{
		try
		{
			$stmt=$this->db->prepare("INSERT INTO js_languages (language_name,profficiency_level,read,write,speak,job_seeker_id) VALUES (:language_name,:profficiency_level,:read,:write,:speak,:id)");
			
			// echo $stmt;
			// exit();
			$stmt->bindparam(":language_name",$language_name);
			$stmt->bindparam(":profficiency_level",$profficiency_level);
			$stmt->bindparam(":read",$read);
			$stmt->bindparam(":write",$write);
			$stmt->bindparam(":speack",$speack);
			//$stmt->bindparam(":speack",$speack);
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
	public function update($id,$First_name,$Last_name,$Email_id,$User_name,$Phone_No,$Experience_level,$Domain)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE job_seeker SET First_name=:First_name, Last_name=:Last_name, Email_id=:Email_id, User_name=:User_name, Phone_No=:Phone_No, Experience_level=:Experience_level,	Domain=:Domain
            WHERE Job_Seeker_Id=:id ");
			$stmt->bindparam(":First_name",$First_name);
			$stmt->bindparam(":Last_name",$Last_name);
			$stmt->bindparam(":Email_id",$Email_id);
			$stmt->bindparam(":User_name",$User_name);
			//$stmt->bindparam(":Password",$Password);			
			//$stmt->bindparam(":Confirm_password",$Confirm_password);
			
			$stmt->bindparam(":Phone_No",$Phone_No);
			$stmt->bindparam(":Experience_level",$Experience_level);
			
			$stmt->bindparam(":Domain",$Domain);
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
	
	
	
	//Education insert function
	
	public function Eduction_profile($id, $js_qualification_name, $js_course, $js_institution_name, $js_start_date,$js_end_date, $js_percentage)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO js_educational_information(job_seeker_id, js_qualification_name, js_course, js_institution_name, js_start_date, js_end_date, js_percentage) VALUES(:id, :js_qualification_name, :js_course, :js_institution_name, :js_start_date, :js_end_date, :js_percentage)");

			$stmt->bindparam(":js_qualification_name",$js_qualification_name);
			$stmt->bindparam(":js_course",$js_course);
			$stmt->bindparam(":js_institution_name",$js_institution_name);
			//$stmt->bindparam(":js_education_location",$js_education_location);
			$stmt->bindparam(":js_start_date",$js_start_date);	
			$stmt->bindparam(":js_end_date",$js_end_date);	
			$stmt->bindparam(":js_percentage",$js_percentage);
			//$stmt->bindparam(":js_university",$js_university);
		
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
	
	//Education update function
	public function Eduction_profile_update($id, $js_id, $js_qualification_name, $js_course, $js_institution_name, $js_start_date,$js_end_date, $js_percentage)
	{
		try
		{
			$stmt = $this->db->prepare("UPDATE js_educational_information SET js_qualification_name=:js_qualification_name, js_course=:js_course, js_institution_name=:js_institution_name,  js_start_date=:js_start_date, js_end_date=:js_end_date, js_percentage=:js_percentage WHERE job_seeker_id=:id && js_educational_information_id=:js_id");
//exit();
			$stmt->bindparam(":js_qualification_name",$js_qualification_name);
			$stmt->bindparam(":js_course",$js_course);
			$stmt->bindparam(":js_institution_name",$js_institution_name);
			//$stmt->bindparam(":js_education_location",$js_education_location);
			$stmt->bindparam(":js_start_date",$js_start_date);	
			$stmt->bindparam(":js_end_date",$js_end_date);	
			$stmt->bindparam(":js_percentage",$js_percentage);
			//$stmt->bindparam(":js_university",$js_university);
		
			$stmt->bindparam(":id",$id);
			$stmt->bindparam(":js_id",$js_id);
			$stmt->execute();
			return true;
		
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	//Experience insert function
	public function Experience_profile($id, $Company_Name, $Designation, $Start_date, $End_date, $Current_CTC, $Expected_CTC)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO js_work_experience(Company_Name, Designation, Start_date, End_date, Current_CTC, Expected_CTC, Job_Seeker_Id) VALUES(:Company_Name, :Designation, :Start_date, :End_date, :Current_CTC, :Expected_CTC, :id)");

			$stmt->bindparam(":Company_Name",$Company_Name);
			$stmt->bindparam(":Designation",$Designation);
			$stmt->bindparam(":Start_date",$Start_date);
			$stmt->bindparam(":End_date",$End_date);
			$stmt->bindparam(":Current_CTC",$Current_CTC);	
			$stmt->bindparam(":Expected_CTC",$Expected_CTC);		
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
	
	//Experience update function
	public function Experience_profile_update($id, $jswe_id, $Company_Name, $Designation, $Start_date, $End_date, $Current_CTC, $Expected_CTC)
	{
		try
		{
			$stmt = $this->db->prepare("UPDATE js_work_experience SET Company_Name=:Company_Name, Designation=:Designation, Start_date=:Start_date, End_date=:End_date, Current_CTC=:Current_CTC, Expected_CTC=:Expected_CTC WHERE 	Job_Seeker_Id=:id && js_work_experience_id=:jswe_id");
//exit();
		$stmt->bindparam(":Company_Name",$Company_Name);
			$stmt->bindparam(":Designation",$Designation);
			$stmt->bindparam(":Start_date",$Start_date);
			$stmt->bindparam(":End_date",$End_date);
			$stmt->bindparam(":Current_CTC",$Current_CTC);	
			$stmt->bindparam(":Expected_CTC",$Expected_CTC);
		
			$stmt->bindparam(":id",$id);
			$stmt->bindparam(":jswe_id",$jswe_id);
			$stmt->execute();
			return true;
		
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	//skills insert function
		public function skills($id, $js_skill_description)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO js_skills(job_seeker_id, js_skill_description) VALUES(:id, :js_skill_description)");

			$stmt->bindparam(":js_skill_description",$js_skill_description);					
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
	
	//skills update function
	public function skills_update($id, $js_skill_description)
	{
		try
		{
			$stmt = $this->db->prepare("UPDATE js_skills SET js_skill_description=:js_skill_description WHERE 	job_seeker_id=:id");

		
			$stmt->bindparam(":js_skill_description",$js_skill_description);
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
	//Hobbies insert function
        public function hobbies($id, $hobby_name)
	{
            try
            {
                $stmt = $this->db->prepare("INSERT INTO js_hobbies(job_seeker_id, hobby_name) VALUES(:id, :hobby_name)");
                $stmt->bindparam(":hobby_name",$hobby_name);					
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
	
	//Hobbies update function
	public function hobbies_update($id, $hobby_name)
	{
		try
		{
			$stmt = $this->db->prepare("UPDATE js_hobbies SET hobby_name=:hobby_name WHERE 	job_seeker_id=:id");
			$stmt->bindparam(":hobby_name",$hobby_name);
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
	//Objective insert function
		public function Objective($id, $career_objective_name)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO  js_carrer_objective(job_seeker_id, career_objective_name) VALUES(:id, :career_objective_name)");

			$stmt->bindparam(":career_objective_name",$career_objective_name);					
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
	
	//Objective update function
	public function Objective_update($id, $career_objective_name)
	{
		try
		{
			$stmt = $this->db->prepare("UPDATE js_carrer_objective SET career_objective_name=:career_objective_name WHERE 	job_seeker_id=:id");

		
			$stmt->bindparam(":career_objective_name",$career_objective_name);
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
	
	//Objective insert function
		public function send_quiries($js_email_id, $js_id, $js_name, $CW_ID, $js_subject, $js_message)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO  js_enquiries(js_email_id, js_job_seeker_id, js_jobseeker_name, js_content_writer_id, js_subject, js_message ) VALUES(:js_email_id, :js_id, :js_name, :CW_ID, :js_subject, :js_message)");

			$stmt->bindparam(":js_email_id",$js_email_id);					
			$stmt->bindparam(":js_id",$js_id);					
			$stmt->bindparam(":js_name",$js_name);					
			$stmt->bindparam(":CW_ID",$CW_ID);					
			$stmt->bindparam(":js_subject",$js_subject);					
			$stmt->bindparam(":js_message",$js_message);					
			
			$stmt->execute();
			return true;
		
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
		//change Password function
	public function change_password($new_password, $cfrm_password, $id)
	{
		try
		{
			$stmt = $this->db->prepare("UPDATE job_seeker SET Password=:new_password, Confirm_password=:cfrm_password WHERE Job_Seeker_Id=:id");
		
			

			$stmt->bindparam(":new_password",$new_password);
			$stmt->bindparam(":cfrm_password",$cfrm_password);
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
		$stmt = $this->db->prepare("DELETE FROM job_seeker WHERE Job_Seeker_Id=:id");
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
			
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<a href="edit_jobseeker.php?edit_id=<?php print($row['Job_Seeker_Id']); ?>"><i class="">EDIT JOBSEEKER</i></a><br/>
				<a href="view_jobseeker.php?view_id=<?php print($row['Job_Seeker_Id']); ?>"><i class="">View Profile</i></a><br/>
				<a href="change_password.php?edit_id=<?php print($row['Job_Seeker_Id']); ?>"><i class="">changed Password</i></a></br>
				<a href="personal_Profile.php?edit_id=<?php print($row['Job_Seeker_Id']); ?>"><i class="">Personal Profile</i></a><br />
				<a href="Education_Profile.php?edit_id=<?php print($row['Job_Seeker_Id']); ?>"><i class="">Eduction Profile</i></a><br />
				<a href="Experience.php?edit_id=<?php print($row['Job_Seeker_Id']); ?>"><i class="">Experience Profile</i></a><br />
				<a href="skills.php?edit_id=<?php print($row['Job_Seeker_Id']); ?>"><i class="">Skills Profile</i></a><br />
				<a href="Objective.php?edit_id=<?php print($row['Job_Seeker_Id']); ?>"><i class="">Objective Profile</i></a><br />
				<a href="hobbies.php?edit_id=<?php print($row['Job_Seeker_Id']); ?>"><i class="">Skills Profile</i></a><br />
                <?php  		
				}
		}
		else
		{
			?>
            <tr>
            <td>No Data found...</td>
            </tr>
            <?php
		}
		
	}
	
	/* paging */
	
}
