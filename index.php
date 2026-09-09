<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Poliklinik Udinus</title>

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/logo_dinus.png">

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
        }

        /* Hover Card Login */
        .login-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.18) !important;
        }

        /* Hero Image */
        .hero-image {
            height: 390px;
            object-fit: cover;
        }

        /* Card Image */
        .login-image {
            height: 220px;
            object-fit: cover;
        }

        @media (max-width: 991.98px) {
            .hero-image {
                height: 300px;
            }
        }

        @media (max-width: 767.98px) {
            .hero-image {
                height: 250px;
            }

            .login-image {
                height: 200px;
            }
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Background -->
    <div class="position-fixed top-0 start-0 w-100 h-100" style="
            background:
                linear-gradient(rgba(5, 15, 25, 0.72), rgba(5, 15, 25, 0.82)),
                url('assets/images/hospitalbg.jpg') center center / cover no-repeat;
            z-index: -1;
        ">
    </div>


    <!-- ================= NAVBAR ================= -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top py-3">

        <div class="container">

            <!-- Logo / Brand -->
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#beranda">

                <img src="assets/images/logo_dinus.png" alt="Logo" width="38" height="38" class="me-2">

                <span>Poliklinik Udinus</span>
            </a>


            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>


            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarMenu">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item mx-lg-2">
                        <a class="nav-link active" href="#beranda">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item mx-lg-2">
                        <a class="nav-link" href="#layanan">
                            Layanan
                        </a>
                    </li>

                    <li class="nav-item mx-lg-2">
                        <a class="nav-link" href="#informasi">
                            Informasi
                        </a>
                    </li>

                    <li class="nav-item mx-lg-2">
                        <a class="nav-link" href="#tentang">
                            Tentang Kami
                        </a>
                    </li>

                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        <span class="badge bg-success px-3 py-2">
                            Bimbingan Karir WD-08
                        </span>
                    </li>

                </ul>

            </div>
        </div>
    </nav>


    <!-- ================= MAIN CONTENT ================= -->
    <main class="flex-grow-1">


        <!-- ================= HERO ================= -->
        <section id="beranda" class="py-5">

            <div class="container py-lg-4">

                <div class="card border-0 rounded-3 overflow-hidden shadow-lg bg-dark">

                    <div class="row g-0 align-items-stretch">

                        <!-- ================= HERO TEXT ================= -->
                        <div class="col-lg-8 d-flex">

                            <div class="p-4 p-md-5 d-flex flex-column w-100">

                                <!-- Badge -->
                                <div class="mb-3">
                                    <span class="badge bg-success rounded-pill px-3 py-2">
                                        <i class="fas fa-heartbeat me-2"></i>
                                        Poliklinik Universitas Dian Nuswantoro
                                    </span>
                                </div>


                                <!-- Heading -->
                                <h1 class="display-5 fw-bold text-white mb-3">
                                    Kesehatan Anda,
                                    <span class="text-success">
                                        Prioritas Kami.
                                    </span>
                                </h1>


                                <!-- Description -->
                                <p class="lead text-white-50 mb-4">
                                    Kami hadir untuk memberikan pelayanan kesehatan
                                    yang profesional, nyaman, dan mudah diakses bagi
                                    mahasiswa, karyawan, serta masyarakat umum.
                                </p>


                                <!-- ================= FEATURES ================= -->
                                <div class="row g-3 mb-4">

                                    <!-- Feature 1 -->
                                    <div class="col-lg-4 col-md-4">

                                        <div class="d-flex align-items-center text-white">

                                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3"
                                                style="
                                            width: 42px;
                                            height: 42px;
                                            min-width: 42px;
                                        ">

                                                <i class="fas fa-user-md"></i>

                                            </div>


                                            <div>

                                                <small class="text-white-50 d-block">
                                                    Tenaga Medis
                                                </small>

                                                <span class="fw-semibold">
                                                    Profesional
                                                </span>

                                            </div>

                                        </div>

                                    </div>


                                    <!-- Feature 2 -->
                                    <div class="col-lg-4 col-md-4">

                                        <div class="d-flex align-items-center text-white">

                                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                                style="
                                            width: 42px;
                                            height: 42px;
                                            min-width: 42px;
                                        ">

                                                <i class="fas fa-clinic-medical"></i>

                                            </div>


                                            <div>

                                                <small class="text-white-50 d-block">
                                                    Pelayanan
                                                </small>

                                                <span class="fw-semibold">
                                                    Cepat & Ramah
                                                </span>

                                            </div>

                                        </div>

                                    </div>


                                    <!-- Feature 3 -->
                                    <div class="col-lg-4 col-md-4">

                                        <div class="d-flex align-items-center text-white">

                                            <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                                                style="
                                            width: 42px;
                                            height: 42px;
                                            min-width: 42px;
                                        ">

                                                <i class="fas fa-hospital"></i>

                                            </div>


                                            <div>

                                                <small class="text-white-50 d-block">
                                                    Fasilitas
                                                </small>

                                                <span class="fw-semibold">
                                                    Lengkap & Nyaman
                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                <!-- ================= HERO BUTTON ================= -->
                                <!-- mt-auto membuat tombol berada di bagian bawah -->
                                <div class="mt-auto pt-4">

                                    <a href="#layanan" class="btn btn-success btn-lg w-100">

                                        Lihat Layanan

                                        <i class="fas fa-arrow-down ms-2"></i>

                                    </a>

                                </div>

                            </div>

                        </div>


                        <!-- ================= HERO PHOTO ================= -->
                        <div class="col-lg-4 d-flex justify-content-center align-items-center p-4">

                            <img src="assets/images/poli1.jpg" class="img-fluid w-100 rounded-3 shadow"
                                alt="Poliklinik Udinus" style="
                            aspect-ratio: 1 / 1;
                            object-fit: cover;
                            object-position: center;
                        ">

                        </div>

                    </div>

                </div>

            </div>

        </section>



        <!-- ================= LOGIN MENU ================= -->
        <section id="layanan" class="pb-5">

            <div class="container">


                <!-- Section Heading -->
                <div class="text-center text-white mb-5">

                    <span class="badge bg-success rounded-pill px-3 py-2 mb-3">
                        Portal Layanan
                    </span>

                    <h2 class="fw-bold display-6">
                        Pilih Akses Anda
                    </h2>

                    <p class="text-white-50 mx-auto" style="max-width: 650px;">

                        Masuk ke sistem Poliklinik Udinus sesuai dengan
                        hak akses Anda untuk menggunakan layanan yang tersedia.

                    </p>

                </div>


                <div class="row g-4 justify-content-center">


                    <!-- ================= PASIEN ================= -->
                    <div class="col-lg-4 col-md-6">

                        <div class="card h-100 border-0 shadow login-card overflow-hidden">

                            <div class="position-relative">

                                <img src="assets/images/pasien.jpg" class="card-img-top login-image" alt="Pasien">

                                <span class="position-absolute top-0 start-0 m-3 badge bg-success px-3 py-2">
                                    PASIEN
                                </span>

                            </div>


                            <div class="card-body p-4">

                                <div class="d-flex align-items-center mb-3">

                                    <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 55px; height: 55px; min-width: 55px;">

                                        <i class="fas fa-user fa-lg"></i>

                                    </div>

                                    <div>

                                        <h4 class="card-title fw-bold mb-0">
                                            Portal Pasien
                                        </h4>

                                        <small class="text-muted">
                                            Layanan kesehatan Anda
                                        </small>

                                    </div>

                                </div>


                                <p class="card-text text-muted">
                                    Akses layanan pasien untuk melakukan
                                    pendaftaran, melihat jadwal dokter,
                                    serta informasi pemeriksaan.
                                </p>

                            </div>


                            <div class="card-footer bg-white border-0 px-4 pb-4">

                                <a href="loginUser.php" class="btn btn-success w-100 py-2">

                                    <i class="fas fa-sign-in-alt me-2"></i>

                                    Masuk sebagai Pasien

                                </a>

                            </div>

                        </div>
                    </div>



                    <!-- ================= DOKTER ================= -->
                    <div class="col-lg-4 col-md-6">

                        <div class="card h-100 border-0 shadow login-card overflow-hidden">

                            <div class="position-relative">

                                <img src="assets/images/dokter.jpg" class="card-img-top login-image" alt="Dokter">

                                <span class="position-absolute top-0 start-0 m-3 badge bg-primary px-3 py-2">
                                    DOKTER
                                </span>

                            </div>


                            <div class="card-body p-4">

                                <div class="d-flex align-items-center mb-3">

                                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 55px; height: 55px; min-width: 55px;">

                                        <i class="fas fa-user-md fa-lg"></i>

                                    </div>

                                    <div>

                                        <h4 class="card-title fw-bold mb-0">
                                            Portal Dokter
                                        </h4>

                                        <small class="text-muted">
                                            Kelola layanan medis
                                        </small>

                                    </div>

                                </div>


                                <p class="card-text text-muted">
                                    Akses khusus dokter untuk melihat jadwal,
                                    mengelola pemeriksaan pasien, dan
                                    memberikan pelayanan medis.
                                </p>

                            </div>


                            <div class="card-footer bg-white border-0 px-4 pb-4">

                                <a href="login.php?role=dokter" class="btn btn-primary w-100 py-2">

                                    <i class="fas fa-sign-in-alt me-2"></i>

                                    Masuk sebagai Dokter

                                </a>

                            </div>

                        </div>
                    </div>



                    <!-- ================= ADMIN ================= -->
                    <div class="col-lg-4 col-md-6">

                        <div class="card h-100 border-0 shadow login-card overflow-hidden">

                            <div class="position-relative">

                                <img src="assets/images/admin.jpg" class="card-img-top login-image" alt="Admin">

                                <span class="position-absolute top-0 start-0 m-3 badge bg-warning text-dark px-3 py-2">
                                    ADMIN
                                </span>

                            </div>


                            <div class="card-body p-4">

                                <div class="d-flex align-items-center mb-3">

                                    <div class="bg-warning bg-opacity-25 text-dark rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 55px; height: 55px; min-width: 55px;">

                                        <i class="fas fa-user-cog fa-lg"></i>

                                    </div>

                                    <div>

                                        <h4 class="card-title fw-bold mb-0">
                                            Portal Admin
                                        </h4>

                                        <small class="text-muted">
                                            Manajemen sistem
                                        </small>

                                    </div>

                                </div>


                                <p class="card-text text-muted">
                                    Akses administrator untuk mengelola
                                    data dokter, pasien, jadwal, dan berbagai
                                    informasi dalam sistem.
                                </p>

                            </div>


                            <div class="card-footer bg-white border-0 px-4 pb-4">

                                <a href="login.php?role=admin" class="btn btn-warning w-100 py-2 fw-semibold">

                                    <i class="fas fa-sign-in-alt me-2"></i>

                                    Masuk sebagai Admin

                                </a>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </section>



        <!-- ================= INFORMASI ================= -->
        <section id="informasi" class="py-5">

            <div class="container">

                <div class="bg-white rounded-4 shadow-lg p-4 p-lg-5">

                    <div class="row g-5 align-items-center">


                        <!-- Kiri : Deskripsi -->
                        <div class="col-lg-6">


                            <span class="badge bg-success rounded-pill px-3 py-2 mb-3">
                                <i class="fas fa-hospital me-2"></i>
                                Informasi Poliklinik
                            </span>


                            <h2 class="fw-bold display-6 mb-3">
                                Layanan Kesehatan Lengkap
                                Untuk Kebutuhan Anda
                            </h2>


                            <p class="text-muted lead">

                                Poliklinik Udinus menyediakan layanan kesehatan
                                dengan tenaga medis profesional dan fasilitas yang
                                nyaman untuk mahasiswa, karyawan, serta masyarakat umum.

                            </p>


                            <p class="text-muted">

                                Kami menyediakan berbagai layanan pemeriksaan kesehatan
                                dengan tujuan memberikan pelayanan yang cepat,
                                mudah, dan berkualitas.

                            </p>



                            <!-- Statistik -->
                            <div class="row g-3 mt-4">


                                <div class="col-6">

                                    <div class="bg-light rounded-3 p-3 text-center">

                                        <i class="fas fa-user-md text-success fa-2x mb-2"></i>

                                        <h4 class="fw-bold mb-0">
                                            Profesional
                                        </h4>

                                        <small class="text-muted">
                                            Tenaga Medis
                                        </small>

                                    </div>

                                </div>



                                <div class="col-6">

                                    <div class="bg-light rounded-3 p-3 text-center">

                                        <i class="fas fa-clinic-medical text-primary fa-2x mb-2"></i>

                                        <h4 class="fw-bold mb-0">
                                            5+
                                        </h4>

                                        <small class="text-muted">
                                            Jenis Poli
                                        </small>

                                    </div>

                                </div>


                            </div>


                            <!-- Button -->
                            <a href="#layanan" class="btn btn-success mt-4 px-4">

                                <i class="fas fa-calendar-check me-2"></i>

                                Lihat Layanan

                            </a>


                        </div>



                        <!-- Kanan : Daftar Poli -->
                        <div class="col-lg-6">


                            <div class="bg-dark rounded-4 p-4 p-lg-5 text-white">


                                <div class="d-flex align-items-center mb-4">

                                    <div class="bg-success rounded-circle d-flex justify-content-center align-items-center me-3"
                                        style="width:50px;height:50px;">

                                        <i class="fas fa-stethoscope"></i>

                                    </div>


                                    <div>

                                        <h4 class="fw-bold mb-0">
                                            Daftar Layanan Poli
                                        </h4>

                                        <small class="text-white-50">
                                            Pilihan pelayanan kesehatan
                                        </small>

                                    </div>


                                </div>




                                <!-- List Poli -->

                                <div class="row g-3">


                                    <div class="col-md-6">

                                        <div class="border border-secondary rounded-3 p-3 h-100">

                                            <i class="fas fa-stethoscope text-success mb-2"></i>

                                            <h6 class="fw-bold mb-1">
                                                Poli Umum
                                            </h6>

                                            <small class="text-white-50">
                                                Pemeriksaan kesehatan umum
                                            </small>

                                        </div>

                                    </div>



                                    <div class="col-md-6">

                                        <div class="border border-secondary rounded-3 p-3 h-100">

                                            <i class="fas fa-tooth text-warning mb-2"></i>

                                            <h6 class="fw-bold mb-1">
                                                Poli Gigi
                                            </h6>

                                            <small class="text-white-50">
                                                Perawatan kesehatan gigi
                                            </small>

                                        </div>

                                    </div>



                                    <div class="col-md-6">

                                        <div class="border border-secondary rounded-3 p-3 h-100">

                                            <i class="fas fa-child text-info mb-2"></i>

                                            <h6 class="fw-bold mb-1">
                                                Poli Anak
                                            </h6>

                                            <small class="text-white-50">
                                                Pemeriksaan kesehatan anak
                                            </small>

                                        </div>

                                    </div>




                                    <div class="col-md-6">

                                        <div class="border border-secondary rounded-3 p-3 h-100">

                                            <i class="fas fa-eye text-primary mb-2"></i>

                                            <h6 class="fw-bold mb-1">
                                                Poli Mata
                                            </h6>

                                            <small class="text-white-50">
                                                Pemeriksaan kesehatan mata
                                            </small>

                                        </div>

                                    </div>




                                    <div class="col-md-6">

                                        <div class="border border-secondary rounded-3 p-3 h-100">

                                            <i class="fas fa-allergies text-danger mb-2"></i>

                                            <h6 class="fw-bold mb-1">
                                                Poli Kulit
                                            </h6>

                                            <small class="text-white-50">
                                                Perawatan kesehatan kulit
                                            </small>

                                        </div>

                                    </div>


                                    <div class="col-md-6">

                                        <div class="border border-secondary rounded-3 p-3 h-100">

                                            <i class="fas fa-map-marker-alt text-warning mb-2"></i>

                                            <h6 class="fw-bold mb-1">
                                                Lokasi
                                            </h6>

                                            <small class="text-white-50">
                                                Kampus Udinus
                                            </small>

                                        </div>

                                    </div>


                                </div>


                            </div>


                        </div>


                    </div>

                </div>

            </div>

        </section>

    </main>



    <!-- ================= FOOTER ================= -->
    <footer id="tentang" class="bg-dark text-white mt-5">

        <div class="container py-5">

            <div class="row g-5">


                <!-- About -->
                <div class="col-lg-4">

                    <h4 class="fw-bold mb-3">

                        <i class="fas fa-clinic-medical text-success me-2"></i>

                        Poliklinik Udinus

                    </h4>

                    <p class="text-white-50">
                        Poliklinik Udinus menyediakan fasilitas pelayanan
                        kesehatan bagi mahasiswa, karyawan, dan masyarakat
                        umum di lingkungan Universitas Dian Nuswantoro.
                    </p>

                    <div class="d-flex gap-2">

                        <a href="#" class="btn btn-outline-light rounded-circle" aria-label="Facebook">

                            <i class="fab fa-facebook-f"></i>

                        </a>

                        <a href="#" class="btn btn-outline-light rounded-circle" aria-label="Twitter">

                            <i class="fab fa-twitter"></i>

                        </a>

                        <a href="#" class="btn btn-outline-light rounded-circle" aria-label="Instagram">

                            <i class="fab fa-instagram"></i>

                        </a>

                    </div>

                </div>



                <!-- Contact -->
                <div class="col-lg-3 col-md-6">

                    <h5 class="fw-bold mb-4">
                        Kontak
                    </h5>


                    <p class="text-white-50">

                        <i class="fas fa-map-marker-alt text-success me-2"></i>

                        Jl. Nakula 1, Pendrikan Kidul

                    </p>


                    <p class="text-white-50">

                        <i class="fas fa-envelope text-success me-2"></i>

                        poliklinikudinus@gmail.com

                    </p>


                    <p class="text-white-50">

                        <i class="fas fa-phone text-success me-2"></i>

                        +62 234 567 8821

                    </p>

                </div>



                <!-- Map -->
                <div class="col-lg-5 col-md-6">

                    <h5 class="fw-bold mb-4">
                        Lokasi Kami
                    </h5>

                    <div class="rounded overflow-hidden">

                        <iframe
                            src="https://maps.google.com/maps?width=100%25&height=600&hl=en&q=Jl.%20Nakula%201,%20Pendrikan%20Kidul,%20Semarang&t=&z=14&ie=UTF8&iwloc=B&output=embed"
                            width="100%" height="230" style="border:0;" loading="lazy">
                        </iframe>

                    </div>

                </div>

            </div>


            <hr class="border-secondary my-4">


            <!-- Copyright -->
            <div class="row align-items-center">

                <div class="col-md-6 text-center text-md-start">

                    <small class="text-white-50">
                        © 2026 Poliklinik Udinus. All Rights Reserved.
                    </small>

                </div>


                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">

                    <small class="text-white-50">
                        Yohanes Dimas Pratama - A11.2021.13254
                    </small>

                </div>

            </div>

        </div>

    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>