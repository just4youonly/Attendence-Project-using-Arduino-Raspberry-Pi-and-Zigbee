<?php

session_start();

require_once('Dao.php');
$dao = new DAO ();

class Controller{

	public function __construct (){
		$method=$_GET['method'];
		switch ($method) {
			case 'login':
				$this->login();
				break;
			case 'logout':
				header('Location: index.php');
				session_destroy();
				break;
			case 'getTeacherSubject':
				$this->getTeacherSubject();
				break;
			case 'getSubjectCount':
				$this->getSubjectCount();
				break;
			case 'getSubjectStuent':
				$this->getSubjectStuent();
				break;
			case 'getSubjectStuentrate':
				$this->getSubjectStuentrate();
				break;
			case 'getSubjectDates':
				$this->getSubjectDates();
				break;	
			case 'getStudentdetails':
				$this->getStudentdetails();
				break;	
			case 'getAttendance':
				$this->getAttendance();
				break;	
			case 'updateStudentState':
				$this->updateStudentState();
				break;	
			case 'changeStatus':
				$this->changeStatus();
				break;	
			case 'getSubjects':
				$this->getSubjects();
				break;	
			case 'getStudents':
				$this->getStudents();
				break;
			case 'getStudent':
				$this->getStudent();
				break;		
			case 'getTeachers':
				$this->getTeachers();
				break;
			case 'addTeacher':
				$this->addTeacher();
				break;	
			case 'addStudent':
				$this->addStudent();
				break;		
			case 'getAllsubject':
				$this->getAllsubject();
				break;	
			case 'getAllteachersubject':
				$this->getAllteachersubject();
				break;	
			case 'addTeachersubject':
				$this->addTeachersubject();
				break;
			case 'addStudentsubject':
				$this->addStudentsubject();
				break;
			case 'deleteTeachersubject':
				$this->deleteTeachersubject();
				break;
			case 'deleteStudentsubject':
				$this->deleteStudentsubject();
				break;
			case 'getfingerids':
				$this->getfingerids();
				break;
			case 'getfingeridsstudent':
				$this->getfingeridsstudent();
				break;
			case 'deleteTeacher':
				$this->deleteTeacher();
				break;
			case 'deleteStudent':
				$this->deleteStudent();
				break;
			case 'getTeacher':
				$this->getTeacher();
				break;
			case 'editTeacher':
				$this->editTeacher();
				break;
			case 'editStudent':
				$this->editStudent();
				break;
			case 'addSubject':
				$this->addSubject();
				break;
			case 'deleteSubject':
				$this->deleteSubject();
				break;
			case 'getAllsubjectandteacher':
				$this->getAllsubjectandteacher();
				break;
			case 'getAllstudentsubject':
				$this->getAllstudentsubject();
				break;
			case 'editSubject':
				$this->editSubject();
				break;
			case 'getport':
				$this->getport();
				break;
			case 'getteachername':
				$this->getteachername();
				break;	
			case 'getsubjectname':
				$this->getsubjectname();
				break;
			case 'getfingerId':
				$this->getfingerId();
				break;	
			case 'getfingerIdstu':
				$this->getfingerIdstu();
				break;	

		}
	}
	

	public function login(){
		global $dao;
		$username=$_GET['username'];
		$password=$_GET['password'];
		$radioValue=$_GET['radioValue'];

		if($radioValue=="admin"){
			$ctrl=$dao->select_admin($username , $password);
			if($ctrl == "false"){
				echo "false" ;
			}else{
				$_SESSION['giris']="true"; 
				$_SESSION['AdminId']=$ctrl; 
				echo "1" ;
			}
		}else if($radioValue=="teacher"){
			$ctrl=$dao->select_tracher($username , $password);
			
			if($ctrl == "false"){
				echo "false" ;
			}else{
				if($username == $ctrl){

					$_SESSION['giris']="true"; 
					$_SESSION['TeacherId']=$username; 
					echo "2" ;
				}
			}
		}else{
			header('Location: index.php');
			session_destroy();
			echo "false" ;
		}
		
	
	}

