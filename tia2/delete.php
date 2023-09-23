<?php
include 'db.php';

$delete = mysqli_query($conn, "DELETE  FROM tabletia2 WHERE id_tia2  = '".$_GET['id']."' ");
if($delete){
    //ketika pindah dari 1 function ke function lainnya
   header('location:data.php');
}else{
    echo "gagal ada yang salah, cek lagi";
}
?>
