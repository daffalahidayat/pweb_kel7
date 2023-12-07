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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo.png" />
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


    <!-- breadcrumb start -->
    <div class="container">
        <nav aria-label="breadcrumb" id="home">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active fs-3 fw-bolder text-dark p-2 pt-4 text-uppercase" aria-current="page">
                    Dashboard</li>
            </ol>
            <ol class="breadcrumb pl-2 ms-2">
                <li class="breadcrumb-item fw-bolder text-dark"><a href="#home">Home</a></li>
                <li class="breadcrumb-item active fw-bolder" aria-current="page"><a href="#table-article">Dashboard</a></li>
            </ol>
        </nav>
    </div>
    <!-- breadcrumb end -->

    <!-- form bootstrap start -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card bg-light shadow p-3  bg-body rounded">
                    <div class="align-self-center align-items-center justify-content-center">
                    <img src="/farmscope-v3/admin/assets/profile.png" width="150px" height="auto" />
                    </div>
                    <!-- form -->
                    <form action="crud/inputController.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <label for="title" class="form-label fw-bolder text-dark">Enter title here</label>
                                <input type="text" class="form-control" placeholder="Title here" id="title" name="judul" required />
                            </div>
                            <div class="col">
                                <label for="gambar" class="form-label fw-bolder text-dark">Insert image here</label>
                                <input class="form-control" type="file" id="gambar" name="gambar" required />
                            </div>
                            <div class="form-group mt-3">
                                <label for="konten" class="form-label fw-bolder text-dark" required>Enter a description
                                    here</label>
                                <textarea class="form-control" id="konten" rows="3" name="konten"></textarea>

                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary w-100 mt-3 fw-bolder" name="submit" value="Submit here" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col align-self-center align-items-center justify-content-center">
                <img src="/farmscope-v3/admin/assets/components/admin_artikel.gif" class="img-hero" />
            </div>
        </div>
    </div>
    <!-- form bootstrap end -->

    <!-- breadcrumb start -->

    <div class="container">
        <nav aria-label="breadcrumb" id="table-article">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active fs-3 fw-bolder text-dark p-2 pt-4 text-uppercase" aria-current="page">
                    Table Articles</li>
            </ol>
        </nav>
    </div>

    <!-- breadcrumb end -->

    <div class="container">
        <table class="table">

            <thead class="table-dark rounded">
                <tr>
                    <th scope="col" width="20px">No</th>
                    <th scope="col" width="100px">Gambar</th>
                    <th scope="col" width="200px">Judul</th>
                    <th scope="col" width="350px">Konten</th>
                    <th scope="col" width="200px" style="padding-left:80px">Action</th>
                </tr>
            </thead>
            <tbody>

                <!-- php start -->


                <?php

                $sql = "SELECT * FROM articles";
                $query = mysqli_query($conn, $sql);
                $noUrut = 0;
                while ($article = mysqli_fetch_array($query)) {
                    $noUrut++;
                    echo "<tr>";
                    echo "<th scope='row'>$noUrut</th>";
                    echo "<td><img src='assets/components/$article[gambar]' width='200px' height='auto' /></td>";
                    echo "<td>$article[judul] </td>";
                    echo "<td>" .substr($article['konten'], 0, 100). "..</td>";
                    echo "<td class'td-action'>";
                    // echo "<a href='crud/FormEdit.php?id=" . $article['id'] . "' class='btn btn-warning action'>Edit</a>";
                    echo "<a href='crud/DeleteController.php?id=" . $article['id'] . "' class='btn btn-danger action'>Delete</a>";

                    echo "</td>";
                    echo "</tr>";
                }
                ?>


            </tbody>
        </table>

        <!-- table mentahan -->


    </div>

    <script src="./bootstrap/js/bootstrap.js"></script>
</body>

<style>
    * {
        font-family: "Lato", sans-serif;
    }

    .img-hero {
        /* padding-bottom: 400px; */
        width: 560px;

    }

    a {
        text-decoration: none;
    }

    thead {
        border-radius: 100px;
    }

    .action {
        margin: 20px 20px;
    }

    td {
        font-size: 20px;
        font-weight: lighter;
        color: #1A0000;
    }

    td .btn {
        display: flex;
        text-align: center;
        justify-content: center;
        align-items: center;
        color: white;
        font-weight: bold;
    }
</style>

</html>