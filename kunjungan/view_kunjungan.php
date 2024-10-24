<html>
<head>
    <title>My App | Halaman Utama</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/5FnGE8fJT3GXwEOn9v7tzT2NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcfY0tY3lHB6ONNxmXC5g5fDVZLEsAaA55NDzOxhy9GkcIdsIKleN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="kunjungan.php" class="navbar-brand">My App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="../pasien/pasien.php" class="nav-link" aria-current="page">Pasien</a>
                        </li>
                        <li class="nav-item">
                            <a href="../tabel_dokter/dokter.php" class="nav-link" aria-current="page">Dokter</a>
                        </li>
                        <li class="nav-item">
                            <a href="kunjungan.php" class="nav-link" aria-current="page">Kunjungan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row mt-3">
            <div class="col-sm">
                <h3>Tabel Kunjungan</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="tambahkunjungan.php" class="btn btn-primary btn-sm d-flex justify-content-center">Tambah Data</a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Dokter</th>
                            <th>Nama Dokter</th>
                            <th>Spesialisasi</th>
                            <th>No. Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($isiTabelKunjungan)) {
                            foreach ($isiTabelKunjungan as $data) { 
                                ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($data['idDokter']); ?></td>
                                    <td><?= htmlspecialchars($data['nmDokter']); ?></td>
                                    <td><?= htmlspecialchars($data['spesialisasi']); ?></td>
                                    <td><?= htmlspecialchars($data['noTelp']); ?></td>
                                    <td>
                                        <a href="editkunjungan.php?edit=<?= $data['idDokter']; ?>" class="btn btn-warning btn-sm">Edit</a> 
                                        <a href="konek.php?idDokter=<?= $data['idDokter']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            <?php 
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No data available</td></tr>";
                        }
                        ?>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>