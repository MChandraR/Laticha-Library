<?php
// Menghubungkan file konfigurasi database
include 'config.php';

// Memulai sesi PHP
session_start();

// Mendapatkan ID pengguna dari sesi
$userId = $_SESSION["anggota_id"];

// Mendapatkan form untuk menambahkan postingan baru
if (isset($_POST['simpan'])) {
    // Mendapatkan data dari form
    $judulBuku = $_POST["judulBuku"]; // Judul postingan
    $penulis = $_POST["penulis"]; // Konten postingan
    $tahun_publikasi = $_POST["tahun_publikasi"]; // ID aktivitas
   
    // Jika unggahan berhasil, masukkan
    // data postingan ke dalam database
    $query = "INSERT INTO buku (judul_buku, penulis, tahun_publikasi) VALUES ('$judulBuku', '$penulis', '$tahun_publikasi')";
    if ($conn->query($query) === TRUE) {
        // Notifikasi berhasil jika postingan berhasil ditambahkan
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'books successfully added.'
        ];
    } else {
        // Notifikasi error jika gagal menambahkan postingan
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'error adding books: ' . $conn->error
        ];
   
        return;
    }

    // Arahkan ke halaman dashboard setelah selesai
    header('Location: buku.php');
    exit();
}

// Proses penghapusan postingan
if (isset($_GET['id_buku'])) {
    // Mengambil ID books dari paramenter URL
    $booksID = $_GET['id_buku'];

    // Query untuk menghapus post berdasarkan ID
    $exec = mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$booksID'");

    // Menyimpan notifikasi kerberhasilan atau kegagalan ke dalam session
    if ($exec) {
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'books successfully deleted.'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Error deleting post: ' . mysqli_error($conn)
        ];
    }

    // Redirect kembali ke dalam halaman dashboard
    header('Location: buku.php');
    exit();
}

// Menangani pembaruan data postingan
if (isset($_POST['update'])) {
    // Mendapatkan data dart form
    $id = $_POST['id_buku'];
    $judul = $_POST["judul_buku"];
    $penulis = $_POST["penulis"];
    $tahun_publikasi = $_POST["tahun_publikasi"];

    
    // Update data postingan di database
    $queryUpdate = "UPDATE buku SET judul_buku = '$judul',
        penulis = '$penulis', tahun_publikasi = $tahun_publikasi
        WHERE id_buku = $id";
        
    if ($conn->query($queryUpdate) === TRUE) {
        // Notifikasi berhasil
        $_SESSION['notification'] = [
            'type' => 'primary',
            'message' => 'Postingan berhasil diperbarui.'
        ];
    } else {
        // Notifikasi gagal
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Gagal memperbarui postingan.'
        ];
    }

    // Arahkan ke halaman dashboard
    header('Location: buku.php');
    exit();
}