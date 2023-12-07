<?php ob_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

</html>

<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'data_farmscope');


function register($dataRegister)
{
    global $koneksi;

    $email = htmlspecialchars(stripcslashes($dataRegister['email-registrasi']));
    $username = htmlspecialchars(stripcslashes($dataRegister['username-registrasi']));
    $password = mysqli_real_escape_string($koneksi, htmlspecialchars($dataRegister['password-registrasi']));
    $passwordConfirm = mysqli_real_escape_string($koneksi, htmlspecialchars($dataRegister['password-confirm']));
    $query = "SELECT email, username FROM user WHERE email = '$email' OR username = '$username'";
    $cekUser = mysqli_query($koneksi, $query);

    // cek username dan email
    if (mysqli_num_rows($cekUser) > 0) {
        echo "
            <script>
                swal('Maaf','Username / email telah dipakai!','info');
            </script>
        ";
        return false;
    }

    // cek konfirmasi password
    if ($password != $passwordConfirm) {
        echo "
            <script>
                swal('Maaf', 'Password konfirmasi harus sama','info');
            </script>
        ";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $sukses = mysqli_query($koneksi, "INSERT INTO user (email, username, password) VALUES ('$email', '$username', '$password')");

    if ($sukses > 0) {
        echo "
    <script>
        swal('Berhasil','Akun anda berhasil didaftarkan!','success');
    </script>
    ";
    } else {
        echo "
            <script>
            swal('Maaf',Akun anda gagal didaftarkan','warning');
            </script>
        ";
        return false;
    }

    return mysqli_affected_rows($koneksi);
}

function login($dataLogin)
{
    global $koneksi;
    
    $email = $dataLogin["user-email"];
    $username = $dataLogin["user-email"];
    $password = $dataLogin["password-login"];
    $cekUser = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email' OR username = '$username'");
    
    $hasil = mysqli_fetch_assoc($cekUser);
    
    if (mysqli_num_rows($cekUser) == 0 || password_verify($password, $hasil["password"])) {
        echo "
            <script>
                swal('Maaf','Username / password salah!','warning');
            </script>
        ";
        return false;
    } elseif ($hasil['status'] != 'aktif') {
        echo "
            <script>
                swal('Maaf','Akun anda dinonaktifkan oleh admin!','info');
            </script>
        ";
        return false;
    } 

    if ($hasil['level'] == 'admin') {
        $_SESSION['user'] = $hasil['username'];
        $_SESSION['level'] = 'admin';
        $_SESSION["id_user"]=$hasil["id_user"];
        $_SESSION['login'] = true;
        header('Location: admin/administrator.php');
    } elseif ($hasil['level'] == 'peternak') {
        $_SESSION['user'] = $hasil['username'];
        $_SESSION['level'] = 'peternak';
        $_SESSION["id_user"]=$hasil["id_user"];
        $_SESSION['login'] = true;
        header('Location: Admin_Peternak\src\php\index.php');
    }

    if (isset($_POST['rememberme'])) {
        setcookie('login', $hasil['username'], time() + 3600);
        setcookie('level', $hasil['level'], time() + 3600);
        setcookie('id', $hasil['id_user'], time() + 3600);
        setcookie('key', hash('sha256', $hasil['username']), time() + 3600);
    }
            

    return mysqli_affected_rows($koneksi);
}

?>