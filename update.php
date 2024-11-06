<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("UPDATE technicians SET firstName=?, lastName=?, email=?, phone=?, expertise_area=?, experience_years=?, certifications=? WHERE id=?");
    $stmt->execute([$_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone'], $_POST['expertise_area'], $_POST['experience_years'], $_POST['certifications'], $_POST['id']]);
    echo "Technician record updated successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Technician</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>Update Technician Details</h2>
    <form method="post" action="update.php">
        <label>ID:</label>
        <input type="text" name="id" required><br>
        
        <label>First Name:</label>
        <input type="text" name="firstName" required><br>
        
        <label>Last Name:</label>
        <input type="text" name="lastName" required><br>
        
        <label>Email:</label>
        <input type="email" name="email" required><br>
        
        <label>Phone:</label>
        <input type="text" name="phone"><br>
        
        <label>Expertise Area:</label>
        <input type="text" name="expertise_area" required><br>
        
        <label>Experience (years):</label>
        <input type="number" name="experience_years"><br>
        
        <label>Certifications:</label>
        <input type="text" name="certifications"><br>
        
        <input type="submit" value="Update Record">
    </form>
</body>
</html>
