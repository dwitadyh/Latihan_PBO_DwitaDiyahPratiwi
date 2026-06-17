<?php
// index.php

// 1. Mengimport semua file class yang dibutuhkan
require_once 'koneksi/database.php';
require_once 'Tiket.php';
require_once 'TiketRegular.php';
require_once 'TiketIMAX.php';
require_once 'TiketVelvet.php';

// 2. Instansiasi objek database
$db = new Database();

// 3. Mengambil kumpulan objek data tiket dari database
$daftarRegular = TiketRegular::ambilDataRegular($db);
$daftarIMAX    = TiketIMAX::ambilDataIMAX($db);
$daftarVelvet  = TiketVelvet::ambilDataVelvet($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Daftar Tiket Bioskop</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="p-4 mb-5 bg-white rounded shadow-sm text-center">
            <h1 class="fw-bold text-dark m-0">DAFTAR TIKET PENONTON BIOSKOP</h1>
            <p class="text-muted mt-2 mb-0">Manajemen Data Pemesanan Tiket Berbasis Objek (PBO)</p>
        </div>

        <div class="card border-0 shadow-sm mb-5">
            <div class="card-header bg-info text-white py-3">
                <h3 class="card-title mb-0 fw-semibold">1. Studio Regular</h3>
                <small class="text-white-50">Tarif standar murni tanpa biaya tambahan fasilitas</small>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle m-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">ID</th>
                                <th>Nama Film</th>
                                <th>Jadwal Tayang</th>
                                <th class="text-center">Kursi</th>
                                <th>Harga Dasar</th>
                                <th>Fasilitas Tambahan</th>
                                <th class="pe-3">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($daftarRegular)): ?>
                                <tr><td colspan="7" class="text-center py-4 text-muted">Tidak ada data tiket regular.</td></tr>
                            <?php else: ?>
                                <?php foreach ($daftarRegular as $tiket): ?>
                                    <tr>
                                        <td class="ps-3 fw-bold text-secondary">#<?php echo $tiket->getIdTiket(); ?></td>
                                        <td class="fw-semibold text-dark"><?php echo $tiket->getNamaFilm(); ?></td>
                                        <td><?php echo date('d M Y - H:i', strtotime($tiket->getJadwalTayang())); ?> WIB</td>
                                        <td class="text-center"><span class="badge bg-secondary"><?php echo $tiket->getJumlahKursi(); ?></span></td>
                                        <td>Rp <?php echo number_format($tiket->getHargaDasarTiket(), 0, ',', '.'); ?></td>
                                        <td><span class="text-muted small"><?php echo $tiket->tampilkanInfoFasilitas(); ?></span></td>
                                        <td class="pe-3 fw-bold text-info">Rp <?php echo number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-5">
            <div class="card-header bg-primary text-white py-3">
                <h3 class="card-title mb-0 fw-semibold">2. Studio IMAX</h3>
                <small class="text-white-50">Dikenakan biaya tambahan flat Rp 35.000 (Layar Lebar & Audio)</small>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle m-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">ID</th>
                                <th>Nama Film</th>
                                <th>Jadwal Tayang</th>
                                <th class="text-center">Kursi</th>
                                <th>Harga Dasar</th>
                                <th>Fasilitas Tambahan</th>
                                <th class="pe-3">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($daftarIMAX)): ?>
                                <tr><td colspan="7" class="text-center py-4 text-muted">Tidak ada data tiket IMAX.</td></tr>
                            <?php else: ?>
                                <?php foreach ($daftarIMAX as $tiket): ?>
                                    <tr>
                                        <td class="ps-3 fw-bold text-secondary">#<?php echo $tiket->getIdTiket(); ?></td>
                                        <td class="fw-semibold text-dark"><?php echo $tiket->getNamaFilm(); ?></td>
                                        <td><?php echo date('d M Y - H:i', strtotime($tiket->getJadwalTayang())); ?> WIB</td>
                                        <td class="text-center"><span class="badge bg-secondary"><?php echo $tiket->getJumlahKursi(); ?></span></td>
                                        <td>Rp <?php echo number_format($tiket->getHargaDasarTiket(), 0, ',', '.'); ?></td>
                                        <td><span class="text-muted small"><?php echo $tiket->tampilkanInfoFasilitas(); ?></span></td>
                                        <td class="pe-3 fw-bold text-primary">Rp <?php echo number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-5">
            <div class="card-header text-white py-3" style="background-color: #6f42c1;">
                <h3 class="card-title mb-0 fw-semibold">3. Studio Velvet</h3>
                <small class="text-white-50">Dikenakan biaya tambahan kelas premium sebesar 50% dari total harga dasar</small>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle m-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">ID</th>
                                <th>Nama Film</th>
                                <th>Jadwal Tayang</th>
                                <th class="text-center">Kursi</th>
                                <th>Harga Dasar</th>
                                <th>Fasilitas Tambahan</th>
                                <th class="pe-3">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($daftarVelvet)): ?>
                                <tr><td colspan="7" class="text-center py-4 text-muted">Tidak ada data tiket Velvet.</td></tr>
                            <?php else: ?>
                                <?php foreach ($daftarVelvet as $tiket): ?>
                                    <tr>
                                        <td class="ps-3 fw-bold text-secondary">#<?php echo $tiket->getIdTiket(); ?></td>
                                        <td class="fw-semibold text-dark"><?php echo $tiket->getNamaFilm(); ?></td>
                                        <td><?php echo date('d M Y - H:i', strtotime($tiket->getJadwalTayang())); ?> WIB</td>
                                        <td class="text-center"><span class="badge bg-secondary"><?php echo $tiket->getJumlahKursi(); ?></span></td>
                                        <td>Rp <?php echo number_format($tiket->getHargaDasarTiket(), 0, ',', '.'); ?></td>
                                        <td><span class="text-muted small"><?php echo $tiket->tampilkanInfoFasilitas(); ?></span></td>
                                        <td class="pe-3 fw-bold" style="color: #6f42c1;">Rp <?php echo number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>