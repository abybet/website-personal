<?php

include('koneksi.php');

?>


<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 20px;
        }

        th {
            background-color: grey;
        }
    </style>
</head>

<body >
    <h1><a href="input.php">Tambah Data</a></h1>
    <h3> <a href="logout.php" style="float: right;"> keluar </a> </h3>
    <table border: 1px solid black;>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>DESKRIPSI</th>
            <th>DURASI & GENRE</th>
            <th>VIDEO</th>
            <th>GAMBAR</th>
            <th>ACTION</th>
        </tr>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM tb_film");
        while ($row = mysqli_fetch_array($query)) {

        ?>
            <tr>
                <td><?php echo $row['id_film'] ?></td>
                <td><?php echo $row['nama_film'] ?></td>
                <td><?php echo $row['deskripsi'] ?></td>
                <td><?php echo $row['info'] ?></td>
                <td> <video src="video/<?php echo $row['film'] ?>" controls style="width: 600px" ></video> </td>
                <td><img src="img/<?php echo$row['gambar'] ?>" alt="" width="70%" height="70%" ></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id_film'] ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id_film'] ?>" onclick="return confirm('hapus g y ?');">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
<?php

?>