<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!--NAVIGASI-->

    <nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="login.html">FORM LOGIN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="formbuku.html">INPUT BUKU</a>
                <a class="nav-link" href="view.php">DATA BUKU</a>
      </div>
    </div>
  </div>
</nav>


<?php
define('FILE_JSON', 'databuku.json');

function cekFileJson() {
       if (!file_exists(FILE_JSON)) {
             file_put_contents(FILE_JSON, json_encode([]));
        }

        $json = file_get_contents(FILE_JSON);
        return json_decode(file_get_contents(FILE_JSON), true);

}

$data_buku = cekFileJson();
$total_data = count($data_buku);

if ($total_data == 0) {
    echo "<p>Belum ada buku yang disimpan </p>";

} else {
    echo "<table border= '1'>
     <div class='mt-5'></div>
    <h3 class='text-center'>SISTEM PENDATAAN BUKU</h3>
    <tr>
            <th>NO</th>
            <th>KODE BUKU</th>
            <th>JUDUL BUKU</th>
            <th>PENULIS</th>
            <th>TAHUN TERBIT</th>

    
    </tr>";

    for ($i = 0; $i < $total_data; $i++) 
    {
            $buku = $data_buku[$i];

            // Menampilkan No
            echo "<tr><td>" .($i + 1) . "</td>";

            // Menampilkan kode produk 
            echo "<td class='text-center'>" . htmlspecialchars($buku['kode']) . "</td>";

            // Menampilkan nama produk
            echo "<td class='text-center'>" . htmlspecialchars($buku['judul']) . "</td>";

              // Menampilkan jumlah produk
            echo "<td class='text-center'>" . htmlspecialchars($buku['penulis']) . "</td>";

              // Menampilkan tanggal produk
            echo "<td class='text-center'>" . htmlspecialchars($buku['tahun']) . "</td>";
        
            echo "</tr>";
            
           
    }
        echo "</table>";
        echo "<center><button onclick=\"window.location.href='formbuku.html'\">+</button></center>";

}


/* start =kiri, end=kanan*/
    
?>

</body>
</html>