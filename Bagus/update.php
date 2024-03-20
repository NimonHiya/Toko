<?php
require_once "tes.php";


if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    
    $produk = query("SELECT * FROM produk WHERE id = $id");
    
    
    if ($produk) {
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
            $nama = $_POST["nama"];
            $harga = $_POST["harga"];
            $tersedia = $_POST["tersedia"];

           
            $query = "UPDATE produk SET Nama = '$nama', Harga = '$harga', Tersedia = '$tersedia' WHERE id = $id";
            $result = mysqli_query($conn, $query);
            
            if ($result) {
               
                header("Location: index.php");
                exit;
            } else {
                echo "Gagal melakukan update data!";
            }
        }
    } else {
        echo "Data produk tidak ditemukan!";
    }
} else {
    echo "ID tidak tersedia!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="update.css">
    <title>Update Produk</title>
</head>
<body>
    <h1>Update Produk</h1>
    <form action="" method="post">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?= isset($produk['nama']) ? $produk["nama"] : '' ?>"><br>
        <label for="harga">Harga:</label><br>
        <input type="text" id="harga" name="harga" value="<?= isset($produk['harga']) ? $produk["harga"] : '' ?>"><br>
        <label for="tersedia">Tersedia:</label><br>
        <input type="text" id="tersedia" name="tersedia" value="<?= isset($produk['tersedia']) ? $produk["tersedia"] : '' ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
