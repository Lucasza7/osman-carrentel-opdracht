<?php
include 'db.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();

    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        $fileExtension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedTypes)) {
            $name = $_FILES['file']['name'];
            $targetFilePath = __DIR__ . "/img/" . $name;

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            
    $db->upload($name, $_POST['kenteken'], $_POST['autonaam'], $_POST['bouwjaar'], $_POST['huurprijs'],$_POST['beschrijving']);

                header('Location: main.php');
                exit();
            } else {
                echo "Er is een probleem opgetreden bij het verplaatsen van het bestand. Error: " . $_FILES["file"]["error"];
            }
        } else {
            echo "Alleen JPG, JPEG, PNG en GIF-bestanden zijn toegestaan.";
        }
    } else {
        echo "Er is een probleem opgetreden bij het uploaden van het bestand.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto</title>
</head>          
<body>
    <form method="POST" enctype="multipart/form-data">
<div class="input-group mb-1">
 <input type="text" class="form-control form-control-lg bg-light fs-6" name="autonaam" placeholder="autonaam">
 </div>

    <div class="input-group mb-1">
     <input type="text" class="form-control form-control-lg bg-light fs-6" name="kenteken" placeholder="kenteken">
 </div>
                       
 <div class="input-group mb-1">
  <input type="date" class="form-control form-control-lg bg-light fs-6" name="bouwjaar" placeholder="bouwjaar">
</div>

<div class="input-group mb-1">
  <input type="text" class="form-control form-control-lg bg-light fs-6" name="beschrijving" placeholder="beschrijving">
  </div>
 
 <div class="input-group mb-1">
 <input type="number" class="form-control form-control-lg bg-light fs-6" name="huurprijs" placeholder="huurprijs">
</div>
                
                
        <input type="file" name="file">
        <input type="submit" value="Upload">
    </form>
</body>
</html>




