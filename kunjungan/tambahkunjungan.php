<html>
    <head>
        <title>Tambah Data Kunjungan</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row mt-3">
                <div class="col-4">
                    <h3>Tambah Data Kunjungan</h3>
                    <form action="konek.php" method="POST">
                        <div class="form-group">
                            <label for="idDokter">ID Dokter</label>
                            <input type="text" class="form-control mb-3" name="idDokter" placeholder="ID Dokter">
                        </div>
                        <div class="form-group">
                            <label for="nmDokter">Nama Dokter</label>
                            <input type="text" class="form-control mb-3" name="nmDokter" placeholder="Nama Dokter">
                        </div>
                        <div class="form-group">
                            <label for="spesialisasi">Spesialisasi</label>
                            <input type="text" class="form-control mb-3" name="spesialisasi" placeholder="Spesialisasi">
                        </div>
                        <div class="form-group">
                            <label for="noTelp">No. Telepon</label>
                            <input type="text" class="form-control mb-3" name="noTelp" placeholder="No. Telepon">
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" name="simpan" value="Simpan" class="form-control btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
