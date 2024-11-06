<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("DELETE FROM technicians WHERE id=?");
    $stmt->execute([$_POST['id']]);
    echo "Technician record deleted successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Technician</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>Delete Technician</h2>
    <form method="post" action="delete.php">
        <label>ID:</label>
        <input type="text" name="id" required><br>
        
        <input type="submit" value="Delete Record">
    </form>
</body>
</html>
