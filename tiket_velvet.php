<?php
// TiketVelvet.php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    // Properti tambahan spesifik
    private $bantalSelimutPack;
    private $layananButler;

    // Constructor kelas anak
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Mengimplementasikan abstract method dari induk
    public function hitungTotalHarga() {
        // Formulasi dasar awal (bisa ditambahkan biaya Velvet nanti di Tahap 5)
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        return "Paket Bantal/Selimut: " . $this->bantalSelimutPack . ", Layanan Butler: " . $this->layananButler;
    }
}
?>