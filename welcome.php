<?php session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

           

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
              background-image: linear-gradient(90deg, #3e37b8 0%, #4545d4 35%, #00d4ff 100%);
            }
    </style>
</head>
<body>
    <?php
    echo "<h1>Welcome ".$_SESSION['username']."</h1>";
    
    ?>
    <a href = "logout.php">Logout</a>
</body>
</html>