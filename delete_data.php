<?php
include 'koneksi.php';

// Periksa apakah parameter id telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Hapus data dari tabel berdasarkan id
    $sql = "DELETE FROM artikel WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Redirect kembali ke halaman tampil_data.php setelah menghapus data
    header("Location: tampil_data.php");
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>
