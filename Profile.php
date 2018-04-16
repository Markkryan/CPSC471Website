<?php
session_start();
$db_username = "root";
$db_password = "";
$server_name = "127.0.0.1";
$db_name = "testworkout";
$username = "mrbondoc";//$_SESSION['user']; 

try {
    $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    $sql = "SELECT  U_Name, Gender, Height, Weight, BMI, Age  FROM  user  U WHERE '$username' = U.Username";
    $data = $conn -> prepare($sql);
    $data->execute();
    $profile_result = $data -> fetch(PDO::FETCH_ASSOC);
    print_r($profile_result);
     
    
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}   


if(isset($_SESSION['user'])){
    header('Location: Profile.html');
    exit();
} else {
    header('Location: Login.html');
    exit();
}
?>