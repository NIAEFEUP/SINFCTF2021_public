<?php
session_start();
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
			<form>
				<h1>Flag</h1>
				<div class="content">
					<?php if ($_SESSION['loggedin']) { ?>
					<p>Here you go dear Admin: </p>
					<pre><code><?=file_get_contents('/etc/flag');?></pre></code>
					<?php } else { ?>
					<p>The flag is only available to logged in admins!</p>
					<p>Please login as admin to get the flag.</p>
					<?php } ?>
				</div>
				<div class="action">
					<button><a href="/flag.php">Flag</a></button>
					<?php if ($_SESSION['loggedin']) { ?>
					<button><a href="/logout.php">Logout</a></button>
					<?php } else { ?>
					<button><a href="/">Login</a></button>
					<?php } ?>
				</div>
			</form>
		</div>
    </body>
</html>
