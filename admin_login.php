<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
$username = $_POST['username'];
$password = $_POST['password'];

// Hardcoded admin credentials (change these)
$valid_username = "admin";
$valid_password = "admin123";

if($username === $valid_username && $password === $valid_password) {
$_SESSION['admin_logged_in'] = true;
header("Location: admin.php");
exit();
} else {
$error = "Invalid credentials!";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
</head>
<body>
<h2>Admin Login</h2>
<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
<form method="POST">
Username: <input type="text" name="username" required><br>
Password: <input type="password" name="password" required><br>
<button type="submit">Login</button>
</form>
</body>
</html>