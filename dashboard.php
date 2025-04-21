<?php
include (".includes/header.php");
$title = "Dashboard";
// Menyertakan file untuk menampilkan notifikasi (jika ada)
include '.includes/toast_notification.php';

$query = "SELECT COUNT(id_buku) as jumlah FROM buku;";
$user_query = "SELECT COUNT(id_user) as jumlah FROM anggota;";
$peminjaman_query = "SELECT COUNT(peminjaman_id) as jumlah FROM peminjaman;";
$data_peminjaman = mysqli_query($conn, $peminjaman_query);
$data_buku = mysqli_query($conn, $query);
$data_user = mysqli_query($conn, $query);
$peminjaman_count =  $data_peminjaman->fetch_assoc()["jumlah"] ?? 0;
$buku_count =  $data_buku->fetch_assoc()["jumlah"] ?? 0;
$anggota_count =  $data_user->fetch_assoc()["jumlah"] ?? 0;

?>
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Card untuk menampilkan tabel peminjaman -->
    <div class="card">
        <!-- Tabel dengan baris yang dapat di-hover -->
            <!-- Header Tabel -->
            <!-- <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Semua Aktivitas</h4>
            </div> -->
        <div class="card-body">
            <!-- Tabel responsif -->
            <div class="table-responsive text-nowrap">
            <div class="col-sm-7">
                    <div class="card-body">
                        <h2 class="card-title text-primary" style="font-weight : bold;">Selamat datang di menu Admin</h2>
                        <p class="mb-4" style="font-size : 1.2rem;">
                        Silahkan akses menu admin dari side bar yang ada di kiri !
                        </p>

                        <a href="peminjaman.php" class="btn btn-sm btn-outline-primary">Lihat Peminjaman</a>
                    </div>
                    </div>
            </div>
        </div>

      
        <!-- Akhir tabel dengan baris yang dapat di-hover -->
    </div>

    <div class="grid" style="display : grid; grid-template-columns : repeat(3, 33%) ; gap : 1rem ;  margin-top : 2rem;">
        <div class="row-12 mb-4">
            <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                    <h5 class="text-nowrap mb-2">Data Buku</h5>
                    <span class="badge bg-label-warning rounded-pill">Total</span>
                    </div>
                    <div class="mt-sm-auto">
                 
                    <h3 class="text-success mb-0"><?=$buku_count?> buku</h3>
                    </div>
                </div>
                <div id="profileReportChart"></div>
                </div>
            </div>
            </div>
        </div>

        <div class="row-12 mb-4">
            <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                    <h5 class="text-nowrap mb-2">Data Peminjaman</h5>
                    <span class="badge bg-label-warning rounded-pill">Total</span>
                    </div>
                    <div class="mt-sm-auto">
                 
                    <h3 class="text-primary mb-0"><?=$peminjaman_count?> peminjaman</h3>
                    </div>
                </div>
                <div id="profileReportChart"></div>
                </div>
            </div>
            </div>
        </div>

        <div class="row-12 mb-4">
            <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                    <h5 class="text-nowrap mb-2">Data Anggota</h5>
                    <span class="badge bg-label-warning rounded-pill">Total</span>
                    </div>
                    <div class="mt-sm-auto">
                  
                    <h3 class="mb-0 text-warning"><?=$anggota_count?> orang</h3>
                    </div>
                </div>
                <div id="profileReportChart"></div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php
include (".includes/footer.php");
?>