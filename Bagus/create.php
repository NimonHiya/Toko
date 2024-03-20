<?php
    require_once "tes.php";

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $nama = $_POST["nama"];
        $harga = $_POST["harga"];
        $tersedia = $_POST["tersedia"];
        
        
        $gambar = $_FILES["gambar"]["name"];
        $tmpName = $_FILES["gambar"]["tmp_name"];
        $gambarPath = "uploads/" . $gambar;
        move_uploaded_file($tmpName, $gambarPath);

        
        $query = "INSERT INTO produk (Nama, Harga, Tersedia, Gambar) VALUES ('$nama', '$harga', '$tersedia', '$gambarPath')";
        
        
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Gagal menambahkan produk. Error: " . mysqli_error($conn));
        } else {
            
            header("Location: index.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create.css">
    <title>Tambah Produk</title>
</head>
<body>
    <h1 class="judul">Tambah Produk Baru</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama Barang:</label><br>
        <input type="text" id="nama" name="nama"><br>
        <label for="harga">Harga:</label><br>
        <input type="text" id="harga" name="harga"><br>
        <label for="tersedia">Tersedia:</label><br>
        <input type="text" id="tersedia" name="tersedia"><br>
        <label for="gambar">Gambar:</label><br>
        <input type="file" id="gambar" name="gambar"><br><br>
        <input type="submit" value="Tambah Produk">
    </form>
</body>
</html>
