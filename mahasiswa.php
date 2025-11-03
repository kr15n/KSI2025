<?php
require 'koneksi.php';

$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="id">

<head>
</head>

<body class="bg-light">

    <main class="container py-5">

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-striped table-hover align-middle">
                        <tbody>
                            <?php
                            // --- 4. MODIFIKASI LOOPING DATA ---

                            $nomor = 1; // Untuk nomor urut

                            // Perulangan mengambil data dari hasil kueri
                            while ($mhs = mysqli_fetch_assoc($result)) {

                                // (Logika badge status tidak berubah)
                                $status_badge_class = 'bg-secondary';
                                if ($mhs['status'] == 'Aktif') {
                                    $status_badge_class = 'bg-success';
                                } elseif ($mhs['status'] == 'Cuti') {
                                    $status_badge_class = 'bg-warning text-dark';
                                } elseif ($mhs['status'] == 'Lulus') {
                                    $status_badge_class = 'bg-info text-dark';
                                }
                            ?>

                                <tr>
                                    <th scope="row"><?= $nomor; ?></th>

                                    <td><?= htmlspecialchars($mhs['nim']); ?></td>
                                    <td><?= htmlspecialchars($mhs['nama']); ?></td>
                                    <td><?= htmlspecialchars($mhs['jurusan']); ?></td>
                                    <td><?= htmlspecialchars($mhs['email']); ?></td>
                                    <td>
                                        <span class="badge <?= $status_badge_class; ?>">
                                            <?= htmlspecialchars($mhs['status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php
                                $nomor++; // Increment nomor urut
                            } // Akhir dari loop while
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </main>

</body>

</html>