<?php
  include 'servernya/tes_koneksi.php'; // Sesuaikan dengan file koneksi yang Anda gunakan.
  session_start();
  $id_user = $_SESSION['id_user'];

  // Ambil data dari formulir
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $foto = $_FILES['foto_profil']['name'];
    $username = $_POST['username'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Update data user
    $sql = "UPDATE user SET foto_profil = '$foto', username = '$username', nohp = '$nohp', alamat = '$alamat', latitude = '$latitude', longitude = '$longitude' WHERE id_user = '$id_user'";
     // Sesuaikan dengan cara Anda menyimpan ID pengguna

      if ($conn->query($sql)){

        // Pindahkan file gambar ke direktori yang diinginkan
        $target_dir = "../assets/images/profile/"; // Sesuaikan dengan direktori penyimpanan gambar
        $target_file = $target_dir . basename($_FILES['foto_profil']['name']);
        move_uploaded_file($_FILES['foto_profil']['tmp_name'], $target_file);

        header ('Location: profile.php');
        die();
    } else {
      echo "Error: ". $conn->error;
    }

    // Tutup koneksi database
    $pdo = null;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/profile.css" />

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Bootstrap -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js'></script>
</head>
<body>
<div class="container">
    <div class="main-body">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
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
          <form method="POST" enctype="multipart/form-data">                  
            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="<?= $fotoPath ?>" alt="Foto Profile" class="rounded-circle" width="150">
                      <div class="mt-3">
                        <input type="file" name="foto_profil" id="foto_profil" class="formbold-formbold-form-input formbold-form-file" accept="image/*" />
                        <div class="col-sm-9 text-secondary">
                          <input type="text" id="username" name="username" value="<?= $fetch['username'] ?>">
                        </div>
                        <p class="text-secondary mb-1"><?= $fetch['alamat'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">

                    <!-- Email -->
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" id="email" name="email" value="<?= $fetch['email'] ?>">
                      </div>
                    </div>
                    <hr>

                    <!-- No. HP -->
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">No. Hp</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" id="nohp" name="nohp" value="<?= $fetch['nohp'] ?>">
                      </div>
                    </div>
                    <hr>

                    <!-- Alamat -->
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Alamat</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <textarea
                        rows="4" cols="40"
                        name="alamat"
                        id="alamat"><?= $fetch['alamat'] ?></textarea>
                      </div>
                    </div>
                    <hr>

                    <div class="form-group" style="display: none;">
                      <label>Latitude</label>
                      <input class="form-control" id="latitude" name="latitude">
                    </div>

                    <div class="form-group" style="display: none;">
                        <label>Longitude</label>
                        <input class="form-control" id="longitude" name="longitude">
                    </div>
                  
                    <!-- Lokasi -->
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Lokasi</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <!-- <input type="text" id="lokasi" name="lokasi"> -->
                      </div>
                    </div> 
                    <!-- Lihat Map -->
                    <br>
                    <div class="row">
                      <div class="col-sm-9">
                          <div id="map" style="width: 680px; height: 300px;"></div>
                      </div>
                    </div>
                    <br>
                    <!-- Button Lokasi Saya -->
                    <div class="form-group">
                      <label for="lokasiBtn"></label>
                      <button type="button" id="lokasiBtn" class="btn btn-primary">Lokasi saya</button>
                    </div> 
                    <br>
                    <div class="row">
                      <div class="col-sm-12">
                        <!-- <a class="btn btn-info" href="update_profile.php">Simpan</a> -->
                        <input class="btn btn-info" type="submit" name="Upload" value="Simpan"></button>
                      </div>
                    </div>
                  </div>
                  <!-- JS Map -->
                  <script>
                    var map = L.map('map').setView([-6.5941819, 106.785877], 13);

                    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);

                    var latInput = document.querySelector("#latitude");
                    var lngInput = document.querySelector("#longitude");
                    //var lokasiInput = document.querySelector("#lokasi");
                    var alamatInput = document.querySelector("#alamat");

                    var curLocation = [-6.5941819, 106.785877];

                    map.attributionControl.setPrefix(false);

                    var marker = new L.marker(curLocation, {
                      draggable: true,
                    });

                    marker.on('dragend', function (event) {
                      var position = marker.getLatLng();
                      marker.setLatLng(position);
                      marker.bindPopup(position).update();
                      latInput.value = position.lat;
                      lngInput.value = position.lng;
                      lokasiInput.value = position.lat + "," + position.lng;
                    });

                    map.addLayer(marker);

                    map.on("click", function (e) {
                      var lat = e.latlng.lat;
                      var lng = e.latlng.lng;
                      if (!marker) {
                        marker = L.marker(e.latlng).addTo(map);
                      } else {
                        marker.setLatLng(e.latlng);
                      }
                      latInput.value = lat;
                      lngInput.value = lng;
                      lokasiInput.value = lat + "," + lng;
                      // Perbarui alamat dengan geocoding
                      $.ajax({
                        type: "GET",
                        url: "https://nominatim.openstreetmap.org/reverse",
                        data: {
                          format: "json",
                          lat: lat,
                          lon: lng,
                        },
                        success: function (response) {
                          alamatInput.value = response.display_name;
                        },
                        error: function (xhr, status, error) {
                          console.error("Error: " + error);
                        },
                      });
                    });

                      document.getElementById("lokasiBtn").addEventListener("click", function () {
                      // Try to get the user's current location
                      navigator.geolocation.getCurrentPosition(
                          function (position) {
                              var latitude = position.coords.latitude;
                              var longitude = position.coords.longitude;

                              // Update input fields with the obtained values
                              latInput.value = latitude;
                              lngInput.value = longitude;
                              lokasiInput.value = latitude + "," + longitude;

                              // Update the map view and add a marker at the new location
                              map.setView([latitude, longitude], 13);
                              marker.setLatLng([latitude, longitude]);

                              // Optionally, you can also update the address using reverse geocoding here
                          },
                          function (error) {
                              console.error("Error getting location: ", error);
                              alert("Error getting your location. Please make sure location services are enabled.");
                          }
                      );
                  });
                  </script>
                  <!-- JS Map -->
          </form>
              </div>

            </div>
          </div>

        </div>
    </div>
</body>
</html>