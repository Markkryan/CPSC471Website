<?php
session_start();

$db_user = "";
$db_password = "";
$server_name = "localhost";
$db_name = "";
$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['login'])) {
    try {
        $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully"; 
        $sql = "SELECT  * FROM ""
        $data = $conn -> prepare($sql);
        $data->execute();
        $result = $data -> fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $result['U_Name'];
    
                
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }

}





?>