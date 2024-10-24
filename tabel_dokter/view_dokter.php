<?php
if (!empty($isiTabelDokter)) {
    foreach ($isiTabelDokter as $row) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['idpasien']); ?></td>
            <td><?= htmlspecialchars($row['nmpasien']); ?></td>
            <td><?= htmlspecialchars($row['jk']); ?></td>
            <td><?= htmlspecialchars($row['alamat']); ?></td>
            <td>
                <a href="editpasien.php?edit=<?= $row['idpasien']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="konek.php?idpasien=<?= $row['idpasien']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
    <?php 
    }
} else {
    echo "<tr><td colspan='6' class='text-center'>No data available</td></tr>";
}
?>
