<?php

function getPageByName($db, $page) {
    $stmt = $db->prepare("SELECT * FROM pages WHERE `name` = ?");
    $stmt->bind_param('s', $page);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getPageById($db, $id) {
    $stmt = $db->prepare("SELECT * FROM pages WHERE `id` = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

session_start();

$db = mysqli_connect("db", "root", "sinfisthebest", "sinfpages");

if (mysqli_connect_errno() || !$db) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (isset($_GET['page'])) {
    $page_name = $_GET['page'];
    $page = getPageByName($db, $page_name);
    $nextPage = getPageById($db, $page['id'] + 1);
}
else {
    $nextPage = getPageById($db, 1);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SINFCTF2021</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
        <style>

            body {
                background-image: url('background.jpg');
            }

            .center {
                width: 30%;
                height: 16%;
                position: absolute;
                top: 42%;
                left: 35%;
                text-align: center;
                background-color: rgba(255,255,255,0.5);
                color: black;
                border: 2px solid black;
            }

            .button {
                padding: 16px 32px;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
            }

            .button:hover {
                background-color: rgba(0,0,0,0.75);
                color: white;
            }

            a {
                color: inherit;
                text-decoration: inherit;
                width: 100%;
                height: 100%;
            }

        </style>
    </head>

    <body>
        <header>
            <?php if (isset($page)) { ?>
                <div class="center">
                    <?php if (isset($nextPage['name'])) { ?>
                    <h1>You need to dig deeper!</h1>
                    <section>[<?=$page['position']?> => <?=$page['character']?>]</section>
                    <section><?=$nextPage['name']?></section>
                    <?php } else { ?>
                    <h1>You reached the bottom! Congratulations!!</h1>
                    <section>[<?=$page['position']?> => <?=$page['character']?>]</section>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <button class="button center"><a href="/?page=<?=$nextPage['name']?>"><h1>Start Digging!</h1></a></button>
            <?php } ?>
        </header>
    </body>
</html>
