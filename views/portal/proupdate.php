<?php
include("../../vendor/autoload.php");
use App\reg\reg;
session_start();

if (empty($_SESSION['user_id'])) {
    $_SESSION['Message'] ="Access Denied ! Login First ";
    header('location:../auth/login.php');
}

if (isset($_POST) & !empty($_POST)){

    $servername = "localhost";
    $username = 'root';
    $password = '';
    if (empty($_POST['password'])){
        $pass =  "'".$_POST['lastpassword']."'";
    }
    else{
        $pass= "'".md5($_POST['password'])."'";
    }

     $fullname="'".$_POST['fullname']."'";
     $user="'".$_POST['username']."'";
      $email="'".$_POST['email']."'";
      $mobile="'".$_POST['mobile']."'";
      $id="'".$_POST['id']."'";
     $update = "'".date("Y-m-d h:i:s")."'";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=versity", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE users SET fullname=$fullname, username=$user, email=$email, Mobile=$mobile, password=$pass, updated_at=$update WHERE id=$id";

        // Prepare statement
        $stmt = $conn->prepare($sql);
        // execute the query
        $stmt->execute();

        // echo a message to say the UPDATE succeeded
        if($stmt->rowCount()){
            $_SESSION['user_id']['fullname']=$_POST['fullname'];
            $_SESSION['user_id']['email']=$_POST['email'];
            $_SESSION['user_id']['username']=$_POST['username'];
            $_SESSION['user_id']['Mobile']=$_POST['mobile'];
            $_SESSION['user_id']['updated_at']=date("Y-m-d h:i:s");
            $_SESSION['update']= "Updated Successfully";
            header('location:profile.php');
        }
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

}
?>