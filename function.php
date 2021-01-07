<?php
class USER
{
	public $db;
	function __construct($con)
	{
		$this->db=$con;
	}

	public function getStudent($admission_session)
	{
		$select=$this->db->prepare("select student_id,student_name from student_info where exam_roll like :roll");
		$select->execute(array(':roll' => $admission_session.'%' ));
		$data=$select->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function studentAttendance($class_roll,$attendance,$table_name,$class_number)
	{
		$update=$this->db->prepare("update $table_name set $class_number=:attendance where student_id=:class_roll");
		$update->bindParam(':attendance',$attendance);
		$update->bindParam(':class_roll',$class_roll);
		$update->execute();
	}

	public function Login ($user_name, $password)
	{
		$select = $this->db->prepare("SELECT * FROM teacher_info_table WHERE user_name=:user_name and password=:password");
		$select->bindParam(':user_name', $user_name);
		$select->bindParam(':password', $password);
		$select->setFetchMode(PDO::FETCH_ASSOC);

		$select->execute();
		$data=$select->fetch();
		return $data;
	}
	public function editPassword($id,$password)
	{
		$select=$this->db->prepare("UPDATE teacher_info_table SET password=:password WHERE teacher_id=:id");
		$select->bindParam(":password",$password);
		$select->bindParam(":id",$id);
		$select->setFetchMode(PDO::FETCH_ASSOC);

		$select->execute();

	}	

	public function teacherAttendance($id,$date,$entrance_time,$exit_time)
	{
		$insert=$this->db->prepare("insert into teacher_attendance_temp(date,entrance_time,exit_time,teacher_id) values(:date,:entrance_time,:exit_time,:teacher_id)");
		$insert->bindParam(':date',$date);
		$insert->bindParam(':entrance_time',$entrance_time);
		$insert->bindParam(':exit_time',$exit_time);
		$insert->bindParam(':teacher_id',$id);
		$insert->execute();
	}


	public function teacherAttendance_final($id,$date,$entrance_time,$exit_time)
	{
		$insert=$this->db->prepare("insert into teacher_attendance(date,entrance_time,exit_time,teacher_id) values(:date,:entrance_time,:exit_time,:teacher_id)");
		$insert->bindParam(':date',$date);
		$insert->bindParam(':entrance_time',$entrance_time);
		$insert->bindParam(':exit_time',$exit_time);
		$insert->bindParam(':teacher_id',$id);
		$insert->execute();
	}

	public function viewInfo($id)
	{
		$select=$this->db->prepare("select date,entrance_time,exit_time from teacher_attendance where teacher_id=:teacher_id");
		$select->bindParam(':teacher_id',$id);
		$select->execute();
		$data=$select->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function viewInfo_check($id,$date)
	{
		$select=$this->db->prepare("select date,entrance_time,exit_time from teacher_attendance_temp where teacher_id=:teacher_id and date=:date");
		$select->bindParam(':teacher_id',$id);
		$select->bindParam(':date',$date);
		$select->execute();
		$data=$select->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}



	public function getId($id)
	{
		$select=$this->db->prepare("select teacher_id,date from teacher_attendance_temp where id=:id");
		$select->bindParam(':id',$id);
		$select->execute();
		$data=$select->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function approveInfo()
	{
		$select=$this->db->prepare("select t1.id id,t1.date date,t1.entrance_time entrance_time,t1.exit_time exit_time,t2.name name,t1.teacher_id teacher_id from teacher_attendance_temp t1,teacher_info_table t2 where t1.teacher_id=t2.teacher_id");
		$select->execute();
		$data=$select->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}


		public function deleteAttendance($id)
		{
			try{
				$select = $this->db->prepare("DELETE FROM teacher_attendance_temp WHERE id=:id");
				$select->bindParam(':id',$id);
				
				$select->execute();
				//header ("location:details.php");
				 
				
			}
			catch (PDOException $e)
			{
				echo $e->getMessage();
			}
		}


		public function studentPresent($student_id,$table_name,$class_number,$value,$session)
	{
		$select=$this->db->prepare("UPDATE $table_name SET $class_number=:value WHERE student_id=:id and exam_roll like concat($session,'%')");
		$select->bindParam(":value",$value);
		$select->bindParam(":id",$student_id);
		//$select->bindParam(":exam_roll",$session.'%');
		$select->setFetchMode(PDO::FETCH_ASSOC);

		$select->execute();
	}

	public function findStudentId($course_id,$session)
	{
		$select = $this->db->prepare("SELECT student_id FROM $course_id WHERE exam_roll like concat($session,'%')");
		//$select->bindParam(':id', $session);
		//$select->bindParam(':password', $password);
		$select->setFetchMode(PDO::FETCH_ASSOC);

		$select->execute();
		$data=$select->fetch();
		return $data;
	}

	public function classNumber($user_id,$session,$course_id)
	{
		$select = $this->db->prepare("SELECT * FROM $course_id WHERE student_id=:id and exam_roll like concat($session,'%')");
		$select->bindParam(':id', $user_id);
		//$select->bindParam(':password', $password);
		$select->setFetchMode(PDO::FETCH_ASSOC);

		$select->execute();
		$data=$select->fetchAll();
		
		//var_dump($data);
		//$one=1;
		$my_count=0;
		$total=0;
		for($i=1;$i<=20;$i++){
			if($data[0]["class_$i"]=="Yes"){
				$my_count++;
				$total++;
				
				}
			else if($data[0]["class_$i"]=="No"){
				$my_count=$my_count;
				$total++;
				
				}
			
			
			}
			return $total;
	}

	public function autoAttendance($class_roll,$session,$table_name,$class_number)
	{$attendance='Yes';
		$update=$this->db->prepare("update $table_name set $class_number=:attendance where student_id=:class_roll");
		$update->bindParam(':attendance',$attendance);
		$update->bindParam(':class_roll',$class_roll);
		$update->execute();
	}
	public function findAdmin($name)
	{
		$select = $this->db->prepare("SELECT name FROM admin_table where name=:name");
		$select->bindParam(':name', $name);
		//$select->bindParam(':password', $password);
		$select->setFetchMode(PDO::FETCH_ASSOC);

		$select->execute();
		$data=$select->fetch();
		return $data;

	}


	public function student_course($course_id,$id,$session)
	
	{
		try
		{
		$select = $this->db->prepare("SELECT * FROM $course_id WHERE student_id=:id and exam_roll like concat($session,'%')");
		$select->bindParam(':id', $id);
		//$select->bindParam(':password', $password);
		$select->setFetchMode(PDO::FETCH_ASSOC);

		$select->execute();
		$data=$select->fetchAll();
		
		return $data;}

		catch (PDOException $e)
			{
				echo $e->getMessage();
			}
		
		
		
		
	}


		public function studentName($id,$session)
	
	{
		
		$select = $this->db->prepare("SELECT student_name FROM student_info WHERE student_id=:id and exam_roll like concat($session,'%')");
		$select->bindParam(':id', $id);
		//$select->bindParam(':password', $password);
		$select->setFetchMode(PDO::FETCH_ASSOC);

		$select->execute();
		$data=$select->fetch();
		
		return $data;
		
		
		
		
	}
public function teacherName($id)
	
	{
		
		$select = $this->db->prepare("SELECT name,designation FROM teacher_info_table WHERE teacher_id=:id");
		$select->bindParam(':id', $id);
		//$select->bindParam(':password', $password);
		$select->setFetchMode(PDO::FETCH_ASSOC);

		$select->execute();
		$data=$select->fetch();
		
		return $data;
		
		
		
		
	}


	
		public function course_title($sub_id)
		
		{
		$select = $this->db->prepare("SELECT course_title FROM course_info_table WHERE course_id=:id");
		$select->bindParam(':id', $sub_id);
		//$select->bindParam(':password', $password);
		$select->setFetchMode(PDO::FETCH_ASSOC);

		$select->execute();
		$data=$select->fetch();
		
		return $data;	
			
		}


		
}

?>