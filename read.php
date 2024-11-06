<?php
include 'config.php';

$stmt = $pdo->query("SELECT * FROM technicians");
echo "<h2>Technicians List</h2>";
while ($row = $stmt->fetch()) {
    echo "ID: " . $row['id'] . " | Name: " . $row['firstName'] . " " . $row['lastName'] . " | Expertise: " . $row['expertise_area'] . " | Experience: " . $row['experience_years'] . " years<br>";
}
?>
