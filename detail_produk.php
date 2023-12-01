<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FarmScope</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/icon/favicon.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">  

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.html" class="navbar-brand ms-lg-5">
            <h1 class="m-0 text-uppercase text-dark"><img src="img/icon/logo.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>FarmScope</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link">Beranda</a>
                <a href="tentangkami.html" class="nav-item nav-link">Tentang Kami</a>
                <a href="tips&trik.php" class="nav-item nav-link">Tips & Trik</a>
                <a href="galeri.php" class="nav-item nav-link">Galeri</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Katalog</a>
                    <div class="dropdown-menu m-0">
                        <a href="sapi.php" class="dropdown-item">Sapi</a>
                        <a href="kambing.php" class="dropdown-item">Kambing</a>
                    </div>
                </div>
                <a href="login.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Login <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Navigasi
	<div class="nav-scroller bg-white shadow-sm">
		<div class="container-fluid pt-2 pb-2">
			Katalog > <a href="kambing.php">Kambing</a>
		</div>
	</div> -->

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <?php
            include("servernya/tes_koneksi.php"); // Menghubungkan ke database

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM katalog_produk as k INNER JOIN user as u 
                ON k.id_user = u.id_user WHERE k.id_produk = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
            ?>
            <!-- Form Detail -->
            <div class="container">
            <div class="container my-5">
                <div class="row mb-4">
                    <div class="col-sm-12 col-lg-5">
                        <img src="img/upload/<?php echo $row["foto"]; ?>" alt="<?php echo $row["nama_produk"]; ?>" class="img-fluid">				
                    </div>
                    <div class="col-sm-12 col-lg-7">
                        <div class="card card-body shadow-sm">
                            <h3 class="text-website">
                                <?php echo $row["nama_produk"]; ?>
                            </h3>
                            <h4 class="text-success">
                                <?php echo "Rp" . number_format($row["harga"], 0, ",", "."); ?>
                            </h4>
                            <p></p>
                            <h6 class="b text-muted">Umur: <?php echo $row["umur"]; ?> bulan </h6>
                            <h6 class="b text-muted">Berat: <?php echo $row["berat"]; ?> kg </h6>
                            <div class="my-2">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-5">
                                        <a target="__blank" href="https://wa.me/<?php echo substr($row['nohp'],3,13) ?>" class="hvnb">
                                            <button class="btn btn-primary btn-block text-white">
                                            Chat via Whatsapp
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- <hr> -->
                            <!-- <div class="table-responsive">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Nama Penjual</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td class="text-website"><php? echo $row['nama']; ?></td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="list-group">
                    <div class="list-group-item b text-website">
                        <h5>Deskripsi Produk</h5>
                    </div>
                    <div class="list-group-item">
                        <p> <?php echo $row["deskripsi"]; ?> </p>
                    </div>
                </div>
            </div>            
            <?php
                } else {
                    echo "Produk tidak ditemukan.";
                }
            } else {
                echo "Parameter ID tidak valid.";
            }

            // Tutup koneksi database
            $conn->close();
            ?>
        </div>
    </div>
    <!-- Products End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Hubungi Kami</h5>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>Babakan, Bogor, Indonesia</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>farmscope@gmail.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+62 87654321</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Tautan Langsung</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="index.php"><i class="bi bi-arrow-right text-primary me-2"></i>Beranda</a>
                        <a class="text-body mb-2" href="tentangkami.html"><i class="bi bi-arrow-right text-primary me-2"></i>Tentang Kami</a>
                        <a class="text-body mb-2" href="tips&trik.php"><i class="bi bi-arrow-right text-primary me-2"></i>Tips & Trick</a>
                        <a class="text-body mb-2" href="galeri.php"><i class="bi bi-arrow-right text-primary me-2"></i>Galeri</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Newsletter</h5>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Your Email">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                    <h6 class="text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-linkedin"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="col-12 text-center text-body">
                    <a class="text-body" href="">Terms & Conditions</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Privacy Policy</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Customer Support</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Payments</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Help</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">FAQs</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white" href="index.php">FarmScope</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-white" href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>