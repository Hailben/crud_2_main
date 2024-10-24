<?php
function koneksi()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "crud_2_main"; // Changed from "kunjungan" to "crud_2_main"

    $koneksi = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    }
    
    return $koneksi;
}

function getTabelKunjungan()
{
    $koneksi = koneksi();
    $query = "SELECT * FROM kunjungan";
    $result = $koneksi->query($query);
    
    if ($result) {
        $hasil = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        echo "Debug: " . print_r($hasil, true); // Tambahkan ini untuk debugging
        return $hasil;
    } else {
        echo "Error: " . $koneksi->error; // Tambahkan ini untuk melihat error SQL
        return array();
    }
}


?>
