<?php
session_start();

$servername = "localhost";
$username = "your_db_user";
$password = "your_db_pass";
$dbname = "project_eval";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$group_number = $conn->real_escape_string($_POST['group_number']);
$group_members = $conn->real_escape_string($_POST['group_members']);
$project_title = $conn->real_escape_string($_POST['project_title']);
$judge_name = $conn->real_escape_string($_POST['judge_name']);
$comments = $conn->real_escape_string($_POST['comments']);

$total = 0;
for($i = 1; $i <= 4; $i++) {
if(!empty($_POST["crit{$i}_dev"])) {
$total += intval($_POST["crit{$i}_dev"]);
} elseif(!empty($_POST["crit{$i}_acc"])) {
$total += intval($_POST["crit{$i}_acc"]);
}
}

$stmt = $conn->prepare("INSERT INTO evaluations
(judge_name, group_number, group_members, project_title, total_score, comments)
VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sissis", $judge_name, $group_number, $group_members, $project_title, $total, $comments);
$stmt->execute();

header("Location: success.html");
exit();
}
?>