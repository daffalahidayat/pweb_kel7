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
} 

// Ambil data untuk grafik
$queryJenisProduk = "SELECT jenis, COUNT(*) as jumlah FROM katalog_produk GROUP BY jenis";
$resultJenisProduk = mysqli_query($conn, $queryJenisProduk);
$dataJenisProduk = mysqli_fetch_all($resultJenisProduk, MYSQLI_ASSOC);

// Persiapkan data untuk grafik
$labelsJenisProduk = [];
$countsJenisProduk = [];

foreach ($dataJenisProduk as $row) {
    $labelsJenisProduk[] = $row['jenis'];
    $countsJenisProduk[] = $row['jumlah'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="assets/logo.png" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
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

    <!-- hero start -->
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-6 align-self-center align-items-center justify-content-center">
                <h1 class="fw-bolder"><span style="color: #DF2E38;">Admin </span>Farmscope</h1>
                <h2 class="fw-semibold" style="color:#191825;">Cek Pengguna dan Upload Artikel  </span>
         
            </div>
            <div class="col-lg-6">
                <img src="assets/admin.gif" alt="People gif" width="200px" height="auto" />
            </div>
        </div>
    </div>
    <!-- hero end -->

    <!-- Grafik start -->
    <div class="container mt-5">
        <h2 class="fw-bolder">Jumlah Kambing dan Sapi</h2>
        <canvas id="jenisProdukChart" width="400" height="200"></canvas>
    </div>
    <!-- Grafik end -->   

    <!-- blockqoute start -->

    <div class="container mt-5">
        <figure class="text-start">
            <blockquote class="blockquote">
                <p class="fw-bolder" style="color:#191825"> Tips and Trick</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Berbagai macam hal dari <cite title="Source Title" >FarmScope</cite>
            </figcaption>
        </figure>
    </div>

    <!-- blockqoute end -->


    <!-- article start -->
    <div class="container w-content">
        <div class="row align-items-center ">
            <div class="col align-self-center justify-content-start">
                <!-- card 1 -->
                <?php
                $sql = "SELECT * FROM articles";
                $query = mysqli_query($conn, $sql);

                while ($article = mysqli_fetch_array($query)) {
                    echo "<div class='card card-article'>";
                    echo "<img class='card-img-top img-article' src='assets/components/$article[gambar]' width='10px' ";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title overflow'>$article[judul] </h5>";
                    echo "<p class='card-text overflow pt-2'>$article[konten]</p>";
                    echo "<br />";
                    // echo "<a href='crud/FormEdit.php?id=" . $article['id'] . "' class='btn btn-warning action'>Edit</a>";
                    echo "</div>";
                    echo "</div>";
                }

                ?>
            </div>

        </div>
    </div>
    <!-- article end -->

    <div class="border"></div>
    <!-- footer start -->
    <footer class="bg-light text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">FarmScope</h5>

                    <p>
                        lorem ipsum
                    </p>
                    <p>
                        Alamat: barangkali mau masukin apa gitu
                    </p>
                </div>
                <!--Grid column-->

                <!-- <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contact</h5>

                    <p>Whatsapp : -</p>
                    <p>Facebook : -</p>

                    <p>Twitter : -</p>
                    <p>Another Contact : -</p>
                </div> -->

            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 bg-primary fw-bolder">
            © 2023 Copyright:
            <a class="text-light">FarmScope | Agile Squad</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- footer end -->
    <script>
        // Data dari PHP untuk grafik
        var dataJenisProduk = <?php echo json_encode($dataJenisProduk); ?>;

        // Persiapkan data untuk grafik
        var labelsJenisProduk = [];
        var countsJenisProduk = [];
        dataJenisProduk.forEach(function(item) {
            labelsJenisProduk.push(item.jenis);
            countsJenisProduk.push(item.jumlah);
        });

        // Buat grafik
        var ctxJenisProduk = document.getElementById('jenisProdukChart').getContext('2d');
        var jenisProdukChart = new Chart(ctxJenisProduk, {
            type: 'bar',
            data: {
                labels: labelsJenisProduk,
                datasets: [{
                    label: 'Jumlah',
                    data: countsJenisProduk,
                    backgroundColor: ['blue', 'green'], // Warna untuk kambing dan sapi
                }]
            }
        });
    </script>
    <script src="./bootstrap/js/bootstrap.js"></script>
</body>

<style>
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