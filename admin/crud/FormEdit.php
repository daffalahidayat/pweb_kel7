<?php

include("../../servernya/tes_koneksi.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: ../admin_articles.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM articles WHERE id=$id";
$query = mysqli_query($conn, $sql);
$article = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPSDM Admin</title>
    <link rel="stylesheet" href="../css//index.css" />
    <link rel="stylesheet" href="../bootstrap/css//bootstrap.css" />
</head>

<body>



    <!-- breadcrumb start -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active fs-3 fw-bolder text-dark p-2 pt-4 text-uppercase" aria-current="page">
                    Dashboard edit</li>
            </ol>
            <ol class="breadcrumb pl-2 ms-2">
                <li class="breadcrumb-item fw-bolder text-dark"><a href="./AdminIndex.php">Home Admin</a></li>
                <li class="breadcrumb-item active fw-bolder" aria-current="page">Form Edit</li>
            </ol>
        </nav>
    </div>
    <!-- breadcrumb end -->

    <!-- form bootstrap start -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card bg-light shadow p-3 mb-5 bg-body rounded">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="/farmscope-v3/admin/assets/profile.png" width="150px" height="auto" />
                    </div>
                    <!-- form -->
                    <form action="EditController.php" method="POST">
                        <div class="row">
                            <input type="hidden" name="id" value="<?php echo $article['id'] ?>">
                            <div class="col">
                                <label for="title" class="form-label fw-bolder text-dark">Edit title here</label>
                                <input type="text" class="form-control" placeholder="Title here" id="title" name="judul" value="<?php echo $article['judul'] ?>" required />
                            </div>
                            <div class="col">
                                <label for="gambar" class="form-label fw-bolder text-dark">Edit image here</label>
                                <input class="form-control" type="file" id="gambar" name="gambar" required />
                            </div>
                            <div class="form-group mt-3">
                                <label for="konten" class="form-label fw-bolder text-dark">Edit a description
                                    here</label>
                                <textarea class="form-control" id="konten" rows="3" name="konten" required><?php echo $article['konten'] ?></textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary w-100 mt-3 fw-bolder" name="simpan" value="Submit Edit" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col">
                <img src="/farmscope-v3/admin/assets/art_lover.png" class="img-hero" />
            </div>
        </div>
    </div>
    <!-- form bootstrap end -->

    <script src="../bootstrap//js/bootstrap.js"></script>

    <style>
        .img-hero {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 500px;
            height: auto;
        }
    </style>

</body>

</html>