<?php

include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td> <input type="text" name="nama_film"> </td>
            </tr>
            <tr>
                <td>deskripsi</td>
                <td>:</td>
                <td> <textarea type="text" name="deskripsi"> </textarea> </td>
            </tr>
            <tr>
                <td>Durasi & genre</td>
                <td>:</td>
                <td> <input type="text" name="info" placeholder="durasi || genre" > </td>
            </tr>
            <tr>
                <td>tambah video</td>
                <td>:</td>
                <td> <input type="file" name="film"> </td>
            </tr>
            <tr>
                <td>tambah gambar</td>
                <td>:</td>
                <td> <input type="file" name="gambar"> </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td> <input type="submit" name="kirim" value="kirim"> </td>

                <?php
                if (isset($_POST['kirim'])) {
                    $nama = $_POST['nama_film'];
                    $des = $_POST['deskripsi'];
                    $info = $_POST['info'];
                    $file_video = $_FILES['film']['name'];
                    $sumber_video = $_FILES['film']['tmp_name'];
                    $folder_video = './video/';
                    move_uploaded_file($sumber_video, $folder_video . $file_video);
                    $file_gambar = $_FILES['gambar']['name'];
                    $sumber_gambar = $_FILES['gambar']['tmp_name'];
                    $folder_gambar = './img/';
                    move_uploaded_file($sumber_gambar, $folder_gambar . $file_gambar);
                    $insert = mysqli_query($conn, "INSERT INTO tb_film VALUES (NULL,'$nama','$des','$info','$$file_video','$file_gambar')");
                    if ($insert) {
                        echo '<script> alert ("berhasil menambahkan video") </script>';
                        header('location:get.php');
                    } else {
                        echo '<script> alert ("ada kesalahan pada kodingan anda silahkan di cek kembali") </script>';
                    }
                }
                ?>

            </tr>

        </table>

    </form>
</body>

</html>