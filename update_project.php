<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->execute([$id]);
$project = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_name = $_POST['project_name'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("UPDATE projects SET project_name = ?, description = ?, last_updated = NOW() WHERE id = ?");
    $stmt->execute([$project_name, $description, $id]);

    echo "Project updated successfully! <a href='projects.php'>Back to Projects</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update Project</h2>
        <form method="post">
            <label>Project Name:</label>
            <input type="text" name="project_name" value="<?php echo htmlspecialchars($project['project_name']); ?>" required><br>

            <label>Description:</label>
            <textarea name="description" required><?php echo htmlspecialchars($project['description']); ?></textarea><br>

            <input type="submit" value="Update Project">
        </form>
        <a href="projects.php">Back to Projects</a>
    </div>
</body>
</html>
