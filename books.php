<?php
// Menyertakan keader halaman
include '.includes/header.php';
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Judul halaman -->
     <div class="row">
        <!-- Form untuk menambahkan postingan baru -->
         <div class="col-md-10">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="books" action="proses_books.php" enctype="multipart/form-data">
                        <!-- Input untuk judul postingan -->
                        <div class="mb-3">
                            <label for="books_title" class="form-tabel">Judul Postingan</label>
                            <input type="text" class="form-control"name="books_title" required>
                        </div>
                        <!-- Input untuk mengunggah gambar -->
                        <div class="mb-3">
                            <label for="formFile" class="form-tabel">Unggah Gambar</label>
                            <input class="form-control" type="file" name="image" accept="image/*">
                        </div>
                        <!-- Dropdown untuk memilih aktivitas -->
                        <div class="mb-3">
                            <label for="aktivitas_id" class="form-label">aktivitas</label>
                            <select class="form-select" name="aktivitas_id" required>
                                <!-- Mengambil data aktivitas dari database untuk mengisi opsi dropdown -->
                                <option value="" selected disabled>Pilih salah satu</option>
                                <?php
                                $query = "SELECT * FROM aktivitas"; // Query untuk mangambil data aktivitas
                                $result = $conn->query($query); // Menjalankan query
                                if ($result->num_rows > 0) { // Jika terdapat data aktivitas
                                    while ($row = $result->fetch_assoc()) { // Iterasi setiap aktivitas
                                        echo "<option value='" . $row["aktivitas_id"] . "'>" . $row["aktivitas_name"] . "</option>";
                                       }
                                    }
                                    ?>
                            </select>
                        </div>
                        <!-- Textarea untuk konten postingan -->
                        <div class="mb-3">
                            <label for="content" class="form-label">Konten</label>
                            <textarea class="form-content" id="content" name="content" required></textarea>
                        </div>
                        <!-- Tombol submit -->
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// Menyertakan footer halaman
include '.includes/footer.php';
?>