<?php
include('db.php');


try {
    $connetie = new Database(); 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $hash = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
        $connetie->admingebruikers($_POST['naam'], $_POST['email'], $hash);
        header("Location: home.php?aangemaakt");
    } 
} catch (\Exception $e) {
    echo $e->getMessage();
}


?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
    <input type="text" name="naam">
    <input type="text" name="email">
    <input type="password" name="wachtwoord">
    <input type="submit">
</form>
</body>
</html>
