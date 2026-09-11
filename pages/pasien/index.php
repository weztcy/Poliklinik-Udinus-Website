<?php

require_once 'config/koneksi.php';


// ======================================================
// AMBIL DATA PASIEN
// ======================================================

$dataPasienList = [];


$queryPasien = "
SELECT 
    id,
    nama,
    alamat,
    no_ktp,
    no_hp
FROM (
    SELECT 
        *,
        ROW_NUMBER() OVER (
            PARTITION BY no_ktp 
            ORDER BY id DESC
        ) AS rn
    FROM pasien
) AS p
WHERE rn = 1
ORDER BY nama ASC
";


$resultPasien = mysqli_query($mysqli, $queryPasien);



if ($resultPasien) {


    while ($pasien = mysqli_fetch_assoc($resultPasien)) {


        $dataPasienList[] = $pasien;


    }


}



$jumlahPasien = count($dataPasienList);



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


                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                            width:55px;
                            height:55px;
                            min-width:55px;
                        ">


                            <i class="fas fa-users fa-lg"></i>


                        </div>




                        <div>


                            <h4 class="fw-bold mb-1">
                                Data Pasien
                            </h4>


                            <small class="text-white-50">
                                Kelola data pasien Poliklinik Udinus
                            </small>


                        </div>


                    </div>


                </div>




                <div class="col-md-4 text-md-end">


                    <button type="button" class="btn btn-success px-4 py-2 fw-semibold" data-bs-toggle="modal"
                        data-bs-target="#addModal">


                        <i class="fas fa-plus-circle me-2"></i>

                        Tambah Pasien


                    </button>


                </div>



            </div>


        </div>


    </div>








    <!-- ====================================================== -->
    <!-- STATISTIK -->
    <!-- ====================================================== -->


    <div class="row g-4 mb-4">


        <div class="col-lg-4 col-md-6">


            <div class="card border-0 shadow-sm rounded-4">


                <div class="card-body p-4">


                    <div class="d-flex align-items-center">



                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                            width:52px;
                            height:52px;
                            min-width:52px;
                        ">


                            <i class="fas fa-user-injured"></i>


                        </div>




                        <div>


                            <small class="text-secondary d-block">

                                Total Pasien

                            </small>



                            <h3 class="fw-bold mb-0">


                                <?php echo number_format($jumlahPasien); ?>


                            </h3>



                        </div>



                    </div>



                </div>



            </div>



        </div>



    </div>








    <!-- ====================================================== -->
    <!-- TABLE PASIEN -->
    <!-- ====================================================== -->


    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">


        <div class="card-header bg-white border-0 p-4">


            <div class="d-flex justify-content-between align-items-center">


                <div>


                    <h5 class="fw-bold mb-1">

                        Daftar Pasien

                    </h5>



                    <small class="text-secondary">

                        Data pasien yang terdaftar pada sistem

                    </small>


                </div>




                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center"
                    style="
                    width:45px;
                    height:45px;
                ">


                    <i class="fas fa-list"></i>


                </div>



            </div>



        </div>





        <div class="card-body p-0">


            <div class="table-responsive">


                <table class="table table-hover align-middle mb-0">


                    <thead class="table-light">


                        <tr>


                            <th class="text-center px-4 py-3">

                                No

                            </th>


                            <th class="py-3">

                                Nama Pasien

                            </th>


                            <th class="py-3">

                                Alamat

                            </th>


                            <th class="py-3">

                                No KTP

                            </th>


                            <th class="py-3">

                                No HP

                            </th>


                            <th class="text-center px-4 py-3">

                                Aksi

                            </th>


                        </tr>


                    </thead>





                    <tbody>



                        <?php if (!empty($dataPasienList)) { ?>


                            <?php

                            $no = 1;


                            foreach ($dataPasienList as $data) {


                                ?>


                                <tr>



                                    <td class="text-center fw-semibold">


                                        <?php echo $no++; ?>


                                    </td>





                                    <td style="min-width:220px;">


                                        <div class="d-flex align-items-center">



                                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                                style="
                                        width:42px;
                                        height:42px;
                                    ">


                                                <i class="fas fa-user"></i>


                                            </div>




                                            <div>


                                                <div class="fw-semibold">

                                                    <?php echo htmlspecialchars($data['nama']); ?>

                                                </div>


                                                <small class="text-secondary">

                                                    Pasien

                                                </small>


                                            </div>


                                        </div>



                                    </td>






                                    <td style="min-width:260px;">


                                        <?php echo htmlspecialchars($data['alamat']); ?>


                                    </td>





                                    <td>


                                        <?php echo htmlspecialchars($data['no_ktp']); ?>


                                    </td>





                                    <td>


                                        <?php echo htmlspecialchars($data['no_hp']); ?>


                                    </td>











                                    <td class="text-center">


                                        <div class="d-flex justify-content-center gap-2">



<!-- EDIT -->

<button type="button"
    class="btn btn-sm btn-outline-warning px-3"
    data-bs-toggle="modal"
    data-bs-target="#editModal<?php echo (int) $data['id']; ?>">

    <i class="fas fa-edit me-1"></i>

    Edit

</button>


<!-- HAPUS -->

<button type="button"
    class="btn btn-sm btn-outline-danger px-3"
    data-bs-toggle="modal"
    data-bs-target="#hapusModal<?php echo (int) $data['id']; ?>">

    <i class="fas fa-trash-alt me-1"></i>

    Hapus

</button>



                                        </div>



                                    </td>




                                </tr>



                            <?php } ?>



                        <?php } else { ?>



                            <tr>


                                <td colspan="6" class="text-center py-5">


                                    <i class="fas fa-users fa-3x text-secondary mb-3"></i>


                                    <h6 class="fw-bold">

                                        Belum Ada Data Pasien

                                    </h6>



                                    <small class="text-secondary">

                                        Silakan tambahkan pasien terlebih dahulu.

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









<!-- ====================================================== -->
<!-- MODAL TAMBAH -->
<!-- ====================================================== -->


<div class="modal fade" id="addModal" tabindex="-1">


    <div class="modal-dialog modal-dialog-centered">


        <div class="modal-content border-0 rounded-4 shadow">


            <div class="modal-header bg-dark text-white">


                <h5 class="modal-title fw-bold">

                    Tambah Data Pasien

                </h5>


                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>


            </div>





            <form action="pages/pasien/tambahPasien.php" method="post">


                <div class="modal-body p-4">


                    <div class="mb-3">

                        <label class="fw-semibold">

                            Nama Pasien

                        </label>

                        <input type="text" class="form-control" name="nama" required>

                    </div>




                    <div class="mb-3">

                        <label class="fw-semibold">

                            Alamat

                        </label>

                        <textarea class="form-control" name="alamat" rows="3" required></textarea>

                    </div>




                    <div class="mb-3">

                        <label class="fw-semibold">

                            No KTP

                        </label>

                        <input type="text" class="form-control" name="no_ktp" required>

                    </div>




                    <div>

                        <label class="fw-semibold">

                            No HP

                        </label>

                        <input type="text" class="form-control" name="no_hp" required>

                    </div>



                </div>





                <div class="modal-footer border-0">


                    <button class="btn btn-light" data-bs-dismiss="modal">

                        Batal

                    </button>


                    <button class="btn btn-success">

                        <i class="fas fa-save me-2"></i>

                        Tambah

                    </button>


                </div>



            </form>


        </div>


    </div>


</div>





<?php foreach ($dataPasienList as $data) { ?>



    <!-- EDIT -->

    <div class="modal fade" id="editModal<?php echo $data['id']; ?>">


        <div class="modal-dialog modal-dialog-centered">


            <div class="modal-content rounded-4 border-0 shadow">



                <div class="modal-header bg-dark text-white">


                    <h5 class="modal-title">

                        Edit Data Pasien

                    </h5>


                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>


                </div>



                <form action="pages/pasien/updatePasien.php" method="post">


                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">



                    <div class="modal-body p-4">


                        <input class="form-control mb-3" name="nama" value="<?php echo $data['nama']; ?>" required>



                        <textarea class="form-control mb-3" name="alamat" rows="3"
                            required><?php echo $data['alamat']; ?></textarea>



                        <input class="form-control mb-3" name="no_ktp" value="<?php echo $data['no_ktp']; ?>" required>



                        <input class="form-control" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>



                    </div>



                    <div class="modal-footer border-0">


                        <button class="btn btn-success">

                            Simpan

                        </button>


                    </div>



                </form>



            </div>


        </div>


    </div>






    <!-- HAPUS -->


    <div class="modal fade" id="hapusModal<?php echo $data['id']; ?>">


        <div class="modal-dialog modal-dialog-centered">


            <div class="modal-content rounded-4 border-0 shadow">


                <div class="modal-header bg-danger text-white">


                    <h5 class="modal-title">

                        Hapus Pasien

                    </h5>


                    <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>


                </div>



                <form action="pages/pasien/hapusPasien.php" method="post">


                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">



                    <div class="modal-body">


                        Apakah yakin menghapus

                        <strong>
                            <?php echo $data['nama']; ?>
                        </strong>?



                    </div>



                    <div class="modal-footer border-0">


                        <button class="btn btn-danger">

                            Hapus

                        </button>


                    </div>



                </form>



            </div>


        </div>


    </div>



<?php } ?>