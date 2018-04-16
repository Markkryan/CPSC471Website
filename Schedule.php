<?php
session_start();
$db_username = "root";
$db_password = "";
$server_name = "127.0.0.1";
$db_name = "workout";
$username = $_SESSION['user'];
$workout = $_POST['Workout'];
$day = $_POST['password'];


if(isset($_POST['submit'])) {
    try {
        $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $sql = "INSERT INTO scheduled_on (Username, Workout_Name, Day) VALUES ('$username', '$workout', '$day')";
        $conn->exec($sql);
        
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

?>