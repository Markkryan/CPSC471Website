<?php
session_start();
$db_username = "root";
$db_password = "";
$server_name = "127.0.0.1";
$db_name = "testworkout";
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$age = $_POST['age'];
$height = $_POST['height'];
$new_height = $height / 100;
$new_height = $new_height * $new_height;
$weight = $_POST['weight'];
$bmi = ceil($weight/$new_height);
if($_POST['gender'] == "male" ) {
    $gender = "M";
} else {
    $gender = "F";
}
$password = $_POST['password'];
if(isset($_POST['register'])) {
    try {
        $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
        $sql = "INSERT INTO user (Username, U_Name, Gender, Height, Weight, BMI, U_Password, Age) VALUES ('$username', '$name', '$gender', '$height', '$weight', '$bmi', '$password', '$age')";
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