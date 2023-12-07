<?php
include 'servernya/tes_koneksi.php';
session_start();
?>

<style>
.unstyled-button {
  border: none;
  padding: 0;
  background: none;
}
</style>

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
                    <!-- <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a> -->
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
              <h3 class="m-0 font-weight-bold text-primary"><b>Tabel Data Sapi & Kambing</b></h3>
            </div>   
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Hewan</th>
                      <th>Deskripsi</th>
                      <th>Umur (bulan)</th>
                      <th>Berat (kg)</th>
                      <th>Harga</th>
                      <th>Foto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include 'servernya/tes_koneksi.php';

                      // Ensure that the user is logged in
                      if (isset($_SESSION['id_user'])) {
                          $id_user = $_SESSION['id_user'];

                          // Query untuk mengambil data dari tabel katalog_produk dan users menggunakan INNER JOIN
                          $sql = "SELECT *
                                  FROM katalog_produk as k
                                  WHERE k.id_user = $id_user";
                          
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                            $nomor = 1;
                              while ($row = $result->fetch_assoc()) {
                              ?>
                        <tr>
                          <td> <?php echo $nomor ?> </td>
                          <td> <?php echo $row['nama_produk']; ?> </td>
                          <td> <?php echo substr($row['deskripsi'], 0, 100); ?>.. </td>
                          <td> <?php echo $row['umur']; ?> </td>
                          <td> <?php echo $row['berat']; ?> </td>
                          <td> <?php echo "Rp" . number_format($row["harga"], 0, ",", "."); ?> </td>
                          <td> <img src="../assets/images/upload/<?php echo $row["foto"]; ?>" alt="<?php echo $row["nama_produk"]; ?>" class="img-fluid"> </td>
                        </tr>
                        <?php $nomor++ ?>
                        <?php
                            }
                          } else {
                              echo "Tidak ada data sapi yang tersedia.";
                          }
                      } else {
                          echo "User not logged in.";
                      }

                      // Tutup koneksi database
                      $conn->close(); 
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
          // Hapus warning
          function myConfirm(){    
          var result = confirm("Apakah Anda yakin ingin menghapus ini?");
          if(result){
              window.location.href = "servernya/hapus_produk-kambing.php?id=<?php echo $row['id_produk']; ?>";
          } else {
            window.location.href = "kambing.php";
          }
      }  
  </script>
  <script>
    $(document).ready(function() {
      // $('#addDataForm').submit(function(e) {
      //   e.preventDefault()
      //   var formData = new FormData(this);

      //   $.ajax({
      //     type: "post",
      //     url: $(this).attr("data-action"),
      //     data: formData,
      //     contentType: false,
      //     cache: false,
      //     processData: false,
      //     dataType: "JSON",
      //     success: function(response) {

      //     }
      //   });
      // })
      $('#dataTable').DataTable({
        "paging": true, // Aktifkan paging
        "searching": true, // Aktifkan fitur pencarian
        "ordering": true, // Aktifkan pengurutan kolom
        // Opsi tambahan bisa ditambahkan sesuai kebutuhan
      });

      // Aksi saat tombol "Tambah data sapi" pada tabel ditekan
      $(".add-new-data").click(function() {
        // Tampilkan modal tambah data
        $("#addDataModal").modal("show");
      });

      // Aksi saat tombol Close pada tabel ditekan
      $(".close").click(function() {
        // Tampilkan modal tambah data
        $("#addDataModal").modal("hide");
        location.reload();
      });    
    });
    </script>
  
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>