<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

    if (!empty($_FILES['gambar']['name'])) {
        // If a new image is uploaded
        $gambar = $_FILES['gambar']['name'];
        $temp = $_FILES['gambar']['tmp_name'];
        $folder = "uploads/" . $gambar;
        move_uploaded_file($temp, $folder);

        $sql = "UPDATE artikel SET nama=?, judul=?, gambar=?, isi=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $nama, $judul, $gambar, $isi, $id);
    } else {
        // If no new image is uploaded
        $sql = "UPDATE artikel SET nama=?, judul=?, isi=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $nama, $judul, $isi, $id);
    }

    if ($stmt->execute()) {
        echo "Data berhasil ditambahkan";
        header("Location: tampil_data.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: tampil_data.php");
}

$conn->close();
?>
