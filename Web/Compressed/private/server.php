<?php
	session_start();

	if (!isset($_SESSION['csrf']) || $_GET['pass'] !== $_SESSION['csrf']) {
		header("Location: /");
    	die();
	}

	echo "SINFCTF2021{i_love_packing_functions}";
?>