<?php
// TiketIMAX.php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Query untuk mengambil semua data tiket IMAX
    public static function ambilDataIMAX($db) {
        $query = "SELECT id_tiket, nama_film, jadwal_tayang, jumlah_kursi, harga_dasar_tiket, kacamata_3d_id, efek_gerak_fitur 
                  FROM tabel_tiket 
                  WHERE jenis_studio = 'imax'";
        
        $result = $db->conn->query($query);
        $daftarTiket = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $daftarTiket[] = new TiketIMAX(
                    $row['id_tiket'],
                    $row['nama_film'],
                    $row['jadwal_tayang'],
                    $row['jumlah_kursi'],
                    $row['harga_dasar_tiket'],
                    $row['kacamata_3d_id'],
                    $row['efek_gerak_fitur']
                );
            }
        }
        return $daftarTiket;
    }

    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    public function tampilkanInfoFasilitas() {
        return "ID Kacamata 3D: " . $this->kacamata3dId . ", Efek Gerak: " . $this->efekGerakFitur;
    }
}
?>