<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->prepare("SELECT p.*, u.username FROM projects p JOIN users u ON p.added_by = u.id");
$stmt->execute();
$projects = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Projects</h2>
        <table>
            <tr>
                <th>Project Name</th>
                <th>Description</th>
                <th>Added By</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?php echo htmlspecialchars($project['project_name']); ?></td>
                    <td><?php echo htmlspecialchars($project['description']); ?></td>
                    <td><?php echo htmlspecialchars($project['username']); ?></td>
                    <td><?php echo htmlspecialchars($project['last_updated']); ?></td>
                    <td>
                        <a href="update_project.php?id=<?php echo $project['id']; ?>">Edit</a> |
                        <a href="delete_project.php?id=<?php echo $project['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="index.php">Back to Dashboard</a>
    </div>
</body>
</html>
