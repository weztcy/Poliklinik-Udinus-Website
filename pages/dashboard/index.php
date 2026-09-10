<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>
        Dashboard Pasien - Poliklinik Udinus
    </title>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">



    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">



    <style>
        .dashboard-pasien {
    font-family: 'Poppins', sans-serif;
}



        body {

            background: #f8fafc;

        }





        /* ================= HERO ================= */


        .hero {


            background:

                linear-gradient(135deg,
                    #198754,
                    #0d6efd);


            color: white;

            border-radius: 0 0 45px 45px;


        }



        .hero-box {


            background: rgba(255, 255, 255, .15);

            backdrop-filter: blur(10px);

            border-radius: 30px;


        }



        .hero-icon {


            width: 90px;

            height: 90px;


            background: white;

            color: #198754;


            border-radius: 50%;


            display: flex;

            align-items: center;

            justify-content: center;


            font-size: 40px;


        }




        /* ================= QUICK MENU ================= */



        .quick-card {


            background: white;

            border-radius: 20px;

            padding: 30px;


            height: 100%;


            border: none;


            box-shadow:
                0 10px 30px rgba(0, 0, 0, .07);


            transition: .3s;


        }



        .quick-card:hover {


            transform: translateY(-8px);


            box-shadow:
                0 15px 35px rgba(0, 0, 0, .12);


        }





        .quick-icon {


            width: 60px;

            height: 60px;


            border-radius: 50%;


            display: flex;

            align-items: center;

            justify-content: center;


            font-size: 25px;


        }






        /* ================= POLI CARD ================= */



        .poli-card {


            border: none;


            border-radius: 20px;


            box-shadow:

                0 8px 25px rgba(0, 0, 0, .08);


            transition: .3s;


            background: white;


        }



        .poli-card:hover {


            transform: translateY(-8px);


            box-shadow:

                0 15px 35px rgba(0, 0, 0, .15);


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






        /* MODAL */


        .modal-content {


            border-radius: 25px;

            border: none;


        }



        .modal-header {


            border-radius:

                25px 25px 0 0;


            background: #198754;

            color: white;


        }
    </style>



</head>



<body>


<div class="dashboard-pasien">


    <!-- ================= HERO ================= -->



    <section class="hero py-5">


        <div class="container py-lg-5">



            <div class="hero-box p-4 p-lg-5 text-center">



                <div class="hero-icon mx-auto mb-4">


                    <i class="fas fa-heartbeat"></i>


                </div>





                <span class="badge bg-white text-success rounded-pill px-4 py-2 mb-3">


                    <i class="fas fa-hospital me-2"></i>


                    Poliklinik Universitas Dian Nuswantoro


                </span>






                <h1 class="display-5 fw-bold">


                    Selamat Datang

                    <br>


                    Dashboard Pasien


                </h1>






                <p class="lead text-white-50">


                    Akses layanan kesehatan,
                    pendaftaran poli,
                    dan informasi pemeriksaan
                    dengan mudah.


                </p>






                <a href="daftarPoliklinik.php" class="btn btn-light text-success fw-semibold rounded-pill px-4">


                    <i class="fas fa-calendar-plus me-2"></i>


                    Daftar Poli Sekarang


                </a>





            </div>


        </div>


    </section>








    <!-- ================= QUICK MENU ================= -->



    <section class="py-5">


        <div class="container">



            <div class="text-center mb-5">


                <h2 class="section-title">


                    Akses Cepat


                </h2>



                <p class="text-muted">

                    Gunakan fitur layanan pasien


                </p>



            </div>







            <div class="row g-4">





                <div class="col-lg-3 col-md-6">


                    <div class="quick-card">


                        <div class="quick-icon bg-success text-white mb-3">


                            <i class="fas fa-hospital"></i>


                        </div>




                        <h5 class="fw-bold">


                            Daftar Poli


                        </h5>



                        <p class="text-muted">


                            Mendaftaran pemeriksaan.


                        </p>




                        <a href="daftarPoliklinik.php" class="btn btn-success rounded-pill">


                            Buka


                        </a>



                    </div>


                </div>







                <div class="col-lg-3 col-md-6">


                    <div class="quick-card">


                        <div class="quick-icon bg-primary text-white mb-3">


                            <i class="fas fa-calendar-check"></i>


                        </div>




                        <h5 class="fw-bold">


                            Jadwal Dokter


                        </h5>



                        <p class="text-muted">


                            Melihat jadwal dokter.


                        </p>




                        <a href="#" class="btn btn-primary rounded-pill">


                            Lihat


                        </a>



                    </div>


                </div>







                <div class="col-lg-3 col-md-6">


                    <div class="quick-card">


                        <div class="quick-icon bg-warning text-white mb-3">


                            <i class="fas fa-history"></i>


                        </div>




                        <h5 class="fw-bold">


                            Riwayat Periksa


                        </h5>



                        <p class="text-muted">


                            Melihat riwayat kesehatan.


                        </p>




                        <a href="#" class="btn btn-warning rounded-pill">


                            Lihat


                        </a>



                    </div>


                </div>







                <div class="col-lg-3 col-md-6">


                    <div class="quick-card">


                        <div class="quick-icon bg-danger text-white mb-3">


                            <i class="fas fa-comments"></i>


                        </div>




                        <h5 class="fw-bold">


                            Konsultasi


                        </h5>



                        <p class="text-muted">


                            Informasi kesehatan pasien.


                        </p>




                        <a href="#" class="btn btn-danger rounded-pill">


                            Mulai


                        </a>



                    </div>


                </div>




            </div>



        </div>


    </section>

    <!-- ================= POLI SECTION ================= -->


    <section class="py-5">


        <div class="container">


            <div class="text-center mb-5">


                <h2 class="section-title">

                    Poli & Layanan Kesehatan

                </h2>



                <p class="text-muted">

                    Pilih layanan poli sesuai kebutuhan kesehatan Anda.

                </p>



            </div>







            <div class="row g-4">







                <!-- POLI UMUM -->


                <div class="col-lg-4 col-md-6">


                    <div class="card poli-card h-100">


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




                            <a href="#" class="text-success fw-semibold" data-bs-toggle="modal"
                                data-bs-target="#modalUmum">


                                Selengkapnya

                                <i class="fas fa-arrow-right ms-1"></i>


                            </a>



                        </div>


                    </div>


                </div>









                <!-- POLI GIGI -->


                <div class="col-lg-4 col-md-6">


                    <div class="card poli-card h-100">


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




                            <a href="#" class="text-warning fw-semibold" data-bs-toggle="modal"
                                data-bs-target="#modalGigi">


                                Selengkapnya

                                <i class="fas fa-arrow-right ms-1"></i>


                            </a>



                        </div>


                    </div>


                </div>









                <!-- POLI THT -->


                <div class="col-lg-4 col-md-6">


                    <div class="card poli-card h-100">


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




                            <a href="#" class="text-primary fw-semibold" data-bs-toggle="modal"
                                data-bs-target="#modalTht">


                                Selengkapnya

                                <i class="fas fa-arrow-right ms-1"></i>


                            </a>



                        </div>


                    </div>


                </div>









                <!-- POLI ANAK -->


                <div class="col-lg-4 col-md-6">


                    <div class="card poli-card h-100">


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




                            <a href="#" class="text-danger fw-semibold" data-bs-toggle="modal"
                                data-bs-target="#modalAnak">


                                Selengkapnya

                                <i class="fas fa-arrow-right ms-1"></i>


                            </a>



                        </div>


                    </div>


                </div>









                <!-- POLI MATA -->


                <div class="col-lg-4 col-md-6">


                    <div class="card poli-card h-100">


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




                            <a href="#" class="text-info fw-semibold" data-bs-toggle="modal"
                                data-bs-target="#modalMata">


                                Selengkapnya

                                <i class="fas fa-arrow-right ms-1"></i>


                            </a>



                        </div>


                    </div>


                </div>









                <!-- POLI KULIT -->


                <div class="col-lg-4 col-md-6">


                    <div class="card poli-card h-100">


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




                            <a href="#" class="text-secondary fw-semibold" data-bs-toggle="modal"
                                data-bs-target="#modalKulit">


                                Selengkapnya

                                <i class="fas fa-arrow-right ms-1"></i>


                            </a>



                        </div>


                    </div>


                </div>





            </div>


        </div>


    </section>








    <!-- ================= MODAL POLI ================= -->



    <!-- MODAL UMUM -->


    <div class="modal fade" id="modalUmum">


        <div class="modal-dialog modal-dialog-centered">


            <div class="modal-content">


                <div class="modal-header">


                    <h5 class="modal-title">

                        Poli Umum

                    </h5>



                    <button class="btn-close btn-close-white" data-bs-dismiss="modal">

                    </button>


                </div>



                <div class="modal-body">


                    Poli Umum menyediakan layanan pemeriksaan
                    kesehatan dasar, konsultasi dokter,
                    diagnosis awal penyakit, dan pemberian
                    tindakan medis sesuai kebutuhan pasien.


                </div>


            </div>


        </div>


    </div>









    <!-- MODAL GIGI -->


    <div class="modal fade" id="modalGigi">


        <div class="modal-dialog modal-dialog-centered">


            <div class="modal-content">


                <div class="modal-header">


                    <h5 class="modal-title">

                        Poli Gigi

                    </h5>



                    <button class="btn-close btn-close-white" data-bs-dismiss="modal">

                    </button>


                </div>



                <div class="modal-body">


                    Melayani pemeriksaan gigi,
                    perawatan gigi berlubang,
                    pembersihan karang gigi,
                    serta konsultasi kesehatan mulut.


                </div>


            </div>


        </div>


    </div>









    <!-- MODAL THT -->


    <div class="modal fade" id="modalTht">


        <div class="modal-dialog modal-dialog-centered">


            <div class="modal-content">


                <div class="modal-header">


                    <h5 class="modal-title">

                        Poli THT

                    </h5>



                    <button class="btn-close btn-close-white" data-bs-dismiss="modal">

                    </button>


                </div>



                <div class="modal-body">


                    Menyediakan pemeriksaan gangguan telinga,
                    hidung, tenggorokan serta konsultasi
                    kesehatan THT.


                </div>


            </div>


        </div>


    </div>









    <!-- MODAL ANAK -->


    <div class="modal fade" id="modalAnak">


        <div class="modal-dialog modal-dialog-centered">


            <div class="modal-content">


                <div class="modal-header">


                    <h5 class="modal-title">

                        Poli Anak

                    </h5>



                    <button class="btn-close btn-close-white" data-bs-dismiss="modal">

                    </button>


                </div>



                <div class="modal-body">


                    Memberikan pelayanan kesehatan anak,
                    pemantauan tumbuh kembang,
                    imunisasi, dan konsultasi kesehatan anak.


                </div>


            </div>


        </div>


    </div>









    <!-- MODAL MATA -->


    <div class="modal fade" id="modalMata">


        <div class="modal-dialog modal-dialog-centered">


            <div class="modal-content">


                <div class="modal-header">


                    <h5 class="modal-title">

                        Poli Mata

                    </h5>



                    <button class="btn-close btn-close-white" data-bs-dismiss="modal">

                    </button>


                </div>



                <div class="modal-body">


                    Melayani pemeriksaan mata,
                    gangguan penglihatan,
                    serta konsultasi kesehatan mata.


                </div>


            </div>


        </div>


    </div>









    <!-- MODAL KULIT -->


    <div class="modal fade" id="modalKulit">


        <div class="modal-dialog modal-dialog-centered">


            <div class="modal-content">


                <div class="modal-header">


                    <h5 class="modal-title">

                        Poli Kulit

                    </h5>



                    <button class="btn-close btn-close-white" data-bs-dismiss="modal">

                    </button>


                </div>



                <div class="modal-body">


                    Menyediakan layanan konsultasi
                    dan perawatan kesehatan kulit,
                    alergi, serta berbagai gangguan kulit.


                </div>


            </div>


        </div>


    </div>

<!-- ================= CTA + CONTACT INFO ================= -->

<section class="pt-5 pb-0">


    <div class="container">


        <div class="card border-0 shadow rounded-5 overflow-hidden">


            <div class="card-body p-0">


                <div class="row g-0 align-items-stretch">





                    <!-- ================= CTA DAFTAR POLI ================= -->


                    <div class="col-lg-8 bg-dark text-white p-4 p-lg-5 d-flex align-items-center">


                        <div>


                            <span class="badge bg-success rounded-pill px-3 py-2 mb-3">


                                <i class="fas fa-calendar-check me-2"></i>


                                Layanan Pasien


                            </span>





                            <h2 class="fw-bold mb-3">


                                Butuh Pemeriksaan Kesehatan?


                            </h2>





                            <p class="text-white-50 mb-4">


                                Pilih poli yang sesuai dengan kebutuhan Anda
                                dan lakukan pendaftaran untuk mendapatkan
                                pelayanan kesehatan terbaik dari Poliklinik Udinus.


                            </p>






                            <a href="daftarPoliklinik.php"

                            class="btn btn-success rounded-pill px-4 py-2">


                                <i class="fas fa-calendar-plus me-2"></i>


                                Daftar Poli Sekarang


                            </a>



                        </div>


                    </div>









                    <!-- ================= CONTACT INFO ================= -->


                    <div class="col-lg-4 p-4 p-lg-5">


                        <h3 class="fw-bold mb-4">


                            Informasi Poliklinik


                        </h3>






                        <div class="mb-4">


                            <h6 class="fw-bold mb-2">


                                <i class="fas fa-map-marker-alt text-success me-2"></i>


                                Lokasi


                            </h6>


                            <p class="text-muted mb-0">


                                Jl. Nakula 1,
                                Pendrikan Kidul,
                                Semarang


                            </p>


                        </div>







                        <div class="mb-4">


                            <h6 class="fw-bold mb-2">


                                <i class="fas fa-clock text-primary me-2"></i>


                                Jam Pelayanan


                            </h6>


                            <p class="text-muted mb-0">


                                Senin - Jumat

                                <br>

                                08.00 - 22.00 WIB


                            </p>


                        </div>








                        <div>


                            <h6 class="fw-bold mb-2">


                                <i class="fas fa-phone text-warning me-2"></i>


                                Kontak


                            </h6>


                            <p class="text-muted mb-0">


                                +62 234 567 8821

                                <br>

                                poliklinikudinus@gmail.com


                            </p>


                        </div>




                    </div>






                </div>


            </div>


        </div>


    </div>


</section>








    <!-- ================= SCRIPT ================= -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</div>

</body>


</html>