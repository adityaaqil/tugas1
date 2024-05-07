<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data dari tabel berdasarkan id
    $sql = "SELECT * FROM artikel WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Artikel: <?php echo $row['judul']; ?></title>
    <style>
        .article {
            max-width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .article img {
            margin-left:50px;
            max-width: 50%;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <a href="index.php">beranda</a>
    <div class="article">
        <center><h1><?php echo $row['judul']; ?></h1></center>
        <center><img src="uploads/<?php echo $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>"></center>
        <center><p><strong>Nama Penulis:</strong> <?php echo $row['nama']; ?></p></center

        <p><?php echo $row['isi']; ?></p>
    </div>
</body>
</html>
<?php
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>
