<?php

include 'config/koneksi.php';


// ======================================================
// DEFAULT DATA
// ======================================================

$jumlah_pasien = 0;
$jumlah_dokter = 0;
$jumlah_poli   = 0;
$jumlah_obat   = 0;


// ======================================================
// QUERY JUMLAH DATA
// ======================================================

$query_jml_pasien = "SELECT COUNT(*) AS jumlah_pasien FROM pasien";
$query_jml_dokter = "SELECT COUNT(*) AS jumlah_dokter FROM dokter";
$query_jml_poli   = "SELECT COUNT(*) AS jumlah_poli FROM poli";
$query_jml_obat   = "SELECT COUNT(*) AS jumlah_obat FROM obat";


// ======================================================
// PASIEN
// ======================================================

$result_pasien = mysqli_query($mysqli, $query_jml_pasien);

if ($result_pasien) {

    $row_pasien = mysqli_fetch_assoc($result_pasien);

    $jumlah_pasien = (int) $row_pasien['jumlah_pasien'];

}


// ======================================================
// DOKTER
// ======================================================

$result_dokter = mysqli_query($mysqli, $query_jml_dokter);

if ($result_dokter) {

    $row_dokter = mysqli_fetch_assoc($result_dokter);

    $jumlah_dokter = (int) $row_dokter['jumlah_dokter'];

}


// ======================================================
// POLI
// ======================================================

$result_poli = mysqli_query($mysqli, $query_jml_poli);

if ($result_poli) {

    $row_poli = mysqli_fetch_assoc($result_poli);

    $jumlah_poli = (int) $row_poli['jumlah_poli'];

}


// ======================================================
// OBAT
// ======================================================

$result_obat = mysqli_query($mysqli, $query_jml_obat);

if ($result_obat) {

    $row_obat = mysqli_fetch_assoc($result_obat);

    $jumlah_obat = (int) $row_obat['jumlah_obat'];

}

?>


