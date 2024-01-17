<?php
    include 'db.php';
    try {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = htmlspecialchars($_POST['email']);
            $wachtwoord = $_POST['wachtwoord'];
            $db = new Database();
            $user = $db->login($email);
            if ($user) {
                $verify = password_verify($wachtwoord, $user['wachtwoord']);
            
                if ($user && $verify) {
                    session_start();
                    $_SESSION['userId'] = $user['gebruikers_id'];
                    $_SESSION['naam'] = $user['naam'];
                    $_SESSION['role'] = $user['role'];
            
                    if ($user['role'] === 'admin'|| $user['role'] === 'medewerker') {
                        header('Location: main.php');
                    } elseif ($user['role'] === 'user') {
                       header('Location: main.php'); 
                        }
                } else {
                    echo "Incorrect username or password";
                }
            } else {
                echo "Incorrect username or password";
            }


        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }





/*
    try {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = htmlspecialchars($_POST['email']);
            $wachtwoord = $_POST['wachtwoord'];
            $db = new Database();
            $user = $db->login($email);
    
            if ($user) {
                $verify = password_verify($wachtwoord, $user['wachtwoord']);
                var_dump($verify);
                if ($user && $verify) {
                    session_start();
                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['naam'] = $user['email'];
                    $_SESSION['role'] = $user['role'];
                    header('Location: main.php?ingelogd');
                } else {
                    echo "Incrt username or password";
                }
            } else {
                echo "Incorrect username or password";
            }
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }

   */

   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="x.css">
    <title></title>
</head>
<body><form method="POST">
    <!----------------------- Main Container -------------------------->
     <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <!----------------------- Login Container -------------------------->
       <div class="row border rounded-5 p-3 bg-white shadow box-area">
    <!--------------------------- Left Box ----------------------------->
       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
           <div class="featured-image mb-3">
            <img src="images/carlogo.png" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">hallo</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">wilt u lekker aanmelden</small>
           <a class="btn btn-lg btn-danger w-50 h-10 fs-6" href="main.php">back</a>
       </div> 
    <!-------------------- ------ Right Box ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Hello,Again</h2>
                     <p>We are happy to have you back.</p>
                </div>
                <div class="input-group mb-1">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" name="email" placeholder="Email">
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" name="wachtwoord" placeholder="wachtwoord">
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                </div>
                <div class="input-group mb-3">
                    <input class="btn btn-lg btn-primary w-100 fs-6" type="submit">
                </div>
                <div class="row">
                    <small>dont have account? <a href="aanmelden.php">Sign Up</a></small>
                </div>
          </div>
       </div> </form>
      </div>
    </div>
</body>
