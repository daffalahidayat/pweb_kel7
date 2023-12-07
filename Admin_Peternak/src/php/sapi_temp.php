<?php
include 'servernya/tes_koneksi.php';
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FarmScope</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>
<script type="text/javascript">
  $(document).ready(function () {
      var actions = $("table td:last-child").html();
  
      // Append table with add row form on add new button click
      $(".add-new").click(function () {
          $(this).attr("disabled", "disabled");
          var index = $("table tbody tr:last-child").index();
          var row = '<tr>' +
              '<td><input type="text" class="form-control" name="id_produk"></td>' +
              '<td><input type="text" class="form-control" name="nama_produk"></td>' +
              '<td><textarea rows="6" name="deskripsi" name="deskripsi" class="form-control"></textarea></td>' +
              '<td><input type="text" class="form-control" name="umur"></td>' +
              '<td><input type="text" class="form-control" name="berat"></td>' +
              '<td><input type="text" class="form-control" name="harga"></td>' +
              '<td><input type="file" class="form-control" name="foto"></td>' +
              '<td>' +
              '<a class="add" title="Add" data-toggle="tooltip"><i class= "ti ti-playlist-add fs-6"></i></a>' +
              '<a class="edit" title="Edit" data-toggle="tooltip"><i class="ti ti-edit fs-6"></i></a>' +
              '<a class="delete" title="Delete" data-toggle="tooltip"><i class="ti ti-trash fs-6"></i></a>' +
              '</td>' +
              '</tr>';
          $("table").append(row);
          $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
          $("table tbody tr").eq(index + 1).find(".add").show(); // Menampilkan tombol "Add"
          $('[data-toggle="tooltip"]').tooltip();
          $(".add").removeClass("d-none"); // Menghilangkan class 'd-none' untuk menampilkan tombol "Add"

      });
  
      // Add row on add button click
      $(document).on("click", ".add", function () {
          var empty = false;
          var input = $(this).parents("tr").find('input[type="text"]');
          input.each(function () {
              if (!$(this).val()) {
                  $(this).addClass("error");
                  empty = true;
              } else {
                  $(this).removeClass("error");
              }
          });
          $(this).parents("tr").find(".error").first().focus();
          if (!empty) {
              input.each(function () {
                  $(this).parent("td").html($(this).val());
              });
              $(this).parents("tr").find(".add, .edit").toggle();
              $(".add-new").removeAttr("disabled");
          }
      });
  
      // Edit row on edit button click
      $(document).on("click", ".edit", function () {
          $(this).parents("tr").find("td:not(:last-child)").each(function () {
              $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
          });
          $(this).parents("tr").find(".add, .edit").toggle();
          $(this).parents("tr").find(".add").show(); // Menampilkan tombol "Add"
          $(".add").removeClass("d-none"); // Menghilangkan class 'd-none' untuk menampilkan tombol "Add"
          $(".add-new").removeAttr("disabled");
      });

  
      // Delete row on delete button click
      $(document).on("click", ".delete", function () {
          $(this).parents("tr").remove();
          $(".add-new").removeAttr("disabled");
      });
  });
</script>
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
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
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
              <h4 class="m-0 font-weight-bold text-primary">DataTables Penjualan</h4><br/>
              <button type="button" class="btn btn-primary add-new"><i class="ti ti-plus"></i>Create Data Penjualan</button>
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
                      <th>Opsi</th>
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
                                  WHERE k.jenis = 'sapi' AND k.id_user = $id_user";
                          
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
                          <td>
                            <a class="add d-none" title="Add" data-toggle="tooltip"><i class="ti ti-playlist-add fs-6"></i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="ti ti-edit fs-6"></i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="ti ti-trash fs-6 text-danger"></i></a>
                          </td>
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
    $(document).ready(function() {
        $('#dataTable').DataTable({
            "paging": true,    // Aktifkan paging
            "searching": true, // Aktifkan fitur pencarian
            "ordering": true, // Aktifkan pengurutan kolom
            // Opsi tambahan bisa ditambahkan sesuai kebutuhan
        });
    });
  </script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>

<!--       $("#addDataForm").click(function() {
          // Menggunakan AJAX untuk mengirim data ke server
          $.ajax({
              type: "post",
              url: "servernya/upload_produk-sapi.php",
              data: $("#addDataForm").serialize(),
              success: function(response) {
                  // Tambahkan logika sesuai kebutuhan, misalnya, tampilkan pesan sukses
                  alert("Data berhasil ditambahkan!");
                  
                  // Tutup modal setelah simpan berhasil
                  $("#addDataModal").modal("hide");
                  
                  // Refresh halaman untuk memuat data terbaru
                  location.reload();
              },
              error: function(error) {
                  // Tambahkan logika sesuai kebutuhan, misalnya, tampilkan pesan error
                  alert("Terjadi kesalahan. Silakan coba lagi!");
                }
            }); -->