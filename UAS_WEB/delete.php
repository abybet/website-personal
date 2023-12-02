<?php

include('koneksi.php');

$delete = mysqli_query($conn,"DELETE FROM tb_film WHERE id_film= '".$_GET['id']."'");
if ($delete) {
    header('location:get.php');
}else{
    echo"gagal menghapus";
}
?>