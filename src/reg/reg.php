<?php
namespace App\reg;
use PDO;
class reg
{
    private $fullname;
    private $email;
    private $username;
    private $password;
    private $created_at;
    private $dbuser= 'root';
    private $dbpass= '';
    private $dbname= 'versity';
    private $title, $des, $mobile;
    public $countdepartment, $countcourse, $countstudent, $countteacher;
    public $code, $coursename, $department, $credit, $description,$semester,$address;
    public $i=1;

    public function _construct(){

    }

    public function setData($data = ''){
        $this->fullname=$data['fullname'];
        $this->email=$data['email'];
        $this->username=$data['username'];
        $this->mobile=$data['mobile'];
        $this->password=md5($data['password']);


        return $this;
    }


    public function store(){

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
            // set the PDO error mode to exception
            $query = "INSERT INTO users(id, fullname, email, username, Mobile, created_at, password) VALUES (:i , :f, :e, :u, :m, :a, :p )";
            $stmt = $pdo->prepare($query);
            $data = array(
                ':i' => null,
                ':f' => $this->fullname,
                ':e' => $this->email,
                ':u' => $this->username,
                ':m' => $this->mobile,
                ':a' => date("Y-m-d h:i:s"),
                ':p' => $this->password
            );
            $stmt->execute($data);
            $result= $stmt->rowCount();
            if($result){
                $_SESSION['adduser'] = "New User Added Successfully.";
                header('location:../portal/adduser.php');
            }else{
                $_SESSION['adderror'] ="Already Exists User Name Or Email !";
                header('location:../portal/adduser.php');
            }

        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

            }


    public function login($data=''){

            $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);

            $username = "'" . $data['username'] . "'";
            $password = "'" . md5($data['password']) . "'";

            $query = "SELECT * FROM `users` WHERE username=$username AND password=$password";

            $stmt = $pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetch();

