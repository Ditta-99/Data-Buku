<?php

define('FILE_JSON' , 'databuku.json');

function cekFileJson() {
    if (!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
}


function bacaDataJson() {
    return json_decode(file_get_contents(FILE_JSON), true);

}


if($_SERVER['REQUEST_METHOD'] == 'POST') {

    cekFileJson();

    $kode= $_POST['kode'];
    $judul= $_POST['judul'];
    $penulis= $_POST['penulis'];
    $tahun= $_POST['tahun'];

    $data_buku = bacaDataJson();

    $data_buku [] = [
            'kode'  => $kode,
            'judul'  => $judul,
            'penulis'  => $penulis,
            'tahun'  => $tahun
            
    ];

    file_put_contents(FILE_JSON, json_encode($data_buku, JSON_PRETTY_PRINT));

 echo "<script>alert('buku berhasil ditambahkan!');</script>";

 echo"<script>window.location.href = 'view.php'</script>";
}


?>

