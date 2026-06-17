<?php
// Tiket.php

abstract class Tiket {
    // Properti Terenkapsulasi (Biarkan tetap protected seperti di gambarmu)
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket;

    // Constructor untuk memetakan nilai
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }

    // Tambahkan Fungsi Getter di bawah ini agar bisa dipanggil di index.php
    public function getIdTiket() { 
        return $this->id_tiket; 
    }
    
    public function getNamaFilm() { 
        return $this->nama_film; 
    }
    
    public function getJadwalTayang() { 
        return $this->jadwal_tayang; 
    }
    
    public function getJumlahKursi() { 
        return $this->jumlah_kursi; 
    }
    
    public function getHargaDasarTiket() { 
        return $this->hargaDasarTiket; 
    }

    // Metode Abstrak
    abstract public function hitungTotalHarga();
    abstract public function tampilkanInfoFasilitas();
}
?>