<?php

require 'config/koneksi.php';

$id = $_GET['id'] ?? null;


if (!$id) {

    echo "
    <div class='alert alert-danger'>
        Data tidak ditemukan
    </div>";

    exit;

}



$query = "

SELECT 

    daftar_poli.id AS idDaftarPoli,

    poli.nama_poli,

    dokter.nama AS nama_dokter,

    jadwal_periksa.hari,

    DATE_FORMAT(jadwal_periksa.jam_mulai,'%H:%i') AS jamMulai,

    DATE_FORMAT(jadwal_periksa.jam_selesai,'%H:%i') AS jamSelesai,

    daftar_poli.no_antrian,

    p.id AS idPeriksa,

    p.tgl_periksa,

    p.catatan,

    p.biaya_periksa,

    GROUP_CONCAT(o.nama_obat SEPARATOR ',') AS namaObat


FROM daftar_poli


INNER JOIN jadwal_periksa

ON daftar_poli.id_jadwal = jadwal_periksa.id



INNER JOIN dokter

ON jadwal_periksa.id_dokter = dokter.id



INNER JOIN poli

ON dokter.id_poli = poli.id



LEFT JOIN periksa p

ON daftar_poli.id = p.id_daftar_poli



LEFT JOIN detail_periksa dp

ON p.id = dp.id_periksa



LEFT JOIN obat o

ON dp.id_obat = o.id



WHERE daftar_poli.id = '$id'


GROUP BY

    daftar_poli.id,

    poli.nama_poli,

    dokter.nama,

    jadwal_periksa.hari,

    jadwal_periksa.jam_mulai,

    jadwal_periksa.jam_selesai,

    daftar_poli.no_antrian,

    p.id,

    p.tgl_periksa,

    p.catatan,

    p.biaya_periksa

";



$result = mysqli_query($mysqli, $query);



$data = mysqli_fetch_assoc($result);



if (!$data) {

    echo "

    <div class='alert alert-warning'>

    Data pemeriksaan tidak ditemukan

    </div>

    ";

    exit;

}



?>





<div class="container py-4">



    <div class="card shadow border-0 rounded-4 overflow-hidden">



        <!-- HEADER -->

        <div class="card-header bg-success text-white p-4">


            <h4 class="mb-0 fw-bold">


                <i class="fas fa-file-medical me-2"></i>


                Detail Pemeriksaan


            </h4>


        </div>






        <div class="card-body p-4">



            <div class="row g-4">






                <!-- DETAIL DOKTER -->


                <div class="col-lg-8">


                    <div class="card border-0 bg-light rounded-4 h-100">


                        <div class="card-body p-4">



                            <h3 class="fw-bold">


                                <i class="fas fa-user-md text-success me-2"></i>


                                <?= htmlspecialchars($data['nama_dokter']); ?>


                            </h3>




                            <h5 class="text-muted">

                                Poli <?= htmlspecialchars($data['nama_poli']); ?>

                            </h5>




                            <hr>




                            <div class="row">



                                <div class="col-md-6 mb-3">


                                    <div class="d-flex">


                                        <i class="fas fa-calendar text-success me-3 mt-1"></i>


                                        <div>


                                            <b>Hari Praktik</b>


                                            <br>


                                            <span class="text-muted">

                                                <?= $data['hari']; ?>

                                            </span>


                                        </div>


                                    </div>


                                </div>







                                <div class="col-md-6 mb-3">


                                    <div class="d-flex">


                                        <i class="fas fa-clock text-success me-3 mt-1"></i>


                                        <div>


                                            <b>Jam Praktik</b>


                                            <br>


                                            <span class="text-muted">

                                                <?= $data['jamMulai']; ?>

                                                -

                                                <?= $data['jamSelesai']; ?>


                                            </span>


                                        </div>


                                    </div>


                                </div>



                            </div>





                            <hr>





                            <h5 class="fw-bold">


                                <i class="fas fa-pills text-danger me-2"></i>


                                Obat Yang Diberikan


                            </h5>





                            <div class="mt-3">


                                <?php


                                if (!empty($data['namaObat'])) {


                                    $listObat = explode(",", $data['namaObat']);


                                    foreach ($listObat as $index => $obat) {


                                        ?>

                                        <div class="mb-2">


                                            <span class="badge bg-success">

                                                <?= $index + 1 ?>

                                            </span>


                                            <?= htmlspecialchars($obat); ?>


                                        </div>


                                        <?php


                                    }


                                } else {


                                    ?>

                                    <span class="text-muted">

                                        Belum ada obat diberikan

                                    </span>


                                    <?php

                                }


                                ?>


                            </div>







                            <hr>





                            <h5 class="fw-bold text-danger">


                                <i class="fas fa-money-bill-wave me-2"></i>


                                Biaya Pemeriksaan :


                                <?php if ($data['biaya_periksa'] !== null): ?>


                                    Rp <?= number_format($data['biaya_periksa'], 0, ',', '.'); ?>


                                <?php else: ?>


                                    <span class="text-muted">

                                        Belum tersedia

                                    </span>


                                <?php endif; ?>


                            </h5>






                            <?php if (!empty($data['catatan'])): ?>


                                <hr>


                                <h5 class="fw-bold">

                                    <i class="fas fa-notes-medical text-primary me-2"></i>

                                    Catatan Dokter

                                </h5>


                                <p class="text-muted">

                                    <?= htmlspecialchars($data['catatan']); ?>

                                </p>



                            <?php endif; ?>




                        </div>


                    </div>


                </div>









                <!-- NOMOR ANTRIAN -->


                <div class="col-lg-4">


                    <div class="card bg-dark text-white border-0 rounded-4 h-100">


                        <div class="card-body text-center d-flex flex-column justify-content-center">



                            <h5>

                                Nomor Antrian

                            </h5>




                            <div class="display-1 fw-bold text-white">


                                <?= $data['no_antrian']; ?>


                            </div>




                        </div>


                    </div>


                </div>





            </div>


        </div>






        <div class="card-footer bg-white border-0 p-4">


            <a href="daftarPoliklinik.php" class="btn btn-secondary rounded-pill px-4">


                <i class="fas fa-arrow-left me-2"></i>


                Kembali


            </a>


        </div>






    </div>


</div>