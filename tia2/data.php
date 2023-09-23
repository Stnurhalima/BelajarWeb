<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil data</title>
</head>

<body>
    <table>
        <tr>
            <td> NO </td>
            <td> NAMA </td>
            <td> GAMBAR</td>
            <td> ACTION </td>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT  * FROM tabletia2");
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td> <?php echo $row['id_tia2']  ?> </td>
                <td> <?php echo $row['nama'] ?> </td>
                <td> <img src="img/<?php echo $row['file'] ?>" height="400" width="400"></td>
                <td> <button> <a href="edit.php?id=<?php echo $row['id_tia2'] ?>"> EDIT </a></button>
                    <button> <a href="delete.php?id=<?php echo $row['id_tia2'] ?>"> DELETE </a></button>

                </td>
            </tr>
        <?php } ?>




    </table>
</body>

</html>