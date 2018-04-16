<?php
session_start();
$db_username = "root";
$db_password = "";
$server_name = "127.0.0.1";
$db_name = "testworkout";
$username = $_SESSION['user'];

try {
    $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    $sql = "DELETE FROM user WHERE Username='$username'";
    $conn->exec($sql);
    unset($_SESSION['user']);
    header("Location: Login.html");
    exit;
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>