<?php

session_start();

function get_password() {
    $password = "";
    $l = rand(8, 12);
    for($i = 0; $i < $l; $i++) {
      $password .= chr(rand(32, 126));
    }
    return $password;
}

if (!isset($_POST['username'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
}

$input = json_decode(json_encode($_POST, 32), true);
$password = get_password();

if ($input['username'] == "admin" && $input['password'] == $password) {
    session_regenerate_id();
    $_SESSION['loggedin'] = TRUE;
    header("Location: /flag.php");
    die();
} else {
    $_SESSION['message'] = 'Invalid username and/or password!';
    header("Location: /");
    die();
}
?>

