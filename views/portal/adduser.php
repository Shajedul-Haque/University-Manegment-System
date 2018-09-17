<?php
include("../../vendor/autoload.php");
use App\reg\reg;
session_start();

if (empty($_SESSION['user_id'])) {
    $_SESSION['Message'] ="Access Denied ! Login First ";
    header('location:../auth/login.php');
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
</head>

<body>

<div class="wrapper">

    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

            Tip 2: you can also add an image using data-image tag
        -->

        <div class="logo" style="background-color:purple; color: white; text-align: center; margin-top: 11px" >
            <a href="index.php" style="color: white; font-weight: bold ; color:whitesmoke ; margin-right:14px "  ><i class="fa fa-fw fa-gear"></i>
                Admin Dashboard
            </a>
        </div>

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <p style="padding-bottom:8px " id="menu">
                        <span><i style="margin-left:28px" class="fa fa-university"></i>
                        Departments</span>
                        <a href="savedepartment.php" type="button" class="btn-round btn-fill">Add New</a>
                        <a href="showdepartment.php" type="button" class="btn-round btn-fill">Show All</a>
                    </p>
                </li>
                <li>
                    <p style="padding-bottom:8px " id="course">
                        <span><i style="margin-left:28px" class="material-icons">dashboard</i>
                        Courses</span>
                        <a href="addcourse.php" type="button" class="btn-round btn-fill">Save Course</a>
                        <a href="showcourse.php" type="button" class="btn-round btn-fill"> Show All </a>
                    </p>
                </li>
                <li>
                    <p id="te">
                        <span><i style="margin-left:28px" class="material-icons">content_paste</i>
                        Teachers</span>
                        <a href="addteacher.php" type="button" class="btn-round btn-fill">Add Teacher</a>
                        <a href="showteacher.php" type="button" class="btn-round btn-fill"> Show All </a>
                    </p>
                </li>
                <li>
                    <a style="margin-top: 0%; padding-top: 0%;margin-left:10px" href="courseassign.php">
                        <i class="material-icons">library_books</i>
                        <p>Course Assign</p>
                    </a>
                </li>
                <li>
                    <a style="margin-top: 0%; padding-top: 0%;margin-left:10px" href="showcoursestatics.php">
                        <i class="fa fa-area-chart"></i>
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
                    <p class="navbar-left"  style="color: white; font-weight: bold ; color:whitesmoke; margin-top:14px"> University Management System Portal  <a href="index.php" style="color: white; font-weight: bold ; color:whitesmoke ; margin-right:14px "  ><i class="fa fa-fw fa-gear"></i>
                Admin Dashboard
            </a></p>
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
            "



            <div class="container">
                <div class="row">
                    <div class="col-xs-offset-2 col-xs-7 col-sm-7 " >
                        <div class="text-center">
                            <h5 style="margin-left:400px; margin-right: 400px; height:5px; margin-top: 7px">

                                <?php if(isset( $_SESSION['adduser'])){?><div class="alert alert-success" role="alert"> <?php echo  $_SESSION['adduser']; unset( $_SESSION['adduser']); ?> </div><?php } ?>
                                <?php if(isset( $_SESSION['adderror'])){?><div class="alert alert-danger" role="alert"> <?php echo  $_SESSION['adderror']; unset( $_SESSION['adderror']);?> </div><?php } ?>

                            </h5>
                            <hr />
                        </div>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="text-align: center; color:black; font-weight: bold">Fill Up Your New User Information</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-10 col-lg-10 ">
                                        <form class="form-group" method="post" action="../auth/register.php">
                                            <table class="table table-user-information">
                                                <tbody>
                                                <tr>
                                                    <td>Full Name </td>
                                                    <td><input name="fullname" type="text" class="form-control" placeholder=" Full Name"  required></td>
                                                </tr>
                                                <tr>
                                                    <td>Username</td>
                                                    <td><input name="username" type="text" class="form-control" placeholder=" Username" required></td>
                                                </tr>
                                                <tr>
                                                    <td>Email Address</td>
                                                    <td><input name="email" type="text" class="form-control" placeholder=" Email Address" required></td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile No</td>
                                                    <td><input name="mobile" type="number" class="form-control" placeholder=" Mobile No" required></td>
                                                </tr>
                                                <tr>
                                                    <td>Password</td>
                                                    <td><input name="password" type="password" class="form-control" placeholder=" Password"></td>
                                                </tr>
                                                </tbody>
                                            </table>

                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn"><i class="glyphicon glyphicon-envelope"></i></a>
                                <span class="pull-right">
                                    <button   type="submit" class="btn btn-primary" ><i class="fa fa-fw fa-gear"></i>Add User</button>
                                     <a href="profile.php" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-danger"> Cancel</a>
                        </span>
                            </div>
                            </from>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com"> Copyright XAMPP Team</a>
                    </p>
                </div>
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

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script src="assets/js/slide.js"></script>

<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
        $('#menu').hover(
            function() { // mouseenter
                // hide & compress initial text
                $('#menu span').stop().animate({
                    width: '0px',
                    opacity: 0
                }, $('#menu span').hide);

                // show & decompress link options
                $('#menu a').stop().show().animate({
                    width: '100px',
                    opacity: 1
                });

            },
            function() { //mouseleave
                // hide & compress options
                $('#menu a').stop().animate({
                    width: '0px',
                    opacity: 0
                }, $('#menu a').hide);

                // show & decompress link options
                $('#menu span').stop().show().animate({
                    width: '200px',
                    opacity: 1
                });

            });

    });
</script>

</html>