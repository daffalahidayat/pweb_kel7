<?php
include 'servernya/tes_koneksi.php';
session_start();
?>

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
                <a href="index_peternak.php" class="nav-item nav-link active">Beranda</a>
                <a href="2_Peternak/tentangkami.html" class="nav-item nav-link">Tentang Kami</a>
                <a href="galeri-2.php" class="nav-item nav-link">Galeri</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Katalog</a>
                    <div class="dropdown-menu m-0">
                        <a href="2_Peternak/sapi.php" class="dropdown-item">Sapi</a>
                        <a href="2_Peternak/kambing.php" class="dropdown-item">Kambing</a>
                    </div>
                </div>
                <a href="profile.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Profile</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5 overlay">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-1 text-light mb-lg-4">FarmScope</h1>
                    <h1 class="text-uppercase text-white mb-lg-4">Provide You The Best Livestock</h1>
                    <p class="fs-4 text-white mb-lg-4" style="text-align:justify">FarmScope adalah sebuah aplikasi berbasis web yang dirancang khusus untuk menyediakan hewan ternak terbaik terutama sapi dan kambing yang ada di Kota Bogor</p>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <a href="2_Peternak/tentangkami.html" class="btn btn-outline-light border-2 py-md-3 px-md-5 me-5">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- List Layanan Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img src="img/layanan 247.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Dukungan Pelanggan 24/7</h5>
                            <p style="text-align:justify">Tim layanan pelanggan kami siap membantu Anda sepanjang waktu. Jika Anda memiliki pertanyaan, permintaan khusus, atau butuh bantuan, kami siap memberikan pelayanan yang memuaskan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img src="img/akses.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Akses Ternak Terbaik</h5>
                            <p style="text-align:justify">Kami bekerja sama dengan peternak terpercaya untuk menyediakan akses ke ternak terbaik. Anda dapat memilih dari berbagai jenis sapi dan kambing yang sehat dan berkualitas tinggi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img src="img/Pemesanan.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Kemudahan Pemesanan</h5>
                            <p style="text-align:justify">Aplikasi web kami memberikan kemudahan dalam proses pemesanan. Anda dapat memilih ternak yang diinginkan, menentukan ukuran, dan melakukan pembayaran dengan cepat dan aman melalui platform kami</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img src="img/potongan.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Pemotongan Sesuai Kebutuhan</h5>
                            <p style="text-align:justify">Kami menawarkan layanan pemotongan daging sesuai dengan kebutuhan Anda. Daging dapat dipotong dan disiapkan sesuai dengan preferensi Anda sebelum pengiriman.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img src="img/peternak terbaik.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Pilihan Ternak Berkualitas</h5>
                            <p style="text-align:justify">Kami menawarkan berbagai jenis ternak, termasuk sapi, domba, kambing, dan ayam, yang semuanya berasal dari peternak terpercaya. Anda dapat memilih ternak dengan kualitas terbaik sesuai dengan preferensi Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img src="img/kualitas.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Kualitas Terjamin</h5>
                            <p style="text-align:justify">Kami sangat memperhatikan kualitas daging yang kami jual. Ternak kami diberikan pakan berkualitas tinggi dan perawatan yang baik untuk memastikan daging yang Anda terima adalah yang terbaik.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> </div> </div> 
    <!-- List Layanan Start -->
    
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
                        <a class="text-body mb-2" href="index_peternak.php"><i class="bi bi-arrow-right text-primary me-2"></i>Beranda</a>
                        <a class="text-body mb-2" href="2_Peternak/tentangkami.html"><i class="bi bi-arrow-right text-primary me-2"></i>Tentang Kami</a>
                        <a class="text-body mb-2" href="2_Peternak/galeri-2.php"><i class="bi bi-arrow-right text-primary me-2"></i>Galeri</a>
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
                    <p class="mb-md-0">&copy; <a class="text-white" href="index.html">FarmScope</a>. All Rights Reserved.</p>
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