<section class="py-2">


    <!-- ====================================================== -->
    <!-- HEADER DASHBOARD -->
    <!-- ====================================================== -->

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">


        <div class="bg-dark text-white p-4 p-lg-5">


            <div class="row align-items-center g-4">


                <!-- LEFT -->

                <div class="col-lg-8">


                    <div class="d-flex align-items-center">


                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:60px;
                                height:60px;
                                min-width:60px;
                            ">


                            <i class="fas fa-user-shield fa-lg"></i>


                        </div>



                        <div>


                            <small class="text-white-50 d-block mb-1">

                                Sistem Informasi Poliklinik Udinus

                            </small>


                            <h3 class="fw-bold mb-1">

                                Selamat Datang, Admin

                            </h3>


                            <p class="mb-0 text-white-50">

                                Kelola seluruh data dan layanan poliklinik melalui dashboard administrator.

                            </p>


                        </div>


                    </div>


                </div>



                <!-- RIGHT -->

                <div class="col-lg-4 text-lg-end">


                    <div class="d-inline-flex align-items-center bg-white bg-opacity-10 rounded-4 px-4 py-3">


                        <i class="fas fa-database text-success me-3"></i>


                        <div class="text-start">


                            <small class="text-white-50 d-block">

                                Total Data Utama

                            </small>


                            <span class="fw-bold fs-4">

                                <?php
                                echo number_format(
                                    $jumlah_pasien +
                                    $jumlah_dokter +
                                    $jumlah_poli +
                                    $jumlah_obat
                                );
                                ?>

                            </span>


                        </div>


                    </div>


                </div>


            </div>


        </div>


    </div>





    <!-- ====================================================== -->
    <!-- STATISTIC CARDS -->
    <!-- ====================================================== -->

    <div class="row g-4 mb-4">



        <!-- PASIEN -->

        <div class="col-xl-3 col-lg-6 col-md-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex justify-content-between align-items-start mb-4">


                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center"
                            style="
                                width:55px;
                                height:55px;
                                min-width:55px;
                            ">


                            <i class="fas fa-users fa-lg"></i>


                        </div>



                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">

                            Pasien

                        </span>


                    </div>



                    <small class="text-secondary d-block mb-1">

                        Jumlah Pasien

                    </small>


                    <h2 class="fw-bold text-dark mb-3">

                        <?php echo number_format($jumlah_pasien); ?>

                    </h2>



                    <a href="pasien.php"
                        class="text-decoration-none fw-semibold text-primary">


                        Kelola Pasien

                        <i class="fas fa-arrow-right ms-1"></i>


                    </a>


                </div>


            </div>


        </div>





        <!-- DOKTER -->

        <div class="col-xl-3 col-lg-6 col-md-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex justify-content-between align-items-start mb-4">


                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                            style="
                                width:55px;
                                height:55px;
                                min-width:55px;
                            ">


                            <i class="fas fa-user-md fa-lg"></i>


                        </div>



                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">

                            Dokter

                        </span>


                    </div>



                    <small class="text-secondary d-block mb-1">

                        Total Dokter

                    </small>


                    <h2 class="fw-bold text-dark mb-3">

                        <?php echo number_format($jumlah_dokter); ?>

                    </h2>



                    <a href="dokter.php"
                        class="text-decoration-none fw-semibold text-success">


                        Kelola Dokter

                        <i class="fas fa-arrow-right ms-1"></i>


                    </a>


                </div>


            </div>


        </div>





        <!-- POLI -->

        <div class="col-xl-3 col-lg-6 col-md-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex justify-content-between align-items-start mb-4">


                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center"
                            style="
                                width:55px;
                                height:55px;
                                min-width:55px;
                            ">


                            <i class="fas fa-hospital fa-lg"></i>


                        </div>



                        <span class="badge bg-warning bg-opacity-10 text-dark px-3 py-2">

                            Poli

                        </span>


                    </div>



                    <small class="text-secondary d-block mb-1">

                        Total Poli

                    </small>


                    <h2 class="fw-bold text-dark mb-3">

                        <?php echo number_format($jumlah_poli); ?>

                    </h2>



                    <a href="poli.php"
                        class="text-decoration-none fw-semibold text-warning">


                        Kelola Poli

                        <i class="fas fa-arrow-right ms-1"></i>


                    </a>


                </div>


            </div>


        </div>





        <!-- OBAT -->

        <div class="col-xl-3 col-lg-6 col-md-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex justify-content-between align-items-start mb-4">


                        <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center"
                            style="
                                width:55px;
                                height:55px;
                                min-width:55px;
                            ">


                            <i class="fas fa-pills fa-lg"></i>


                        </div>



                        <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2">

                            Obat

                        </span>


                    </div>



                    <small class="text-secondary d-block mb-1">

                        Total Jenis Obat

                    </small>


                    <h2 class="fw-bold text-dark mb-3">

                        <?php echo number_format($jumlah_obat); ?>

                    </h2>



                    <a href="obat.php"
                        class="text-decoration-none fw-semibold text-danger">


                        Kelola Obat

                        <i class="fas fa-arrow-right ms-1"></i>


                    </a>


                </div>


            </div>


        </div>


    </div>







    <!-- ====================================================== -->
    <!-- CHART + QUICK MENU -->
    <!-- ====================================================== -->

    <div class="row g-4">



        <!-- CHART -->

        <div class="col-xl-8 col-lg-7">


            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">


                <!-- HEADER -->

                <div class="card-header bg-white border-0 p-4 pb-0">


                    <div class="d-flex align-items-center justify-content-between">


                        <div>


                            <h5 class="fw-bold text-dark mb-1">

                                Statistik Data Poliklinik

                            </h5>


                            <small class="text-secondary">

                                Perbandingan jumlah data utama sistem

                            </small>


                        </div>



                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                            style="
                                width:45px;
                                height:45px;
                                min-width:45px;
                            ">


                            <i class="fas fa-chart-bar"></i>


                        </div>


                    </div>


                </div>




                <!-- BODY -->

                <div class="card-body p-4">


                    <div style="
                        position:relative;
                        width:100%;
                        height:360px;
                    ">


                        <canvas id="chartAdmin"></canvas>


                    </div>


                </div>


            </div>


        </div>







        <!-- QUICK MENU -->

        <div class="col-xl-4 col-lg-5">


            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">


                <!-- HEADER -->

                <div class="bg-dark text-white p-4">


                    <div class="d-flex align-items-center">


                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:45px;
                                height:45px;
                                min-width:45px;
                            ">


                            <i class="fas fa-bolt"></i>


                        </div>


                        <div>


                            <h5 class="fw-bold mb-1">

                                Menu Cepat

                            </h5>


                            <small class="text-white-50">

                                Kelola data poliklinik

                            </small>


                        </div>


                    </div>


                </div>




                <!-- BODY -->

                <div class="card-body p-4">


                    <!-- PASIEN -->

                    <a href="pasien.php"
                        class="d-flex align-items-center text-decoration-none text-dark border rounded-3 p-3 mb-3">


                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:42px;
                                height:42px;
                                min-width:42px;
                            ">


                            <i class="fas fa-users"></i>


                        </div>


                        <div class="flex-grow-1">


                            <div class="fw-semibold">

                                Data Pasien

                            </div>


                            <small class="text-secondary">

                                Lihat dan kelola pasien

                            </small>


                        </div>


                        <i class="fas fa-chevron-right text-secondary"></i>


                    </a>





                    <!-- DOKTER -->

                    <a href="dokter.php"
                        class="d-flex align-items-center text-decoration-none text-dark border rounded-3 p-3 mb-3">


                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:42px;
                                height:42px;
                                min-width:42px;
                            ">


                            <i class="fas fa-user-md"></i>


                        </div>


                        <div class="flex-grow-1">


                            <div class="fw-semibold">

                                Data Dokter

                            </div>


                            <small class="text-secondary">

                                Lihat dan kelola dokter

                            </small>


                        </div>


                        <i class="fas fa-chevron-right text-secondary"></i>


                    </a>





                    <!-- POLI -->

                    <a href="poli.php"
                        class="d-flex align-items-center text-decoration-none text-dark border rounded-3 p-3 mb-3">


                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:42px;
                                height:42px;
                                min-width:42px;
                            ">


                            <i class="fas fa-hospital"></i>


                        </div>


                        <div class="flex-grow-1">


                            <div class="fw-semibold">

                                Data Poli

                            </div>


                            <small class="text-secondary">

                                Kelola layanan poli

                            </small>


                        </div>


                        <i class="fas fa-chevron-right text-secondary"></i>


                    </a>





                    <!-- OBAT -->

                    <a href="obat.php"
                        class="d-flex align-items-center text-decoration-none text-dark border rounded-3 p-3">


                        <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:42px;
                                height:42px;
                                min-width:42px;
                            ">


                            <i class="fas fa-pills"></i>


                        </div>


                        <div class="flex-grow-1">


                            <div class="fw-semibold">

                                Data Obat

                            </div>


                            <small class="text-secondary">

                                Kelola data obat

                            </small>


                        </div>


                        <i class="fas fa-chevron-right text-secondary"></i>


                    </a>


                </div>


            </div>


        </div>


    </div>


