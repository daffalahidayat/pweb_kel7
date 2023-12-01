<?php 
session_start();
require '../function/functions.php';

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

//konfigurasi pagenation
$jumlahTabel = 5;
$jumlahData = count(query("SELECT * FROM user WHERE username NOT LIKE 'admin'"));
$jumlahHalaman = ceil($jumlahData / $jumlahTabel);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahTabel * $halamanAktif) - $jumlahTabel;

$dataUser = query("SELECT * FROM user WHERE username NOT LIKE 'admin' LIMIT $awalData, $jumlahTabel");
$dataproduk = query("SELECT * FROM katalog_produk");
///konfigurasi pagenation
$jumlahUser = mysqli_query($conn, "SELECT * FROM user WHERE username NOT LIKE 'admin'");
$jumlahUserAktif = mysqli_query($conn, "SELECT * FROM user WHERE status = 'aktif' AND username NOT LIKE 'admin'");
$jumlahUserTidakAktif = mysqli_query($conn, "SELECT * FROM user WHERE status = 'tidak aktif' AND username NOT LIKE 'admin'");

?>

<!DOCTYPE html> 
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/logo.png">
    <title>User Page - Admin Site</title>
    <link rel="icon" href="../assets/logo.png" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styler.css?v=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- <style>
    .background {
        background-image: url('img/sapi about.png');
        background-color: rgba(0,0,0,0.7);
        background-position: center;
        background-size: cover;
        height: 90%;
        background-attachment: fixed;
        position: relative;
        background-size: cover;
        width: 100%;
        overflow: hidden;
        z-index:-55;
    }
    </style> -->
<body>
    <!-- <div class="header">
            <h3 class="text-secondary font-weight-bold float-left logo">Boo</h3>
            <h3 class="text-secondary float-left logo2">kas</h3>
            <a href="logout.php">
                <div class="logout">
                    <i class="fas fa-ttyy-out-alt float-right log"></i>
                    <p class="float-right logout">Logout</p>
                </div>
            </a>
    </div> -->


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

