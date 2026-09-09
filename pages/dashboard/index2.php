<?php

require_once 'config/koneksi.php';


// ======================================================
// DATA SESSION
// ======================================================

$id_poli = isset($_SESSION['id_poli'])
    ? (int) $_SESSION['id_poli']
    : 0;

$username = $_SESSION['username'] ?? 'Dokter';


// ======================================================
// NAMA POLI
// ======================================================

$nama_poli = '-';

$queryPoli = "
    SELECT nama_poli
    FROM poli
    WHERE id = $id_poli
    LIMIT 1
";

$resultPoli = mysqli_query($mysqli, $queryPoli);

if (
    $resultPoli &&
    mysqli_num_rows($resultPoli) > 0
) {

    $dataPoli = mysqli_fetch_assoc($resultPoli);

    $nama_poli = $dataPoli['nama_poli'];

}


// ======================================================
// TOTAL PASIEN
// ======================================================

$total_pasien = 0;

$queryTotalPasien = "
    SELECT COUNT(*) AS total_pasien
    FROM pasien
";

$resultTotalPasien = mysqli_query(
    $mysqli,
    $queryTotalPasien
);

if ($resultTotalPasien) {

    $dataTotalPasien =
        mysqli_fetch_assoc($resultTotalPasien);

    $total_pasien =
        (int) $dataTotalPasien['total_pasien'];

}


// ======================================================
// PASIEN SUDAH DIPERIKSA
// ======================================================

$jumlah_pasien_diperiksa = 0;

$querySudahDiperiksa = "
    SELECT
        COUNT(DISTINCT pasien.id)
        AS jumlah_pasien_diperiksa
    FROM daftar_poli
    INNER JOIN periksa
        ON daftar_poli.id = periksa.id_daftar_poli
    INNER JOIN pasien
        ON daftar_poli.id_pasien = pasien.id
    WHERE daftar_poli.status_periksa = '1'
";

$resultSudahDiperiksa = mysqli_query(
    $mysqli,
    $querySudahDiperiksa
);

if ($resultSudahDiperiksa) {

    $dataSudahDiperiksa =
        mysqli_fetch_assoc($resultSudahDiperiksa);

    $jumlah_pasien_diperiksa =
        (int) $dataSudahDiperiksa['jumlah_pasien_diperiksa'];

}


// ======================================================
// PASIEN BELUM DIPERIKSA
// ======================================================

$jumlah_pasien_belum_diperiksa = 0;

$queryBelumDiperiksa = "
    SELECT
        COUNT(DISTINCT pasien.id)
        AS jumlah_pasien_belum_diperiksa
    FROM daftar_poli
    INNER JOIN pasien
        ON daftar_poli.id_pasien = pasien.id
    WHERE daftar_poli.status_periksa = '0'
";

$resultBelumDiperiksa = mysqli_query(
    $mysqli,
    $queryBelumDiperiksa
);

if ($resultBelumDiperiksa) {

    $dataBelumDiperiksa =
        mysqli_fetch_assoc($resultBelumDiperiksa);

    $jumlah_pasien_belum_diperiksa =
        (int) $dataBelumDiperiksa['jumlah_pasien_belum_diperiksa'];

}


// ======================================================
// PERSENTASE PEMERIKSAAN
// ======================================================

$totalStatus =
    $jumlah_pasien_diperiksa +
    $jumlah_pasien_belum_diperiksa;


$persentaseSelesai = 0;


if ($totalStatus > 0) {

    $persentaseSelesai = round(
        ($jumlah_pasien_diperiksa / $totalStatus) * 100
    );

}

?>


