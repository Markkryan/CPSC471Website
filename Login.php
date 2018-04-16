<?php
session_start();
$db_username = "root";
$db_password = "";
$server_name = "127.0.0.1";
$db_name = "testworkout";
$username = $_POST['username'];
$password = $_POST['password'];
if(isset($_POST['login'])) {
    try {
        $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully"; 
        $sql = "SELECT  * FROM  user  U WHERE '$username' = U.Username AND '$password' = U.U_Password";
        $data = $conn -> prepare($sql);
        $data->execute();
        $result = $data -> fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $result['Username'];
        //echo $_SESSION['user'];
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

if(isset($_SESSION['user'])){
    header('Location: Profile.php');
    exit;
} else {
    header('Location: Login.html');
    exit;
}
?>