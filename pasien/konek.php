<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pasien';

// Create a connection without selecting a database
$koneksi = new mysqli($host, $username, $password);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($koneksi->query($sql) !== TRUE) {
    die("Error creating database: " . $koneksi->error);
}

// Select the database
$koneksi->select_db($database);

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS pasien (
    idpasien INT(11) PRIMARY KEY,
    nmpasien VARCHAR(255) NOT NULL,
    jk ENUM('L', 'P') NOT NULL,
    alamat TEXT
)";
if ($koneksi->query($sql) !== TRUE) {
    die("Error creating table: " . $koneksi->error);
}

if (isset($_POST['simpan'])) {
    // Check if all required fields are set
    if (!empty($_POST['idpasien']) && !empty($_POST['nmpasien']) && !empty($_POST['jk'])) {
        $idpasien = $_POST['idpasien'];
        $nmpasien = $_POST['nmpasien'];
        $jk = $_POST['jk'];
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
        
        $sql = "INSERT INTO pasien (idpasien, nmpasien, jk, alamat) VALUES (?, ?, ?, ?)";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("isss", $idpasien, $nmpasien, $jk, $alamat);
        
        if ($stmt->execute()) {
            $stmt->close();
            header('Location: pasien.php');
            exit();
        } else {
            echo "Insert failed: " . $stmt->error;
        }
    } else {
        echo "Error: All required fields must be filled.";
    }
}

if (isset($_GET['idpasien'])) {
    $idpasien = $_GET['idpasien'];
    
    $sql = "DELETE FROM pasien WHERE idpasien = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("s", $idpasien);
    
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: pasien.php");
        exit();
    } else {
        echo "Delete failed: " . $stmt->error;
    }
}

if (isset($_POST['update'])) {
    $idpasien = $_POST['idpasien'];
    $nmpasien = $_POST['nmpasien'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    
    $sql = "UPDATE pasien SET nmpasien=?, jk=?, alamat=? WHERE idpasien=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssi", $nmpasien, $jk, $alamat, $idpasien);
    
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: pasien.php");
        exit();
    } else {
        echo "Update failed: " . $stmt->error;
    }
}
?>
