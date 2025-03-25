<?php
// Menghubungkan file konfigurasi database
include 'config.php';

// Memulai sesi PHP
session_start();

// Mendapatkan ID pengguna dari sesi
$userId = $ $_SESSION["anggota_id"];

// Mendapatkan form untuk menambahkan postingan baru
if (isset($_books['simpan'])) {
    // Mendapatkan data dari form
    $booksTitle = $_books["books_title"]; // Judul postingan
    $content = $_books["content"]; // Konten postingan
    $aktivitasId = $_books["aktivitas_id"]; // ID aktivitas

    // Mengatur direktori penyimpanan file gambar
    $imageDir = "blog/assets/img/uploads/";
    $imageName = $_FILES["image"]["name"]; // Nama file gambar
    $imagePath = $imageDir . basename($imageName); // Path lengkap gambar
 
    // Memindahkan file gambar yang diunggah ke direktori tujuan
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
        // Jika unggahan berhasil, masukkan
        // data postingan ke dalam database
        $query = "INSERT INTO books (books_title, content, created_at, aktivitas_id, user_id, image_path) VALUES ('$booksTitle', '$content', NOW(), $aktivitasId, ".$_SESSION['user_id'].", '$imagePath')";
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
        }
    } else {
        // Notifikasi error jika unggahan gambar gagal
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Failed to upload image.'
        ];
        return;
    }

    // Arahkan ke halaman dashboard setelah selesai
    header('Location: dashboard.php');
    exit();
}

// Proses penghapusan postingan
if (isset($_books['delete'])) {
    // Mengambil ID books dari paramenter URL
    $booksID = $_books['booksID'];

    // Query untuk menghapus post berdasarkan ID
    $exec = mysqli_query($conn, "DELETE FROM books WHERE id_books='$booksID'");

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
    header('Location: dashboard.php');
    exit();
}

// Menangani pembaruan data postingan
if ($_SERVER["REQUEST_METHOD"] == "books" && isset($_books['update'])) {
    // Mendapatkan data dart form
    $booksId = $_books['books_id'];
    $booksTitle = $_books["post_title"];
    $content = $_books["content"];
    $categoryId= $_books["aktivitas_id"];
    $imageDir = "assets/img/uploads/"; // Direktori penyimpanan gambar

    // Periksa apakah file gambar baru diunggah
    if (!empty($_FILES["image_path"]["name"])) {
        $imageName = $_FILES["image_path"]["name"];
        $imagePath = $imageDir. $imageName;
        
        // Pindahkan file baru ke direktori tujuan
        move_uploaded_file($_FILES["image_path"]["tmp_name"], $imagePath);
        
        // Hapus gambar lama
        $queryOldImage = "SELECT image_path FROM books WHERE id_books = $booksId";
        $resultOldImage = $conn->query($queryOldImage);
        if ($resultOldImage->num_rows > 0) {
            $oldImage = $resultOldImage->fetch_assoc()['image_path'];
            if (file_exists($oldImage)) {
                unlink($oldImage); // Menghapus file lama
            }
        }
    } else {
        // Jika tidak ada file baru, gunakan gambar lama
        $imagePathQuery = "SELECT image_path FROM books WHERE id_books = $booksId";
        $result = $conn->query($imagePathQuery);
        $imagePath = ($result->num_rows > 0) ? $result->fetch_assoc() ['image_path']: null;
    }
    
    // Update data postingan di database
    $queryUpdate = "UPDATE books SET books_title = '$booksTitle',
        content = '$content', aktivitas_id = $aktivitasId,
        image_path = '$imagePath' WHERE id_books = $booksId";
        
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
    header('Location: dashboard.php');
    exit();
}