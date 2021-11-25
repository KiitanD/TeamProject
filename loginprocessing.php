
<?php
    session_start();
    require("database_credentials.php"); 
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT name FROM customers where email = '".$email."' AND password = '".$password."'"; 
        $conn = new mysqli(servername, username, password, database);
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $_SESSION['login'] = "true";
            $_SESSION['user'] = $result->fetch_row()[0];
            
            ob_clean();
            echo("yeah");

        }
        else {
            ob_clean();
            echo("Failure to login");
        }
    //$_SESSION['redirect'] =$_POST['goTo'];
    // ob_clean();
    }
?>