<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "crud_2_main"; // Change this line to use the correct database name

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}


if (isset($_POST['simpan'])) {
    $idDokter = $_POST['idDokter'];
    $nmDokter = $_POST['nmDokter'];
    $spesialisasi = $_POST['spesialisasi'];
    $noTelp = $_POST['noTelp'];
    
    $sql = "INSERT INTO kunjungan (idDokter, nmDokter, spesialisasi, noTelp) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("issi", $idDokter, $nmDokter, $spesialisasi, $noTelp);
    
    if ($stmt->execute()) {
        $stmt->close();
        header('Location: kunjungan.php');
        exit();
    } else {
        echo "Insert failed: " . $stmt->error;
    }
}


function ambilDataKunjungan() {
    global $koneksi;
    $sql = "SELECT * FROM kunjungan";
    $hasil = $koneksi->query($sql);
    return $hasil;
}


if (isset($_GET['idDokter'])) {
    $idDokter = $_GET['idDokter'];
    
    $sql = "DELETE FROM kunjungan WHERE idDokter = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $idDokter);
    
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: kunjungan.php");
        exit();
    } else {
        echo "Delete failed: " . $stmt->error;
    }
}


if (isset($_POST['update'])) {
    $idDokter = $_POST['idDokter'];
    $nmDokter = $_POST['nmDokter'];
    $spesialisasi = $_POST['spesialisasi'];
    $noTelp = $_POST['noTelp'];
    
    $sql = "UPDATE kunjungan SET nmDokter=?, spesialisasi=?, noTelp=? WHERE idDokter=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssii", $nmDokter, $spesialisasi, $noTelp, $idDokter);
    
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: kunjungan.php");
        exit();
    } else {
        echo "Update failed: " . $stmt->error;
    }
}
?>
