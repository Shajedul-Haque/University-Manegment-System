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
    $alldata=$obj->getdepartment();
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
    <script src="assets/js/jquery-3.1.0.min.js"></script>
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
<script>

    function showOrNot() {

        if( document.getElementById('sel_depart').value==''){
            document.getElementById('show').innerHTML = 'Select your department to show course statics';
        }
       if( document.getElementById('sel_depart').value>0){
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
                    <p style="padding-top:5px;" id="course">
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
                <li style="background-color:#c4c6ca;">
                    <a style="margin-top: 0%; padding-top: 2%;margin-left:10px;color:black;font-weight:bold" href="showcoursestatics.php">
                        <i style="color:black;" class="fa fa-area-chart"></i>
                        <p>Course Statics</p>
                    </a>
                </li>
                <li>
                    <a style="margin-top: 0%; padding-top: 0%;margin-left:10px" href="registerstudent.php">
                        <i class="material-icons">bubble_chart</i>
                        <p>Register A Student</p>
                    </a>
                </li>
                <li>
                    <a style="margin-top: 0%; padding-top: 0%;margin-left:10px" href="enrollclass.php">
                        <i class="material-icons">unarchive</i>
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
                    <p id="st">
                        <span><i style="margin-left:28px" class="material-icons">content_paste</i>
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
                                    <i class="fa fa-dashboard"></i> Dashboard / All Teachers
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-offset-2 col-sm-8">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title" style="text-align: center"> Course Statics Of Your University</h4>
                        <p class="category" style="text-align: center">Course Informetion</p>

                    </div>
                    <div class="card-content table-responsive">
                        <div style="font-weight: 900; " class="col-md-offset-3 col-md-8">
                            <tr>
                                <td>Department  : </td>
                                <td><select name="department_id" onchange="showOrNot()" id="sel_depart" style="width: 50%;height: 25px">
                                        <option value="">Select Department</option> <?php
                                        foreach ($alldata as $data) {?>

                                            <option value="<?php echo $data['id'] ?>"><?php echo $data['department'] ?></option>

                                            <?php
                                        }

                                        ?>
                                    </select></td>
                            </tr>
                        </div>

                        <table class="table table-hover">
                            <thead style="font-weight:bolder; color: orangered">
                            <th>Course Code </th>
                            <th>Course Title</th>
                            <th>Semester</th>
                            <th>Assign To</th>

                            </thead>
                            <tbody id="td">

                            </tbody>
                        </table>
                        <div style="height: 40px; font-weight: 600;color: crimson; margin-top:30px ;text-align: center" id="show">
                                    Select your department to show course statics
                        </div>
                    </div>
                </div>
            </div>
    </div>
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
<script src="assets/js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#sel_depart").change(function(){
            var dep_id = $(this).val();

            $.ajax({
                url: 'ajaxassignteacher.php',
                type: 'post',
                data: {de_id:dep_id},
                dataType: 'json',
                success:function(response){

                  var len = response['assign'].length;

                    $('#td').empty();
                    for( var i = 0; i<len; i++){
                        var code = response['assign'][i]['course_code'];
                        var name = response['assign'][i]['course_name'];
                        var semester = response['assign'][i]['semester'];
                        var teacher= response['assign'][i]['teachername'];

                        $("#td").append("<tr id='rem'><td id='code'>"+code+"</td><td>"+name+"</td><td>"+semester+"</td><td>"+teacher+"</td></tr>");

                    }

                    var pen =response['unassign'].length;
                    for( var j = 0; j<pen; j++){
                        var un_code = response['unassign'][j]['coursecode'];
                        var as_code =  document.getElementById('code').innerHTML;

                       if (as_code!=un_code && code!=un_code) {
                           var unco_name = response['unassign'][j]['coursename'];
                           var sem = response['unassign'][j]['semester'];

                           $("#td").append("<tr id='rem'><td>" + un_code + "</td><td>" + unco_name + "</td><td>" + sem + "</td><td> Not Yet </td></tr>");
                       }

                    }
                }
            });
        });


    });

</script>

</html>


