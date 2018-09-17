    <?php

    $conn = new PDO("mysql:host=localhost;dbname=versity", 'root', '');

   if(isset($_POST['depart'])){

        $department_id = $_POST['depart'];
        $sql = "SELECT * FROM `teacher` WHERE teacher.department_id=".$department_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $teacher=$stmt->fetchall(PDO::FETCH_ASSOC);

       $sql2 = "SELECT * FROM `course` WHERE course.department_id=".$department_id;
       $stmt2 = $conn->prepare($sql2);
       $stmt2->execute();
       $course=$stmt2->fetchall(PDO::FETCH_ASSOC);

       $data=[
           'teacher'=>$teacher,
           'course'=>$course
       ];

       echo json_encode($data);
   }

if(isset($_POST['teach_id'])){

       If(empty($_POST['teach_id']) || $_POST['teach_id']==0){

           $z=array(
           ['teacher']['teachercredit']=>'Select Teacher',
           ['ac']['assign_credit']=>'Select Teacher');

           echo json_encode($z);
       }
       else{
           $teach_id = $_POST['teach_id'];
           $sql = "SELECT * FROM `teacher` WHERE id=".$teach_id;
           $stmt = $conn->prepare($sql);
           $stmt->execute();
           $teacher=$stmt->fetch(PDO::FETCH_ASSOC);

           $sql2 = "SELECT SUM(course_credit) as assign_credit FROM course_assign WHERE teacher_id=".$teach_id;
           $stmt2 = $conn->prepare($sql2);
           $stmt2->execute();
           $assign_credit=$stmt2->fetch(PDO::FETCH_ASSOC);

           $data=[
             'teacher'=>$teacher,
           'ac'=>$assign_credit
           ];

           echo json_encode($data);
       }

}

if(isset($_POST['course_id'])){

    If(empty($_POST['course_id']) || $_POST['course_id']==0){

    }
    else{
        $course_id = $_POST['course_id'];
        $sql = "SELECT * FROM `course` WHERE id=".$course_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data=$stmt->fetch(PDO::FETCH_ASSOC);


        echo json_encode($data);
    }

}

if(isset($_POST['de_id'])){


        $de_id = $_POST['de_id'];
        $sql = "SELECT * FROM `course_assign` JOIN course ON course.coursecode = course_assign.course_code JOIN teacher ON teacher.id = course_assign.teacher_id JOIN semester ON semester.id = course.semester_id WHERE course_assign.department_id=".$de_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $assign_course=$stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql2 = "SELECT coursecode, coursename, semester FROM `course` JOIN semester On semester.id=course.semester_id WHERE course.department_id=".$de_id;
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $unasign_course=$stmt2->fetchAll(PDO::FETCH_ASSOC);


    $data=[
        'assign'=>$assign_course,
        'unassign'=>$unasign_course
    ];
    echo json_encode($data);

}

    if(isset($_POST['st_id'])){

        $st_id = $_POST['st_id'];
        $sql = "SELECT * FROM `student` JOIN department ON department.id = student.department_id JOIN course ON course.department_id = student.department_id WHERE student.id=".$st_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $course_code=$stmt->fetchAll(PDO::FETCH_ASSOC);


        $sql2 = "SELECT * FROM `student` JOIN department ON department.id = student.department_id JOIN course ON course.department_id = student.department_id WHERE student.id=".$st_id;
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        $name=$stmt2->fetch(PDO::FETCH_ASSOC);

        $data=[
            'course_code'=>$course_code,
            'name'=>$name
        ];
        echo json_encode($data);
    }


if(isset($_POST['save_result'])){

    $st_id = $_POST['save_result'];
    $sql = "SELECT student_id,course_code FROM enroll_course WHERE enroll_course.student_id=".$st_id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $course_code=$stmt->fetchAll(PDO::FETCH_ASSOC);


    $sql2 = "SELECT * FROM `student` JOIN department ON department.id = student.department_id JOIN course ON course.department_id = student.department_id WHERE student.id=".$st_id;
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $name=$stmt2->fetch(PDO::FETCH_ASSOC);

    $data=[
        'course_code'=>$course_code,
        'name'=>$name
    ];
    echo json_encode($data);
}

    if(isset($_POST['result_id'])){

        $st_id = $_POST['result_id'];
        $sql = "SELECT * FROM save_result JOIN course ON course.coursecode=save_result.course_code WHERE save_result.student_id=".$st_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $course_code=$stmt->fetchAll(PDO::FETCH_ASSOC);


        $sql2 = "SELECT student_name, email, department FROM `student` JOIN department ON department.id = student.department_id WHERE student.id =".$st_id;
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        $name=$stmt2->fetch(PDO::FETCH_ASSOC);


        $sql3 = "SELECT course_code,coursename FROM `enroll_course` JOIN course On course.coursecode=enroll_course.course_code WHERE enroll_course.student_id=".$st_id;
        $stmt3 = $conn->prepare($sql3);
        $stmt3->execute();
        $enroll=$stmt3->fetchAll(PDO::FETCH_ASSOC);

        $data=[
            'result'=>$course_code,
            'name'=>$name,
            'enroll'=>$enroll
        ];
        echo json_encode($data);
    }
?>