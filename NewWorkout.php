<?php
session_start();
$db_username = "root";
$db_password = "";
$server_name = "127.0.0.1";
$db_name = "workout";

$username = $_SESSION['user'];
$workoutName = $_POST['workoutName'];
$exercise = $_POST['exercise'];
$counter = 4;

    try {
        $conn = new PDO("mysql:host=$server_name;dbname=$db_name", $db_username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Get the counter from the latest one and increment it
        $sql2 = "INSERT INTO workout(Username, Workout_name, Workout_ID) VALUES ('$username', '$workoutName', '$counter')";
        $conn->exec($sql2);
        foreach ($exercise as $e) {
            $sql = "INSERT INTO make_up(Workout_id, Exercise_name) VALUES ('$counter', '$e')";
            $conn->exec($sql);
        }

        //$sql = "INSERT INTO make_up(Workout_id, Exercise_name) VALUES ('$counter', '$workoutName')";
        //$conn->exec($sql);
        //$counter = $counter + 1;
    }
    catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
header('Location: Workout.html');
exit;