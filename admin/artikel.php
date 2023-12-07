<?php 
session_start();
require '../function/functions.php';
include("../servernya/tes_koneksi.php"); 

if(isset($_COOKIE['login'])) {
    if ($_COOKIE['level'] == 'admin') {
        $_SESSION['login'] = true;
        $ambilNama = $_COOKIE['../login.php'];
    } 
    
    elseif ($_COOKIE['level'] == 'peternak') {
        $_SESSION['login'] = true;
        header('Location: ../index_peternak.php');
    } 
} 

elseif ($_SESSION['level'] == 'admin') {
    $ambilNama = $_SESSION['user'];
} 

else {
    if ($_SESSION['level'] == 'peternak') {
        header('Location: ../index_peternak.php');
        exit;
    }
}

if(empty($_SESSION['login'])) {
    header('Location: ../login.php');
    exit;
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/assets/logo.png" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css" />
    <title>Admin | FarmScope</title>
</head>

<body>
   <!-- navbar start -->
   <nav class="navbar navbar-expand-lg p-4 mx-4 fixed">
        <div class="container-fluid">
            <a class="navbar-brand fw-bolder" href="./administrator.php">
            <img src="assets/logo.png" width="50px" height="auto" class="me-2" />
                FarmScope</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5 fw-bolder">
                    <li class="nav-item pt-1">
                        <a href="admin_user.php" class="btn btn-outline-primary me-2 fw-bolder">user</a>
                    </li>
                    <li class="nav-item pt-1">
                        <a href="admin_articles.php" class="btn btn-success me-2 fw-bolder">Artikel</a>
                    </li>
                    <li class="nav-item pt-1">
                        <a href="crud/LogoutController.php" class="btn btn-outline-danger me-2 fw-bolder">Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

    <!-- hero -->
    <!-- article start -->
    <div class="container w-content">
        <div class="row align-items-center ">
            <div class="col align-self-center justify-content-start">
                <!-- card 1 -->
                <?php
                $sql = "SELECT * FROM articles";
                $query = mysqli_query($koneksi, $sql);

                while ($article = mysqli_fetch_array($query)) {
                    echo "<div class='card card-article'>";
                    echo "<img class='card-img-top img-article' src='/farmscope-v3/admin/assets/components/$article[gambar]'";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title overflow'>$article[judul] </h5>";
                    echo "<p class='card-text overflow pt-2'>$article[konten]</p>";
                    echo "<br />";
                    echo "<a href='crud/FormEdit.php?id=" . $article['id'] . "' class='btn btn-warning action'>Edit</a>";
                    echo "</div>";
                    echo "</div>";
                }

                ?>
            </div>

        </div>
    </div>
    <!-- article end -->
    <!-- hero start -->

    <script src="./bootstrap/js/bootstrap.js"></script>
</body>

<style>
    * {
        font-family: "Lato", sans-serif;
    }

    .card-article {
        max-width: 30rem;
        max-height: auto;
        padding-bottom: 20px;
        margin-bottom: 50px;
    }

    .card-title {
        margin-top: 20px;
        padding: 6px 20px;
        font-size: 23px;
        font-weight: 700;
    }

    .card-text {
        padding: 6px 20px;
        font-size: 20px;
        color: grey;
        font-weight: lighter;
    }

    .img-article {
        max-width: 100%;
        width: cover;
        height: auto;
    }

    .btn-article {
        margin: auto;
        max-width: 300px;
        font-size: 20px;
        font-weight: 700;
        width: 100%;
    }

    .overflow {
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        word-break: break-word;
    }

    .border {
        color: black;
    }

    * {
        font-family: "Lato", sans-serif;
    }
</style>

</html>