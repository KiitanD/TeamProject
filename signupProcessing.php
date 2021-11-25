<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--THIS WAS CREATED TO PROCESS DATA INPUTED ON SIGNUP SHEET-->
</body>


<?php



$host = "localhost";
$user = "root";
$password = "";
$db = "team_project";


//Find out about the PDO class
$database = new PDO('mysql:host=localhost; dbname=' . $db . '; charset-utf8', $user, $password);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);






//$mysqli = new mysqli($host, $user, $password, $db) or die(mysqli_error($mysqli));
//Above was commented because it wasnt working and so i decided to try a method given by a video tutorial



?>
















</html>
