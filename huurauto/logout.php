<?php
session_start(); // Start de sessie

// Controleer of de gebruiker is ingelogd
if (isset($_SESSION['naam'])) {
    // stop de sessievariabele
    unset($_SESSION['naam']);
    // session_destroy();

    // Stuur de gebruiker door naar de uitlogpagina of een andere pagina
    header("Location: main.php");
    exit();
} else {
    // Als de gebruiker niet is ingelogd, stuur ze dan naar de inlogpagina
    header("Location: inloggen.php");
    exit();
}
?>