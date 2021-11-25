
<?php
    session_start();
    unset($_SESSION['user']);
    require("database_credentials.php"); 
    
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT fname, cust_id FROM customers where email = '".$email."' AND password = '".$password."'"; 
        $conn = new mysqli(servername, username, password, database);
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            $user = $result->fetch_row();
            $_SESSION['login'] = "true";
            $_SESSION['user'] = $user[0];
            $_SESSION['userid'] = $user[1];
    
        }
        else {
            ob_clean();
            echo("Failure to login");
        }
    //$_SESSION['redirect'] =$_POST['goTo'];
    // ob_clean();
    }
?>