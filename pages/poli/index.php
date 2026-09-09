<?php

require_once 'config/koneksi.php';


// ======================================================
// AMBIL DATA POLI
// ======================================================

$dataPoliList = [];

$queryPoli = "
    SELECT
        id,
        nama_poli,
        keterangan
    FROM poli
    ORDER BY nama_poli ASC
";

$resultPoli = mysqli_query($mysqli, $queryPoli);


if ($resultPoli) {

    while ($poli = mysqli_fetch_assoc($resultPoli)) {

        $dataPoliList[] = $poli;

    }

}


$jumlahPoli = count($dataPoliList);

?>


<section class="py-2">


    <!-- ====================================================== -->
    <!-- HEADER -->
    <!-- ====================================================== -->

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">


        <div class="bg-dark text-white p-4">


            <div class="row align-items-center g-3">


                <!-- LEFT -->

                <div class="col-md-8">


                    <div class="d-flex align-items-center">


                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:55px;
                                height:55px;
                                min-width:55px;
                            ">

                            <i class="fas fa-hospital fa-lg"></i>

                        </div>


                        <div>

                            <h4 class="fw-bold mb-1">
                                Data Poli
                            </h4>

                            <small class="text-white-50">
                                Kelola data layanan poli Poliklinik Udinus
                            </small>

                        </div>


                    </div>


                </div>




                <!-- RIGHT -->

                <div class="col-md-4 text-md-end">


                    <button type="button"
                        class="btn btn-success px-4 py-2 fw-semibold"
                        data-bs-toggle="modal"
                        data-bs-target="#addModal">

                        <i class="fas fa-plus-circle me-2"></i>

                        Tambah Poli

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


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex align-items-center">


                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:52px;
                                height:52px;
                                min-width:52px;
                            ">

                            <i class="fas fa-clinic-medical"></i>

                        </div>


                        <div>

                            <small class="text-secondary d-block">
                                Total Poli
                            </small>

                            <h3 class="fw-bold mb-0">

                                <?php echo number_format($jumlahPoli); ?>

                            </h3>

                        </div>


                    </div>


                </div>


            </div>


        </div>


    </div>





    <!-- ====================================================== -->
    <!-- TABLE POLI -->
    <!-- ====================================================== -->

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">


        <!-- HEADER TABLE -->

        <div class="card-header bg-white border-0 p-4">


            <div class="d-flex align-items-center justify-content-between">


                <div>

                    <h5 class="fw-bold text-dark mb-1">
                        Daftar Poli
                    </h5>

                    <small class="text-secondary">
                        Daftar seluruh layanan poli yang tersedia
                    </small>

                </div>


                <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center"
                    style="
                        width:45px;
                        height:45px;
                        min-width:45px;
                    ">

                    <i class="fas fa-list"></i>

                </div>


            </div>


        </div>




        <!-- TABLE BODY -->

        <div class="card-body p-0">


            <div class="table-responsive">


                <table class="table table-hover align-middle mb-0">


                    <thead class="table-light">


                        <tr>

                            <th class="text-center px-4 py-3">
                                No
                            </th>

                            <th class="py-3">
                                Nama Poli
                            </th>

                            <th class="py-3">
                                Keterangan
                            </th>

                            <th class="text-center px-4 py-3">
                                Aksi
                            </th>

                        </tr>


                    </thead>




                    <tbody>


                        <?php if (!empty($dataPoliList)) { ?>


                            <?php

                            $no = 1;

                            foreach ($dataPoliList as $data) {

                            ?>


                                <tr>


                                    <!-- NO -->

                                    <td class="text-center px-4 fw-semibold">

                                        <?php echo $no++; ?>

                                    </td>




                                    <!-- NAMA POLI -->

                                    <td style="min-width:240px;">


                                        <div class="d-flex align-items-center">


                                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                                                style="
                                                    width:42px;
                                                    height:42px;
                                                    min-width:42px;
                                                ">

                                                <i class="fas fa-hospital"></i>

                                            </div>


                                            <div>

                                                <div class="fw-semibold text-dark">

                                                    <?php
                                                    echo htmlspecialchars(
                                                        $data['nama_poli']
                                                    );
                                                    ?>

                                                </div>

                                                <small class="text-secondary">
                                                    Layanan Poli
                                                </small>

                                            </div>


                                        </div>


                                    </td>




                                    <!-- KETERANGAN -->

                                    <td style="
                                        min-width:320px;
                                        white-space:normal;
                                    ">


                                        <div class="text-secondary">

                                            <i class="fas fa-info-circle text-success me-2"></i>

                                            <?php
                                            echo nl2br(
                                                htmlspecialchars(
                                                    $data['keterangan']
                                                )
                                            );
                                            ?>

                                        </div>


                                    </td>




                                    <!-- AKSI -->

                                    <td class="text-center px-4"
                                        style="min-width:190px;">


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


                            <!-- EMPTY STATE -->

                            <tr>


                                <td colspan="4"
                                    class="text-center py-5">


                                    <div class="text-secondary">


                                        <i class="fas fa-hospital fa-3x mb-3 opacity-50"></i>


                                        <h6 class="fw-bold">
                                            Belum Ada Data Poli
                                        </h6>


                                        <small>
                                            Silakan tambahkan data poli terlebih dahulu.
                                        </small>


                                    </div>


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
<!-- MODAL TAMBAH POLI -->
<!-- ====================================================== -->

<div class="modal fade"
    id="addModal"
    tabindex="-1"
    aria-labelledby="addModalLabel"
    aria-hidden="true">


    <div class="modal-dialog modal-dialog-centered">


        <div class="modal-content border-0 shadow rounded-4 overflow-hidden">



            <!-- HEADER -->

            <div class="modal-header bg-dark text-white border-0 p-4">


                <div class="d-flex align-items-center">


                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="
                            width:45px;
                            height:45px;
                            min-width:45px;
                        ">

                        <i class="fas fa-plus"></i>

                    </div>


                    <div>

                        <h5 class="modal-title fw-bold mb-0"
                            id="addModalLabel">

                            Tambah Data Poli

                        </h5>

                        <small class="text-white-50">
                            Masukkan informasi poli baru
                        </small>

                    </div>


                </div>



                <button type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>


            </div>




            <!-- FORM -->

            <form action="pages/poli/tambahPoli.php"
                method="post">


                <div class="modal-body p-4">


                    <!-- NAMA POLI -->

                    <div class="mb-3">


                        <label for="nama_poli"
                            class="form-label fw-semibold">

                            <i class="fas fa-hospital text-success me-2"></i>

                            Nama Poli

                        </label>


                        <input type="text"
                            class="form-control"
                            id="nama_poli"
                            name="nama_poli"
                            placeholder="Masukkan nama poli"
                            required>


                    </div>




                    <!-- KETERANGAN -->

                    <div>


                        <label for="keterangan"
                            class="form-label fw-semibold">

                            <i class="fas fa-align-left text-success me-2"></i>

                            Keterangan

                        </label>


                        <textarea class="form-control"
                            rows="4"
                            id="keterangan"
                            name="keterangan"
                            placeholder="Masukkan keterangan poli"
                            required></textarea>


                    </div>


                </div>




                <!-- FOOTER -->

                <div class="modal-footer border-0 px-4 pb-4 pt-0">


                    <button type="button"
                        class="btn btn-light border px-4"
                        data-bs-dismiss="modal">

                        Batal

                    </button>


                    <button type="submit"
                        class="btn btn-success px-4 fw-semibold">

                        <i class="fas fa-save me-2"></i>

                        Tambah Poli

                    </button>


                </div>


            </form>


        </div>


    </div>


</div>







<!-- ====================================================== -->
<!-- MODAL EDIT & HAPUS -->
<!-- ====================================================== -->

<?php foreach ($dataPoliList as $data) { ?>



    <!-- ================================================== -->
    <!-- MODAL EDIT POLI -->
    <!-- ================================================== -->

    <div class="modal fade"
        id="editModal<?php echo (int) $data['id']; ?>"
        tabindex="-1"
        aria-labelledby="editModalLabel<?php echo (int) $data['id']; ?>"
        aria-hidden="true">


        <div class="modal-dialog modal-dialog-centered">


            <div class="modal-content border-0 shadow rounded-4 overflow-hidden">



                <!-- HEADER -->

                <div class="modal-header bg-dark text-white border-0 p-4">


                    <div class="d-flex align-items-center">


                        <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:45px;
                                height:45px;
                                min-width:45px;
                            ">

                            <i class="fas fa-edit text-dark"></i>

                        </div>


                        <div>

                            <h5 class="modal-title fw-bold mb-0"
                                id="editModalLabel<?php echo (int) $data['id']; ?>">

                                Edit Data Poli

                            </h5>

                            <small class="text-white-50">
                                Perbarui informasi poli
                            </small>

                        </div>


                    </div>



                    <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>


                </div>




                <!-- FORM -->

                <form action="pages/poli/updatePoli.php"
                    method="post">


                    <input type="hidden"
                        name="id"
                        value="<?php echo (int) $data['id']; ?>">


                    <div class="modal-body p-4">


                        <!-- NAMA POLI -->

                        <div class="mb-3">


                            <label class="form-label fw-semibold">

                                <i class="fas fa-hospital text-success me-2"></i>

                                Nama Poli

                            </label>


                            <input type="text"
                                class="form-control"
                                name="nama_poli"
                                value="<?php echo htmlspecialchars($data['nama_poli']); ?>"
                                required>


                        </div>




                        <!-- KETERANGAN -->

                        <div>


                            <label class="form-label fw-semibold">

                                <i class="fas fa-align-left text-success me-2"></i>

                                Keterangan

                            </label>


                            <textarea class="form-control"
                                name="keterangan"
                                rows="4"
                                required><?php echo htmlspecialchars($data['keterangan']); ?></textarea>


                        </div>


                    </div>




                    <!-- FOOTER -->

                    <div class="modal-footer border-0 px-4 pb-4 pt-0">


                        <button type="button"
                            class="btn btn-light border px-4"
                            data-bs-dismiss="modal">

                            Batal

                        </button>


                        <button type="submit"
                            class="btn btn-success px-4 fw-semibold">

                            <i class="fas fa-save me-2"></i>

                            Simpan Perubahan

                        </button>


                    </div>


                </form>


            </div>


        </div>


    </div>






    <!-- ================================================== -->
    <!-- MODAL HAPUS POLI -->
    <!-- ================================================== -->

    <div class="modal fade"
        id="hapusModal<?php echo (int) $data['id']; ?>"
        tabindex="-1"
        aria-labelledby="hapusModalLabel<?php echo (int) $data['id']; ?>"
        aria-hidden="true">


        <div class="modal-dialog modal-dialog-centered">


            <div class="modal-content border-0 shadow rounded-4 overflow-hidden">



                <!-- HEADER -->

                <div class="modal-header bg-danger text-white border-0 p-4">


                    <div class="d-flex align-items-center">


                        <div class="bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:45px;
                                height:45px;
                                min-width:45px;
                            ">

                            <i class="fas fa-trash-alt"></i>

                        </div>


                        <div>

                            <h5 class="modal-title fw-bold mb-0"
                                id="hapusModalLabel<?php echo (int) $data['id']; ?>">

                                Hapus Data Poli

                            </h5>

                            <small class="text-white">
                                Konfirmasi penghapusan data
                            </small>

                        </div>


                    </div>



                    <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>


                </div>




                <!-- FORM -->

                <form action="pages/poli/hapusPoli.php"
                    method="post">


                    <input type="hidden"
                        name="id"
                        value="<?php echo (int) $data['id']; ?>">


                    <div class="modal-body p-4">


                        <div class="text-center">


                            <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="
                                    width:70px;
                                    height:70px;
                                ">

                                <i class="fas fa-exclamation-triangle fa-2x"></i>

                            </div>


                            <h5 class="fw-bold">
                                Yakin ingin menghapus poli?
                            </h5>


                            <p class="text-secondary mb-0">

                                Data poli

                                <strong class="text-dark">

                                    <?php
                                    echo htmlspecialchars(
                                        $data['nama_poli']
                                    );
                                    ?>

                                </strong>

                                akan dihapus dari sistem.

                            </p>


                        </div>


                    </div>




                    <!-- FOOTER -->

                    <div class="modal-footer border-0 px-4 pb-4 pt-0 justify-content-center">


                        <button type="button"
                            class="btn btn-light border px-4"
                            data-bs-dismiss="modal">

                            Batal

                        </button>


                        <button type="submit"
                            class="btn btn-danger px-4 fw-semibold">

                            <i class="fas fa-trash-alt me-2"></i>

                            Ya, Hapus

                        </button>


                    </div>


                </form>


            </div>


        </div>


    </div>


<?php } ?>