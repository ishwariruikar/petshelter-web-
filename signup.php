
<?php
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
$password = $_POST['password'];

$sql_check = "SELECT * FROM users WHERE email = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $email);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('User already exists! Please login.'); window.location.href = 'login.html';</script>";
} else {
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);
    if ($stmt->execute()) {
        echo "<script>alert('Signup successful! Please login.'); window.location.href = 'login.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
$conn->close();
?>
