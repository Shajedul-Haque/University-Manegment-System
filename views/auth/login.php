<?php
include("../../vendor/autoload.php");
use App\reg\reg;
session_start();
if (isset($_POST) & !empty($_POST)){
    $obj = new reg();
    $obj -> login($_POST);
    //$w= $obj->wrong;
}

if (isset($_SESSION['user_id'])) {
    $_SESSION['allreadylogin'] ="You are now log in ! Logout first to log in another account.";
    header('location:../portal/index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Website CSS style -->
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">

    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <title>Admin</title>
</head>
<body>
<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">User Login Panel</h1>
                <h5 style="margin-left:400px; margin-right: 400px ">
                    <?php if(isset($_SESSION['logout'])){ ?><div class="alert alert-success" role="alert"> <?php echo $_SESSION['logout']; unset($_SESSION['logout']);?> </div><?php } ?>

                    <?php if(isset($_SESSION['Message'])){ ?><div class="alert alert-danger" role="alert"> <?php echo $_SESSION['Message']; unset($_SESSION['Message']);?> </div><?php } ?>

                </h5>
                <hr />
            </div>
        </div>
        <div class="main-login main-center">
            <form class="form-horizontal" method="post">


                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required/>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <input type="submit" class="btn btn-primary btn-lg btn-block login-button" value="Login"/>
                </div>
                <div class="login-register">
                    <a style=" color: #00b008 ; font-weight:bold;font-size: 15px"href="register.php">Register</a>
                    <a style="margin-left: 80px; color: #00b008 ; font-weight:bold;font-size: 15px" href="../../index.php">Go Home</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>