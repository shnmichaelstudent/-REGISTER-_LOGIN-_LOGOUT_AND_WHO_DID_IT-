<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO projects (project_name, description, added_by) VALUES (?, ?, ?)");
    $stmt->execute([$project_name, $description, $user_id]);

    echo "Project added successfully! <a href='projects.php'>View Projects</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Create Project</h2>
        <form method="post">
            <label>Project Name:</label>
            <input type="text" name="project_name" required><br>

            <label>Description:</label>
            <textarea name="description" required></textarea><br>

            <input type="submit" value="Add Project">
        </form>
        <a href="index.php">Back to Dashboard</a>
    </div>
</body>
</html>
