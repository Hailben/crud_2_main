<?php
function koneksi()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "crud_2_main"; // Make sure this matches your database name

    $koneksi = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    }
    
    return $koneksi;
}

function getTabelDokter()
{
    $koneksi = koneksi();
    $query = "SELECT * FROM dokter";
    $result = $koneksi->query($query);
    
    if ($result) {
        $hasil = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        return $hasil;
    } else {
        echo "Error: " . $koneksi->error;
        return array();
    }
}
?>
