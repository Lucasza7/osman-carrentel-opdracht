<?php
include "db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rent a car</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.min.css">
    
    <link rel="stylesheet" href="auto.css">
</head>
<body>

    <div class="container-header">
        <div class="menu">
        <a href="#home">home</a>
        <a href="#autos">auto</a>
        <a href="#about">about</a>
        <a href="#contact">contact us</a>
    </div>
        <nav class="navbar">
            <div id="logo"><img src="images/carlogo.png" alt=""></div>
            <div class="inner-menu">
            <?php                            // hier heb ik gedaan als je inlogt  dat je naam op de navbar komt 
if (isset($_SESSION["naam"])) {
    ?>
    <a href="#"><?php echo $_SESSION["naam"]; ?></a>
    <a href="logout.php" class="header-login-a">Logout</a>
    
    <?php                                 
    // Controleer de rol van de gebruiker
    if ($_SESSION["role"] == "admin" || $_SESSION["role"] == "medewerker") {
        ?>
        <a href="keuze.php" class="header-login-a">Admin Pagina</a>
        <?php
    }
} else {
    ?>
    <a href="inloggen.php" class="header-login-a">Login</a>
    <a href="aanmelden.php" class="header-login-a">Aanmelden</a>
    <?php
}
?>

            </div>
  

            <div class="icons">
                <a href="#" id="menu-bar" class="fas fa-bars">X</a>
            </div>
            
        </nav>
    
        
    </div>
    
    <!-- background image -->
<section id="home">
    <div class="main-background">
        <div class="text">
            <div>
                <h1>welcome <span></span></h1>
                <h1>bij <span>deze</span></h1>
                <h1>CarStore</h1>
             
            </div>
        </div>
    </section>


    </div>

    <!-- background image ended -->
<!-- accessories -->


    <!-- Feature Products -->
    <section id="autos">
    <?php
$db = new Database();
                                      // hier maakt het een foreach loop van de autos 
// Haal geüploade foto's op
$uploadedPhotos = $db->getUploadedPhotos();
?>

   

<div class="card-container">
<?php
if (isset($db)) {
                $featureProducts = $db->getUploadedPhotos();

                foreach ($featureProducts as $product):
                    ?>
    <div class="card">
    <img src="img/<?php echo $product['foto']; ?>" alt="">
    <div class="card-content">
    <h3><?php echo $product['autonaam']; ?></h3> 
    <p><h1>beschrijving:</h1><?php echo $product['beschrijving']; ?></p>
    <p><h1>bouwjaar:</h1><?php echo $product['bouwjaar']; ?></p>
    <p><h1>kenteken:</h1><?php echo $product['kenteken']; ?></p>
    <h3>price: $<?php echo $product['huurprijs']; ?></h3>
    <a href="" class="btn">kopen</a>
    </div>
    </div>
    <?php endforeach;
            } else {
                echo "Database-object niet correct geïnstantieerd.";
            }
            ?>

</div>

    </section>
    <!-- Feature Products Ended -->


<!-- footer starts -->

<div class="footer">
    <h2>Contact us</h2>
    <div class="inner-footer">
        <div class="footer-box">
            <h1>quick links</h1>
            <a href="#">home</a>
            <a href="#">home</a>
        
        </div>

        <div class="footer-box">
            <h1>contact</h1>
            <p>Frajilmborg 32</p>
        </div>
    </div>

   
</div>

<script src="script.js"></script>
</body>
</html>