<?php
include 'servernya/tes_koneksi.php';
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FarmScope - Peternak</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script src="../js/tambah_sapi.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="index.php" class="text-nowrap logo-img">
            <h2>FarmScope</h2>
            <!--<img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />-->
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Katalog Hewan</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="sapi.php" aria-expanded="false">
                <span>
                  <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Sapi</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="kambing.php" aria-expanded="false">
                <span>
                  <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Kambing</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link bg-danger" href="logout.php" aria-expanded="false">
                <span>
                  <i class="ti ti-logout text-white"></i>
                </span>
                <span class="hide-menu text-white">Logout</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>

          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <!--<a href="https://adminmart.com/product/modernize-free-bootstrap-admin-dashboard/" target="_blank" class="btn btn-primary">Download Free</a>-->
              <li class="nav-item dropdown">
                <!-- Wow -->
                <?php
                $id_user = $_SESSION['id_user'];

                include("servernya/tes_koneksi.php"); // Menghubungkan ke database
                    
                    // Query untuk mengambil data dari tabel katalog_produk dan users menggunakan INNER JOIN
                    $select = mysqli_query($conn, "SELECT * FROM `user` WHERE id_user = '$id_user'") or die('query failed');
                    if (mysqli_num_rows($select) > 0) {
                        $fetch = mysqli_fetch_assoc($select);
                        $fotoPath = '../assets/images/profile/' . $fetch['foto_profil'];
                    }
                            ?>
                <!-- Wow End -->
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="<?= $fotoPath ?>" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="profile.php" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-settings fs-6"></i>
                      <p class="mb-0 fs-3">Profile</p>
                    </a>
                    <a href="logout.php" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-logout fs-6 text-danger"></i>
                      <p class="mb-0 fs-3 text-danger">Logout</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body py-3">
              <a href="kambing.php" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-arrow-left fs-6"></i>
                <p class="mb-0 fs-4">Kembali</p>
              </a><br>
              <h4 class="m-0 font-weight-bold text-success">Form Data - Kambing</h4>
            </div>   
            <div class="card-body">
            <?php
                  if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM katalog_produk WHERE id_produk = $id";
                    $result = $conn->query($sql);
    
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                  ?>
            <!-- Formulir untuk menambahkan data -->
            <form method="POST" action="servernya/update_produk-kambing.php?id=<?php echo $row['id_produk'];?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_produk"><b>Nama Sapi</b></label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" 
                    value="<?php echo $row["nama_produk"]; ?>" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="deskripsi"><b>Deskripsi</b></label>
                    <textarea class="form-control" name="deskripsi" rows="6" id="deskripsi" required><?php echo $row["deskripsi"]; ?></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="umur"><b>Umur (bulan)</b></label>
                    <input type="text" class="form-control" name="umur" id="umur" 
                    value="<?php echo $row["umur"]; ?>" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="berat"><b>Berat (kg)</b></label>
                    <input type="text" class="form-control" name="berat" id="berat" 
                    value="<?php echo $row["berat"]; ?>" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="harga"><b>Harga</b></label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Rp" 
                    value="<?php echo $row["harga"]; ?>" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="foto"><b>Foto</b></label>
                    <input type="file" class="form-control" name="foto" id="foto" 
                    value="<?php echo $row["foto"];?>" required>
                </div>
                <br>
                <div class="modal-footer">
                    <!-- <button type="submit" class="btn btn-primary add-new-data" id="simpanData">Simpan</button> -->
                    <input class="btn btn-primary" type="submit" name="Upload" value="Upload"></button>
                </div>
            </form>
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
        </div>
      </div>
    </div>
  </div>

  
  <!-- <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script> -->
</body>

</html>