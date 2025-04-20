<?php
// Menyertakan keader halaman
include '.includes/header.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Judul halaman -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="proses_books.php" enctype="multipart/form-data">
                <!-- Input untuk judul postingan -->
                <div class="mb-3">
                    <label for="books_title" class="form-tabel">Judul Buku</label>
                    <input type="text" class="form-control"name="judulBuku" required>
                </div>
                <!-- Input untuk mengunggah gambar -->
                <div class="mb-3">
                    <label for="formFile" class="form-tabel">Penulis</label>
                    <input class="form-control" type="text" name="penulis" accept="image/*">
                </div>
            
                <!-- Textarea untuk konten postingan -->
                <div class="mb-3">
                    <label for="formFile" class="form-tabel">Tahun Publikasi</label>
                    <input class="form-control" type="number" id="tahun_publikasi" name="tahun_publikasi" required></textarea>
                </div>
                <!-- Tombol submit -->
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
       
</div>
<?php
// Menyertakan footer halaman
include '.includes/footer.php';
?>