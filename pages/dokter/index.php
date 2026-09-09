<?php

require_once 'config/koneksi.php';


// ======================================================
// AMBIL DATA POLI
// ======================================================

$dataPoliList = [];

$queryPoli = "
    SELECT 
        id,
        nama_poli
    FROM poli
    ORDER BY nama_poli ASC
";

$resultPoli = mysqli_query($mysqli, $queryPoli);


if ($resultPoli) {

    while ($poli = mysqli_fetch_assoc($resultPoli)) {

        $dataPoliList[] = $poli;

    }

}



// ======================================================
// AMBIL DATA DOKTER
// ======================================================

$dataDokterList = [];

$queryDokter = "
    SELECT
        dokter.id,
        dokter.nama,
        dokter.alamat,
        dokter.no_hp,
        dokter.id_poli,
        poli.nama_poli
    FROM dokter
    LEFT JOIN poli
        ON dokter.id_poli = poli.id
    ORDER BY dokter.nama ASC
";

$resultDokter = mysqli_query($mysqli, $queryDokter);


if ($resultDokter) {

    while ($dokter = mysqli_fetch_assoc($resultDokter)) {

        $dataDokterList[] = $dokter;

    }

}


$jumlahDokter = count($dataDokterList);

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


                            <i class="fas fa-user-md fa-lg"></i>


                        </div>



                        <div>


                            <h4 class="fw-bold mb-1">

                                Data Dokter

                            </h4>


                            <small class="text-white-50">

                                Kelola data dokter Poliklinik Udinus

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

                        Tambah Dokter


                    </button>


                </div>


            </div>


        </div>


    </div>







    <!-- ====================================================== -->
    <!-- INFO -->
    <!-- ====================================================== -->

    <div class="row g-4 mb-4">


        <div class="col-lg-4 col-md-6">


            <div class="card border-0 shadow-sm rounded-4">


                <div class="card-body p-4">


                    <div class="d-flex align-items-center">


                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:52px;
                                height:52px;
                                min-width:52px;
                            ">


                            <i class="fas fa-user-md"></i>


                        </div>



                        <div>


                            <small class="text-secondary d-block">

                                Total Dokter

                            </small>


                            <h3 class="fw-bold mb-0">

                                <?php echo number_format($jumlahDokter); ?>

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


        <!-- TABLE HEADER -->

        <div class="card-header bg-white border-0 p-4">


            <div class="d-flex align-items-center justify-content-between">


                <div>


                    <h5 class="fw-bold text-dark mb-1">

                        Daftar Dokter

                    </h5>


                    <small class="text-secondary">

                        Daftar seluruh dokter yang terdaftar pada sistem

                    </small>


                </div>



                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
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

                                Nama Dokter

                            </th>


                            <th class="py-3">

                                Alamat

                            </th>


                            <th class="py-3">

                                No HP

                            </th>


                            <th class="py-3">

                                Poli

                            </th>


                            <th class="text-center px-4 py-3">

                                Aksi

                            </th>


                        </tr>


                    </thead>




                    <tbody>


                        <?php if (!empty($dataDokterList)) { ?>


                            <?php

                            $no = 1;

                            foreach ($dataDokterList as $data) {

                            ?>


                                <tr>


                                    <!-- NO -->

                                    <td class="text-center px-4 fw-semibold">


                                        <?php echo $no++; ?>


                                    </td>





                                    <!-- NAMA -->

                                    <td>


                                        <div class="d-flex align-items-center">


                                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center me-3"
                                                style="
                                                    width:42px;
                                                    height:42px;
                                                    min-width:42px;
                                                ">


                                                <i class="fas fa-user-md"></i>


                                            </div>



                                            <div>


                                                <div class="fw-semibold text-dark">


                                                    <?php
                                                    echo htmlspecialchars(
                                                        $data['nama']
                                                    );
                                                    ?>


                                                </div>


                                                <small class="text-secondary">

                                                    Dokter

                                                </small>


                                            </div>


                                        </div>


                                    </td>






                                    <!-- ALAMAT -->

                                    <td style="
                                        min-width:220px;
                                        white-space:normal;
                                    ">


                                        <?php
                                        echo nl2br(
                                            htmlspecialchars(
                                                $data['alamat']
                                            )
                                        );
                                        ?>


                                    </td>






                                    <!-- NO HP -->

                                    <td style="min-width:140px;">


                                        <i class="fas fa-phone-alt text-success me-2"></i>


                                        <?php
                                        echo htmlspecialchars(
                                            $data['no_hp']
                                        );
                                        ?>


                                    </td>






                                    <!-- POLI -->

                                    <td>


                                        <?php if (!empty($data['nama_poli'])) { ?>


                                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">


                                                <i class="fas fa-hospital me-1"></i>


                                                <?php
                                                echo htmlspecialchars(
                                                    $data['nama_poli']
                                                );
                                                ?>


                                            </span>


                                        <?php } else { ?>


                                            <span class="badge bg-secondary px-3 py-2 rounded-pill">


                                                Belum Ada Poli


                                            </span>


                                        <?php } ?>


                                    </td>






                                    <!-- AKSI -->

                                    <td class="text-center px-4"
                                        style="
                                            min-width:190px;
                                        ">


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


                                <td colspan="6"
                                    class="text-center py-5">


                                    <div class="text-secondary">


                                        <i class="fas fa-user-md fa-3x mb-3 opacity-50"></i>


                                        <h6 class="fw-bold">

                                            Belum Ada Data Dokter

                                        </h6>


                                        <small>

                                            Silakan tambahkan data dokter terlebih dahulu.

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
<!-- MODAL TAMBAH DOKTER -->
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


                        <i class="fas fa-user-plus"></i>


                    </div>



                    <div>


                        <h5 class="modal-title fw-bold mb-0"
                            id="addModalLabel">


                            Tambah Data Dokter


                        </h5>


                        <small class="text-white-50">

                            Masukkan informasi dokter baru

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

            <form action="pages/dokter/tambahDokter.php"
                method="post">


                <div class="modal-body p-4">



                    <!-- NAMA -->

                    <div class="mb-3">


                        <label for="nama_dokter"
                            class="form-label fw-semibold">


                            <i class="fas fa-user-md text-success me-2"></i>

                            Nama Dokter


                        </label>


                        <input type="text"
                            class="form-control"
                            id="nama_dokter"
                            name="nama"
                            placeholder="Masukkan nama dokter"
                            required>


                    </div>





                    <!-- ALAMAT -->

                    <div class="mb-3">


                        <label for="alamat_dokter"
                            class="form-label fw-semibold">


                            <i class="fas fa-map-marker-alt text-success me-2"></i>

                            Alamat


                        </label>


                        <textarea class="form-control"
                            rows="3"
                            id="alamat_dokter"
                            name="alamat"
                            placeholder="Masukkan alamat dokter"
                            required></textarea>


                    </div>





                    <!-- NO HP -->

                    <div class="mb-3">


                        <label for="no_hp_dokter"
                            class="form-label fw-semibold">


                            <i class="fas fa-phone-alt text-success me-2"></i>

                            Nomor HP


                        </label>


                        <input type="text"
                            class="form-control"
                            id="no_hp_dokter"
                            name="no_hp"
                            placeholder="Masukkan nomor HP"
                            required>


                    </div>





                    <!-- POLI -->

                    <div>


                        <label for="poli_dokter"
                            class="form-label fw-semibold">


                            <i class="fas fa-hospital text-success me-2"></i>

                            Poli


                        </label>


                        <select class="form-select"
                            id="poli_dokter"
                            name="poli"
                            required>


                            <option value=""
                                selected
                                disabled>


                                Pilih Poli


                            </option>


                            <?php foreach ($dataPoliList as $poli) { ?>


                                <option value="<?php echo (int) $poli['id']; ?>">


                                    <?php
                                    echo htmlspecialchars(
                                        $poli['nama_poli']
                                    );
                                    ?>


                                </option>


                            <?php } ?>


                        </select>


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

                        Tambah Dokter


                    </button>


                </div>


            </form>


        </div>


    </div>


</div>









<!-- ====================================================== -->
<!-- MODAL EDIT & HAPUS -->
<!-- ====================================================== -->

<?php foreach ($dataDokterList as $data) { ?>



    <!-- ================================================== -->
    <!-- MODAL EDIT -->
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


                                Edit Data Dokter


                            </h5>


                            <small class="text-white-50">

                                Perbarui informasi dokter

                            </small>


                        </div>


                    </div>



                    <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>


                </div>






                <form action="pages/dokter/updateDokter.php"
                    method="post">


                    <input type="hidden"
                        name="id"
                        value="<?php echo (int) $data['id']; ?>">



                    <div class="modal-body p-4">



                        <!-- NAMA -->

                        <div class="mb-3">


                            <label class="form-label fw-semibold">


                                <i class="fas fa-user-md text-success me-2"></i>

                                Nama Dokter


                            </label>


                            <input type="text"
                                class="form-control"
                                name="nama"
                                value="<?php echo htmlspecialchars($data['nama']); ?>"
                                required>


                        </div>





                        <!-- ALAMAT -->

                        <div class="mb-3">


                            <label class="form-label fw-semibold">


                                <i class="fas fa-map-marker-alt text-success me-2"></i>

                                Alamat


                            </label>


                            <textarea class="form-control"
                                name="alamat"
                                rows="3"
                                required><?php echo htmlspecialchars($data['alamat']); ?></textarea>


                        </div>






                        <!-- NO HP -->

                        <div class="mb-3">


                            <label class="form-label fw-semibold">


                                <i class="fas fa-phone-alt text-success me-2"></i>

                                Nomor HP


                            </label>


                            <input type="text"
                                class="form-control"
                                name="no_hp"
                                value="<?php echo htmlspecialchars($data['no_hp']); ?>"
                                required>


                        </div>






                        <!-- POLI -->

                        <div>


                            <label class="form-label fw-semibold">


                                <i class="fas fa-hospital text-success me-2"></i>

                                Poli


                            </label>


                            <select class="form-select"
                                name="poli"
                                required>


                                <?php foreach ($dataPoliList as $poli) { ?>


                                    <option
                                        value="<?php echo (int) $poli['id']; ?>"

                                        <?php

                                        if (
                                            (int) $poli['id'] ===
                                            (int) $data['id_poli']
                                        ) {

                                            echo 'selected';

                                        }

                                        ?>>


                                        <?php
                                        echo htmlspecialchars(
                                            $poli['nama_poli']
                                        );
                                        ?>


                                    </option>


                                <?php } ?>


                            </select>


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
    <!-- MODAL HAPUS -->
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


                                Hapus Data Dokter


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






                <form action="pages/dokter/hapusDokter.php"
                    method="post">


                    <input type="hidden"
                        name="id"
                        value="<?php echo (int) $data['id']; ?>">



                    <div class="modal-body p-4">


                        <div class="text-center mb-3">


                            <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="
                                    width:70px;
                                    height:70px;
                                ">


                                <i class="fas fa-exclamation-triangle fa-2x"></i>


                            </div>


                            <h5 class="fw-bold">

                                Yakin ingin menghapus dokter?

                            </h5>


                            <p class="text-secondary mb-0">


                                Data dokter


                                <strong class="text-dark">

                                    <?php echo htmlspecialchars($data['nama']); ?>

                                </strong>


                                akan dihapus dari sistem.


                            </p>


                        </div>


                    </div>





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