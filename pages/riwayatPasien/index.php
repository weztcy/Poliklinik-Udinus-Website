<?php

require 'config/koneksi.php';


// ======================================================
// SESSION DOKTER
// ======================================================

$id_dokter = isset($_SESSION['id'])
    ? (int) $_SESSION['id']
    : 0;



// ======================================================
// AMBIL DATA RIWAYAT KHUSUS DOKTER
// ======================================================


$dataRiwayat = [];



$query = "

SELECT 


    daftar_poli.status_periksa,


    periksa.id,


    pasien.id AS idPasien,


    pasien.nama AS namaPasien,


    pasien.alamat,


    pasien.no_ktp,


    pasien.no_hp,


    pasien.no_rm,


    periksa.tgl_periksa,


    dokter.nama AS namaDokter,


    daftar_poli.keluhan,


    periksa.catatan,



    GROUP_CONCAT(
        DISTINCT obat.nama_obat
        SEPARATOR ', '
    ) AS namaObat,



    SUM(obat.harga) AS hargaObat



FROM detail_periksa



INNER JOIN periksa

ON detail_periksa.id_periksa = periksa.id



INNER JOIN daftar_poli

ON periksa.id_daftar_poli = daftar_poli.id



INNER JOIN pasien

ON daftar_poli.id_pasien = pasien.id



INNER JOIN obat

ON detail_periksa.id_obat = obat.id



INNER JOIN jadwal_periksa

ON daftar_poli.id_jadwal = jadwal_periksa.id



INNER JOIN dokter

ON jadwal_periksa.id_dokter = dokter.id




WHERE 

daftar_poli.status_periksa='1'

AND dokter.id='$id_dokter'




GROUP BY


periksa.id,

pasien.id,

dokter.id,

daftar_poli.id



ORDER BY


periksa.tgl_periksa DESC



";



$result = mysqli_query(
    $mysqli,
    $query
);



if ($result) {


    while ($row = mysqli_fetch_assoc($result)) {


        $dataRiwayat[] = $row;


    }


}




// ======================================================
// STATISTIK KHUSUS DOKTER
// ======================================================


$totalRiwayat = count($dataRiwayat);



$listPasien = [];



foreach ($dataRiwayat as $data) {


    $listPasien[] = $data['idPasien'];


}



$totalPasien = count(
    array_unique($listPasien)
);



?>





<section class="py-2">


    <!-- ====================================================== -->
    <!-- HEADER -->
    <!-- ====================================================== -->


    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">


        <div class="bg-dark text-white p-4">


            <div class="row align-items-center g-3">


                <div class="col-md-8">


                    <div class="d-flex align-items-center">


                        <div class="bg-success rounded-circle 
                    d-flex align-items-center justify-content-center me-3" style="
                        width:55px;
                        height:55px;
                        min-width:55px;
                    ">


                            <i class="fas fa-history fa-lg"></i>


                        </div>




                        <div>


                            <h4 class="fw-bold mb-1">

                                Riwayat Pasien

                            </h4>


                            <small class="text-white-50">

                                Riwayat pemeriksaan pasien yang telah Anda tangani

                            </small>


                        </div>



                    </div>


                </div>





                <div class="col-md-4 text-md-end">


                    <span class="btn btn-success px-3 py-2 fw-semibold rounded-pill">


                        <i class="fas fa-file-medical me-2"></i>


                        <?php echo number_format($totalRiwayat); ?> Pemeriksaan


                    </span>


                </div>



            </div>


        </div>


    </div>







    <!-- ====================================================== -->
    <!-- STATISTIK -->
    <!-- ====================================================== -->


    <div class="row g-4 mb-4">



        <!-- TOTAL PEMERIKSAAN -->


        <div class="col-lg-4 col-md-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex align-items-center">


                        <div class="
bg-primary bg-opacity-10 
text-primary 
rounded-circle 
d-flex 
align-items-center 
justify-content-center 
me-3" style="
width:55px;
height:55px;
">


                            <i class="fas fa-notes-medical"></i>


                        </div>



                        <div>


                            <small class="text-secondary d-block">

                                Total Pemeriksaan

                            </small>


                            <h3 class="fw-bold mb-0">

                                <?php echo number_format($totalRiwayat); ?>

                            </h3>


                        </div>


                    </div>


                </div>


            </div>


        </div>







        <!-- TOTAL PASIEN -->


        <div class="col-lg-4 col-md-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex align-items-center">


                        <div class="
