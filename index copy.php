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

     <!-- Map Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.html" class="navbar-brand ms-lg-5">
            <h1 class="m-0 text-dark"><img src="img/icon/logo.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>FarmScope</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index copy.php" class="nav-item nav-link active">Beranda</a>
                <a href="tentangkami.html" class="nav-item nav-link">Tentang Kami</a>
                <a href="tips&trik.php" class="nav-item nav-link">Tips & Trik</a>
                <a href="galeri.php" class="nav-item nav-link">Galeri</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Katalog</a>
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


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5 overlay">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-1 text-light mb-lg-4">FarmScope</h1>
                    <h1 class="text-uppercase text-white mb-lg-4">Provide You The Best Livestock</h1>
                    <p class="fs-4 text-white mb-lg-4">FarmScope adalah sebuah aplikasi berbasis web yang dirancang khusus untuk memecahkan permasalahan dalam perdagangan hewan ternak di Kota Bogor</p>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <a href="tentangkami.html" class="btn btn-outline-light border-2 py-md-3 px-md-5 me-5">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- List Layanan Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img src="img/layanan 247.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Dukungan Pelanggan 24/7</h5>
                            <p>Tim layanan pelanggan kami siap membantu Anda sepanjang waktu. Jika Anda memiliki pertanyaan, permintaan khusus, atau butuh bantuan, kami siap memberikan pelayanan yang memuaskan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img src="img/akses.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Akses Ternak Terbaik</h5>
                            <p>Kami bekerja sama dengan peternak terpercaya untuk menyediakan akses ke ternak terbaik. Anda dapat memilih dari berbagai jenis sapi, domba, kambing, dan ayam yang sehat dan berkualitas tinggi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img src="img/Pemesanan.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Kemudahan Pemesanan</h5>
                            <p>Aplikasi web kami memberikan kemudahan dalam proses pemesanan. Anda dapat memilih ternak yang diinginkan, menentukan ukuran, dan melakukan pembayaran dengan cepat dan aman melalui platform kami</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img src="img/potongan.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Pemotongan Sesuai Kebutuhan</h5>
                            <p>Kami menawarkan layanan pemotongan daging sesuai dengan kebutuhan Anda. Daging dapat dipotong dan disiapkan sesuai dengan preferensi Anda sebelum pengiriman.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img src="img/peternak terbaik.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Pilihan Ternak Berkualitas</h5>
                            <p>Kami menawarkan berbagai jenis ternak, termasuk sapi, domba, kambing, dan ayam, yang semuanya berasal dari peternak terpercaya. Anda dapat memilih ternak dengan kualitas terbaik sesuai dengan preferensi Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <img src="img/kualitas.png" alt="Ikon Sapi" width="80" height="80" class="me-3"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Kualitas Terjamin</h5>
                            <p>Kami sangat memperhatikan kualitas daging yang kami jual. Ternak kami diberikan pakan berkualitas tinggi dan perawatan yang baik untuk memastikan daging yang Anda terima adalah yang terbaik.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> </div> </div> 
    <!-- List Layanan Start -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Tips & Trik</h6>
                <h1 class="display-5 text-uppercase mb-0">Tips & Trik Terbaru dari Kami</h1>
            </div>
            <div class="row g-5">
                <!-- Blog list Start -->
                <!-- <div class="col-lg-6"> -->
                    <!-- <div class="blog-item"> -->
                        <!-- <div class="row g-0 bg-light overflow-hidden"> -->
                            <!-- <div class="col-12 col-sm-5 h-100"> -->
                                <?php
                                    include 'servernya/tes_koneksi.php';

                                    // Periksa koneksi
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Query untuk mengambil data dari database
                                    $sql = "SELECT * FROM articles";
                                    $result = $conn->query($sql);

                                    // Periksa apakah data ditemukan
                                    if ($result->num_rows > 0) {
                                        // Loop melalui setiap baris data
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <div class="col-lg-6">
                                                <div class="blog-item">
                                                    <div class="row g-0 bg-light overflow-hidden">
                                                        <div class="col-12 col-sm-5 h-100">
                                                            <img src="admin/assets/components/<?php echo $row["gambar"]; ?>" class="img-fluid h-100" style="object-fit: cover" alt="<?php echo $row['judul']?>">
                                                            <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                                                                <div class="p-4">
                                                                    <h5 class="text-uppercase mb-3"> <?php echo $row["judul"]; ?> </h5>
                                                                    <p> <?php echo substr($row['konten'], 0, 100); ?> ...</p>
                                                                    <a class="text-primary text-uppercase" href="detail_tips&trik.php?id=<?php echo $row['id'];?>"> Read More<i class="bi bi-chevron-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    } else {
                                        echo "No results found";
                                    }

                                    // Tutup koneksi
                                    $conn->close();
                                ?>
                            <!-- </div> -->
                        <!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
    <!-- Blog End -->
    
    <!-- Map Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <H2 center>Lokasi Peternak</H2>
            <div id="map" style="width: 100%; height: 600px;"></div>

            <script>
            const map = L.map('map').setView([-6.5941819, 106.785877], 13);

            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            <?php
            include 'servernya/tes_koneksi.php';
            $query = "SELECT * FROM user";
            $data_query = mysqli_query($conn, $query);

            if (mysqli_num_rows($data_query) > 0) {
            $data = [];
            while ($row = mysqli_fetch_assoc($data_query)) {
                array_push($data, [
                    "latitude" => $row["latitude"],
                    "longitude" => $row["longitude"],
                    "username" => $row["username"],
                    "foto" => $row["foto"]
                ]);
            }
            echo 'const json_data = ' . json_encode($data);
            }
            ?>

            console.log(json_data)

            json_data.forEach(item => {
            if (!item.latitude || !item.longitude) return
            const marker = L.marker([item.latitude, item.longitude]).addTo(map);

            // Add a popup with information
            const popupContent = `<b>nama:</b> ${item.username}<br><b>foto:</b> <img width="100px" src="peternak/foto_profil/${item.foto}"/>`;
            marker.bindPopup(popupContent);
            });
            </script>
        </div> 
    </div>
    <!-- Map End -->

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
                        <a class="text-body mb-2" href="index.html"><i class="bi bi-arrow-right text-primary me-2"></i>Beranda</a>
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