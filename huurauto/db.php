<?php

use function PHPSTORM_META\elementType;

class Database {
    public $pdo;
    
    public function __construct($db= "huurautos", $user= "root", $pass="", $host= "localhost"){
    
        try{
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo"";
        }
        catch (Exception $e){ { 
            echo"error: ". $e->getmessage(); 
        }

        }
    }     
    
    public function aanmelden($naam, $email, $wachtwoord, $role) {
        $stmt = $this->pdo->prepare("INSERT into gebruikers (naam, email, wachtwoord, role) values (?, ?, ?, ?)");
        
        $stmt->execute([$naam, $email, $wachtwoord, $role]);
    }

    public function login($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM gebruikers WHERE email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }

    public function klanten( ?int $id = null )
    {
        if ($id != null)
        {
            $stmt = $this->pdo->prepare("SELECT * FROM gebruikers WHERE gebruikers_id = ?" );
            $stmt->execute([$id]);
            $result = $stmt->fetch();
        }
        else
        {
          $stmt = $this->pdo->query("SELECT * From gebruikers");
          $result = $stmt->fetchAll();
        }
        return $result;
    }
    /// dit gerbuik ik niet  
    
    public function admingebruikers($naam, $email, $wachtwoord) {
        $stmt = $this->pdo->prepare("INSERT into beheerder (naam, email, wachtwoord) values (:name, :email, :password)");
        $password = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $stmt->execute([
            ":name" => $naam,
            ":email" => $email,
            ":password:" => $password]);
    }
    
     
  
  /*
    public function editUser($naam, $wachtwoord, $email, $role, $id){
        $hashedPassword = password_hash($wachtwoord, PASSWORD_DEFAULT);
    
        $stmt = $this->pdo->prepare("UPDATE `gebruikers` SET `naam` = ?, 'email' = ?, `wachtwoord` = ?, `role` = ? WHERE `gebruikers_id` = ?");
        $stmt->execute([$naam, $email, $hashedPassword, $role, $id]);
    }
    */

    public function editUser($naam, $wachtwoord, $email, $role, $id){
        $stmt = $this->pdo->prepare("UPDATE `gebruikers` SET `naam` = ?, `email` = ?, `wachtwoord` = ?, `role` = ? WHERE `gebruikers_id` = ?");
        $wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $stmt->execute([$naam, $email, $wachtwoord, $role, $id]);
    }
    
    public function deleteUser( int $id){
        $stmt = $this->pdo->prepare("DELETE FROM gebruikers WHERE `gebruikers_id` = ?");
        $stmt->execute([ $id]);
    
    }


    public function upload($foto,$kenteken,$autonaam,$bouwjaar,$huurprijs,$beschrijving) {
        $stmt = $this->pdo->prepare("INSERT INTO autos (foto, kenteken, autonaam, bouwjaar, huurprijs, beschrijving) VALUES (?,?,?,?,?,?)");  
        $stmt->execute([$foto,$kenteken,$autonaam,$bouwjaar,$huurprijs,$beschrijving]);
    }

 
    
    public function getUploadedPhotos() {
        $stmt = $this->pdo->query("SELECT * FROM autos");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    
}

?> 