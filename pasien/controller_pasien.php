<?php
include 'model_pasien.php';
$isiTabelPasien = getTabelPasien();
$no = 1; // Add this line to initialize the $no variable
include 'view_pasien.php';
?>