bg-success bg-opacity-10 
text-success 
rounded-circle 
d-flex 
align-items-center 
justify-content-center 
me-3" style="
width:55px;
height:55px;
">


                            <i class="fas fa-user-injured"></i>


                        </div>



                        <div>


                            <small class="text-secondary d-block">

                                Total Pasien

                            </small>


                            <h3 class="fw-bold mb-0">


                                <?php echo number_format($totalPasien); ?>


                            </h3>


                        </div>


                    </div>


                </div>


            </div>


        </div>









        <!-- STATUS -->


        <div class="col-lg-4 col-md-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex align-items-center">


                        <div class="
bg-warning bg-opacity-10 
text-warning 
rounded-circle 
d-flex 
align-items-center 
justify-content-center 
me-3" style="
width:55px;
height:55px;
">


                            <i class="fas fa-check-circle"></i>


                        </div>



                        <div>


                            <small class="text-secondary d-block">

                                Status

                            </small>


                            <h3 class="fw-bold mb-0">

                                Selesai

                            </h3>


                        </div>


                    </div>


                </div>


            </div>


        </div>



    </div>








    <!-- ====================================================== -->
    <!-- TABLE -->
    <!-- ====================================================== -->


    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">



        <div class="card-header bg-white border-0 p-4">


            <div class="d-flex justify-content-between align-items-center">


                <div>


                    <h5 class="fw-bold mb-1">

                        Daftar Riwayat Pemeriksaan

                    </h5>


                    <small class="text-secondary">

                        Data pasien berdasarkan pemeriksaan dokter

                    </small>


                </div>



                <div class="
bg-success 
bg-opacity-10 
text-success 
rounded-circle 
d-flex 
align-items-center 
justify-content-center" style="
width:45px;
height:45px;
">


                    <i class="fas fa-file-medical"></i>


                </div>



            </div>


        </div>








        <div class="card-body p-0">


            <div class="table-responsive">


                <table class="table table-hover align-middle mb-0">


                    <thead class="table-light">


                        <tr>


                            <th class="text-center px-4">
                                No
                            </th>


                            <th>
                                Pasien
                            </th>


                            <th>
                                No Rekam Medis
                            </th>


                            <th>
                                Tanggal Periksa
                            </th>


                            <th>
                                Dokter
                            </th>


                            <th class="text-center">
                                Aksi
                            </th>


                        </tr>


                    </thead>



                    <tbody>


                        <?php if (!empty($dataRiwayat)) { ?>


                            <?php

                            $no = 1;

                            foreach ($dataRiwayat as $data) {

                                ?>



                                <tr>



                                    <td class="text-center fw-semibold">


                                        <?php echo $no++; ?>


                                    </td>





                                    <td>


                                        <div class="d-flex align-items-center">


                                            <div class="
bg-primary 
bg-opacity-10 
text-primary 
rounded-circle 
d-flex 
align-items-center 
justify-content-center 
me-3" style="
width:42px;
height:42px;
">


                                                <i class="fas fa-user"></i>


                                            </div>



                                            <div>


                                                <div class="fw-semibold">

                                                    <?php echo htmlspecialchars($data['namaPasien']); ?>


                                                </div>


                                                <small class="text-secondary">

                                                    Pasien

                                                </small>


                                            </div>


                                        </div>


                                    </td>





                                    <td>


                                        <?php echo htmlspecialchars($data['no_rm']); ?>


                                    </td>




                                    <td>


                                        <i class="fas fa-calendar text-success me-2"></i>


                                        <?php echo $data['tgl_periksa']; ?>


                                    </td>




                                    <td>


                                        <?php echo htmlspecialchars($data['namaDokter']); ?>


                                    </td>





                                    <td class="text-center">


                                        <button type="button" class="btn btn-sm btn-success px-3" data-bs-toggle="modal"
                                            data-bs-target="#detailModal<?php echo $data['id']; ?>">


                                            <i class="fas fa-eye me-1"></i>

                                            Detail


                                        </button>


                                    </td>



                                </tr>





                            <?php } ?>



                        <?php } else { ?>



                            <tr>

                                <td colspan="6" class="text-center py-5">


                                    <i class="fas fa-folder-open fa-3x text-secondary mb-3"></i>


                                    <h6 class="fw-bold">

                                        Belum Ada Riwayat Pemeriksaan

                                    </h6>


                                    <small class="text-secondary">

                                        Belum ada pasien yang selesai diperiksa

                                    </small>



                                </td>

                            </tr>



                        <?php } ?>



                    </tbody>



                </table>


            </div>


        </div>


    </div>


</section>