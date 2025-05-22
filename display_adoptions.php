<?php
$servername = "localhost";
$username = "root";
$password = "ishu@2003";
$dbname = "petshelter";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT user_email, pet_type, meeting_date, notes FROM adoptions ORDER BY requested_at DESC");

echo "<table><tr><th>Email</th><th>Pet</th><th>Meeting Date</th><th>Notes</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".htmlspecialchars($row['user_email'])."</td>
        <td>".htmlspecialchars($row['pet_type'])."</td>
        <td>".htmlspecialchars($row['meeting_date'])."</td>
        <td>".htmlspecialchars($row['notes'])."</td>
      </tr>";
}
echo "</table>";
$conn->close();
?>
