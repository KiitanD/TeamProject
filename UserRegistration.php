<?php
session_start();
//require_once('signupProcessing.php');
require("database_credentials.php"); 
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../bootstrap-4.4.1.js"></script>
        <link href="../test.css" rel="stylesheet" type="text/css">
        <script src="../jquery-3.4.1.min.js"></script>
        <script src="../popper.min.js"></script>

    </head>


<?php


//Checking to see if the register button has been clicked
if (isset($_POST['Fname'])) {
    $frstnm   = $_POST['Fname'];
    $lstnm    = $_POST['Lname'];
    $home     = $_POST['housing'];
    $mailing  = $_POST['email'];
    $phonebook = $_POST['contact'];
    $password = $_POST['Pass1'];
    $check    = $_POST['Pass2'];


    

    $sql = "INSERT INTO customers(name, password, phone, email, address) VALUES('".$frstnm."', '".$password."', '".$phonebook."', '".$mailing."', '".$home."')";

    //$result = $database->query($sql);
    //echo("there");
    $conn = new mysqli(servername, username, password, database);
    $result = $conn->query($sql);

    echo($sql);
    //take the db object defined in signupProcessing.php then prepare it for data supplied into the  sql variable 
    
    if ($result) {
        $_SESSION['login'] = "true";
        $_SESSION['user'] = $frstnm;
        ob_clean();

        echo($_SESSION['redirect']);
        //return($_SESSION['redirect']);
    }  
    else {
        echo 'Errors in your sign up';
    }
}

?>
