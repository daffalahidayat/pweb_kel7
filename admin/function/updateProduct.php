<?php 
require 'functions.php';

if (empty($_POST['id'])  ||empty($_POST['nama_sapi']) || empty($_POST['deskripsi']) || empty($_POST['stok']) || empty($_POST['foto'])|| empty($_POST['harga'])|| empty($_POST['umur'])|| empty($_POST['berat'])) {
    echo '{"Status" : "Error", Data required!"}';
    exit();
}

$id = $_POST['id'];
$nama_sapi = $_POST['nama_sapi'];
$deskripsi = $_POST['deskripsi'];
$stok = $_POST['stok'];
$foto = $_POST['foto'];
$harga = $_POST['harga'];
$umur = $_POST['umur'];
$berat = $_POST['berat'];


$query = "UPDATE produk_sapi SET nama_sapi = '$nama_sapi', email = '$email', status = '$status' WHERE id_user = '$id'";

if (mysqli_query($koneksi, $query)) {
    echo '{"Status" : "Succes", "Message" : "Data berhasil diupdate!"}';
} else {
    echo '{"Status" : "Error", "Message" : '.mysqli_error($koneksi).'}';
}
?>