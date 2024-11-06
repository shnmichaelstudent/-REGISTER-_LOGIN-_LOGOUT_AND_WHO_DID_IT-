<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO technicians (firstName, lastName, email, phone, expertise_area, experience_years, certifications) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['phone'], $_POST['expertise_area'], $_POST['experience_years'], $_POST['certifications']]);
    echo "New technician record created successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Technician</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>Add New Technician</h2>
    <form method="post" action="create.php">
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
        
        <input type="submit" value="Create Record">
    </form>
</body>
</html>
