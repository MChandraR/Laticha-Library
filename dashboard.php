<?php
include (".includes/header.php");
$title = "Dashboard";
// Menyertakan file untuk menampilkan notifikasi (jika ada)
include '.includes/toast_notification.php';
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
                        <h2 class="card-title text-primary">Selamat datang di menu Admin</h2>
                        <p class="mb-4" style="font-size : 1.2rem;">
                        Silahkan akses menu admin dari side bar yang ada di kiri !
                        </p>

                        <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
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
                    <h5 class="text-nowrap mb-2">Profile Report</h5>
                    <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                    </div>
                    <div class="mt-sm-auto">
                    <small class="text-success text-nowrap fw-semibold"
                        ><i class="bx bx-chevron-up"></i> 68.2%</small
                    >
                    <h3 class="mb-0">$84,686k</h3>
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
                    <h5 class="text-nowrap mb-2">Profile Report</h5>
                    <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                    </div>
                    <div class="mt-sm-auto">
                    <small class="text-success text-nowrap fw-semibold"
                        ><i class="bx bx-chevron-up"></i> 68.2%</small
                    >
                    <h3 class="mb-0">$84,686k</h3>
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