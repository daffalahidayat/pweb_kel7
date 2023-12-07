<?php
include 'servernya/tes_koneksi.php';
session_start();
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
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?= $fotoPath ?>" alt="Foto Profile" class="rounded-circle" width="160px">
                    <div class="mt-3">
                      <h4><?= $fetch['username'] ?></h4>
                      <p class="text-secondary mb-1 text-capitalize"><?= $fetch['level'] ?></p>
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
                        <?= $fetch['email'] ?>
                    </div>
                  </div>
                  <hr>

                  <!-- No Hp -->
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">No. Hp</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $fetch['nohp'] ?>
                    </div>
                  </div>
                  <hr>

                  <!-- Alamat -->
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $fetch['alamat'] ?>
                    </div>
                  </div>
                  <hr>

                  <!-- Lokasi -->
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Lokasi</h6>
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
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info" href="edit_profile.php">Edit</a>
                    </div>
                  </div>
                  <!-- Map Start -->
                  <script>
                    const map = L.map('map').setView([-6.5941819, 106.785877], 13);

                    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);

                    // Define a custom user icon
                    const cowIcon = L.icon({
                        iconUrl: '../assets/images/logos/peternak.png',  // Replace with the actual path to your cow icon
                        iconSize: [64, 64],
                        iconAnchor: [32, 64],
                        popupAnchor: [0, -64],
                    });

                    // Initialize an empty array to store markers
                    const markers = [];

                    <?php
                    $id_user = $_SESSION['id_user'];

                    include 'servernya/tes_koneksi.php';
                    $query = "SELECT * FROM user WHERE id_user = $id_user";
                    $data_query = mysqli_query($conn, $query);

                    if (mysqli_num_rows($data_query) > 0) {
                        $data = [];
                        while ($row = mysqli_fetch_assoc($data_query)) {
                            array_push($data, [
                                "latitude" => $row["latitude"],
                                "longitude" => $row["longitude"],
                                "username" => $row["username"],
                                "foto" => $row["foto_profil"],
                                "alamat" => $row["alamat"],
                                "nohp" => $row["nohp"]
                            ]);
                        }
                        echo 'const json_data = ' . json_encode($data);
                    }
                    ?>

                    console.log(json_data);

                    json_data.forEach(item => {
                        if (!item.latitude || !item.longitude) return;

                        const marker = L.marker([item.latitude, item.longitude], { icon: cowIcon }).addTo(map);

                        // Add a popup with information
                        const popupContent = `<img width="170px" height="120px" src="Admin_Peternak/src/assets/images/profile/${item.foto}" alt="Profil Picture">
                            <br><br><strong>Nama:</strong> ${item.username}
                            <br><b>No. HP:</b> ${item.nohp}
                            <br><b>Alamat:</b> ${item.alamat}`;
                        marker.bindPopup(popupContent);

                        marker.on('mouseover', function () {
                            this.openPopup();
                        });

                        marker.on('mouseout', function () {
                            this.closePopup();
                        });

                        marker.on('click', () => {
                            const googleMapsUrl = `https://www.google.com/maps/search/?api=1&query=${item.latitude},${item.longitude}`;
                            window.open(googleMapsUrl, '_blank');
                        });

                        markers.push(marker);
                    });

                    document.getElementById("lokasiBtn").addEventListener("click", showCurrentLocation);

                    function showCurrentLocation() {
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(
                                function (position) {
                                    const latitude = position.coords.latitude;
                                    const longitude = position.coords.longitude;

                                    // Add a marker at the current location with a different icon
                                    const currentLocationMarker = L.marker([latitude, longitude], { icon: userIcon }).addTo(map);

                                    // Optionally, you can also update the address using reverse geocoding here
                                    updateAddress(latitude, longitude);

                                    // Add the current location marker to the array of markers
                                    markers.push(currentLocationMarker);
                                },
                                function (error) {
                                    console.error('Error getting location:', error.message);
                                    alert('Error getting location. Please make sure location access is allowed.');
                                }
                            );
                        } else {
                            alert('Geolocation is not supported by your browser.');
                        }
                    }

                    function updateAddress(latitude, longitude) {
                        // Update the address with geocoding
                        $.ajax({
                            type: "GET",
                            url: "https://nominatim.openstreetmap.org/reverse",
                            data: {
                                format: "json",
                                lat: latitude,
                                lon: longitude,
                            },
                            success: function (response) {
                                alamatInput.value = response.display_name;
                            },
                            error: function (xhr, status, error) {
                                console.error("Error: " + error);
                            },
                        });
                    }
                  </script>

                        </div> 
                </div>
                <!-- Map End -->
                </div>
              </div>

            </div>
          </div>

        </div>
    </div>
</body>
</html>