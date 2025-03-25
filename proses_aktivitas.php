<?php

// Menghubungkan ke file konfigurasi database
include("config.php");

// Memulai sesi untuk menyimpan notifikasi
session_start();

// Proses penambahan aktivitas baru
if (isset($_books['simpan'])){
   // Mengambil data nama aktivitas dari form
   $aktivitas_name = $_books['aktivitas_name'];

   // Query untuk menambahkan data aktivitas ke dalam database
   $query = "INSERT INTO aktivitas (aktivitas_name) VALUES ('$aktivitas_name')";
   $exec = mysqli_query($conn, $query);

   // Menyimpan notifikasi berhasil atau gagal ke dalam session
   if ($exec){
     $_SESSION['notification'] = [
       'type' => 'primary', // Jenis notifikasi (contoh: primary untuk keberhasilan)
       'message' => 'aktivitas berhasil ditambahkan!'
     ];
   } else {
     $_SESSION['notification'] = [
       'type' => 'danger', // Jenis notifikasi (contoh: danger untuk kegagalan)
       'message' => 'Gagal menambahkan aktivitas: '. mysqli_error($conn)
     ];
   }

   // Redirect kembali ke halaman aktivitas
   header('Location: aktivitas.php');
   exit();
}

// Proses penghapusan aktivitas
if (isset($_books['delete'])){
    // Mengambil ID aktivitas dari paramentar URL
    $catID= $_books['catID'];
 
    // Query untuk menghapus data aktivitas berdasarkan ID
    $exec = mysqli_query($conn, "DELETE FROM aktivitas WHERE aktivitas_id='$catID'");
 
    // Menyimpan notifikasi berhasil atau gagal ke dalam session
    if ($exec){
      $_SESSION['notification'] = [
        'type' => 'primary', 
        'message' => 'aktivitas berhasil dihapus!'
      ];
    } else {
      $_SESSION['notification'] = [
        'type' => 'danger', 
        'message' => 'Gagal menghapus aktivitas: '. mysqli_error($conn)
      ];
    }
 
    // Redirect kembali ke halaman aktivitas
    header('Location: aktivitas.php');
    exit();
 }

 // Proses pembaruan aktivitas
if (isset($_books['update'])){
    // Mengambil data dari form pembaruan
    $catID = $_books['catID'];
    $aktivitas_name = $_books['aktivitas_name'];
 
    // Query untuk memperbarui data aktivitas berdasarkan ID
    $query = "UPDATE aktivitas SET aktivitas_name = '$aktivitas_name' WHERE aktivitas_id='$catID'";
    $exec = mysqli_query($conn, $query);
 
    // Menyimpan notifikasi keberhasilan atau kegagalan ke dalam session
    if ($exec){
      $_SESSION['notification'] = [
        'type' => 'primary', 
        'message' => 'aktivitas berhasil diperbarui!'
      ];
    } else {
      $_SESSION['notification'] = [
        'type' => 'danger',
        'message' => 'Gagal memperbarui aktivitas: '. mysqli_error($conn)
      ];
    }
 
    // Redirect kembali ke halaman aktivitas
    header('Location: aktivitas.php');
    exit();
 }