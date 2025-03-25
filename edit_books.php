<?php
// Memasukkan file konfigurasi database
include 'config.php';

// Memasukkan header halaman
include '.includes/header.php';

// Mengambil ID postingan yang akan diedit dari parameter URL
//../edit_post.php?post_id=
$postIdToEdit = $_GET['books_id']; // Pastikan parameter 'post_id' ada di URL

// Query untuk mengambil data postingan berdasarkan ID
$query = "SELECT * FROM books WHERE id_books = $booksIdToEdit";
$result = $conn->query($query);

// Memeriksa apakah data postingan ditemukan
if ($result->num_rows > 0) {
    $post = $result->fetch_assoc(); // Mengambil data postingan ke dalam array
} else {
    // Menampilkan pesan jika postingan tidak ditemukan
    echo "Post not found.";
    exit(); // Menghentikan eksekust jika tidak ada postingas
}
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Judul halaman -->
     <div class="row">
        <!--. Form untuk mengedit postingan -->
        <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-body">
                    <!-- Formulir menggunakan metode POST untuk mengirim data -->
                    <form method="books" action="proses_books.php" enctype="multipart/form-data">
                        <!-- Input tersembunyi untuk menyimpan ID postingan -->
                        <input type="hidden" name="books_id" value="<?php echo $booksIdToEdit; ?>">
                        
                        <!-- Input untuk judul postingan -->
                        <div class="mb-3">
                            <label for="books_title" class="form-label">Judul Postingan</label>
                            <input type="text" class="form-control" id="books_title" name="post_title" value="<?php echo $books['books_title']; ?>" required>
                        </div>
                        
                        <!-- Input untuk unggah gambar -->
                         <div class="mb-3">
                            <label for="formFile" Elass="form-label">Unggah Gambar</label>
                            <input class="form-control" type="file" id="formFile" name="image_path" accept="image/*">
                            <?php if (!empty($books['image_path'])): ?>
                                <!-- Menampilkan gambar yang sudah diunggah -->
                                <div class="mt-2">
                                    <img src="<?= $books['image_path']; ?>" alt="CurrentImage" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Dropdown untuk aktivitas -->
                        <div class="mb-3">
                            <label for="aktivitas_id" class="form-label">aktivitas</label>
                            <select class="form-select" id="aktivitas_id" name="aktivitas_id" required>
                                <option value="" selected disabled>Select one</option>
                                <?php
                                // Mengambil data aktivitas dari database
                                $queryaktivitas = "SELECT * FROM aktivitas";
                                $resultaktivitas = $conn->query($queryaktivitas);
                                // Menambahkan opsi ke dropdown
                                if ($resultaktivitas->num_rows > 0) {
                                    while ($row = $resultaktivitas->fetch_assoc()) {
                                        // Menandai aktivitas yang sudah dipilih
                                        $selected= ($row["aktivitas_id"] == $books['aktivitas_id']) ? "selected" : "";
                                        echo "<option value='". $row["aktivitas_id"]. "' $selected>" . $row["aktivitas_name"]. "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        
                        <!-- Textarea untuk konten postingan -->
                        <div class="mb-3">
                            <label for="content" class="form-label">Konten</label>
                            <textarea class="form-control" id="content" name="content" required><?php echo $books['content']; ?></textarea>
                        </div>
                        
                        <!-- Tombol untuk memperbarui postingan -->
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php
// Memasukkan footer halaman
include '.includes/footer.php';
?>