	public function getTeacherSubject(){
		global $dao;
		$username = $_SESSION['TeacherId'];
		$subjects = $dao->getTeacherSubject($username);
		echo $subjects;
	}
	public function getteachername(){
		global $dao;
		$teacherId = $_GET['teacherId'];
		$teacherId1 = $dao->getteachername($teacherId);
		echo $teacherId1;
	}
	public function getsubjectname(){
		global $dao;
		$subjectId = $_GET['subjectId'];
		$subjectId1 = $dao->getsubjectname($subjectId);
		echo $subjectId1;
	}
	public function editTeacher(){
		global $dao;
		$teacherId = $_GET['teacherId'];
		$firstname = $_GET['firstname'];
		$lastname = $_GET['lastname'];
		$password = $_GET['password'];
		$ctrl = $dao->editTeacher($teacherId,$firstname,$lastname,$password);
		echo $ctrl;
	}
	public function editStudent(){
		global $dao;
		$studentId = $_GET['studentId'];
		$firstname = $_GET['firstname'];
		$lastname = $_GET['lastname'];
		$ctrl = $dao->editStudent($studentId,$firstname,$lastname);
		echo $ctrl;
	}
	public function editSubject(){
		global $dao;
		$subjectId = $_GET['subjectId'];
		$subjectName = $_GET['subjectName'];
		$ctrl = $dao->editSubject($subjectId,$subjectName);
		echo $ctrl;
	}
	public function getfingerId(){
		global $dao;
		$teacherId = $_GET['teacherId'];
		$ctrl = $dao->getfingerId($teacherId);
		echo $ctrl;
	}
	public function getfingerIdstu(){
		global $dao;
		$studentId = $_GET['studentId'];
		$ctrl = $dao->getfingerIdstu($studentId);
		echo $ctrl;
	}
	public function getTeacher(){
		global $dao;
		$TeacherId = $_GET['teacherId'];
		$teahcer = $dao->getTeacher($TeacherId);
		echo $teahcer;
	}
	public function getport(){
		global $dao;
		$port = $dao->getport();
		echo $port;
	}
	public function getfingerids(){
		global $dao;
		$fingerids = $dao->getfingerids();
		echo $fingerids;
	}
	public function getfingeridsstudent(){
		global $dao;
		$fingerids = $dao->getfingeridsstudent();
		echo $fingerids;
	}
	public function addTeacher(){
		global $dao;
		$firstname = $_GET['firstname'];
		$lastname = $_GET['lastname'];
		$password = $_GET['password'];
		$ctrl = $dao->addTeacher($firstname,$lastname,$password);
		echo $ctrl;
	}

	public function addStudent(){
		global $dao;
		$firstname = $_GET['firstname'];
		$lastname = $_GET['lastname'];
		$ctrl = $dao->addStudent($firstname,$lastname);
		echo $ctrl;
	}
	public function addSubject(){
		global $dao;
		$subjectname = $_GET['subjectname'];
		$ctrl = $dao->addSubject($subjectname);
		echo $ctrl;
	}
	public function addTeachersubject(){
		global $dao;
		$subjectId = $_GET['subjectId'];
		$TeacherId = $_GET['teacherId'];
		$ctrl = $dao->addTeachersubject($TeacherId,$subjectId);
		echo $ctrl;
	}
	public function addStudentsubject(){
		global $dao;
		$subjectId = $_GET['subjectId'];
		$TeacherId = $_GET['teacherId'];
		$StudentId = $_GET['studentId'];
		$ctrl = $dao->addStudentsubject($TeacherId,$subjectId,$StudentId);
		echo $ctrl;
	}
	public function getAllsubjectandteacher(){
		global $dao;
		$subjectandteacher = $dao->getAllsubjectandteacher();
		echo $subjectandteacher;
	}
	public function getAllstudentsubject(){
		global $dao;
		$StudentId = $_GET['studentId'];
		$studentsubject = $dao->getAllstudentsubject($StudentId);
		echo $studentsubject;
	}
	public function deleteTeachersubject(){
		global $dao;
		$subjectId = $_GET['subjectId'];
		$TeacherId = $_GET['teacherId'];
		$ctrl = $dao->deleteTeachersubject($TeacherId,$subjectId);
		echo $ctrl;
	}
	public function deleteStudentsubject(){
		global $dao;
		$subjectId = $_GET['subjectId'];
		$TeacherId = $_GET['teacherId'];
		$studentId = $_GET['studentId'];
		$ctrl = $dao->deleteStudentsubject($TeacherId,$subjectId,$studentId);
		echo $ctrl;
	}
	public function deleteTeacher(){
		global $dao;
		$TeacherId = $_GET['teacherId'];
		$ctrl = $dao->deleteTeacher($TeacherId);
		echo $ctrl;
	}
	public function deleteStudent(){
		global $dao;
		$studentId = $_GET['studentId'];
		$ctrl = $dao->deleteStudent($studentId);
		echo $ctrl;
	}
	public function deleteSubject(){
		global $dao;
		$subjectId = $_GET['subjectId'];
		$ctrl = $dao->deleteSubject($subjectId);
		echo $ctrl;
	}

