<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'data_farmscope');
    if (mysqli_connect_error() == true) {
        die('Gagal terhubung ke database');
        return false;
    } else {
        return true;
    }
    
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }


    

