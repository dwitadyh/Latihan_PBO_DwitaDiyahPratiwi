<?php
// TiketIMAX.php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    // Properti tambahan spesifik
    private $kacamata3dId;
    private $efekGerakFitur;

    // Constructor kelas anak
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Mengimplementasikan abstract method dari induk
    public function hitungTotalHarga() {
        // Formulasi dasar awal (bisa ditambahkan biaya IMAX nanti di Tahap 5)
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        return "ID Kacamata 3D: " . $this->kacamata3dId . ", Efek Gerak: " . $this->efekGerakFitur;
    }
}
?>