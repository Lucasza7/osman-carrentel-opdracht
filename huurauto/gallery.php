<?php
include 'db.php';
$db = new Database();
?>
<section id="autos"> <link rel="stylesheet" href="auto.css">
    <?php
$db = new Database();

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


