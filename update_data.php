<?php
include 'koneksi.php';

// Periksa apakah parameter id telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data dari tabel berdasarkan id
    $sql = "SELECT * FROM artikel WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Tampilkan formulir untuk mengupdate data
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Data</title>
</head>
<body>
    <h2>Update Data</h2>
    <form action="proses_update_data.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>"><br><br>

        <label for="judul">Judul:</label><br>
        <input type="text" id="judul" name="judul" value="<?php echo $row['judul']; ?>"><br><br>

        <label for="gambar">Gambar:</label><br>
        <input type="file" id="gambar" name="gambar"><br>
        <img src="uploads/<?php echo $row['gambar']; ?>" alt="<?php echo $row['judul']; ?>" style="max-width: 100px; max-height: 100px;"><br><br>

        <label for="isi">Isi:</label><br>
        <textarea id="isi" name="isi" rows="4" cols="50"><?php echo $row['isi']; ?></textarea><br><br>

        <input type="submit" value="Update Data">
    </form>
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
