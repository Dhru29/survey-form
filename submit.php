<?php
require_once('db.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $wake_up_time = $_POST['wake_up_time'];
    $breakfast_time = $_POST['breakfast_time'];
    $work_start_time = $_POST['work_start_time'];
    $lunch_time = $_POST['lunch_time'];
    $dinner_time = $_POST['dinner_time'];
    $sleep_time = $_POST['sleep_time'];

    $sql = "INSERT INTO daily_routine (name, wake_up_time, breakfast_time, work_start_time, lunch_time, dinner_time, sleep_time) 
            VALUES ('$name', '$wake_up_time', '$breakfast_time', '$work_start_time', '$lunch_time', '$dinner_time', '$sleep_time')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
echo "<script>window.location.href='index.php'</script>";
exit();
?>
