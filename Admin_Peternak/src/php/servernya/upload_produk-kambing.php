<?php
include("tes_koneksi.php"); // Connect to the database
session_start(); // Start the session

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
            $sql = "INSERT INTO katalog_produk (id_user, nama_produk, jenis, deskripsi, umur, berat, harga, foto) 
            VALUES (
                '".$_SESSION['id_user']."', 
                '".$_POST['nama_produk']."', 
                'kambing',
                '".$_POST['deskripsi']."', 
                '".$_POST['umur']."', 
                '".$_POST['berat']."', 
                '".$_POST['harga']."', 
                '$nama_file')";

            if ($conn->query($sql) === TRUE) {
                header("Location: ../kambing.php");
                echo "Data berhasil disimpan!";
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

// Mengembalikan respons ke JavaScript
echo json_encode(array('status' => 'success', 'message' => 'Data added successfully'));
?>