            if (!empty($data)) {
                $_SESSION['user_id'] = $data;
                header('location:../portal/index.php');
            } else {
                $_SESSION['Message'] = "Invalid Username And Password ! Try Again.";
            }

    }


    public function setdepartment($data=''){
        $this->code= strtoupper($data['code']);
        $this->department= strtoupper($data['name']);
        return $this;

    }

    public function storedepartment(){


        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
            // set the PDO error mode to exception
            $query = "INSERT INTO department (id, code, department, created_at) VALUES (:i , :co, :n, :c )";
            $stmt = $pdo->prepare($query);
            $data = array(
                ':i' => null,
                ':co' => $this->code,
                ':n' => $this->department,
                ':c' => date("Y-m-d h:i:s")
            );

            echo "$query";

            $stmt->execute($data);
            $result= $stmt->rowCount();
            if($result){
                $_SESSION['department'] = "Your Department Added Successfully.";
               //header('location:showdepartment.php');
            }else{
                $_SESSION['error'] = " Department or Code Already Exists !";
            }

        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

    }
    public function getdepartment(){
        $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        // set the PDO error mode to exception
        $query = "SELECT * FROM department";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $alldata=$stmt->fetchall();
        $this->countdepartment= $stmt->rowCount();
        return $alldata;
    }

    public function setcourse($data=''){
        $this->coursename= strtoupper($data['coursename']);
        $this->code= strtoupper($data['coursecode']);
        $this->credit= $data['credit'];
        $this->description= $data['description'];
        $this->department= $data['department'];
        $this->semester= $data['semester'];
        return $this;

    }

    public function storecourse(){


        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
            // set the PDO error mode to exception
            $query = "INSERT INTO course (id, coursename, coursecode, coursecredit, description, semester_id, department_id, created_at) VALUES (:i ,:n, :co, :cr, :des, :s,:dep, :c )";
            $stmt = $pdo->prepare($query);
            $data = array(
                ':i' => null,
                ':n' => $this->coursename,
                ':co' => $this->code,
                ':cr' => $this->credit,
                ':des' => $this->description,
                ':s' => $this->semester,
                ':dep' => $this->department,
                ':c' => date("Y-m-d h:i:s")
            );

           $stmt->execute($data);
            $result= $stmt->rowCount();
            if($result){
                $_SESSION['department'] = "Your Course Added Successfully.";
                //header('location:showdepartment.php');
            }else{
                $_SESSION['error'] = " Course Name or Code Already Exists !";
            }

        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function getallcourse(){
        $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        // set the PDO error mode to exception
        $query = "SELECT * FROM course JOIN department ON department.id = course.department_id JOIN semester ON semester.id = course.semester_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $alldata=$stmt->fetchall();
        $this->countcourse= $stmt->rowCount();
        return $alldata;
    }
    public function getallsemester(){
        $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        // set the PDO error mode to exception
        $query = "SELECT * FROM semester";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $allsemester=$stmt->fetchall();
         $stmt->rowCount();
        return $allsemester;
    }

    public function getalldesignation(){
    $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
    // set the PDO error mode to exception
    $query = "SELECT * FROM designation";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $alldesignation=$stmt->fetchall();
    $stmt->rowCount();
    return $alldesignation;
   }

    public function setteacher($data=''){
        $this->fullname= strtoupper($data['fullname']);
        $this->address= ($data['address']);
        $this->email= $data['email'];
        $this->code= $data['contact_no'];
        $this->description= $data['designation'];
        $this->department= $data['department'];
        $this->credit= $data['credit'];
        return $this;

    }

    public function storeteacher(){


        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
            // set the PDO error mode to exception
            $query = "INSERT INTO teacher (id, teachername, address, email, contact_no, designation_id, department_id, teachercredit, created_at) VALUES (:i ,:n, :ad, :e, :con, :des,:dep, :cre, :c )";
            $stmt = $pdo->prepare($query);
            $data = array(
                ':i' => null,
                ':n' => $this->fullname,
                ':ad' => $this->address,
                ':e' => $this->email,
                ':con' => $this->code,
                ':des' => $this->description,
                ':dep' => $this->department,
                ':cre' => $this->credit,
                ':c' => date("Y-m-d h:i:s")
            );

            $stmt->execute($data);
            $result= $stmt->rowCount();
            if($result){
                $_SESSION['department'] = "New Teacher Added Successfully.";
                //header('location:showdepartment.php');
            }else{
                $_SESSION['error'] = " Email and Contact No Already Exists !";
            }

        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function getallteacher(){
        $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        // set the PDO error mode to exception
        $query = "SELECT * FROM teacher JOIN department ON department.id = teacher.department_id JOIN designation ON designation.id = teacher.designation_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $allteacher=$stmt->fetchall();
        $this->countteacher= $stmt->rowCount();
        return $allteacher;
    }

    public function set_assign_teacher($data=''){


        $this->department = $data['department_id'];
        $this->address = $data['teacher_id'];
        $this->code = $data['course_code'];
        $this->coursename = $data['course_name'];
        $this->credit = intval($data['course_credit']);
        return $this;

    }
    public function teachercheck(){

        $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        // set the PDO error mode to exception
        $c=$this->code;
        $query = "SELECT * FROM course_assign JOIN teacher ON teacher.id = course_assign.teacher_id WHERE course_code='$c'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $assign=$stmt->fetch(PDO::FETCH_ASSOC);

            if($assign['course_code']==$this->code){

                $_SESSION['error'] = $assign['course_code']." Course Already Assign To ".$assign['teachername'];
            }

            else{
                $this->store_assign_teacher();
            }

    }
    public function store_assign_teacher(){


        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
            // set the PDO error mode to exception
            $query = "INSERT INTO course_assign (id, department_id, teacher_id, course_code, course_credit,course_name,created_at) VALUES (:i ,:dep, :t, :cco, :cre, :cona, :ca )";
            $stmt = $pdo->prepare($query);
            $data = array(
                ':i' => null,
                ':dep' => $this->department,
                ':t' => $this->address,
                ':cco' => $this->code,
                ':cre' => $this->credit,
                ':cona' => $this->coursename,
                ':ca' => date("Y-m-d h:i:s")
            );

            $stmt->execute($data);
            $result= $stmt->rowCount();
            if($result){
                $_SESSION['department'] = "Course Assign To Teacher Successfully.";
                //header('location:showdepartment.php');
            }

        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function set_student_data($data=''){


        $this->fullname= strtoupper($data['fullname']);
        $this->email= $data['email'];
        $this->code= $data['cell_no'];
        $this->description= $data['date'];
        $this->address= $data['address'];
        $this->department= $data['department_id'];
        return $this;

    }


    public function store_student()
    {

        $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        // set the PDO error mode to exception
        $query = "SELECT department FROM `department` WHERE id=" . $this->department;
        $query2 = "SELECT Count(student_name) AS TOTAL FROM student WHERE department_id=" . $this->department;

        $stmt = $pdo->prepare($query);
        $stmt2 = $pdo->prepare($query2);

        $stmt->execute();
        $stmt2->execute();
        $st_count = $stmt2->fetch();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        $cn = $st_count['TOTAL'];
        $dname = $data['department'];

        function add_leading_zero($value, $threshold = 3)
        {
            return sprintf('%0' . $threshold . 's', $value);
        }

        $auto = add_leading_zero(++$cn);
        $year = date("Y");
        $register_id = $dname . "-" . $year . "-" . $auto;

            try {
                $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
                // set the PDO error mode to exception
                $query = "INSERT INTO student (id, student_name, email, cell_no ,date, student_address, department_id, register_id, created_at) VALUES (:i ,:na, :em, :cl, :dt, :ad, :dep, :re, :ca )";
                $stmt = $pdo->prepare($query);
                $data = array(
                    ':i' => null,
                    ':na' => $this->fullname,
                    ':em' => $this->email,
                    ':cl' => $this->code,
                    ':dt' => $this->description,
                    ':ad' => $this->address,
                    ':dep' => $this->department,
                    ':re' => $register_id,
                    ':ca' => date("Y-m-d h:i:s")
                );

                $stmt->execute($data);
                $result = $stmt->rowCount();
                if ($result) {
                    $_SESSION['department'] = "Registration Completed ! Collect ID : $register_id ";
                    //header('location:showdepartment.php');
                }
                else{
                    $_SESSION['error'] = "Your Email Or Contact No Already Exists";
                    header('location:registerstudent.php');

                }


            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

        }

    public function getallstudent(){
        $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        // set the PDO error mode to exception
        $query = "SELECT * FROM student"; //JOIN department ON department.id = student.department_id
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $allstudent=$stmt->fetchall();
        $this->countstudent= $stmt->rowCount();
        return $allstudent;
    }


    public function onestudent(){
        $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        $name=strtoupper($_SESSION['student_name']);
        $query = "SELECT * FROM student JOIN department ON department.id = student.department_id  WHERE student.student_name="."'".$name."'";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $onestudent=$stmt->fetch(PDO::FETCH_ASSOC);
         $_SESSION["student_data"]=$onestudent;
    }

    public function set_enroll($data=''){


        $this->semester = $data['student_id'];
        $this->fullname = $data['name'];
        $this->email = $data['email'];
        $this->department = $data['department_id'];
        $this->code = $data['course_code'];
        $this->address = $data['date'];
        return $this;

    }
    public function enrollcheck(){

        $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        // set the PDO error mode to exception
        $c=$this->semester;
        $query = "SELECT * FROM enroll_course JOIN student ON student.id = enroll_course.student_id where enroll_course.student_id=".$c;
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $assign=$stmt->fetchall(PDO::FETCH_ASSOC);


      foreach ($assign as $item)
      {
          if($item['course_code']==$this->code){

              $_SESSION['error'] = "The ID : ".$item['register_id']." Already Enroll The Course- " .$item['course_code'];
          }
      }

      if(!isset( $_SESSION['error'])){

          $this->store_enroll();
      }


    }
    public function store_enroll(){


        try {
            $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
            // set the PDO error mode to exception
            $query = "INSERT INTO enroll_course (id, student_id, stu_name, stu_email, department_id ,course_code, enroll_date) VALUES (:i ,:st, :stn, :stem, :dep, :co, :en )";
            $stmt = $pdo->prepare($query);
            $data = array(
                ':i' => null,
                ':st' => $this->semester,
                ':stn' => $this->fullname,
                ':stem' => $this->email,
                ':dep' => $this->department,
                ':co' => $this->code,
                ':en' => $this->address
            );

            $stmt->execute($data);
            $result= $stmt->rowCount();
            if($result){
                $_SESSION['department'] = "Course Enroll Successfully";
                //header('location:showdepartment.php');
            }

        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function set_result($data=''){
        $this->semester = $data['student_id'];
        $this->fullname = $data['name'];
        $this->email = $data['email'];
        $this->department = $data['department_id'];
        $this->code = $data['course_code'];
        $this->address = $data['grade'];
        return $this;

    }



    public function check_result()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
        // set the PDO error mode to exception
        $c = $this->semester;
        $query = "SELECT * FROM save_result JOIN student ON student.id = save_result.student_id where save_result.student_id=" . $c;
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $assign = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($assign as $item)
        {
            if($item['course_code']==$this->code){

                $_SESSION['error'] = "ID : ".$item['register_id']." Already Save Result For The Course- " .$item['course_code']." = ".$item['grade'];
            }
        }

        if(!isset( $_SESSION['error'])){

           $this->store_result();
        }

    }


    public function store_result(){

                    try {
                        $pdo = new PDO("mysql:host=localhost;dbname=$this->dbname", $this->dbuser, $this->dbpass);
                        // set the PDO error mode to exception
                        $query = "INSERT INTO save_result (id, student_id, stu_name, stu_email, department_id, course_code, grade) VALUES (:i ,:st, :sn, :sm, :dep, :co, :gr )";
                        $stmt = $pdo->prepare($query);
                        $data = array(
                            ':i' => null,
                            ':st' => $this->semester,
                            ':sn' => $this->fullname,
                            ':sm' => $this->email,
                            ':dep' => $this->department,
                            ':co' => $this->code,
                            ':gr' => $this->address
                        );

                        $stmt->execute($data);
                        $result = $stmt->rowCount();
                        if ($result) {
                            $_SESSION['department'] = "Student Result Save Successfully.";
                            //header('location:showdepartment.php');
                        } else {
                            $_SESSION['error'] = " Have Some Error To Store Data !";
                        }

                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }

    }








}