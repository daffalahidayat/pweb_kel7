<?php 
require 'functions.php';

if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['status']) || empty($_POST['id'])) {
    echo '{"Status" : "Error", "Message" : "username, email, status, and ID is required!"}';
    exit();
}

$username = $_POST['username'];
$email = $_POST['email'];
$status = $_POST['status'];
$id = $_POST['id'];
$query = "UPDATE user SET username = '$username', email = '$email', status = '$status' WHERE id_user = '$id'";

if (mysqli_query($koneksi, $query)) {
    echo '{"Status" : "Succes", "Message" : "Data berhasil diupdate!"}';
} else {
    echo '{"Status" : "Error", "Message" : '.mysqli_error($koneksi).'}';
}
?>