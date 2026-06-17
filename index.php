<?php
// index.php

// 1. Mengimport semua file class yang dibutuhkan
require_once 'koneksi/database.php';
require_once 'tiket.php';
require_once 'tiket_regular.php';
require_once 'tiket_imax.php';
require_once 'tiket_velvet.php';

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
    <title>Hogwarts Express - Tiket Sihir Bioskop</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;800&family=Special+Elite&display=swap" rel="stylesheet">

    <style>
        body {
            /* Latar belakang warna abu-abu gelap kastil malam hari */
            background-color: #1a1a1a;
            font-family: 'Special+Elite', serif;
        }
        .judul-magis {
            font-family: 'Cinzel', serif;
            letter-spacing: 2px;
            color: #e0b034; /* Warna emas magis */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        }
        /* Efek Kertas Perkamen Kuno Harry Potter */
        .perkamen {
            background-color: #f4eccf;
            background-image: radial-gradient(rgba(255,255,255,0.5), rgba(210,190,140,0.5));
            border: 3px double #8b6c25;
            color: #2b220f;
        }
        .form-select-sihir {
            background-color: #2b220f;
            color: #f4eccf;
            border: 2px solid #e0b034;
        }
        .form-select-sihir:focus {
            background-color: #3d3016;
            color: #f4eccf;
            border-color: #e0b034;
            box-shadow: 0 0 10px #e0b034;
        }
        /* Pembagian Warna Bertema Asrama Hogwarts */
        .header-gryffindor { background-color: #740001; color: #e0b034; border-bottom: 3px solid #e0b034; }
        .header-ravenclaw { background-color: #0e1a40; color: #946b2d; border-bottom: 3px solid #946b2d; }
        .header-slytherin { background-color: #1a472a; color: #aaaaaa; border-bottom: 3px solid #aaaaaa; }
    </style>
</head>
<body>

    <div class="container my-5">
        <div class="p-4 mb-4 text-center border-bottom border-warning">
            <h1 class="fw-bold judul-magis m-0">🧙‍♂️ HOGWARTS MOVIE MINISTRY ⚡</h1>
            <p class="text-warning-50 mt-2 mb-0" style="font-family: 'Cinzel', serif;">Sistem Polimorfisme Pemesanan Tiket Sihir Dinamis</p>
        </div>

        <div class="p-4 mb-5 perkamen rounded shadow">
            <label for="pilihStudio" class="form-label fw-bold" style="font-family: 'Cinzel', serif;">Mantra Penyaring Studio (Select Box) :</label>
            <select class="form-select form-select-lg form-select-sihir" id="pilihStudio" onchange="filterStudio()">
                <option value="semua">🔮 Tampilkan Semua Kamar Studio</option>
                <option value="regular">🦁 Gryffindor Room (Studio Regular - Tarif Standar)</option>
                <option value="imax">🦅 Ravenclaw Room (Studio IMAX - Tambahan Flat Rp 35.000)</option>
                <option value="velvet">🐍 Slytherin Room (Studio Velvet - Premium Surcharge 50%)</option>
            </select>
        </div>

        <div class="card border-0 shadow mb-5 perkamen blok-studio" id="studio-regular">
            <div class="card-header header-gryffindor py-3">
                <h3 class="card-title mb-0 fw-bold" style="font-family: 'Cinzel', serif;">🦁 Gryffindor House - Studio Regular</h3>
                <small>Tarif dasar murni tanpa biaya tambahan mantra fasilitas</small>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle m-0" style="color: #2b220f;">
                        <thead style="background-color: rgba(0,0,0,0.05);">
                            <tr>
                                <th class="ps-3">ID Mantra</th>
                                <th>Gulungan Film</th>
                                <th>Jam Tayang</th>
                                <th class="text-center">Sihir Kursi</th>
                                <th>Harga Dasar</th>
                                <th>Spesifikasi Unik Studio (Polimorfik)</th>
                                <th class="pe-3">Total Upeti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($daftarRegular)): ?>
                                <tr><td colspan="7" class="text-center py-4 text-muted">Belum ada burung hantu membawa pesan tiket Regular.</td></tr>
                            <?php else: ?>
                                <?php foreach ($daftarRegular as $tiket): ?>
                                    <tr>
                                        <td class="ps-3 fw-bold">#<?php echo $tiket->getIdTiket(); ?></td>
                                        <td class="fw-bold"><?php echo $tiket->getNamaFilm(); ?></td>
                                        <td>⏳ <?php echo date('d M Y - H:i', strtotime($tiket->getJadwalTayang())); ?></td>
                                        <td class="text-center"><span class="badge bg-dark text-warning"><?php echo $tiket->getJumlahKursi(); ?></span></td>
                                        <td>Rp <?php echo number_format($tiket->getHargaDasarTiket(), 0, ',', '.'); ?></td>
                                        <td>✨ <em><?php echo $tiket->tampilkanInfoFasilitas(); ?></em></td>
                                        <td class="pe-3 fw-bold text-danger">Rp <?php echo number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow mb-5 perkamen blok-studio" id="studio-imax">
            <div class="card-header header-ravenclaw py-3">
                <h3 class="card-title mb-0 fw-bold" style="font-family: 'Cinzel', serif;">🦅 Ravenclaw House - Studio IMAX</h3>
                <small>Dikenakan biaya ramuan flat Rp 35.000 (Layar Sihir Lebar & Audio Guntur)</small>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle m-0" style="color: #2b220f;">
                        <thead style="background-color: rgba(0,0,0,0.05);">
                            <tr>
                                <th class="ps-3">ID Mantra</th>
                                <th>Gulungan Film</th>
                                <th>Jam Tayang</th>
                                <th class="text-center">Sihir Kursi</th>
                                <th>Harga Dasar</th>
                                <th>Spesifikasi Unik Studio (Polimorfik)</th>
                                <th class="pe-3">Total Upeti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($daftarIMAX)): ?>
                                <tr><td colspan="7" class="text-center py-4 text-muted">Belum ada burung hantu membawa pesan tiket IMAX.</td></tr>
                            <?php else: ?>
                                <?php foreach ($daftarIMAX as $tiket): ?>
                                    <tr>
                                        <td class="ps-3 fw-bold">#<?php echo $tiket->getIdTiket(); ?></td>
                                        <td class="fw-bold"><?php echo $tiket->getNamaFilm(); ?></td>
                                        <td>⏳ <?php echo date('d M Y - H:i', strtotime($tiket->getJadwalTayang())); ?></td>
                                        <td class="text-center"><span class="badge bg-dark text-warning"><?php echo $tiket->getJumlahKursi(); ?></span></td>
                                        <td>Rp <?php echo number_format($tiket->getHargaDasarTiket(), 0, ',', '.'); ?></td>
                                        <td>✨ <em><?php echo $tiket->tampilkanInfoFasilitas(); ?></em></td>
                                        <td class="pe-3 fw-bold text-primary">Rp <?php echo number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow mb-5 perkamen blok-studio" id="studio-velvet">
            <div class="card-header header-slytherin py-3">
                <h3 class="card-title mb-0 fw-bold" style="font-family: 'Cinzel', serif;">🐍 Slytherin House - Studio Velvet</h3>
                <small>Dikenakan biaya pelayanan bangsawan murni sebesar 50% (Surcharge x1.50)</small>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle m-0" style="color: #2b220f;">
                        <thead style="background-color: rgba(0,0,0,0.05);">
                            <tr>
                                <th class="ps-3">ID Mantra</th>
                                <th>Gulungan Film</th>
                                <th>Jam Tayang</th>
                                <th class="text-center">Sihir Kursi</th>
                                <th>Harga Dasar</th>
                                <th>Spesifikasi Unik Studio (Polimorfik)</th>
                                <th class="pe-3">Total Upeti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($daftarVelvet)): ?>
                                <tr><td colspan="7" class="text-center py-4 text-muted">Belum ada burung hantu membawa pesan tiket Velvet.</td></tr>
                            <?php else: ?>
                                <?php foreach ($daftarVelvet as $tiket): ?>
                                    <tr>
                                        <td class="ps-3 fw-bold">#<?php echo $tiket->getIdTiket(); ?></td>
                                        <td class="fw-bold"><?php echo $tiket->getNamaFilm(); ?></td>
                                        <td>⏳ <?php echo date('d M Y - H:i', strtotime($tiket->getJadwalTayang())); ?></td>
                                        <td class="text-center"><span class="badge bg-dark text-warning"><?php echo $tiket->getJumlahKursi(); ?></span></td>
                                        <td>Rp <?php echo number_format($tiket->getHargaDasarTiket(), 0, ',', '.'); ?></td>
                                        <td>✨ <em><?php echo $tiket->tampilkanInfoFasilitas(); ?></em></td>
                                        <td class="pe-3 fw-bold" style="color: #1a472a;">Rp <?php echo number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></td>
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

    <script>
        function filterStudio() {
            let pilihan = document.getElementById("pilihStudio").value;
            
            let studioRegular = document.getElementById("studio-regular");
            let studioImax = document.getElementById("studio-imax");
            let studioVelvet = document.getElementById("studio-velvet");

            if (pilihan === "semua") {
                studioRegular.style.display = "block";
                studioImax.style.display = "block";
                studioVelvet.style.display = "block";
            } else if (pilihan === "regular") {
                studioRegular.style.display = "block";
                studioImax.style.display = "none";
                studioVelvet.style.display = "none";
            } else if (pilihan === "imax") {
                studioRegular.style.display = "none";
                studioImax.style.display = "block";
                studioVelvet.style.display = "none";
            } else if (pilihan === "velvet") {
                studioRegular.style.display = "none";
                studioImax.style.display = "none";
                studioVelvet.style.display = "block";
            }
        }
    </script>
</body>
</html>