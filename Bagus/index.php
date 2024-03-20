<?php
    require_once "tes.php";
    
    $produk = query("SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Juan</title>
</head>
<body>
    <div class="container">
        <h1 class="judul">Daftar Produk</h1>
        <table class="table-hias">
            <thead> 
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Tersedia</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($produk as $row): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row["nama"] ?></td>
                        <td><?= $row["harga"] ?></td>
                        <td><?= $row["tersedia"] ?></td>
                        <td><img src="<?= $row["gambar"] ?>" alt="<?= $row["nama"] ?>"></td>
                        <td>
                            <div class="aksi-btns">
                                <a href="update.php?id=<?= $row["id"] ?>" class="btn btn-update">Update</a>
                                <a href="delete.php?id=<?= $row["id"] ?>" class="btn btn-delete">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-add">Tambah Produk Baru</a>
    </div>
</body>
</html>

