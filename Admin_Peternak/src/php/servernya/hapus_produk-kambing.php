<?php
include("tes_koneksi.php"); // Menghubungkan ke database

// Periksa apakah form dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $sql = "DELETE FROM katalog_produk WHERE id_produk = ".$_GET['id']."";

            if ($conn->query($sql) === TRUE) {
                header("Location: ../kambing.php");
                
                echo "Data telah dihapus!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
} else {
    echo "Metode yang digunakan bukan POST.";
}

// Tutup koneksi database jika telah berhasil dibuka
if ($conn) {
    $conn->close();
}
?>
