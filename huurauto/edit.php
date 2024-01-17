<?php
include 'db.php';

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $userId = $_GET['id'];

        // Controleer of er waarden zijn ingevoerd voor naam, e-mail, wachtwoord en rol
        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role'])) {
            
            // Haal de waarden uit het formulier
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash het wachtwoord
            $role = htmlspecialchars($_POST['role']);

            // Update de gebruiker in de database
            $db->editUser($name, $password, $email, $role, $userId);

            header("Location: edit_delete.php?Success");
            exit();
        } else {
            echo "Vul alle velden in.";
        }
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage(); 
    }
}

// Haal de gebruikersgegevens op 
$user = $db->klanten($_GET['id']);
?>

<form method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $user['naam'] ?? ''; ?>">
    <br>
    
    <label for="password">Password:</label>
    <input type="password" name="password">
    <br>

    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo $user['email'] ?? ''; ?>">
    <br>

    <label for="role">Role:</label>
    <input type="text" name="role" value="<?php echo $user['role'] ?? ''; ?>">
    <br>

    <input type="submit" value="Update">
</form>
