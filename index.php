<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Poliklinik Udinus</title>


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="icon" href="assets/images/logo_dinus.png">



    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            background: #f8fafc;
        }



        /* NAVBAR */

        .navbar-brand img {
            width: 42px;
        }


        .nav-link {
            font-weight: 600;
        }


        .nav-link:hover {
            color: #198754 !important;
        }



        /* HERO */

        .hero {

            padding: 80px 0;

        }


        .hero-card {

            border: none;
            border-radius: 25px;
            overflow: hidden;
            background: white;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .08);

        }



        .hero-title {

            font-size: 3rem;
            font-weight: 700;

        }



        .hero-image {

            width: 100%;
            height: 450px;
            object-fit: cover;

        }



        /* LOGIN CARD */


        .login-card {

            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: .3s;

        }



        .login-card:hover {

            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .15);

        }



        .login-image {

            height: 220px;
            object-fit: cover;

        }



        .icon-box {

            width: 60px;
            height: 60px;
            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

        }



        .section-title {

            font-weight: 700;

        }
    </style>


</head>


<body>


    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">

        <div class="container">


            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">

                <img src="assets/images/logo_dinus.png" class="me-2">

                Poliklinik Udinus

            </a>



            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">

                <span class="navbar-toggler-icon"></span>

            </button>




            <div class="collapse navbar-collapse" id="menu">


                <ul class="navbar-nav ms-auto">


                    <li class="nav-item">
                        <a class="nav-link active" href="#home">
                            Beranda
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="#layanan">
                            Layanan
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="#informasi">
                            Informasi
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">
                            Kontak
                        </a>
                    </li>


                </ul>


            </div>


        </div>

    </nav>





    <!-- HERO -->

    <section class="hero" id="home">

        <div class="container">

            <div class="hero-card">

                <div class="row align-items-center g-0">


                    <!-- LEFT CONTENT -->

                    <div class="col-lg-7 p-5">


                        <span class="badge bg-success px-4 py-2 rounded-pill mb-4">

                            <i class="fas fa-heartbeat me-2"></i>

                            Universitas Dian Nuswantoro

                        </span>




                        <h1 class="hero-title mb-4">

                            Kesehatan Anda,
                            <br>

                            <span class="text-success">
                                Prioritas Kami
                            </span>

                        </h1>




                        <p class="lead text-muted mb-5">

                            Poliklinik Udinus menyediakan pelayanan kesehatan
                            profesional, nyaman, dan mudah diakses bagi mahasiswa,
                            dosen, karyawan serta masyarakat umum.

                        </p>




                        <a href="#layanan" class="btn btn-success btn-lg w-100 py-3">

                            Lihat Layanan

                            <i class="fas fa-arrow-down ms-2"></i>

                        </a>



                    </div>







                    <!-- RIGHT INFORMATION PANEL -->

                    <div class="col-lg-5 p-5">


                        <div class="info-panel">



                            <div class="mb-4">


                                <small class="text-success fw-bold">
                                    JAM OPERASIONAL
                                </small>


                                <h4 class="fw-bold mt-2">
                                    Senin - Jumat
                                </h4>


                                <p class="text-muted mb-0">
                                    08.00 - 16.00 WIB
                                </p>


                            </div>





                            <hr>





                            <div class="mb-4">


                                <small class="text-success fw-bold">
                                    LAYANAN KESEHATAN
                                </small>


                                <h5 class="fw-bold mt-2">
                                    Pemeriksaan Umum & Konsultasi
                                </h5>


                                <p class="text-muted mb-0">
                                    Pelayanan kesehatan untuk mahasiswa,
                                    dosen, karyawan, dan masyarakat umum.
                                </p>


                            </div>





                            <hr>





                            <div>


                                <small class="text-success fw-bold">
                                    KOMITMEN KAMI
                                </small>


                                <h5 class="fw-bold mt-2">
                                    Pelayanan Nyaman & Terpercaya
                                </h5>


                                <p class="text-muted mb-0">
                                    Mengutamakan kenyamanan pasien dengan
                                    pelayanan yang cepat dan profesional.
                                </p>


                            </div>



                        </div>


                    </div>



                </div>


            </div>


        </div>


    </section>







    <!-- LOGIN SECTION -->


    <section id="layanan" class="py-5">


        <div class="container">



            <div class="text-center mb-5">


                <h2 class="section-title">

                    Portal Layanan

                </h2>


                <p class="text-muted">

                    Silahkan pilih akses sesuai kebutuhan Anda.

                </p>


            </div>





            <div class="row g-4">



                <!-- PASIEN -->

                <div class="col-lg-4">


                    <div class="card login-card shadow-sm h-100">


                        <img src="assets/images/pasien.jpg" class="login-image">



                        <div class="card-body p-4">


                            <h4 class="fw-bold">

                                <i class="fas fa-user text-success me-2"></i>

                                Pasien

                            </h4>



                            <p class="text-muted">

                                Melakukan pendaftaran,
                                melihat jadwal dokter,
                                dan informasi pemeriksaan.

                            </p>



                            <a href="loginUser.php" class="btn btn-success w-100">

                                Masuk Pasien

                            </a>


                        </div>


                    </div>


                </div>






                <!-- DOKTER -->

                <div class="col-lg-4">


                    <div class="card login-card shadow-sm h-100">


                        <img src="assets/images/dokter.jpg" class="login-image">


                        <div class="card-body p-4">


                            <h4 class="fw-bold">

                                <i class="fas fa-user-md text-primary me-2"></i>

                                Dokter

                            </h4>



                            <p class="text-muted">

                                Mengelola pemeriksaan pasien
                                dan jadwal pelayanan medis.

                            </p>



                            <a href="login.php?role=dokter" class="btn btn-primary w-100">

                                Masuk Dokter

                            </a>



                        </div>


                    </div>


                </div>







                <!-- ADMIN -->

                <div class="col-lg-4">


                    <div class="card login-card shadow-sm h-100">


                        <img src="assets/images/admin.jpg" class="login-image">


                        <div class="card-body p-4">


                            <h4 class="fw-bold">

                                <i class="fas fa-user-cog text-warning me-2"></i>

                                Admin

                            </h4>



                            <p class="text-muted">

                                Mengatur data pasien,
                                dokter, jadwal dan berbagai informasi sistem.

                            </p>




                            <a href="login.php?role=admin" class="btn btn-warning w-100">

                                Masuk Admin

                            </a>



                        </div>


                    </div>


                </div>




            </div>


        </div>


    </section>

    <!-- ================= INFORMASI POLIKLINIK ================= -->


    <section id="informasi" class="py-5">


        <div class="container">



            <div class="text-center mb-5">


                <span class="badge bg-success rounded-pill px-3 py-2 mb-3">

                    <i class="fas fa-hospital me-2"></i>

                    Informasi Poliklinik

                </span>



                <h2 class="fw-bold display-6">

                    Layanan Kesehatan Lengkap

                </h2>



                <p class="text-muted">

                    Kami menyediakan berbagai layanan poli
                    dengan tenaga medis profesional.

                </p>



            </div>






            <div class="row g-4">





                <!-- POLI UMUM -->


                <div class="col-lg-4 col-md-6">


                    <div class="card border-0 shadow-sm h-100 rounded-4">


                        <div class="card-body p-4">


                            <div class="icon-box bg-success text-white mb-3">

                                <i class="fas fa-stethoscope fa-lg"></i>

                            </div>



                            <h4 class="fw-bold">

                                Poli Umum

                            </h4>



                            <p class="text-muted">

                                Pelayanan pemeriksaan kesehatan umum,
                                diagnosis penyakit, dan konsultasi dokter.

                            </p>



                            <a href="#" class="text-success fw-semibold">

                                Selengkapnya

                                <i class="fas fa-arrow-right ms-1"></i>

                            </a>



                        </div>


                    </div>


                </div>








                <!-- POLI GIGI -->


                <div class="col-lg-4 col-md-6">


                    <div class="card border-0 shadow-sm h-100 rounded-4">


                        <div class="card-body p-4">


                            <div class="icon-box bg-warning text-white mb-3">

                                <i class="fas fa-tooth fa-lg"></i>

                            </div>




                            <h4 class="fw-bold">

                                Poli Gigi

                            </h4>



                            <p class="text-muted">

                                Perawatan kesehatan gigi,
                                pembersihan karang gigi,
                                dan konsultasi gigi.

                            </p>



                            <a href="#" class="text-warning fw-semibold">

                                Selengkapnya

                                <i class="fas fa-arrow-right ms-1"></i>

                            </a>



                        </div>


                    </div>


                </div>








                <!-- POLI THT -->


                <div class="col-lg-4 col-md-6">


                    <div class="card border-0 shadow-sm h-100 rounded-4">


                        <div class="card-body p-4">


                            <div class="icon-box bg-primary text-white mb-3">

                                <i class="fas fa-head-side-mask fa-lg"></i>

                            </div>




                            <h4 class="fw-bold">

                                Poli THT

                            </h4>



                            <p class="text-muted">

                                Pemeriksaan telinga, hidung,
                                tenggorokan serta gangguan THT.

                            </p>



                            <a href="#" class="text-primary fw-semibold">

                                Selengkapnya

                                <i class="fas fa-arrow-right ms-1"></i>

                            </a>



                        </div>


                    </div>


                </div>









                <!-- POLI ANAK -->


                <div class="col-lg-4 col-md-6">


                    <div class="card border-0 shadow-sm h-100 rounded-4">


                        <div class="card-body p-4">


                            <div class="icon-box bg-danger text-white mb-3">

                                <i class="fas fa-child fa-lg"></i>

                            </div>




                            <h4 class="fw-bold">

                                Poli Anak

                            </h4>



                            <p class="text-muted">

                                Pelayanan kesehatan anak,
                                pemantauan tumbuh kembang,
                                dan konsultasi.

                            </p>



                            <a href="#" class="text-danger fw-semibold">

                                Selengkapnya

                                <i class="fas fa-arrow-right ms-1"></i>

                            </a>



                        </div>


                    </div>


                </div>









                <!-- POLI MATA -->


                <div class="col-lg-4 col-md-6">


                    <div class="card border-0 shadow-sm h-100 rounded-4">


                        <div class="card-body p-4">


                            <div class="icon-box bg-info text-white mb-3">

                                <i class="fas fa-eye fa-lg"></i>

                            </div>




                            <h4 class="fw-bold">

                                Poli Mata

                            </h4>



                            <p class="text-muted">

                                Pemeriksaan kesehatan mata,
                                gangguan penglihatan,
                                dan konsultasi.

                            </p>



                            <a href="#" class="text-info fw-semibold">

                                Selengkapnya

                                <i class="fas fa-arrow-right ms-1"></i>

                            </a>



                        </div>


                    </div>


                </div>









                <!-- POLI KULIT -->


                <div class="col-lg-4 col-md-6">


                    <div class="card border-0 shadow-sm h-100 rounded-4">


                        <div class="card-body p-4">


                            <div class="icon-box bg-secondary text-white mb-3">

                                <i class="fas fa-allergies fa-lg"></i>

                            </div>




                            <h4 class="fw-bold">

                                Poli Kulit

                            </h4>



                            <p class="text-muted">

                                Perawatan kesehatan kulit,
                                konsultasi masalah kulit,
                                dan alergi.

                            </p>



                            <a href="#" class="text-secondary fw-semibold">

                                Selengkapnya

                                <i class="fas fa-arrow-right ms-1"></i>

                            </a>



                        </div>


                    </div>


                </div>





            </div>


        </div>


    </section>








    <!-- ================= KEUNGGULAN ================= -->


    <section class="py-5 bg-white">


        <div class="container">


            <div class="row align-items-center g-5">



                <div class="col-lg-6">


                    <img src="assets/images/poli1.jpg" class="img-fluid rounded-4 shadow"
                        style="height:350px;width:100%;object-fit:cover;">


                </div>





                <div class="col-lg-6">


                    <h2 class="fw-bold mb-4">

                        Mengapa Memilih
                        Poliklinik Udinus?

                    </h2>



                    <div class="d-flex mb-4">


                        <div class="icon-box bg-success text-white me-3">

                            <i class="fas fa-user-md"></i>

                        </div>



                        <div>

                            <h5 class="fw-bold mb-1">

                                Dokter Profesional

                            </h5>


                            <p class="text-muted">

                                Didukung tenaga medis yang berpengalaman.

                            </p>


                        </div>


                    </div>






                    <div class="d-flex mb-4">


                        <div class="icon-box bg-primary text-white me-3">

                            <i class="fas fa-clock"></i>

                        </div>



                        <div>

                            <h5 class="fw-bold mb-1">

                                Pelayanan Cepat

                            </h5>


                            <p class="text-muted">

                                Proses pelayanan mudah dan nyaman.

                            </p>


                        </div>


                    </div>







                    <div class="d-flex">


                        <div class="icon-box bg-warning text-white me-3">

                            <i class="fas fa-hospital"></i>

                        </div>



                        <div>

                            <h5 class="fw-bold mb-1">

                                Fasilitas Lengkap

                            </h5>


                            <p class="text-muted">

                                Mendukung kebutuhan pemeriksaan kesehatan.

                            </p>


                        </div>


                    </div>




                </div>




            </div>


        </div>


    </section>







    <!-- ================= FOOTER ================= -->


    <footer id="kontak" style="background:linear-gradient(135deg,#063b27,#0b5138); color:white;">


        <div class="container py-5">


            <div class="row g-5 align-items-start">


                <!-- BRAND -->

                <div class="col-lg-4">


                    <div class="d-flex align-items-center mb-3">


                        <div class="me-3"
                            style="width:55px;height:55px;background:white;border-radius:16px;display:flex;align-items:center;justify-content:center;">


                            <img src="assets/images/logo_dinus.png" style="width:42px;">


                        </div>



                        <div>


                            <h4 class="fw-bold mb-0" style="color:#ffffff;">

                                Poliklinik Udinus

                            </h4>


                            <small style="color:#b8e6d0;">

                                Healthcare Service

                            </small>


                        </div>


                    </div>





                    <p style="color:#d7e8df;line-height:1.8;">

                        Memberikan pelayanan kesehatan profesional,
                        nyaman, dan terpercaya bagi mahasiswa,
                        dosen, karyawan, serta masyarakat umum
                        Universitas Dian Nuswantoro.

                    </p>

                    <p style="margin-top:80px; color white; font-size: larger;">
                        © 2025 - Yohanes Dimas Pratama
                    </p>



                </div>








                <!-- CONTACT -->

                <div class="col-lg-3">


                    <h5 class="fw-bold mb-4" style="color:#ffffff;">

                        Hubungi Kami

                    </h5>




                    <p style="color:#e8f5ef;">

                        <i class="fas fa-map-marker-alt me-2" style="color:#20c997;"></i>

                        Jl. Nakula 1, Pendrikan Kidul,
                        Semarang

                    </p>





                    <p style="color:#e8f5ef;">

                        <i class="fas fa-envelope me-2" style="color:#20c997;"></i>

                        poliklinikudinus@gmail.com

                    </p>





                    <p style="color:#e8f5ef;">

                        <i class="fas fa-phone me-2" style="color:#20c997;"></i>

                        +62 234 567 8821

                    </p>



                </div>









                <!-- MAP -->

                <div class="col-lg-5">


                    <h5 class="fw-bold mb-4" style="color:#ffffff;">

                        Lokasi Poliklinik

                    </h5>



                    <div style="overflow:hidden;
                            border-radius:20px;
                            box-shadow:0 15px 40px rgba(0,0,0,.25);">


                        <iframe
                            src="https://maps.google.com/maps?q=Jl.%20Nakula%201,%20Semarang&t=&z=14&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="230" style="border:0;display:block;" loading="lazy">

                        </iframe>


                    </div>



                </div>


            </div>

        </div>


    </footer>






    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>