</section>





<!-- ====================================================== -->
<!-- CHART JS -->
<!-- ====================================================== -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

document.addEventListener("DOMContentLoaded", function () {


    const chartElement = document.getElementById("chartAdmin");


    if (!chartElement) {
        return;
    }


    new Chart(chartElement, {


        type: "bar",


        data: {


            labels: [
                "Pasien",
                "Dokter",
                "Poli",
                "Obat"
            ],


            datasets: [{

                label: "Jumlah",

                data: [

                    <?php echo $jumlah_pasien; ?>,

                    <?php echo $jumlah_dokter; ?>,

                    <?php echo $jumlah_poli; ?>,

                    <?php echo $jumlah_obat; ?>

                ],


                backgroundColor: [

                    "rgba(13, 110, 253, 0.75)",

                    "rgba(25, 135, 84, 0.75)",

                    "rgba(255, 193, 7, 0.75)",

                    "rgba(220, 53, 69, 0.75)"

                ],


                borderColor: [

                    "rgb(13, 110, 253)",

                    "rgb(25, 135, 84)",

                    "rgb(255, 193, 7)",

                    "rgb(220, 53, 69)"

                ],


                borderWidth: 1,


                borderRadius: 8,


                maxBarThickness: 55

            }]


        },



        options: {


            responsive: true,


            maintainAspectRatio: false,


            plugins: {


                legend: {

                    display: false

                },


                tooltip: {

                    displayColors: false

                }


            },



            scales: {


                y: {


                    beginAtZero: true,


                    ticks: {

                        precision: 0,
                        stepSize: 1

                    },


                    grid: {

                        color: "rgba(0,0,0,0.05)"

                    }


                },



                x: {


                    grid: {

                        display: false

                    }


                }


            }


        }


    });


});

</script>