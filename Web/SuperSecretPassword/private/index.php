<?php
session_start();

if ($_SESSION['loggedin']) {
	header('Location: flag.php');
	die();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link href="styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
		<div class="login-form">
			<form action="login.php" method="post">
				<h1>Login</h1>
				<div class="content">
					<div class="feedback-alert"><?= $_SESSION['message'] ?></div>
					<div class="input-field">
						<input type="text" name="username" placeholder="Username" id="username" required>
					</div>
					<div class="input-field">
						<input type="password" name="password" placeholder="Password" id="password" required>
					</div>
				</div>
				<div class="action">
					<button><a href="/flag.php">Flag</a></button>
					<button type="submit">Login</button>
				</div>
			</form>
		</div>
    </body>
</html>
