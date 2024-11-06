<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <p>Welcome to your dashboard!</p>
        <a href="create_project.php">Create New Project</a>
        <a href="projects.php">View Projects</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
