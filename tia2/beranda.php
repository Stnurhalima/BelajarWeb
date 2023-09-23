<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Ku</title>
</head>
<body>
    <a href="beranda.php"> home </a>
    <a href="logout.php"> Logout </a>
    <h1> Selamat Datang   <?php echo $_SESSION['username']; ?> Di Website kami, Enjoy your time  </h1>
   
</body>
</html>
<?php } ?>
