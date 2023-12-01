<?php
include("../../servernya/tes_koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    if (isset($_FILES["gambar"])) {
        $nama_file = $_FILES["gambar"]['name'];
        $ukuran_file = $_FILES['gambar']['size'];
        $nama_sementara = $_FILES['gambar']['tmp_name'];
      
    // Pindahkan file gambar ke direktori yang diinginkan
    $lokasi_gambar =  "../assets/components/".$nama_file;
  
    if(!empty($nama_sementara)){
    $coba = move_uploaded_file($nama_sementara, $lokasi_gambar);

    
    $sql = "INSERT INTO articles (gambar, judul, konten) VALUE
    ( 
    '$nama_file', 
    '".$_POST['judul']."', 
    '".$_POST['konten']."')";
    $query = mysqli_query($conn, $sql);

    // kondisi apakah query disimpan?
    if ($query) {
        // alihkan ke halaman index.php dengan status sukes
        echo"<div class='alert alert-success'><strong>Berhasil!</strong> diupload!</div>";
        header('Location: ../admin_articles.php');
    } else {
        // alihkan ke halaman admin dengan status gagal
        echo"<div class='alert alert-danger'><strong>Gagal!</strong> diupload!</div>";
        header('Location: ../admin_articles.php?status=gagal');
    }
} else { echo
    die("Akses dilarang...");
}
}
 }