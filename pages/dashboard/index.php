<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Pasien - Poliklinik Udinus</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f8;
        }

        /* ================= HERO ================= */

        .hero-section {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #198754, #0d6efd);
            color: white;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            top: -120px;
            right: -100px;
        }

        .hero-section::after {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
            bottom: -140px;
            left: -100px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }


        /* ================= SERVICE CARD ================= */

        .service-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            background: #ffffff;
            transition: 0.3s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 35px rgba(0, 0, 0, 0.14);
        }

        .service-image-wrapper {
            position: relative;
            overflow: hidden;
        }

        .service-image {
            width: 100%;
            aspect-ratio: 16 / 9;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .service-card:hover .service-image {
            transform: scale(1.06);
        }

        .service-number {
            position: absolute;
            top: 15px;
            left: 15px;
            width: 42px;
            height: 42px;
            background: rgba(25, 135, 84, 0.95);
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 700;
        }

        .service-title {
            font-size: 1.1rem;
            font-weight: 700;
        }

        .service-icon {
            width: 44px;
            height: 44px;
            min-width: 44px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }


        /* ================= ACCORDION ================= */

        .service-button {
            background: white;
            border: none;
            width: 100%;
            padding: 20px;
            text-align: left;
        }

        .service-button:hover {
            background: #f8f9fa;
        }

        .service-button:focus {
            outline: none;
            box-shadow: none;
        }

        .service-description {
            padding: 0 20px 20px;
            color: #6c757d;
            line-height: 1.7;
        }

        .collapse-arrow {
            transition: transform 0.3s ease;
        }

        .service-button[aria-expanded="true"] .collapse-arrow {
            transform: rotate(180deg);
        }


        /* ================= SECTION ================= */

        .section-title {
            max-width: 700px;
            margin: auto;
        }


        /* ================= RESPONSIVE ================= */

        @media (max-width: 767.98px) {

            .hero-section {
                text-align: center;
            }

            .hero-icon {
                margin: auto;
            }

            .service-image {
                aspect-ratio: 4 / 3;
            }
        }
    </style>
</head>


<body>


    <!-- ================= HERO SECTION ================= -->
    <section class="hero-section py-5">

        <div class="container hero-content py-lg-5">

            <div class="row align-items-center">

                <div class="col-lg-8 mx-auto text-center">

                    <!-- Icon -->
                    <div class="hero-icon rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4">

                        <i class="bi bi-heart-pulse-fill fs-2"></i>

                    </div>


                    <span class="badge bg-light text-success rounded-pill px-3 py-2 mb-3">

                        <i class="bi bi-hospital me-1"></i>

                        Poliklinik Universitas Dian Nuswantoro

                    </span>


                    <h1 class="display-4 fw-bold mb-3">
                        Selamat Datang di <br>Dashboard Pasien
                    </h1>


                    <p class="lead text-white-50 mb-4">

                        Temukan berbagai fasilitas dan layanan kesehatan
                        yang tersedia di Poliklinik Udinus untuk membantu
                        menjaga kesehatan Anda.

                    </p>


                    <a href="#layanan"
                        class="btn btn-light text-success fw-semibold px-4 py-2 rounded-pill">

                        Lihat Layanan

                        <i class="bi bi-arrow-down ms-2"></i>

                    </a>

                </div>

            </div>

        </div>

    </section>



    <!-- ================= SERVICE SECTION ================= -->
    <section id="layanan" class="py-5">

        <div class="container py-lg-4">


            <!-- Heading -->
            <div class="section-title text-center mb-5">

                <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2 mb-3">

                    <i class="bi bi-grid-fill me-1"></i>

                    Layanan Kami

                </span>


                <h2 class="fw-bold display-6 mb-3">
                    Fasilitas Kesehatan
                </h2>


                <p class="text-muted">

                    Pilih layanan untuk melihat informasi lebih lengkap
                    mengenai fasilitas kesehatan yang tersedia.

                </p>

            </div>



            <!-- Cards -->
            <div class="row g-4">


                <!-- ================= 1. PELAYANAN UMUM ================= -->
                <div class="col-lg-4 col-md-6">

                    <div class="service-card h-100">


                        <div class="service-image-wrapper">

                            <img src="assets/images/layananumum.jpg"
                                class="service-image"
                                alt="Pelayanan Umum">

                            <div class="service-number">
                                01
                            </div>

                        </div>


                        <button class="service-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseOne"
                            aria-expanded="false"
                            aria-controls="collapseOne">


                            <div class="d-flex align-items-center">

                                <div class="service-icon bg-success-subtle text-success me-3">

                                    <i class="bi bi-heart-pulse fs-5"></i>

                                </div>


                                <div class="flex-grow-1">

                                    <div class="service-title">
                                        Pelayanan Umum
                                    </div>

                                    <small class="text-muted">
                                        Konsultasi kesehatan umum
                                    </small>

                                </div>


                                <i class="bi bi-chevron-down collapse-arrow"></i>

                            </div>

                        </button>


                        <div id="collapseOne"
                            class="collapse">

                            <div class="service-description">

                                Fasilitas ini menyediakan konsultasi medis
                                untuk berbagai keluhan kesehatan umum.
                                Dilengkapi dengan dokter umum yang siap
                                memberikan diagnosa awal, pengobatan,
                                serta rujukan apabila diperlukan.

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ================= 2. LABORATORIUM ================= -->
                <div class="col-lg-4 col-md-6">

                    <div class="service-card h-100">


                        <div class="service-image-wrapper">

                            <img src="assets/images/laboratorium.jpg"
                                class="service-image"
                                alt="Laboratorium Klinik">

                            <div class="service-number">
                                02
                            </div>

                        </div>


                        <button class="service-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo"
                            aria-expanded="false"
                            aria-controls="collapseTwo">


                            <div class="d-flex align-items-center">

                                <div class="service-icon bg-primary-subtle text-primary me-3">

                                    <i class="bi bi-clipboard2-pulse fs-5"></i>

                                </div>


                                <div class="flex-grow-1">

                                    <div class="service-title">
                                        Laboratorium Klinik
                                    </div>

                                    <small class="text-muted">
                                        Pemeriksaan diagnostik
                                    </small>

                                </div>


                                <i class="bi bi-chevron-down collapse-arrow"></i>

                            </div>

                        </button>


                        <div id="collapseTwo"
                            class="collapse">

                            <div class="service-description">

                                Menyediakan berbagai pemeriksaan diagnostik,
                                seperti tes darah, urin, dan fungsi organ.
                                Fasilitas laboratorium membantu dokter dalam
                                menentukan diagnosis dengan hasil pemeriksaan
                                yang cepat dan akurat.

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ================= 3. APOTEK ================= -->
                <div class="col-lg-4 col-md-6">

                    <div class="service-card h-100">


                        <div class="service-image-wrapper">

                            <img src="assets/images/apotek.jpg"
                                class="service-image"
                                alt="Apotek">

                            <div class="service-number">
                                03
                            </div>

                        </div>


                        <button class="service-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseThree"
                            aria-expanded="false"
                            aria-controls="collapseThree">


                            <div class="d-flex align-items-center">

                                <div class="service-icon bg-warning-subtle text-warning me-3">

                                    <i class="bi bi-capsule-pill fs-5"></i>

                                </div>


                                <div class="flex-grow-1">

                                    <div class="service-title">
                                        Apotek
                                    </div>

                                    <small class="text-muted">
                                        Obat & konsultasi farmasi
                                    </small>

                                </div>


                                <i class="bi bi-chevron-down collapse-arrow"></i>

                            </div>

                        </button>


                        <div id="collapseThree"
                            class="collapse">

                            <div class="service-description">

                                Menyediakan berbagai obat resep maupun
                                non-resep untuk mendukung proses penyembuhan.
                                Apoteker profesional siap membantu memberikan
                                informasi mengenai dosis dan cara penggunaan
                                obat dengan benar.

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ================= 4. POLI GIGI ================= -->
                <div class="col-lg-4 col-md-6">

                    <div class="service-card h-100">


                        <div class="service-image-wrapper">

                            <img src="assets/images/poligigi.jpg"
                                class="service-image"
                                alt="Poli Gigi">

                            <div class="service-number">
                                04
                            </div>

                        </div>


                        <button class="service-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseFour"
                            aria-expanded="false"
                            aria-controls="collapseFour">


                            <div class="d-flex align-items-center">

                                <div class="service-icon bg-info-subtle text-info me-3">

                                    <i class="bi bi-emoji-smile fs-5"></i>

                                </div>


                                <div class="flex-grow-1">

                                    <div class="service-title">
                                        Poli Gigi
                                    </div>

                                    <small class="text-muted">
                                        Kesehatan gigi dan mulut
                                    </small>

                                </div>


                                <i class="bi bi-chevron-down collapse-arrow"></i>

                            </div>

                        </button>


                        <div id="collapseFour"
                            class="collapse">

                            <div class="service-description">

                                Fasilitas untuk pemeriksaan dan perawatan
                                kesehatan gigi dan mulut, mulai dari tambal
                                gigi, pencabutan, pembersihan karang gigi,
                                hingga konsultasi mengenai kesehatan gigi.

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ================= 5. FISIOTERAPI ================= -->
                <div class="col-lg-4 col-md-6">

                    <div class="service-card h-100">


                        <div class="service-image-wrapper">

                            <img src="assets/images/fisioterapi.jpg"
                                class="service-image"
                                alt="Fisioterapi">

                            <div class="service-number">
                                05
                            </div>

                        </div>


                        <button class="service-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseFive"
                            aria-expanded="false"
                            aria-controls="collapseFive">


                            <div class="d-flex align-items-center">

                                <div class="service-icon bg-danger-subtle text-danger me-3">

                                    <i class="bi bi-person-walking fs-5"></i>

                                </div>


                                <div class="flex-grow-1">

                                    <div class="service-title">
                                        Fisioterapi
                                    </div>

                                    <small class="text-muted">
                                        Pemulihan fungsi tubuh
                                    </small>

                                </div>


                                <i class="bi bi-chevron-down collapse-arrow"></i>

                            </div>

                        </button>


                        <div id="collapseFive"
                            class="collapse">

                            <div class="service-description">

                                Layanan fisioterapi membantu pasien dalam
                                memulihkan fungsi tubuh akibat cedera,
                                operasi, maupun kondisi kronis.
                                Pelayanan dilakukan oleh tenaga fisioterapis
                                yang berpengalaman.

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ================= 6. KIA ================= -->
                <div class="col-lg-4 col-md-6">

                    <div class="service-card h-100">


                        <div class="service-image-wrapper">

                            <img src="assets/images/klinikibuanak.jpg"
                                class="service-image"
                                alt="Klinik Kesehatan Ibu dan Anak">

                            <div class="service-number">
                                06
                            </div>

                        </div>


                        <button class="service-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseSix"
                            aria-expanded="false"
                            aria-controls="collapseSix">


                            <div class="d-flex align-items-center">

                                <div class="service-icon bg-success-subtle text-success me-3">

                                    <i class="bi bi-person-hearts fs-5"></i>

                                </div>


                                <div class="flex-grow-1">

                                    <div class="service-title">
                                        Klinik Ibu & Anak
                                    </div>

                                    <small class="text-muted">
                                        Kesehatan ibu dan anak
                                    </small>

                                </div>


                                <i class="bi bi-chevron-down collapse-arrow"></i>

                            </div>

                        </button>


                        <div id="collapseSix"
                            class="collapse">

                            <div class="service-description">

                                Layanan khusus untuk kesehatan ibu hamil,
                                ibu menyusui, dan anak-anak. Layanan meliputi
                                pemeriksaan kehamilan, imunisasi, pemantauan
                                tumbuh kembang anak, hingga konsultasi gizi.

                            </div>

                        </div>

                    </div>

                </div>


            </div>

        </div>

    </section>



    <!-- ================= INFO BOTTOM ================= -->
    <section class="pb-5">

        <div class="container">

            <div class="bg-dark text-white rounded-4 p-4 p-lg-5 shadow">

                <div class="row align-items-center g-4">

                    <div class="col-lg-8">

                        <div class="d-flex align-items-center">

                            <div class="service-icon bg-success text-white me-3">

                                <i class="bi bi-info-circle"></i>

                            </div>

                            <div>

                                <h4 class="fw-bold mb-1">
                                    Butuh Bantuan?
                                </h4>

                                <p class="text-white-50 mb-0">

                                    Silakan hubungi petugas Poliklinik Udinus
                                    apabila membutuhkan informasi lebih lanjut
                                    mengenai layanan kesehatan.

                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="col-lg-4 text-lg-end">

                        <a href="#"
                            class="btn btn-success px-4 py-2">

                            <i class="bi bi-headset me-2"></i>

                            Hubungi Petugas

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>