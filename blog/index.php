<?php
// index.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LatichaLibrary - Peminjaman Buku Online</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    /* Navbar */
    .navbar {
      background: rgba(70, 105, 187, 0.85);
    }
    .navbar-brand {
      font-size: 1.8rem;
      font-weight: bold;
    }
    /* Hero Section */
    .hero {
      background: url('assets/library-bg.jpg') no-repeat center center/cover;
      min-height: 80vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: #rgba;
      text-shadow: 1px 1px 5px rgba(0,0,0,0.7);
      padding: 0 20px;
    }
    .hero h1 {
      font-size: 3rem;
    }
    .hero p {
      font-size: 1.3rem;
      margin-top: 20px;
    }
    .hero .btn {
      margin-top: 30px;
      padding: 10px 30px;
      font-size: 1.2rem;
      border-radius: 50px;
      background-color:rgb(229, 161, 165);
      color: #000;
      border: none;
    }
    .hero .btn:hover {
      background-color:rgb(185, 70, 97);
      color: #000;
    }
    /* Content Sections */
    .content-section {
      padding: 60px 20px;
      background-color: #fff;
    }
    .content-section h2 {
      font-size: 2.5rem;
      margin-bottom: 20px;
    }
    .content-section p {
      font-size: 1.2rem;
    }
    /* Features Section */
    .features .feature-box {
      background: #4b6cb7;
      color: #fff;
      padding: 30px 20px;
      border-radius: 10px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.15);
      transition: transform 0.3s;
    }
    .features .feature-box:hover {
      transform: translateY(-5px);
    }
    .features .feature-box img {
      width: 64px;
      height: 64px;
    }
    .features .feature-box h4 {
      margin-top: 15px;
      font-size: 1.5rem;
    }
    /* Footer */
    .footer {
      background-color:rgba(70, 105, 187, 0.85);
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .hero h1 {
        font-size: 2.5rem;
      }
      .hero p {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">LatichaLibrary</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#about">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="#features">Fitur</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- HERO SECTION -->
<section class="hero">
  <h1>Selamat Datang di LatichaLibrary</h1>
  <p>Pinjam mudah, baca puas, kembali tepat!</p>
  <a href="#about" class="btn">Pelajari Lebih Lanjut</a>
</section>

<!-- ABOUT SECTION -->
<section id="about" class="content-section">
  <div class="container text-center">
    <h2>Tentang Kami</h2>
    <p>LatichaLibrary adalah platform inovatif yang memudahkan proses peminjaman dan pengembalian buku secara online. Nikmati kemudahan mengakses koleksi buku dan kelola transaksi dengan sistem yang sederhana, aman, dan cepat.</p>
  </div>
</section>

<!-- FEATURES SECTION -->
<section id="features" class="content-section bg-white">
  <div class="container text-center">
    <h2>Fitur Unggulan</h2>
    <div class="row features mt-4">
      <div class="col-md-4 mb-4">
        <div class="feature-box p-4">
          <img src="https://img.icons8.com/fluency/96/ffffff/book.png" alt="Peminjaman Buku">
          <h4 class="mt-3">Peminjaman Buku Online</h4>
          <p>Proses peminjaman yang cepat tanpa harus antri.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="feature-box p-4">
          <img src="https://img.icons8.com/color/96/ffffff/return-book.png" alt="Pengembalian Buku">
          <h4 class="mt-3">Pengembalian Buku Cepat</h4>
          <p>Sistem pengembalian yang efisien dan real-time.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="feature-box p-4">
          <img src="https://img.icons8.com/fluency/96/ffffff/search.png" alt="Pencarian Buku">
          <h4 class="mt-3">Pencarian Buku Cepat</h4>
          <p>Temukan buku favoritmu dengan fitur pencarian yang intuitif.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CONTACT SECTION -->
<section id="contact" class="content-section">
  <div class="container text-center">
    <h2>Kontak kami</h2>
    <p>Untuk informasi lebih lanjut, hubungi saja kami karena kebetulan kami masi pengangguran</p>
     <p> - email: info@latichalibrary.com </p>  
     <p> - telepon: (+62) 82124134714</p> 
  </div>
</section>
<!-- FOOTER -->
<footer class="footer">
  <div class="container">
    <p>&copy; 2025 TIM LATICHA RPL SMKN 4 Tanjungpinang</p>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>