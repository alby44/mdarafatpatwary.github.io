<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
header("Location: admin_login.php");
exit();
}

include 'database.php';

$result = $conn->query("
SELECT
group_number,
AVG(total_score) as average_score,
GROUP_CONCAT(DISTINCT group_members) as members,
GROUP_CONCAT(DISTINCT project_title) as title
FROM evaluations
GROUP BY group_number
ORDER BY average_score DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<style>
table { border-collapse: collapse; width: 100%; }
th, td { border: 1px solid #ddd; padding: 8px; }
th { background-color: #f2f2f2; }
</style>
</head>
<body>
<h1>Evaluation Results</h1>
<a href="logout.php">Logout</a>

<table>
<tr>
<th>Group #</th>
<th>Members</th>
<th>Project Title</th>
<th>Average Score</th>
</tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
<td><?= $row['group_number'] ?></td>
<td><?= $row['members'] ?></td>
<td><?= $row['title'] ?></td>
<td><?= number_format($row['average_score'], 2) ?></td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>