<?php
include 'servernya/tes_koneksi.php';
session_start();
$id_user = $_SESSION['id_user'];

if (empty($id_user)) {
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    unset($id_user);
    session_destroy();
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile {
            max-width: 400px;
            margin: auto;
        }

        .profile img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 10%;
            margin-bottom: 10px;
        }

        .oval-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
        }

        .red-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
        }

        .back-button {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #2ecc71;
            color: #fff;
            text-decoration: none;
            border-radius: 25px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="profile">
            <?php
            $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id_user = '$id_user'") or die('query failed');
            if (mysqli_num_rows($select) > 0) {
                $fetch = mysqli_fetch_assoc($select);
                $fotoPath = 'peternak/foto_profil/' . $fetch['foto_profil'];
            }
            ?>
            <img src="<?= $fotoPath ?>" alt="Profile Picture">
            <h3>Username: <?= $fetch['username'] ?></h3>
            <h3>No. Hp: <?= $fetch['nohp'] ?></h3>
            <h3>Alamat: <?= $fetch['alamat'] ?></h3>

            <a href="2_Peternak/update_profile.php" class="oval-button">Update Profile</a>
            <a href="logout.php" class="red-button">Logout</a>
            <a href="index_peternak.php" class="back-button">Back to Index</a>
        </div>
    </div>
</body>

</html>
