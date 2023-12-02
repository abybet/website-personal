<?php

include('koneksi.php');

$data = mysqli_query($conn, "SELECT * FROM tb_film WHERE id_film= '" . $_GET['id'] . "'");
$panggil = mysqli_fetch_array($data);
$nama = $panggil['nama_film'];
$file = $panggil['film'];
$des = $panggil['deskripsi'];
$poto = $panggil['gambar'];
$info = $panggil['info'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align: center;">ISI DIBAWAH: </h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td> nama </td>
                <td> : </td>
                <td> <input type="text" name="nama_film" value="<?php echo $nama ?>">
                </td>
            </tr>
            <tr>
                <td>deskripsi</td>
                <td>:</td>
                <td> <textarea type="text" name="deskripsi" style="width: 500px; height: 300px; "><?php echo $des ?> </textarea> </td>
            </tr>
            <tr>
                <td> durasi & genre </td>
                <td> : </td>
                <td> <input type="text" name="ddang" value="<?php echo $info ?>" placeholder="Durasi || Genre" >
                </td>
            </tr>
            <tr>
                <td>tambah video</td>
                <td>:</td>
                <input type="hidden" name="vid" value="<?php echo $file ?>">
                <td> <input type="file" name="film"> </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><video src="video/<?php echo $file ?>" width="400" height="300" controls></td>
            </tr>
            <tr>
                <td>tambah gambar</td>
                <td>:</td>
                <input type="hidden" name="img" value="<?php echo $poto ?>">
                <td> <input type="file" name="gambar"> </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><img src="img/<?php echo $poto ?>" alt="" width="20%" height="20%"></td>
            </tr>
            <tr>
                <td> <input type="submit" name="kirim" value="update"> </td>
            </tr>
            <?php
            if (isset($_POST['kirim'])) {
                $nama = $_POST['nama_film'];
                $des = $_POST['deskripsi'];
                $info = $_POST['ddang'];
                $file_video = $_FILES['film']['name'];
                $sumber_video = $_FILES['film']['tmp_name'];
                $folder_video = './video/';
                $file_gambar = $_FILES['gambar']['name'];
                $sumber_gambar = $_FILES['gambar']['tmp_name'];
                $folder_gambar = './img/';

                if ($file_gambar != '') {
                    // move_uploaded_file($sumber_video, $folder_video . $file_video);
                    move_uploaded_file($sumber_gambar, $folder_gambar . $file_gambar);
                    $update = mysqli_query($conn, "UPDATE tb_film SET
        
        nama_film = '" . $nama . "',
        deskripsi = '" . $des . "',
        gambar = '" . $file_gambar . "',
        info = '".$info."'
        WHERE id_film = '" . $_GET['id'] . "'");
                    if ($update) {
                        header('location:get.php');
                    } else {
                        echo "gagal update";
                    }
                } else {
                    $update = mysqli_query($conn, "UPDATE tb_film SET
nama_film = '" . $nama . "',
deskripsi = '" . $des . "',
info = '".$info."'
WHERE id_film = '" . $_GET['id'] . "'
");
                    if ($update) {
                        header('location:get.php');
                    } else {
                        echo "gagal update";
                    }
                }
                if ($file_video != '') {
                    move_uploaded_file($sumber_video, $folder_video . $file_video);
                    // move_uploaded_file($sumber_gambar, $folder_gambar . $file_gambar);
                    $update = mysqli_query($conn, "UPDATE tb_film SET
        film = '".$file_video."',
        nama_film = '" . $nama . "',
        deskripsi = '" . $des . "',
        info = '".$info."'
       
        WHERE id_film = '" . $_GET['id'] . "'");
                    if ($update) {
                        header('location:get.php');
                    } else {
                        echo "gagal update";
                    }
                } else {
                    $update = mysqli_query($conn, "UPDATE tb_film SET
nama_film = '" . $nama . "',
deskripsi = '" . $des . "',
info = '".$info."'
WHERE id_film = '" . $_GET['id'] . "'
");
                    if ($update) {
                        header('location:get.php');
                    } else {
                        echo "gagal update";
                    }
                }
            }
            ?>
        </table>
</body>

</html>