	public function getSubjectCount(){
		global $dao;
		$username = $_SESSION['TeacherId'];
		$subjectId = $_GET['subjectId'];
		$count =$dao->getSubjectCount($username,$subjectId);
		echo $count   ; 
	}
	public function getAllsubject(){
		global $dao;
		$Allsubject =$dao->getAllsubject();
		echo $Allsubject   ; 
	}
	public function getAllteachersubject(){
		global $dao;
		$TeacherId = $_GET['teacherId'];
		$Allsubject =$dao->getAllteachersubject($TeacherId);
		echo $Allsubject   ; 
	}
	public function getTeachers(){
		global $dao;
		$teachers =$dao->getTeachers();
		echo $teachers   ; 
	}
	public function getSubjects(){
		global $dao;
		$subjects =$dao->getSubjects();
		echo $subjects   ; 
	}
	public function getStudents(){
		global $dao;
		$students =$dao->getStudents();
		echo $students   ; 
	}
	public function getStudent(){
		global $dao;
		$studentId = $_GET['studentId'];
		$students =$dao->getStudent($studentId);
		echo $students; 
	}
	public function getSubjectStuent(){
		global $dao;
		$username = $_SESSION['TeacherId'];
		$subjectId = $_GET['subjectId'];
		$subjectStudents = $dao->getSubjectStuent($username,$subjectId);
		echo $subjectStudents ;
	}
	public function getSubjectStuentrate(){
		global $dao;
		$username = $_SESSION['TeacherId'];
		$subjectId = $_GET['subjectId'];
		$getSubjectStuentrate = $dao->getSubjectStuentrate($username,$subjectId);
		echo $getSubjectStuentrate ;
	}
	public function getSubjectDates(){
		global $dao;
		$username = $_SESSION['TeacherId'];
		$subjectId = $_GET['subjectId'];
		$subjectDates = $dao->getSubjectDates($username,$subjectId);
		echo $subjectDates ;
	}
	public function getStudentdetails(){
		global $dao;
		$username = $_SESSION['TeacherId'];
		$subjectId = $_GET['subjectId'];
		$studentId = $_GET['studentId'];
		$Studentdetails = $dao->getStudentdetails($username,$subjectId,$studentId);
		echo $Studentdetails ;
	}
	public function getAttendance(){
		global $dao;
		$username = $_SESSION['TeacherId'];
		$subjectId = $_GET['subjectId'];
		$date = $_GET['date'];
		$allAttendance = $dao->getAttendance($username,$subjectId,$date);
		echo $allAttendance ;
	}
	public function updateStudentState(){
		global $dao;
		$username = $_SESSION['TeacherId'];
		$attendanceId = $_GET['attendanceId'];
		$studentId = $_GET['studentId'];
		$status = $_GET['status'];
		$dao->updateStudentState($username,$attendanceId,$studentId,$status);
	}
	public function changeStatus(){
		global $dao;
		$attendanceId = $_GET['attendanceId'];
		$status = $_GET['status'];
		$dao->changeStatus($attendanceId , $status );
	}

	
	
}

$controller = new Controller ;
	
?>

