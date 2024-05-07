
<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $judul = $_POST['judul'];
    
    $gambar = $_FILES['gambar']['name'];
    $temp = $_FILES['gambar']['tmp_name'];
    $folder = "uploads/".$gambar;
    move_uploaded_file($temp, $folder);
    
    $isi = $_POST['isi'];

    $sql = "INSERT INTO artikel(nama, judul, gambar, isi) VALUES ('$nama', '$judul', '$gambar', '$isi')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan";
        header("Location: tampil_data.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

