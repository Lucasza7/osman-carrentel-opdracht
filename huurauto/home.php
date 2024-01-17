<?php
include('db.php');

$connetie = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    try{
        $connetie->aanmelden($_POST['naam'], $_POST['email'], $hash, $role = "user");
        echo "toevoeging gelukt"; 

    }catch (Exception $e ){
        echo $e->getMessage();
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table border="2">
    <tr>
        
        <th>name</th>
        <th>email</th>
        <th colspan="2">wachtwoord</th>
    </tr>
    <tr>
        <?php 
        $klant = $connetie->klanten();
        foreach ($klant as $user) {?>
        <td><?php echo $user['naam'];?></td>
        <td><?php echo $user['email'];?></td>
        <td><?php echo $user['wachtwoord'];?></td>
    

    </tr> <?php } ?>
</table>




    <form method="POST">
        <input type="text" name="naam">
        <input type="text" name="email">
        <input type="password" name="wachtwoord">
        <input type="submit">
    </form>
</body>
</html>