<!--    
    <header class="background"></header> -->
    <br></br>
    <br></br>
            <div class="container kotak" id="container" style="border: none;">
                <div class="row cardview" id="row">

                    <div class="col-md-4 jarak">
                        <div class="card card-stats card-warning" style="background: #347ab8;">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="icon-big text-center">
                                            <i class="fa fa-users ikon" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 d-flex align-items-center tulisan">
                                        <div class="numbers">
                                            <p class="card-category ket head">Tabel</p>
                                            <h4 class="card-title ket total"><?= mysqli_num_rows($jumlahUser) ?> User
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 jarak">
                        <a style="text-decoration: none; cursor: pointer;" class="btn-userAktif">
                            <div class="card card-stats card-warning" style="background:#5db85b ">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fa fa-user ikon"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center tulisan">
                                            <div class="numbers">
                                                <p class="card-category ket head">User Aktif</p>
                                                <h4 class="card-title ket total"><?= mysqli_num_rows($jumlahUserAktif) ?> User</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="overlay" style="background: #5db85b;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-eye ikon2"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <p class="tulisan">Lihat User</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 jarak">
                        <a style="text-decoration: none; cursor: pointer;" class="btn-userNonAktif">
                            <div class="card card-stats card-warning" style="background: #d95350;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-power-off ikon"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center tulisan">
                                            <div class="numbers">
                                                <p class="card-category ket head">User Tidak Aktif</p>

                                                <h4 class="card-title ket total"><?= mysqli_num_rows($jumlahUserTidakAktif) ?> User</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="overlay" style="background: #d95350;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-eye ikon2"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <p class="tulisan">Lihat User</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- bagian pencarian -->
                <div class="row cari-filter" style="margin-top: 10px;">
                    <div class="col-lg-12" style="margin-top: 20px;">
                        <div class="input-group">
                            <input type="text" name="cari" class="form-control border-right-0 cari" id="keyword" placeholder="Search" style="width: 90%;padding: 5px 10px; font-size: 18px;" autocomplete="off">
                            <div class="input-group-append">
                                <span class="input-group-text bg-white border-left-0 icone"><i class="fa fa-search" style="font-size: 23px;"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- bagian pencarian -->
                
                <!-- bagian isi tabel -->
                <div class="headline" style="height: 40px;margin-top: 15px;">
                    <h4 class="ml-3 mt-1" style="color: #4b4f58">Data User</h4>
                </div>
                <div class="container tampil" id="container">
                    <div class="row" id="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-striped table-bordered">
                                    <tr>
                                        <th>ID User</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php foreach($dataUser as $row) : ?>
                                        <?php if ($row['username'] != 'admin') : ?>
                                            <tr id="<?= $row['id_user'] ?>" style="cursor: pointer">
                                                <td data-target="id_user"><?= $row['id_user'] ?></td>
                                                <td data-target="username" ><?= $row['username'] ?></td>
                                                <td data-target="email" ><?= $row['email'] ?></td>
                                                
                                                <td data-target="level" ><?= $row['level'] ?></td>
                                                <td data-target="status"><?= $row['status']?></td>
                                                <td>
                                                    <button data-id="<?= $row['id_user'] ?>" data-role="update" class="btn btn-outline-primary openBtn">
                                                        <i class="fas fa-edit"></i> edit
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /bagian isi tabel -->
                  <!-- bagian isi tabel -->
                  <!-- <div class="headline" style="height: 40px;margin-top: 15px;">
                    <h4 class="ml-3 mt-1" style="color: #4b4f58">Data Produk Sapi</h4>
                </div>
                <div class="container tampil" id="container">
                    <div class="row" id="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover table-striped table-bordered">
                                    <tr>
                                        <th>ID Produk</th>
                                        <th>Nama Sapi</th>
                                        <th>Deskripsi</th>
                                        <th>Umur</th>
                                        <th>Berat</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php foreach($dataproduk as $row) : ?>
                                        
                                            <tr id="<?= $row['id_produk'] ?>" style="cursor: pointer">
                                                <td data-target="id_produk"><?= $row['id_produk'] ?></td>
                                                <td data-target="nama_sapi" ><?= $row['nama_sapi'] ?></td>
                                                <td data-target="deskripsi" ><?= $row['deskripsi'] ?></td>
                                                <td data-target="umur" ><?= $row['umur'] ?></td>
                                                <td data-target="berat" ><?= $row['berat'] ?></td>
                                                <td data-target="stok" ><?= $row['stok'] ?></td>
                                                <td data-target="harga" ><?= $row['harga'] ?></td>
                                                <td data-target="foto" ><?= $row['foto'] ?></td>
                                         
                                                <td>
                                                    <button data-id="<?= $row['id_produk'] ?>" data-role="update" class="btn btn-outline-primary data_produk">
                                                        <i class="fas fa-edit"></i> edit
                                                    </button>
                                                </td>
                                            </tr>
                                      
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- /bagian isi tabel -->
                
                <!-- pagenation -->
                <div class="panel-footer">
                    <nav class="float-right page">
                        <ul class="pagination">

                            <?php if ($halamanAktif > 1) : ?>
                            <li class="page-item">
                                <a href="?halaman=<?= $halamanAktif - 1 ?>" class="page-link">Previous</a>
                            </li>
                            <?php else : ?>
                            <li class="page-item">
                                <div class="page-link">Previous</div>
                            </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                <?php if ($i == $halamanAktif) : ?>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                                </li>
                                <?php else : ?>
                                <li class="page-item" aria-current="page">
                                    <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                                </li>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($halamanAktif < $jumlahHalaman) : ?>
                            <li>
                                <a href="?halaman=<?= $halamanAktif + 1 ?>" class="page-link" href="#">Next</a>
                            </li>
                            <?php else : ?>
                            <li class="page-item">
                                <div class="page-link">Next</div>
                            </li>
                            <?php endif; ?>
                        </ul>

                    </nav>
                </div>
                <!-- /pagenation -->
            </div>
        </div>
    </div>

    <br>

    <!-- Modal edit data User-->
    <div class="modal fade" id="myModal2" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- isi form -->
                <div class="modal-body">
                    <input type="hidden" id="userId" class="form-control">
                    <div class="form-group">
                        <label for="id_user">ID User</label>
                        <input type="text" class="form-control" id="id_user" disabled>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status">
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <!-- footer form -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button id="save" class="btn btn-primary">simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal edit data -->

 <!-- Modal edit data produk-->
 <!-- <div class="modal fade" id="myModal5" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Data produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> -->
                <!-- isi form -->
                <!-- <div class="modal-body">
                    <input type="hidden" id="produkId" class="form-control">
                    <div class="form-group">
                        <label for="id_produk">ID Produk</label>
                        <input type="text" class="form-control" id="id_produk" value="<?php echo $row["id_produk"]; ?>"disabled>
                    </div>
                    <div class="form-group">
                        <label for="nama_sapi">Nama Sapi</label>
                        <input type="text" class="form-control" id="nama_sapi" value="<?php echo $row["nama_sapi"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" value="<?php echo $row["deskripsi"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="umur">umur</label>
                        <input type="text" class="form-control" id="umur" value="<?php echo $row["umur"]; ?>"required>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat</label>
                        <input type="text" class="form-control" id="berat" value="<?php echo $row["berat"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">stok</label>
                        <input type="text" class="form-control" id="stok" value="<?php echo $row["stok"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" value="<?php echo $row["harga"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" class="form-control" id="foto" value="<?php echo $row["foto"]; ?>">
                    </div>
                   
                  
                   
                </div> -->
                <!-- footer form -->
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button id="save" class="btn btn-primary">simpan</button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Modal edit data -->



    <!-- Modal user aktif -->
    <div class="modal fade" id="myModal3" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Data user aktif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- isi form -->
                <script type="text/javascript" src="../js/pisahTitik.js"></script>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                        <tr>
                            <th>ID User</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach($jumlahUserAktif as $row) : ?>
                            <?php if($row['username'] != 'admin') : ?>
                            <tr>
                                <td><?= $row['id_user'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['level'] ?></td>
                                <td><?= $row['status']?></td>
                            </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        </table>
                    </div>
                </div>
                <!-- footer form -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal user aktif -->

    <!-- Modal user non-aktif -->
    <div class="modal fade" id="myModal4" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Data user tidak aktif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- isi form -->
                <script type="text/javascript" src="../js/pisahTitik.js"></script>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                        <tr>
                            <th>ID User</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Status</th>
                        </tr>
                        <?php foreach($jumlahUserTidakAktif as $row) : ?>
                            <tr>
                                <td><?= $row['id_user'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['level'] ?></td>
                                <td><?= $row['status']?></td>
                            </tr>
                        <?php endforeach; ?>

                        </table>
                    </div>
                </div>

                <!-- footer form -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                </div>

                
            </div>
        </div>
    </div>
    <!-- Modal user non-aktif -->

    

    <!-- banyak modal -->
    <script>
        $('.data_produk').click(function () {
            $('#myModal5').modal({
                show: true
            });
        })
        $('.openBtn').click(function () {
            $('#myModal2').modal({
                show: true
            });
        })
        $('.btn-userAktif').click(function () {
            $('#myModal3').modal({
                show: true
            });
        })
        $('.btn-userNonAktif').click(function () {
            $('#myModal4').modal({
                show: true
            });
        })
    </script>
    

    <script src="/ajax/js/updateUser.js"></script>
    <script src="/ajax/js/cariUser.js"></script>
    <script src="/bootstrap/js/bootstrap.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</body>
</html>