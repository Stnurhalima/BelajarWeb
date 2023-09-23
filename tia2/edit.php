<?php
include 'db.php';

$data = mysqli_query($conn, "SELECT * FROM tabletia2
WHERE id_tia2 = '".$_GET['id']."'");
$panggil = mysqli_fetch_array($data);
$nama = $panggil['nama'];
$file = $panggil['file'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
    <link rel="stylesheet">
</head>

<body>

    <h1 style="text-align: center;">ISI DIBAWAH: </h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td> nama </td>
                <td> : </td>
                <td> <input type="text" name="nama" value="<?php echo $nama ?>">
                </td>
            </tr>
            <tr>
                <td> pilih file </td>
                <td> : </td>
                <td>
                    <input type="hidden" name="img" value="<?php echo $file ?>">
                    <input type="file" name="gambar">
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><img src="img/<?php echo $file ?>" width="400" height="400">
                </td>
            </tr>
            <tr>
                <td> <input type="submit" name="kirim" value="update"> </td>
            </tr>
            <?php
            if (isset($_POST['kirim'])) {
                $nama = $_POST['nama'];
                $nama_file = $_FILES['gambar']['name'];
                $sumber = $_FILES['gambar']['tmp_name'];
                $folder = './img/';

                if ($nama_file != '') {
                    move_uploaded_file($sumber, $folder . $nama_file);
                    $update = mysqli_query($conn, "UPDATE tabletia2 SET
              nama = '" . $nama . "',
              file = '" . $nama_file . "'
              WHERE id_tia2 = '" . $_GET['id'] . "'
              ");
                    if ($update) {
                        header('location:data.php');
                    } else {
                        echo "galgal pdate";
                    }
                } else {
                    $update = mysqli_query($conn, "UPDATE tabletia2 SET
            nama = '" . $nama . "'
            WHERE id_tia2 = '" . $_GET['id'] . "'
            ");
                    if ($update) {
                        header('location:data.php');
                    } else {
                        echo "Gagal Update";
                    }
                }
            }

            ?>

        </table>
    </form>
</body>

</html>