<section class="py-2">


    <!-- ====================================================== -->
    <!-- HERO / WELCOME -->
    <!-- ====================================================== -->

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">


        <div class="bg-dark text-white p-4 p-lg-5">


            <div class="row align-items-center g-4">


                <!-- LEFT -->

                <div class="col-lg-8">


                    <div class="d-flex align-items-center">


                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:68px;
                                height:68px;
                                min-width:68px;
                            ">

                            <i class="fas fa-user-md fa-2x"></i>

                        </div>


                        <div>


                            <small class="text-white-50 d-block mb-1">

                                Sistem Informasi Poliklinik Udinus

                            </small>


                            <h2 class="fw-bold mb-1">

                                Selamat Datang,
                                <?php
                                echo htmlspecialchars(
                                    $username
                                );
                                ?>

                            </h2>


                            <p class="text-white-50 mb-0">

                                Kelola pelayanan pasien dan jadwal pemeriksaan
                                pada
                                <strong class="text-white">

                                    <?php
                                    echo htmlspecialchars(
                                        $nama_poli
                                    );
                                    ?>

                                </strong>

                            </p>


                        </div>


                    </div>


                </div>




                <!-- RIGHT -->

                <div class="col-lg-4 text-lg-end">


                    <div class="d-inline-flex align-items-center bg-white bg-opacity-10 rounded-4 px-4 py-3">


                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:42px;
                                height:42px;
                                min-width:42px;
                            ">

                            <i class="fas fa-hospital"></i>

                        </div>


                        <div class="text-start">


                            <small class="text-white-50 d-block">

                                Poli Anda

                            </small>


                            <span class="fw-bold">

                                <?php
                                echo htmlspecialchars(
                                    $nama_poli
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


        <!-- TOTAL PASIEN -->

        <div class="col-xl-4 col-md-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex justify-content-between align-items-start mb-4">


                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center"
                            style="
                                width:58px;
                                height:58px;
                                min-width:58px;
                            ">

                            <i class="fas fa-users fa-lg"></i>

                        </div>


                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">

                            Pasien

                        </span>


                    </div>


                    <small class="text-secondary d-block">

                        Total Pasien

                    </small>


                    <h2 class="fw-bold text-dark mb-2">

                        <?php
                        echo number_format(
                            $total_pasien
                        );
                        ?>

                    </h2>


                    <small class="text-secondary">

                        Pasien terdaftar pada sistem

                    </small>


                </div>


            </div>


        </div>





        <!-- SUDAH DIPERIKSA -->

        <div class="col-xl-4 col-md-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex justify-content-between align-items-start mb-4">


                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                            style="
                                width:58px;
                                height:58px;
                                min-width:58px;
                            ">

                            <i class="fas fa-check-circle fa-lg"></i>

                        </div>


                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2">

                            Selesai

                        </span>


                    </div>


                    <small class="text-secondary d-block">

                        Sudah Diperiksa

                    </small>


                    <h2 class="fw-bold text-dark mb-2">

                        <?php
                        echo number_format(
                            $jumlah_pasien_diperiksa
                        );
                        ?>

                    </h2>


                    <small class="text-success">

                        <i class="fas fa-check me-1"></i>

                        Pemeriksaan selesai

                    </small>


                </div>


            </div>


        </div>





        <!-- MENUNGGU -->

        <div class="col-xl-4 col-md-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex justify-content-between align-items-start mb-4">


                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center"
                            style="
                                width:58px;
                                height:58px;
                                min-width:58px;
                            ">

                            <i class="fas fa-user-clock fa-lg"></i>

                        </div>


                        <span class="badge bg-warning bg-opacity-10 text-dark rounded-pill px-3 py-2">

                            Menunggu

                        </span>


                    </div>


                    <small class="text-secondary d-block">

                        Belum Diperiksa

                    </small>


                    <h2 class="fw-bold text-dark mb-2">

                        <?php
                        echo number_format(
                            $jumlah_pasien_belum_diperiksa
                        );
                        ?>

                    </h2>


                    <small class="text-warning">

                        <i class="fas fa-clock me-1"></i>

                        Menunggu pelayanan

                    </small>


                </div>


            </div>


        </div>


    </div>






    <!-- ====================================================== -->
    <!-- CHART + RINGKASAN -->
    <!-- ====================================================== -->

    <div class="row g-4 mb-4">


        <!-- CHART -->

        <div class="col-xl-8 col-lg-7">


            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">


                <div class="card-header bg-white border-0 p-4 pb-0">


                    <div class="d-flex justify-content-between align-items-center">


                        <div>


                            <h5 class="fw-bold text-dark mb-1">

                                Statistik Pelayanan Pasien

                            </h5>


                            <small class="text-secondary">

                                Perbandingan data pasien berdasarkan status pemeriksaan

                            </small>


                        </div>


                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center"
                            style="
                                width:46px;
                                height:46px;
                                min-width:46px;
                            ">

                            <i class="fas fa-chart-bar"></i>

                        </div>


                    </div>


                </div>




                <div class="card-body p-4">


                    <div style="
                        position:relative;
                        height:360px;
                        width:100%;
                    ">

                        <canvas id="chartPasien"></canvas>

                    </div>


                </div>


            </div>


        </div>






        <!-- RINGKASAN -->

        <div class="col-xl-4 col-lg-5">


            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">


                <div class="bg-dark text-white p-4">


                    <div class="d-flex align-items-center">


                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:45px;
                                height:45px;
                                min-width:45px;
                            ">

                            <i class="fas fa-chart-pie"></i>

                        </div>


                        <div>


                            <h5 class="fw-bold mb-1">

                                Ringkasan Pelayanan

                            </h5>


                            <small class="text-white-50">

                                Progres pemeriksaan pasien

                            </small>


                        </div>


                    </div>


                </div>




                <div class="card-body p-4">


                    <!-- PERSENTASE -->

                    <div class="text-center py-3">


                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="
                                width:110px;
                                height:110px;
                            ">


                            <div>


                                <div class="fw-bold"
                                    style="font-size:30px;">

                                    <?php
                                    echo $persentaseSelesai;
                                    ?>%

                                </div>


                                <small>

                                    Selesai

                                </small>


                            </div>


                        </div>


                        <p class="text-secondary mb-4">

                            Persentase pemeriksaan yang sudah selesai

                        </p>


                    </div>




                    <!-- PROGRESS -->

                    <div class="mb-4">


                        <div class="d-flex justify-content-between mb-2">


                            <span class="text-secondary">

                                Progress

                            </span>


                            <span class="fw-semibold">

                                <?php
                                echo $jumlah_pasien_diperiksa;
                                ?>

                                /

                                <?php
                                echo $totalStatus;
                                ?>

                            </span>


                        </div>


                        <div class="progress"
                            style="height:10px;">


                            <div class="progress-bar bg-success"
                                role="progressbar"
                                style="
                                    width:
                                    <?php
                                    echo $persentaseSelesai;
                                    ?>%;
                                "
                                aria-valuenow="<?php echo $persentaseSelesai; ?>"
                                aria-valuemin="0"
                                aria-valuemax="100">
                            </div>


                        </div>


                    </div>




                    <div class="d-flex justify-content-between border-top pt-3 mb-3">


                        <span class="text-secondary">

                            Sudah diperiksa

                        </span>


                        <strong class="text-success">

                            <?php
                            echo number_format(
                                $jumlah_pasien_diperiksa
                            );
                            ?>

                        </strong>


                    </div>



                    <div class="d-flex justify-content-between">


                        <span class="text-secondary">

                            Menunggu

                        </span>


                        <strong class="text-warning">

                            <?php
                            echo number_format(
                                $jumlah_pasien_belum_diperiksa
                            );
                            ?>

                        </strong>


                    </div>


                </div>


            </div>


        </div>


    </div>






    <!-- ====================================================== -->
    <!-- QUICK MENU -->
    <!-- ====================================================== -->

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">


        <div class="card-header bg-white border-0 p-4">


            <div class="d-flex justify-content-between align-items-center">


                <div>


                    <h5 class="fw-bold mb-1">

                        Akses Cepat

                    </h5>


                    <small class="text-secondary">

                        Menu pelayanan dokter

                    </small>


                </div>


                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                    style="
                        width:45px;
                        height:45px;
                    ">

                    <i class="fas fa-bolt"></i>

                </div>


            </div>


        </div>




        <div class="card-body p-4">


            <div class="row g-3">


                <!-- JADWAL -->

                <div class="col-lg-4">


                    <a href="jadwalPeriksa.php"
                        class="text-decoration-none">


                        <div class="border rounded-4 p-3 h-100">


                            <div class="d-flex align-items-center">


                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="
                                        width:48px;
                                        height:48px;
                                        min-width:48px;
                                    ">

                                    <i class="fas fa-calendar-alt"></i>

                                </div>


                                <div class="flex-grow-1">


                                    <div class="fw-semibold text-dark">

                                        Jadwal Periksa

                                    </div>


                                    <small class="text-secondary">

                                        Kelola jadwal praktik

                                    </small>


                                </div>


                                <i class="fas fa-chevron-right text-secondary"></i>


                            </div>


                        </div>


                    </a>


                </div>





                <!-- PERIKSA -->

                <div class="col-lg-4">


                    <a href="periksaPasien.php"
                        class="text-decoration-none">


                        <div class="border rounded-4 p-3 h-100">


                            <div class="d-flex align-items-center">


                                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="
                                        width:48px;
                                        height:48px;
                                        min-width:48px;
                                    ">

                                    <i class="fas fa-stethoscope"></i>

                                </div>


                                <div class="flex-grow-1">


                                    <div class="fw-semibold text-dark">

                                        Periksa Pasien

                                    </div>


                                    <small class="text-secondary">

                                        Proses pemeriksaan pasien

                                    </small>


                                </div>


                                <i class="fas fa-chevron-right text-secondary"></i>


                            </div>


                        </div>


                    </a>


                </div>





                <!-- RIWAYAT -->

                <div class="col-lg-4">


                    <a href="riwayatPasien.php"
                        class="text-decoration-none">


                        <div class="border rounded-4 p-3 h-100">


                            <div class="d-flex align-items-center">


                                <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="
                                        width:48px;
                                        height:48px;
                                        min-width:48px;
                                    ">

                                    <i class="fas fa-history"></i>

                                </div>


                                <div class="flex-grow-1">


                                    <div class="fw-semibold text-dark">

                                        Riwayat Pasien

                                    </div>


                                    <small class="text-secondary">

                                        Lihat riwayat pemeriksaan

                                    </small>


                                </div>


                                <i class="fas fa-chevron-right text-secondary"></i>


                            </div>


                        </div>


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


    const chartElement =
        document.getElementById("chartPasien");


    if (!chartElement) {
        return;
    }


    new Chart(chartElement, {


        type: "bar",


        data: {


            labels: [

                "Total Pasien",

                "Sudah Diperiksa",

                "Menunggu"

            ],


            datasets: [{


                label: "Jumlah Pasien",


                data: [

                    <?php echo $total_pasien; ?>,

                    <?php echo $jumlah_pasien_diperiksa; ?>,

                    <?php echo $jumlah_pasien_belum_diperiksa; ?>

                ],


                // WARNA BERBEDA SETIAP BAR
                backgroundColor: [

                    "rgba(13, 110, 253, 0.75)",

                    "rgba(25, 135, 84, 0.75)",

                    "rgba(255, 193, 7, 0.80)"

                ],


                borderColor: [

                    "rgb(13, 110, 253)",

                    "rgb(25, 135, 84)",

                    "rgb(255, 193, 7)"

                ],


                borderWidth: 1,


                borderRadius: 10,


                borderSkipped: false,


                maxBarThickness: 70


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

                    displayColors: true

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

                    },


                    border: {

                        display: false

                    }


                },


                x: {


                    grid: {

                        display: false

                    },


                    border: {

                        display: false

                    }


                }


            }


        }


    });


});

</script>