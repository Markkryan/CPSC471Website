<?php
session_start();
$db_username = "root";
$db_password = "";
$server_name = "127.0.0.1";
$db_name = "testworkout";
$password = $_POST['password'];
$username = $_SESSION['user'];
$name = $_POST['name'];
$age = $_POST['age'];
$height = $_POST['height'];
$new_height = $height / 100;
$new_height = $new_height * $new_height; 
$weight = $_POST['weight'];
$bmi = $weight/$new_height;
$password = $_POST['password'];
if(isset($_POST['edit'])) {
    try {
        $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $sql = "UPDATE user SET U_Name='$name', Age='$age', Height='$height', Weight='$weight', BMI='$bmi', U_Password='$password' WHERE Username='$username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header("Location: Profile.html");
        
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}




?>