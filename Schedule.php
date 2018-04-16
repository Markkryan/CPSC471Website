<?php
session_start();
$db_username = "root";
$db_password = "";
$server_name = "127.0.0.1";
$db_name = "testworkout";
$username = $_SESSION['user'];
$workout = $_POST['Workout'];
$day = $_POST['password'];


if(isset($_POST['register'])) {
    try {
        $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $sql = "INSERT INTO Scheduled_on (Esername, Workout_Name, Day) VALUES ('$username', '$wokrout', '$day')";
        $conn->exec($sql);
        $_SESSION['user'] = $username;
        
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

if(isset($_SESSION['user'])){
    header('Location: Profile.html');
    exit;
} else {
    header('Location: Login.html');
    exit;
}

?>