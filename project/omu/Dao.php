<?php


class Dao { 
	private $servername = "134.209.232.17";
	private $username = "project";
	private $password = "ourraspberry";
	private $conn ;
	//--------------------------------------------------------------------------
	public function connect(){
		try {
		    $this->conn = new PDO("mysql:host=$this->servername;dbname=final_project", $this->username, $this->password);
		    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }
		catch(PDOException $e)
		    {

		    }
	}
	//--------------------------------------------------------------------------
	public function disconnect(){
		if($this->conn != null ){
			$this->conn = null ; 
		}	
	}
	//--------------------------------------------------------------------------
	public function select_tracher($username ,$password ){
		$this->connect();

		try{
			$stmt = $this->conn->query("SELECT teacherPassword , teacherId FROM teacher where teacherId='".$username."' ");
			$row = $stmt->fetch();
			$password1 = $row[0];
			$username1 = $row[1] ;
			if($password==$password1 && $username==$username1 ){
				return $username1 ; 
			}
			else{
				return "false";
			}
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
	}
	//--------------------------------------------------------------------------
	public function getsubjectname($subjectId ){
		$this->connect();

		try{
			$stmt = $this->conn->query("SELECT subjectName ,subjectId  FROM subject where subjectId='".$subjectId."' ");
			$row = $stmt->fetch();
			$myObj = new \stdClass();
			$myObj->subjectName=$row[0];
			$myObj->subjectId=$row[1];
			return json_encode($myObj);
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
	}
	//--------------------------------------------------------------------------
	public function getteachername($teacherId ){
		$this->connect();

		try{
			$stmt = $this->conn->query("SELECT teacherName ,teacherSurname  FROM teacher where teacherId='".$teacherId."' ");
			$row = $stmt->fetch();
			$myObj = new \stdClass();
			$myObj->teacherName=$row[0];
			$myObj->teacherSurname=$row[1];
			return json_encode($myObj);
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
	}
//--------------------------------------------------------------------------
	public function getfingerId($teacherId){
		$this->connect();

		try{
			$stmt = $this->conn->query("SELECT teacherId , fingerId FROM teacher where teacherId='".$teacherId."' ");
			$row = $stmt->fetch();
			$myObj = new \stdClass();
			$myObj->teacherId=$row[0];
			$myObj->fingerId=$row[1];
			return json_encode($myObj);
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
	}
//--------------------------------------------------------------------------
public function getfingerIdstu($StudentId){
	$this->connect();

	try{
		$stmt = $this->conn->query("SELECT StudentId , fingerId FROM student where StudentId='".$StudentId."' ");
		$row = $stmt->fetch();
		$myObj = new \stdClass();
		$myObj->StudentId=$row[0];
		$myObj->fingerId=$row[1];
		return json_encode($myObj);
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
	public function select_admin($username ,$password ){
		$this->connect();
		try{
			$stmt = $this->conn->query("SELECT adminId ,adminPassword , adminUsername FROM admin where adminUsername='".$username."' ");
			$row = $stmt->fetch();
			$id = $row[0];
			$password1 = $row[1] ;
			$username1 = $row[2] ;
			if($password==$password1 && $username==$username1 ){
				return $id ; 
			}
			else{
				return "false";
			}
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
	}

//--------------------------------------------------------------------------
	public function getTeacherSubject($TeacherId){
		$this->connect();

		try{
			$stmt = $this->conn->query(" select subject.subjectId, subject.subjectName from subject inner JOIN teacher_subject on subject.subjectId = teacher_subject.subjectId where teacher_subject.teacherId ='".$TeacherId."'");
			$count = $stmt->rowCount();			
			$myObj = new \stdClass();
			$myObj1 = new \stdClass();
			$i=0;
			$myObj1->$i= $count ;
			while ($row = $stmt->fetch()) {
				$i++;
				$myObj->subjectId=$row[0];
				$myObj->subjectName=$row[1];
				$myJSON = json_encode($myObj);
		   		$myObj1->$i=$myJSON ;

			}

			return json_encode($myObj1);
			
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
	}
//--------------------------------------------------------------------------
public function getTeachers(){
	$this->connect();

	try{
		$stmt = $this->conn->query(" SELECT teacherId , teacherName , teacherSurname FROM teacher ");
		$count = $stmt->rowCount();			
		$myObj = new \stdClass();
		$myObj1 = new \stdClass();
		$i=0;
		$myObj1->$i= $count ;
		while ($row = $stmt->fetch()) {
			$i++;
			$myObj->teacherId=$row[0];
			$myObj->teacherName=$row[1];
			$myObj->teacherSurname=$row[2];
			$myJSON = json_encode($myObj);
			   $myObj1->$i=$myJSON ;

		}

		return json_encode($myObj1);
		
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
public function getSubjects(){
	$this->connect();

	try{
		$stmt = $this->conn->query(" SELECT subjectId ,subjectName  FROM subject");
		$count = $stmt->rowCount();			
		$myObj = new \stdClass();
		$myObj1 = new \stdClass();
		$i=0;
		$myObj1->$i= $count ;
		while ($row = $stmt->fetch()) {
			$i++;
			$myObj->subjectId=$row[0];
			$myObj->subjectName=$row[1];
			$myJSON = json_encode($myObj);
			   $myObj1->$i=$myJSON ;

		}

		return json_encode($myObj1);
		
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
public function getAllsubjectandteacher(){
	$this->connect();

	try{
		$stmt = $this->conn->query("select t.teacherId , t.teacherName , t.teacherSurname , s.subjectId, s.subjectName from subject s inner JOIN teacher_subject ts on s.subjectId = ts.subjectId inner JOIN teacher t on ts.teacherId = t.teacherId");
		$count = $stmt->rowCount();			
		$myObj = new \stdClass();
		$myObj1 = new \stdClass();
		$i=0;
		$myObj1->$i= $count ;
		while ($row = $stmt->fetch()) {
			$i++;
			$myObj->teacherId=$row[0];
			$myObj->teacherName=$row[1];
			$myObj->teacherSurname=$row[2];
			$myObj->subjectId=$row[3];
			$myObj->subjectName=$row[4];
			$myJSON = json_encode($myObj);
			   $myObj1->$i=$myJSON ;

		}

		return json_encode($myObj1);
		
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
public function getAllstudentsubject($studentId){
	$this->connect();

	try{
		$stmt = $this->conn->query("SELECT * FROM sub_teach_stu where studentId ='".$studentId."' ");
		$count = $stmt->rowCount();			
		$myObj = new \stdClass();
		$myObj1 = new \stdClass();
		$i=0;
		$myObj1->$i= $count ;
		while ($row = $stmt->fetch()) {
			$i++;
			$myObj->subjectId=$row[0];
			$myObj->teacherId=$row[1];
			$myObj->studentId=$row[2];
			$myJSON = json_encode($myObj);
			   $myObj1->$i=$myJSON ;
		}

		return json_encode($myObj1);
		
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
public function getStudents(){
	$this->connect();

	try{
		$stmt = $this->conn->query(" SELECT studentId , studentName , studentSurname FROM student ");
		$count = $stmt->rowCount();			
		$myObj = new \stdClass();
		$myObj1 = new \stdClass();
		$i=0;
		$myObj1->$i= $count ;
		while ($row = $stmt->fetch()) {
			$i++;
			$myObj->studentId=$row[0];
			$myObj->studentName=$row[1];
			$myObj->studentSurname=$row[2];
			$myJSON = json_encode($myObj);
			   $myObj1->$i=$myJSON ;

		}

		return json_encode($myObj1);
		
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}

//--------------------------------------------------------------------------
public function getStudent($studentId){
	$this->connect();

	try{
		$stmt = $this->conn->query(" SELECT studentId , studentName , studentSurname FROM student where studentId = '".$studentId."'");
		$myObj = new \stdClass();
		$row = $stmt->fetch();
			
		$myObj->studentId=$row[0];
		$myObj->studentName=$row[1];
		$myObj->studentSurname=$row[2];
		$myJSON = json_encode($myObj);

		

		return json_encode($myObj);
		
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
	public function getSubjectCount($TeacherId ,$subjectId ){
		$this->connect();
		try{
			$stmt = $this->conn->query("SELECT COUNT(attendanceId) from attendance where teacherId =  '".$TeacherId."' AND subjectId =  '".$subjectId."' ");

			$row = $stmt->fetch();
			return $row[0];
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
	}
//--------------------------------------------------------------------------
	public function getSubjectStuent($TeacherId ,$subjectId){
		$this->connect();

		try{
			$stmt = $this->conn->query("  select student.studentId, student.studentName, student.studentSurname from student inner join sub_teach_stu on student.studentId = sub_teach_stu.studentId where sub_teach_stu.teacherId = '".$TeacherId."' and sub_teach_stu.subjectId = '".$subjectId."' ");
			$count = $stmt->rowCount();			
			$myObj = new \stdClass();
			$myObj1 = new \stdClass();
			$i=0;
			$myObj1->$i= $count ;
			while ($row = $stmt->fetch()) {
				$i++;
				$myObj->studentId=$row["studentId"];
				$myObj->studentName=$row["studentName"];
				$myObj->studentSurname=$row["studentSurname"];
				$myJSON = json_encode($myObj);
		   		$myObj1->$i=$myJSON ;

			}

			return json_encode($myObj1);
			
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
	} 
//--------------------------------------------------------------------------

public function getSubjectStuentrate($TeacherId ,$subjectId){
	$this->connect();
	try{
		$stmt = $this->conn->query(" select student.studentId, COUNT(attendance_records.attendanceStatus) from attendance_records inner join attendance on attendance_records.attendanceId = attendance.attendanceId inner join student on student.studentId = attendance_records.studentId where attendance.teacherId = '".$TeacherId."' and attendance.subjectId = '".$subjectId."' and attendance_records.attendanceStatus = 'PRESENT' GROUP BY attendance_records.studentId ");
		$count = $stmt->rowCount();			
		$myObj = new \stdClass();
		$myObj1 = new \stdClass();
		$i=0;
		$myObj1->$i= $count ;
		while ($row = $stmt->fetch()) {
			$i++;
			$myObj->studentId=$row[0];
			$myObj->count=$row[1];
			$myJSON = json_encode($myObj);
			   $myObj1->$i=$myJSON ;
		}
		return json_encode($myObj1);
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------

public function addTeacher($firstname,$lastname,$password){
		$this->connect();
		try{
			$stmt = $this->conn->prepare(" insert into teacher (teacherName,teacherSurname,teacherPassword) values ('".$firstname."','".$lastname."','".$password."')");
			$stmt->execute();
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
		$this->connect();
		try{
			$stmt = $this->conn->query(" SELECT teacherId FROM teacher ORDER BY teacherId DESC limit 1 ");
			$row = $stmt->fetch();
			return $row[0];

		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
}

public function addStudent($firstname,$lastname){
	$this->connect();
	try{
		$stmt = $this->conn->prepare(" insert into student (studentName,studentSurname) values ('".$firstname."','".$lastname."')");
		$stmt->execute();
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
	$this->connect();
	try{
		$stmt = $this->conn->query(" SELECT studentId FROM student ORDER BY studentId DESC limit 1 ");
		$row = $stmt->fetch();
		return $row[0];

	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------

public function addSubject($subjectName){
	$this->connect();
	try{
		$stmt = $this->conn->prepare(" insert into subject (subjectName) values ('".$subjectName."')");
		$stmt->execute();
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------

public function deleteTeachersubject($TeacherId,$subjectId){
		$this->connect();
		try{
			$stmt = "DELETE FROM teacher_subject WHERE TeacherId='$TeacherId' and subjectId='$subjectId'";
			$this->conn->exec($stmt);
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
}
//--------------------------------------------------------------------------

public function deleteStudentsubject($TeacherId,$subjectId,$studentId){
	$this->connect();
	try{
		$stmt = "DELETE FROM sub_teach_stu WHERE sub_teach_stu.subjectId='".$subjectId."' and  sub_teach_stu.teacherId='".$TeacherId."'  and sub_teach_stu.studentId='".$studentId."'";
		$this->conn->exec($stmt);
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}

//--------------------------------------------------------------------------

public function deleteTeacher($TeacherId){
	$this->connect();
	try{
		$stmt = "DELETE FROM teacher WHERE TeacherId='$TeacherId'";
		$this->conn->exec($stmt);
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------

public function deleteStudent($studentId){
	$this->connect();
	try{
		$stmt = "DELETE FROM student WHERE studentId='$studentId'";
		$this->conn->exec($stmt);
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------

public function deleteSubject($subjectId){
	$this->connect();
	try{
		$stmt = "DELETE FROM subject WHERE subjectId='$subjectId'";
		$this->conn->exec($stmt);
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
public function getTeacher($username ){
	$this->connect();

	try{
		$stmt = $this->conn->query("SELECT teacherSurname,teacherName,teacherId,teacherPassword FROM teacher where teacherId='".$username."' ");
		$row = $stmt->fetch();
		$myObj = new \stdClass();
		$myObj->teacherSurname=$row["teacherSurname"];
		$myObj->teacherName=$row["teacherName"];
		$myObj->teacherId=$row["teacherId"];
		$myObj->teacherPassword=$row["teacherPassword"];
		return json_encode($myObj);
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
public function getport(){
	$this->connect();

	try{
		$stmt = $this->conn->query("SELECT * FROM url where id='1' ");
		$row = $stmt->fetch();
		$myObj = new \stdClass();
		$myObj->id=$row[0];
		$myObj->domainName=$row[1];
		return json_encode($myObj);
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------

public function addTeachersubject($TeacherId,$subjectId){
	$this->connect();
	try{
		$stmt = $this->conn->prepare(" insert into teacher_subject (teacherId,subjectId) values ('".$TeacherId."','".$subjectId."')");
		$stmt->execute();
		echo "ol";
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------

public function addStudentsubject($TeacherId,$subjectId,$studentId){
	$this->connect();
	try{
		$stmt = $this->conn->prepare(" insert into sub_teach_stu (teacherId,subjectId,studentId) values ('".$TeacherId."','".$subjectId."','".$studentId."')");
		$stmt->execute();
		echo "ol";
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
	public function getSubjectDates($TeacherId ,$subjectId){
		$this->connect();

		try{
			$stmt = $this->conn->query("select attendance.date from attendance where attendance.subjectId = '".$subjectId."' and attendance.teacherId = '".$TeacherId."' ");
			$count = $stmt->rowCount();			
			$myObj = new \stdClass();
			$myObj1 = new \stdClass();
			$i=0;
			$myObj1->$i= $count ;
			while ($row = $stmt->fetch()) {
				$i++;
				$myObj->date=$row["date"];
				$myJSON = json_encode($myObj);
		   		$myObj1->$i=$myJSON ;

			}

			return json_encode($myObj1);
			
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
	}
//--------------------------------------------------------------------------
public function getAllsubject(){
	$this->connect();

	try{
		$stmt = $this->conn->query("SELECT subjectId,subjectName FROM subject");
		$count = $stmt->rowCount();			
		$myObj = new \stdClass();
		$myObj1 = new \stdClass();
		$i=0;
		$myObj1->$i= $count ;
		while ($row = $stmt->fetch()) {
			$i++;
			$myObj->subjectId=$row["subjectId"];
			$myObj->subjectName=$row["subjectName"];
			$myJSON = json_encode($myObj);
			   $myObj1->$i=$myJSON ;
		}

		return json_encode($myObj1);
		
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
public function getAllteachersubject($TeacherId){
	$this->connect();
	try{
		$stmt = $this->conn->query("SELECT subjectId FROM  teacher_subject WHERE teacherId = '".$TeacherId."' ");
		$count = $stmt->rowCount();			
		$myObj = new \stdClass();
		$myObj1 = new \stdClass();
		$i=0;
		$myObj1->$i= $count ;
		while ($row = $stmt->fetch()) {
			$i++;
			$myObj->subjectId=$row["subjectId"];
			$myJSON = json_encode($myObj);
			   $myObj1->$i=$myJSON ;
		}

		return json_encode($myObj1);
		
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
public function editTeacher($TeacherId,$firstname,$lastname,$password){
	$this->connect();
		try{
			$stmt = $this->conn->prepare("UPDATE teacher SET teacherName='$firstname', teacherSurname='$lastname', teacherPassword='$password'  WHERE teacherId='$TeacherId' "); 
			$stmt->execute();
		}	
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}

		$this->disconnect();
}
//--------------------------------------------------------------------------
public function editStudent($studentId,$firstname,$lastname){
	$this->connect();
		try{
			$stmt = $this->conn->prepare("UPDATE student SET studentName='$firstname', studentSurname='$lastname'  WHERE studentId='$studentId' "); 
			$stmt->execute();
		}	
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}

	$this->disconnect();
}

//--------------------------------------------------------------------------
public function editSubject($subjectId,$subjectName){
	$this->connect();
		try{
			$stmt = $this->conn->prepare("UPDATE subject SET subjectName='$subjectName' WHERE subjectId='$subjectId' "); 
			$stmt->execute();
		}	
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}

		$this->disconnect();
}
//--------------------------------------------------------------------------
public function getfingerids(){
	$this->connect();

	try{
		$stmt = $this->conn->query("SELECT fingerId FROM teacher");
		$count = $stmt->rowCount();			
		$myObj = new \stdClass();
		$myObj1 = new \stdClass();
		$i=0;
		$myObj1->$i= $count ;
		while ($row = $stmt->fetch()) {
			$i++;
			$myObj->fingerId=$row["fingerId"];
			$myJSON = json_encode($myObj);
			   $myObj1->$i=$myJSON ;
		}

		return json_encode($myObj1);
		
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
public function getfingeridsstudent(){
	$this->connect();

	try{
		$stmt = $this->conn->query("SELECT fingerId FROM student");
		$count = $stmt->rowCount();			
		$myObj = new \stdClass();
		$myObj1 = new \stdClass();
		$i=0;
		$myObj1->$i= $count ;
		while ($row = $stmt->fetch()) {
			$i++;
			$myObj->fingerId=$row["fingerId"];
			$myJSON = json_encode($myObj);
			   $myObj1->$i=$myJSON ;
		}

		return json_encode($myObj1);
		
	}
	catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
	$this->disconnect();
}
//--------------------------------------------------------------------------
	public function getStudentdetails($TeacherId ,$subjectId,$studentId){
		$this->connect();

		try{
			$stmt = $this->conn->query("select attendance_records.attendanceStatus, attendance.date from attendance_records inner JOIN attendance on attendance_records.attendanceId = attendance.attendanceId where attendance.teacherId = '".$TeacherId."' and attendance.subjectId = '".$subjectId."' and attendance_records.studentId ='".$studentId."'");
			$count = $stmt->rowCount();			
			$myObj = new \stdClass();
			$myObj1 = new \stdClass();
			$i=0;
			$myObj1->$i= $count ;
			while ($row = $stmt->fetch()) {
				$i++;
				$myObj->date=$row["date"];
				$myObj->attendanceStatus=$row["attendanceStatus"];
				$myJSON = json_encode($myObj);
		   		$myObj1->$i=$myJSON ;

			}

			return json_encode($myObj1);
			
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
	}
//--------------------------------------------------------------------------
	public function getAttendance($TeacherId,$subjectId,$date){
		$this->connect();

		try{
			
			$stmt = $this->conn->query("SELECT attendance_records.attendanceId,attendance_records.loginDate,attendance_records.logoutDate, student.studentId, student.studentName, student.studentSurname, attendance_records.attendanceStatus from attendance_records inner JOIN student on attendance_records.studentId = student.studentId inner join attendance on attendance_records.attendanceId = attendance.attendanceId where attendance.teacherId = '".$TeacherId."' and attendance.subjectId = '".$subjectId."' and attendance.date = '".$date."' ");
			$count = $stmt->rowCount();			
			$myObj = new \stdClass();
			$myObj1 = new \stdClass();
			$i=0;
			$myObj1->$i= $count ;
			while ($row = $stmt->fetch()) {
				$i++;
				$myObj->attendanceId=$row["attendanceId"];
				$myObj->loginDate = $row["loginDate"];
				$myObj->logoutDate=$row["logoutDate"];
				$myObj->studentId=$row["studentId"];
				$myObj->studentName=$row["studentName"];
				$myObj->studentSurname = $row["studentSurname"];
				$myObj->attendanceStatus=$row["attendanceStatus"];
				
				$myJSON = json_encode($myObj);
		   		$myObj1->$i=$myJSON ;

			}

			return json_encode($myObj1);
			
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$this->disconnect();
	}
//--------------------------------------------------------------------------
	public function updateStudentState($username,$attendanceId,$studentId,$status){
		$this->connect();
		try{
			$stmt = $this->conn->prepare("UPDATE attendance_records SET attendanceStatus = '".$status."' WHERE attendance_records.attendanceId = '".$attendanceId."' AND attendance_records.studentId = '".$studentId."'"); 
			$stmt->execute();
		}	
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}

		$this->disconnect();
	}
//--------------------------------------------------------------------------
	public function changeStatus($attendanceId , $status ){
		$this->connect();
		try{

			if($status=="all"){
				$stmt = $this->conn->prepare("UPDATE attendance_records SET attendanceStatus = 'PRESENT' WHERE attendance_records.attendanceId = '".$attendanceId."' "); 
			}else if($status=="yellow"){
				$stmt = $this->conn->prepare("UPDATE attendance_records SET attendanceStatus = 'PRESENT' WHERE attendance_records.attendanceId = '".$attendanceId."' AND attendance_records.attendanceStatus = 'NEUTRAL' "); 
			}
			
			$stmt->execute();
		}	
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}

		$this->disconnect();
	}

}

?>



