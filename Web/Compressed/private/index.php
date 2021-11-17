<?php 
session_start();
session_regenerate_id(true);

function generate_random_token() {
  return bin2hex(openssl_random_pseudo_bytes(32));
}

if (!isset($_SESSION['csrf'])) {
  $_SESSION['csrf'] = generate_random_token();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SINFCTF2021</title>
        <meta charset="utf-8">
        <meta content="<?= $_SESSION['csrf'] ?>" name="csrf-token" />
        <script defer>
            eval(function(p,a,c,k,e,d){while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+c+'\\b','g'),k[c])}}return p}('5 13(){3 6=2.12(\'14[15="17-11"]\').18;3 0=8 9();0.10=5(){7(1.16==4&&1.28==19)2.29("30").31=1.26};0.25("21","20.22?23="+6,24);0.27()}',10,32,'xmlhttp|this|document|let||function|p|if|new|XMLHttpRequest|onreadystatechange|token|querySelector|sendRequest|meta|name|readyState|csrf|content|200|server|GET|php|pass|true|open|responseText|send|status|getElementById|flag|innerHTML'.split('|')))
        </script>
    </head>

    <body>
        <header>
            <h1>The flag is around here!</h1>
            <section>But it is so small...</section>
            <section id="flag"></section>
        </header>
    </body>
</html>
