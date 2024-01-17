
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
    <title>Document</title> <link rel="stylesheet" href="style.css">
</head>
<body>

<table border="2">
    <tr>
        
        <th>name</th>
        <th>email</th>
        <th>role</th>
        <th>edit</th>
        <th>delete</th>

    </tr>
    <tr>
        <?php 
        $klant = $connetie->klanten();
        foreach ($klant as $user) {?>
        <td><?php echo $user['naam'];?></td>
        <td><?php echo $user['email'];?></td>
        <td><?php echo $user['role'];?></td>
        <td><a href="edit.php?id=<?php echo $user['gebruikers_id'];?>&naam=<?php echo $user['naam'];?>">edit</a></td>
        <td><a href="delete.php?id=<?php echo $user['gebruikers_id'];?>">delete</a></td>
        
    </tr> <?php } ?>
    
</table>
 
</body>



