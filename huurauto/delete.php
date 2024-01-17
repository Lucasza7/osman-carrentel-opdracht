<?php
include('db.php');

$connetie = new Database();

try {
    if (isset($_GET['id'])) {
        $connetie->deleteUser($_GET['id']);
        header("Location: edit_delete.php?Success");
    } else {
        echo "Error: ID parameter is not set.";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>

