<?php
include("../../servernya/tes_koneksi.php");

// cek tombol apakah sudah di cek apa blm   
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $gambar = $_POST['gambar'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    // membuat query update
    $sql = "UPDATE articles SET gambar = '$gambar', judul = '$judul', konten = '$konten' WHERE id=$id ";
    $query = mysqli_query($conn, $sql);

    // apakah query update berhasil ?
    if ($query) {
        header('Location:../admin_articles.php');
    } else {
        die('Gagal menyimpan perubahan.');
    }
} else {
    die("Akses dilarang");
}
