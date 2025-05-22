<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshelter";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$pet_type = $_POST['pet_type'];
$meeting_date = $_POST['meeting_date'];
$notes = $_POST['notes'];

$stmt = $conn->prepare("INSERT INTO adoptions (user_email, pet_type, meeting_date, notes) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $email, $pet_type, $meeting_date, $notes);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: dashboard.html");
exit();
?>
