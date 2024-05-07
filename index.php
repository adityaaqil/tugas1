<!DOCTYPE html>
<html>
<head>
    <title>Tampil Data</title>
    <style>
        html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: #ECE3CE;
}
h1{
    color: black;
}

        .nol{
            color: white;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 10px;
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid white;
            border-radius: 2cm;
            background-color:#808080;

        }
        .container1 {
  position: relative;
  width: 100%;
  height: 25vh; 
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px; 
  box-sizing: border-box;
  
}
        .title {
  position: absolute;
  top: 20px; 
  left: 20px; 
}

.buttons {
  display: flex;
  justify-content: space-between;
  margin-left: 1400px;
  margin-top: -75px;
}

.button {
  padding: 10px 20px;
  margin-right: 10px; 
  background-color: #007bff; 
  color: #fff; 
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.button:hover {
  background-color: #0056b3; 
}
        .card {
            width: 200px;
            margin: 10px;
            border: 1px solid black;
            padding: 10px;
            background-color: #F8F4EC;
            border-radius: 0.8cm;

        }
        .card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            cursor: pointer; 
            border-radius: 0.3cm;
            background-color: #808080;
        }
        .teks{
    position: absolute;
    top: 0;
    left: 0;
}
        .div1 {
  background-color: #F7EFE5;
  transform: rotateX(0deg) rotateZ(0deg);
  transform-style: preserve-3d;
  border-radius: 32px;
  box-shadow: 1px 1px 0 1px #f9f9fb, -1px 0 28px 0 rgba(34, 33, 81, 0.01),
    28px 28px 28px 0 rgba(34, 33, 81, 0.25);
  
}

    </style>
</head>
<body>
<div class="container1">
  <div class="title">
    <h1>ARTIKEL</h1>
  </div>
  <div class="buttons">
  <button class="button" onclick="window.location.href='login.php'">login</button>
  </div>
 
</div> 

    <div1 class="container">
        <?php
        include 'koneksi.php';

        $sql = "SELECT * FROM artikel";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div1 class="card">';
                echo '<a href="detail_artikel.php?id='.$row['id'].'">';
                echo '<img src="uploads/'.$row['gambar'].'" alt="'.$row['judul'].'">';
                echo '</a>';
                echo '<center><h3>'.$row['judul'].'</h3></center>';
                echo '</div1>';
            }
        } else {
            echo "Tidak ada data yang tersimpan.";
        }

        $conn->close();
        ?>
    </div1>
    
    
</body>
</html>


