<?php
include("tes_koneksi.php"); // Menghubungkan ke database

// Periksa apakah form dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah ada file gambar yang diunggah
    if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
        $nama_file = $_FILES["foto"]['name'];
        $ukuran_file = $_FILES['foto']['size'];
        $nama_sementara = $_FILES['foto']['tmp_name'];

        // Pindahkan file gambar ke direktori yang diinginkan
        $lokasi_gambar =  "../../assets/images/upload/".$nama_file;

        if (move_uploaded_file($nama_sementara, $lokasi_gambar)) {
            // Query untuk menyimpan data ke database
            $sql = "UPDATE katalog_produk SET 
                nama_produk = '".$_POST['nama_produk']."', 
                deskripsi = '".$_POST['deskripsi']."', 
                umur = '".$_POST['umur']."', 
                berat = '".$_POST['berat']."', 
                harga = '".$_POST['harga']."', 
                foto = '$nama_file'
                WHERE id_produk = ".$_GET['id']."";

            if ($conn->query($sql) === TRUE) {
                header("Location: ../sapi.php");
                
                echo "Data '".$_POST['nama_produk']."' berhasil diupdate!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Upload gambar gagal.";
        }
    } else {
        echo "Tidak ada gambar yang diunggah.";
        }
} else {
    echo "Metode yang digunakan bukan POST.";
}

// Tutup koneksi database jika telah berhasil dibuka
if ($conn) {
    $conn->close();
}
?>
