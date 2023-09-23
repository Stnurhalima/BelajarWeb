<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
</head>
<body>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>nama file </td>
                <td> : </td>
                <td> <input type="text" name="nama"> </td>
            </tr>
             <tr>
                <td>pilih file </td>
                <td> : </td>
                <td> <input type="file" name="gambar"> </td>
            </tr>
             <tr>
                <td> <input type="submit" value="kirim" name="kirim"> </td>
            </tr>

            <?php
            if(isset($_POST ['kirim'])){
                $nama =$_POST['nama'];
                $nama_file = $_FILES['gambar'] ['name'];
                $sumber = $_FILES['gambar'] ['tmp_name'];
                $folder = './img/';

                move_uploaded_file($sumber, $folder.$nama_file);
                $insert = mysqli_query($koneksi, "INSERT INTO tabletia2 VALUES (NULL, '$nama', '$nama_file')" );

                if($insert){
                    echo "data berhasil dimasukan";
                }else{
                    echo "gagal, silahkan cekodigan";
                }
            }
            
            
            ?>
         </table>
</body>
</html>