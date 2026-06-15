<?php
// TiketRegular.php
require_once 'Tiket.php';

class TiketRegular extends Tiket {
    // Properti tambahan spesifik
    private $tipeAudio;
    private $lokasiBaris;

    // Constructor kelas anak
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        // Memanggil constructor dari class induk (Tiket)
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Mengimplementasikan abstract method dari induk
    public function hitungTotalHarga() {
        // Formulasi dasar awal: harga dasar dikali jumlah kursi
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    public function tampilkanInfoFasilitas() {
        return "Tipe Audio: " . $this->tipeAudio . ", Lokasi Baris: " . $this->lokasiBaris;
    }
}
?>