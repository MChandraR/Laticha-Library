<?php
// proses_pengembalian.php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["id_peminjaman"])) {
  $id_peminjaman = $_GET['id_peminjaman']??"";
  $tanggal_kembali = $_GET['tanggal_kembali']??"";

  include '../config.php';

  // Ambil data peminjaman (termasuk tanggal batas pengembalian)
  $query = "SELECT * FROM peminjaman WHERE peminjaman_id = $id_peminjaman";
  $result = mysqli_query($conn, $query);

  if ($row = mysqli_fetch_assoc($result)) {
    $tanggal_batas_kembali = $row['tgl_kembali']; // tanggal_kembali di sini adalah batas akhir
    $status = 'dikembalikan';

    // Hitung selisih hari
    $tgl_kembali = new DateTime();
    $tgl_batas = new DateTime($tanggal_batas_kembali);
    $selisih = $tgl_kembali->diff($tgl_batas)->days;

    // Cek apakah terlambat
    $terlambat = ($tgl_kembali > $tgl_batas) ? $selisih : 0;
    $denda = $terlambat * 5000;
    $kembali = $tgl_kembali->format('Y-m-d H:i:s');
    // Simpan pengembalian
    $update = "UPDATE peminjaman 
               SET tgl_dikembalikan = '$kembali', denda = $denda , status = '$status'
               WHERE peminjaman_id = $id_peminjaman";

    if (mysqli_query($conn, $update)) {
      echo "<script>
              alert('Buku berhasil dikembalikan. Keterlambatan: $terlambat hari. Denda: Rp " . number_format($denda, 0, ',', '.') . "');
              window.location='daftar_peminjaman.php';
            </script>";
    } else {
      echo "<script>alert('Gagal mengupdate data.'); history.back();</script>";
    }
  } else {
    echo "<script>alert('Data peminjaman tidak ditemukan.'); history.back();</script>";
  }

  mysqli_close($conn);
}
?>
