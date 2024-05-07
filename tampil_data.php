<!DOCTYPE html>
<html>
<head>
    <title>Tampil Data</title>
    <style>
        
table {
    border-collapse: collapse;
    width: 60%; 
    margin-bottom: 20px; 
    margin-left: 20%;
}


td, th {
    border: 1px solid #ddd; 
    padding: 8px; 
    text-align: left; 

}


tr:nth-child(odd) {
    background-color: #f2f2f2; 
}


tr:hover {
    background-color: #ddd;
}
.a1{
    font-size: 16px;
    color: green;
}
.a2{
    margin-top: 5px;
    margin-left: 1400px;
    font-size: 16px;
    color: red;
}
    </style>
</head>
<body>
    <a class="a1" href="form_tambah_data.html">Tambah Data</a>
    <a class="a2" href="index.php">logout</a>
<center><h1></h1></center>   
 <table>

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Gambar</th>
            <th>Isi</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'koneksi.php';

        $sql = "SELECT * FROM artikel";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $no = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>".$row['nama']."</td>";
                echo "<td>".$row['judul']."</td>";
                echo "<td><img src='uploads/".$row['gambar']."' alt='".$row['judul']."' style='max-width: 100px; max-height: 100px;'></td>";
                echo "<td>".$row['isi']."</td>";
                echo "<td>";
                echo "<a href='update_data.php?id=".$row['id']."' class='btn'>Update</a>";
                echo "<a href='delete_data.php?id=".$row['id']."' class='btn btn-delete'>Delete</a>";
                echo "</td>";
                echo "</tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data yang tersimpan.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>

