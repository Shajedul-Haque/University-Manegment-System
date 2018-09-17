<?php
include("../../vendor/autoload.php");
use App\reg\reg;
session_start();
if (empty($_SESSION['user_id'])) {
    $_SESSION['Message'] ="Access Denied ! Login First ";
    header('location:../auth/login.php');
}
else{
    $obj = new reg();
    $alldata=$obj->getallstudent();
}
if (isset($_POST) & !empty($_POST)){

    if (  !empty($_POST['student_id']) &  !empty($_POST['course_code']) &  !empty($_POST['date'])) {

        $obj = new reg();
        $obj->set_enroll($_POST)->enrollcheck();

    }
    else{
        $_SESSION['error']= " Must Be Select The All Options !";

    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Admin Panel</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/slide.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <script>
        function showOrNot() {

            var d = document.getElementById('sel_st');

            if (d.value=='') {

                setTimeout(function (){
                    document.getElementById('st_name').innerHTML = 'Not Selected';
                    document.getElementById('st_email').innerHTML = 'Not Selected';
                    document.getElementById('depart').innerHTML='Not Selected';
                },50);
            }

                if( document.getElementById('sel_st').value==''){
                    document.getElementById('show').innerHTML = 'Select your Student ID';
                }
                if( document.getElementById('sel_st').value>0){
                    document.getElementById('show').innerHTML = '';

                }

        }

    </script>
</head>

<body>

<div class="wrapper">

    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

            Tip 2: you can also add an image using data-image tag
        -->

        <div class="logo" style="background-color:purple; color: white; text-align: center; margin-top: 11px" >
            <a href="index.php" style=" font-weight: bold ; color:whitesmoke ; margin-right:14px "  ><i class="fa fa-fw fa-gear"></i>
                Admin Dashboard
            </a>
        </div>

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <p id="menu">
                        <span><i style="margin-left:28px;" class="fa fa-university"></i>
                        Departments</span>
                        <a href="savedepartment.php" type="button" class="btn-round btn-fill">Add New</a>
                        <a href="showdepartment.php" type="button" class="btn-round btn-fill">Show All</a>
                    </p>
                </li>
                <li>
                    <p style="padding-top:4px;" id="course">
                        <span><i style="margin-left:28px;" class="material-icons">dashboard</i>
                        Courses</span>
                        <a href="addcourse.php" type="button" class="btn-round btn-fill">Save Course</a>
                        <a href="showcourse.php" type="button" class="btn-round btn-fill"> Show All </a>
                    </p>
                </li>
                <li>
                    <p style="padding-top:5px;" id="te">
                        <span><i style="margin-left:28px;" class="material-icons">content_paste</i>
                        Teachers</span>
                        <a href="addteacher.php" type="button" class="btn-round btn-fill">Add Teacher</a>
                        <a href="showteacher.php" type="button" class="btn-round btn-fill"> Show All </a>
                    </p>
                </li>
                <li>
                    <a style="margin-top: 0%; padding-top: 0%;margin-left:10px;" href="courseassign.php">
                        <i class="material-icons">library_books</i>
                        <p>Course Assign</p>
                    </a>
                </li>
                <li >
                    <a style="margin-top: 0%; padding-top: 0%;margin-left:10px;" href="showcoursestatics.php">
                        <i  class="fa fa-area-chart"></i>
                        <p>Course Statics</p>
                    </a>
                </li>
                <li >
                    <a style="margin-top: 0%; padding-top: 0%;margin-left:10px;" href="registerstudent.php">
                        <i class="material-icons">bubble_chart</i>
                        <p>Register A Student</p>
                    </a>
                </li>
                <li >
                    <a style="margin-top: 0%; padding-top: 0%;margin-left:10px;" href="enrollclass.php">
                        <i  class="material-icons">unarchive</i>
                        <p>Enroll In A Course</p>
                    </a>
                </li>

                <li>
                    <a style="margin-top: 0%; padding-top: 0%;margin-left:10px" href="allocateclassroom.php">
                        <i class="material-icons">location_on</i>
                        <p>Allocate Classrooms</p>
                    </a>
                </li>
                <li>
                    <a style="margin-top: 0%; padding-top: 0%;margin-left:10px" href="viewclasss.php">
                        <i class="material-icons text-gray">notifications</i>
                        <p>View Class Schedule </p>
                    </a>
                </li>
                <li>
                    <p style="background-color:#c4c6ca; color:black;font-weight:bold;padding-top: 2%" id="st">
                        <span><i style="color:black;margin-left:28px" class="material-icons">content_paste</i>
                        Students Result</span>
                        <a href="saveresult.php" type="button" class="btn-round btn-fill">Save Result</a>
                        <a href="viewresult.php" type="button" class="btn-round btn-fill">View Result </a>
                    </p>
                </li>
                <li>
                    <p style="margin-top: 0%; padding-top: 0%; height: 10px" id="un">
                        <span><i style="margin-left:28px" class="fa fa-times"></i>Unassign Course</span>
                        <a href="unassigncourse.php" type="button" class="btn-round btn-fill">For Course</a>
                        <a href="unassignclass.php" type="button" class="btn-round btn-fill">For ClassRoom </a>
                    </p>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" style="background-color:darkcyan; color: white">
                    <p class="navbar-left"  style="color: white; font-weight: bold ; color:whitesmoke; margin-top:14px"> University Management System Portal  <a href="index.php" style="color: #3e2723">( Go Home )</a></p>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="assets/img/Cloud.jpg" style="height:25px; width: 30px; border-radius: 12px; margin-right: 5px" alt="User Image"><?php echo  $_SESSION['user_id']['username'];?>  <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="profile.php"><i class="fa fa-fw fa-user"></i> My Profile</a>
                                </li>
                                <li>
                                    <a href="editprofile.php"><i class="fa fa-fw fa-edit"></i> Edit Profile</a>
                                </li>
                                <li>
                                    <a href="adduser.php"><i class="fa fa-fw fa-gear"></i> Add User</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="logout.php" ><small><i class="fa fa-fw fa-power-off" style="font-size: 15px;margin-top:4px"></i></small> Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Dashboard / Enroll In A Course
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xs-offset-2 col-xs-7 col-sm-7 " >
                        <?php if(isset($_SESSION['department'])){?><div class="btn-success" style="background-color:#388e3c;color: white; text-align: center; font-weight: bold; height: 30px; border-radius: 2px; border: 1px solid black" role="alert"> <?php echo  $_SESSION['department']; unset( $_SESSION['department']); ?> </div><?php } ?>
                        <?php if(isset( $_SESSION['error'])){?><div style="background-color:crimson;color: whitesmoke; text-align: center; height: 26px; font-weight: bold; border-radius: 2px; border: 1px solid black" role="alert"> <?php echo  $_SESSION['error']; unset( $_SESSION['error']);?> </div><?php } ?>
                        <br />


                        <div class="col-md-offset-2 col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="blue">
                                    <h4 class="title" style="text-align: center">View A Student Result</h4>
                                    <p class="category" style="text-align: center">Session, 2018</p>
                                </div>
                                <div class="card-content table-responsive">
                                        <table class="table table-hover">
                                            <thead class="text-warning">
                                            <tbody> <tr>
                                                <td>Student Id</td>
                                                <td><select id="sel_st" onchange="showOrNot()" name="student_id" style="width: 78%;height: 25px" size="1">
                                                        <option value="">Select Department</option> <?php
                                                        foreach ($alldata as $data) {

                                                            ?>

                                                            <option value="<?php echo $data['id'] ?>"><?php echo $data['register_id'] ?></option>

                                                            <?php
                                                        }

                                                        ?>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td>Student Name</td>
                                                <td id="st_name"> Not Selected </td>
                                                <input type="hidden" id="st_input1"  name="name" value="">
                                            </tr>
                                            <tr>
                                                <td>Student Email</td>
                                                <td id="st_email"> Not Selected </td>
                                                <input type="hidden" id="st_input2"  name="email" value="">
                                            </tr>
                                            <tr>
                                                <td>Department</td>
                                                <td id="depart">  Not Selected </td>
                                                <input type="hidden" id="st_input3"  name="department_id" value="">
                                            </tr>
                                            </tbody>
                                        </table>
                            <span style="margin-left:60%">
                                <!-- <button type="submit" class="btn btn-primary right" ><i class="fa fa-fw fa-floppy-o"></i> Enroll</button> -->
                                <a id="btn" type="button" class="btn btn-sm "><i style="margin-right: 4px;padding-left:0%" class="fa fa-file-pdf-o"></i>  Make PDF</a>
                            </span>

                                         <div id="pdf"  style="margin-top: 10px">

                                             <table class="table">
                                                 <thead style="font-weight:900; color:black; background-color:#c4c6ca">
                                                 <th>Course Code </th>
                                                 <th>Course Title</th>
                                                 <th>Grade</th>

                                                 </thead>
                                                 <tbody id="td">

                                                 </tbody>
                                             </table>
                                         </div>
                                             <div style="height: 40px; font-weight: 600;color: crimson; margin-top:30px ;text-align: center" id="show">
                                                 Select your Student ID
                                             </div>



                            </div>
                        </div>
                    </div>
                </div>


    <footer class="footer">
        <p class="copyright pull-right" style="margin-right: 42%">
            &copy; <script>document.write(new Date().getFullYear())</script> <a href=""> Copyright XAMPP Team</a>
        </p>
    </footer>
</div>
            </div>

</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>
<script src="assets/js/slide.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="https://cdn.jsdelivr.net/jspdf/1.3.4/jspdf.min.js"></script>

<script src="assets/js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        $("#sel_st").change(function(){
            var st_id = $(this).val();

            $.ajax({
                url: 'ajaxassignteacher.php',
                type: 'post',
                data: {result_id:st_id},
                dataType: 'json',
                success:function(response){


                    var na= response['name']['student_name'];
                    var em= response['name']['email'];
                    var dp= response['name']['department'];

                    document.getElementById('st_name').innerHTML='<code style="font-size:16px; font-weight: 900">'+na+'<code>';
                    document.getElementById('st_email').innerHTML='<code style="font-size:16px; font-weight: 900">'+em+'<code>';
                    document.getElementById('depart').innerHTML='<code style="font-size:16px; font-weight: 900">'+dp+'<code>';

                    var len = response['result'].length;

                    $('#td').empty();
                    for( var i = 0; i<len; i++) {
                        var code = response['result'][i]['course_code'];
                        var name = response['result'][i]['coursename'];
                        var grade = response['result'][i]['grade'];

                            $("#td").append("<tr id='rem'><td>" + code + "</td><td>" + name + "</td><td>" + grade + "</td></tr>");

                    }
                        var pen =response['enroll'].length;

                         for( var j = 0; j<pen; j++){
                             var enroll_code = response['enroll'][j]['course_code'];

                             if (code!=enroll_code) {
                              var en_name =response['enroll'][i]['coursename'];
                              $("#td").append("<tr id='rem'><td>" + enroll_code + "</td><td>" + en_name + "</td><td> Not Yet </td></tr>");
                              }

                         }

                    }
            });
        });


        var doc = new jsPDF();
        var specialElementHandlers = {
            '#pdf': function (element, renderer) {
                return true;
            }
        };

        $('#btn').click(function () {
            doc.fromHTML($('#pdf').html(), 30, 15, {
                'width':200,
                'elementHandlers': specialElementHandlers
            });
            doc.save('result.pdf');
        });



    });


</script>

</html>


