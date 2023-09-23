<?php
include 'koneksi.php';
session_start();
if(isset($_SESSION['username'])){
    header('location:beranda.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>session</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="silahkan masukan username disini">
        <br>
        <input type="password" name="password" placeholder="silahkan masukan pass">
        <input type="submit" name="masuk" value="masuk">

<?php
if(isset($_POST['masuk'])){
        $cek = mysqli_query($conn, "SELECT * FROM session_tia2 WHERE 
        username = '".$_POST['username']."' AND  password = '".$_POST['password']."' 
        ");

        $hasil = mysqli_fetch_array($cek);
        $masuk = mysqli_num_rows($cek);
        $login = $hasil ['username'];
        
        if($masuk > 0 ){
            session_start();
            $_SESSION['username'] = $login;
            header('location:beranda.php');
        }else{
            echo"email atau password salah! Silahkan cek ulang";
        }
}
?>

    </form>
</body>
</html>
<?php } ?>