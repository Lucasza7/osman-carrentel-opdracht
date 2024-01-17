<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

    
    <div class="middle">
        
    <h1>HELLLO THERE</h1>
    <a href="edit_delete.php" class="btn btn1">USER</a>
    <a href="gallery.php" class="btn btn2">CARS</a>
    <a href="#" class="btn btn1">RESERVATIONS</a>

    </div>
</body>
</html>

<style>
body {
    margin: 0;
    padding: 0;
 background-color: darkslategrey;
}

.middle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}
a{
text-decoration: none;
}
.btn {
    background: none;
    border: 2px solid #000;
    font-family: "montserrat", sans-serif;
    text-transform: uppercase;
    padding: 12px 20px;
    min-width: 200px;
    margin: 10px;
    cursor: pointer;
    color: #000; /* Initial text color */
    transition: color 0.4s linear;
    position: relative;
}

.btn:hover {
    color: #fff;
}

.btn::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: #000;
    z-index: -1;
    transition: transform 0.5s;
    transform-origin: 0 0;
    transition-timing-function: cubic-bezier(0.5, 1.6, 0.4, 0.7);
}

.btn1::before {
    transform: scaleX(0);
}

.btn2::before {
    transform: scaleY(0);
}

.btn1:hover::before {
    transform: scaleX(1);
}

.btn2:hover::before {
    transform: scaleY(1);
}
</style>
