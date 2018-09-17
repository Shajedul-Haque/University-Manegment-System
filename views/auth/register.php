<?php
include("../../vendor/autoload.php");
use App\reg\reg;
session_start();
if (isset($_POST) & !empty($_POST)){

    $obj = new reg();

    $obj -> setData($_POST)->store();

}
?>
