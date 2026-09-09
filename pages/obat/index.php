<?php

require_once 'config/koneksi.php';


// ======================================================
// AMBIL DATA OBAT
// ======================================================

$dataObatList = [];

$queryObat = "
    SELECT
        id,
        nama_obat,
        kemasan,
        harga
    FROM obat
    ORDER BY nama_obat ASC
";

$resultObat = mysqli_query($mysqli, $queryObat);


if ($resultObat) {

    while ($obat = mysqli_fetch_assoc($resultObat)) {

        $dataObatList[] = $obat;

    }

}


$jumlahObat = count($dataObatList);

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

                            <i class="fas fa-pills fa-lg"></i>

                        </div>


                        <div>

                            <h4 class="fw-bold mb-1">
                                Data Obat
                            </h4>

                            <small class="text-white-50">
                                Kelola data obat Poliklinik Udinus
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

                        Tambah Obat

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


                        <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:52px;
                                height:52px;
                                min-width:52px;
                            ">

                            <i class="fas fa-capsules"></i>

                        </div>


                        <div>

                            <small class="text-secondary d-block">
                                Total Jenis Obat
                            </small>

                            <h3 class="fw-bold mb-0">

                                <?php echo number_format($jumlahObat); ?>

                            </h3>

                        </div>


                    </div>


                </div>


            </div>


        </div>


    </div>





    <!-- ====================================================== -->
    <!-- TABLE OBAT -->
    <!-- ====================================================== -->

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">


        <!-- HEADER TABLE -->

        <div class="card-header bg-white border-0 p-4">


            <div class="d-flex align-items-center justify-content-between">


                <div>

                    <h5 class="fw-bold text-dark mb-1">
                        Daftar Obat
                    </h5>

                    <small class="text-secondary">
                        Daftar seluruh obat yang tersedia pada sistem
                    </small>

                </div>


                <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center"
                    style="
                        width:45px;
                        height:45px;
                        min-width:45px;
                    ">

                    <i class="fas fa-list"></i>

                </div>


            </div>


        </div>




        <!-- BODY TABLE -->

        <div class="card-body p-0">


            <div class="table-responsive">


                <table class="table table-hover align-middle mb-0">


                    <thead class="table-light">


                        <tr>

                            <th class="text-center px-4 py-3">
                                No
                            </th>

                            <th class="py-3">
                                Nama Obat
                            </th>

                            <th class="py-3">
                                Kemasan
                            </th>

                            <th class="py-3">
                                Harga
                            </th>

                            <th class="text-center px-4 py-3">
                                Aksi
                            </th>

                        </tr>


                    </thead>




                    <tbody>


                        <?php if (!empty($dataObatList)) { ?>


                            <?php

                            $no = 1;

                            foreach ($dataObatList as $data) {

                            ?>


                                <tr>


                                    <!-- NO -->

                                    <td class="text-center px-4 fw-semibold">

                                        <?php echo $no++; ?>

                                    </td>




                                    <!-- NAMA OBAT -->

                                    <td style="min-width:220px;">


                                        <div class="d-flex align-items-center">


                                            <div class="bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center me-3"
                                                style="
                                                    width:42px;
                                                    height:42px;
                                                    min-width:42px;
                                                ">

                                                <i class="fas fa-pills"></i>

                                            </div>


                                            <div>

                                                <div class="fw-semibold text-dark">

                                                    <?php
                                                    echo htmlspecialchars(
                                                        $data['nama_obat']
                                                    );
                                                    ?>

                                                </div>

                                                <small class="text-secondary">
                                                    Obat
                                                </small>

                                            </div>


                                        </div>


                                    </td>




                                    <!-- KEMASAN -->

                                    <td style="min-width:160px;">


                                        <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">

                                            <i class="fas fa-box me-1 text-secondary"></i>

                                            <?php
                                            echo htmlspecialchars(
                                                $data['kemasan']
                                            );
                                            ?>

                                        </span>


                                    </td>




                                    <!-- HARGA -->

                                    <td style="min-width:160px;">


                                        <span class="fw-semibold text-success">

                                            Rp
                                            <?php
                                            echo number_format(
                                                (float) $data['harga'],
                                                0,
                                                ',',
                                                '.'
                                            );
                                            ?>

                                        </span>


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


                                <td colspan="5"
                                    class="text-center py-5">


                                    <div class="text-secondary">


                                        <i class="fas fa-pills fa-3x mb-3 opacity-50"></i>


                                        <h6 class="fw-bold">
                                            Belum Ada Data Obat
                                        </h6>


                                        <small>
                                            Silakan tambahkan data obat terlebih dahulu.
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
<!-- MODAL TAMBAH OBAT -->
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

                            Tambah Data Obat

                        </h5>

                        <small class="text-white-50">
                            Masukkan informasi obat baru
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

            <form action="pages/obat/tambahObat.php"
                method="post">


                <div class="modal-body p-4">


                    <!-- NAMA OBAT -->

                    <div class="mb-3">


                        <label for="nama_obat"
                            class="form-label fw-semibold">

                            <i class="fas fa-pills text-success me-2"></i>

                            Nama Obat

                        </label>


                        <input type="text"
                            class="form-control"
                            id="nama_obat"
                            name="nama_obat"
                            placeholder="Masukkan nama obat"
                            required>


                    </div>




                    <!-- KEMASAN -->

                    <div class="mb-3">


                        <label for="kemasan"
                            class="form-label fw-semibold">

                            <i class="fas fa-box text-success me-2"></i>

                            Kemasan

                        </label>


                        <input type="text"
                            class="form-control"
                            id="kemasan"
                            name="kemasan"
                            placeholder="Contoh: Strip, Botol, Box"
                            required>


                    </div>




                    <!-- HARGA -->

                    <div>


                        <label for="harga"
                            class="form-label fw-semibold">

                            <i class="fas fa-money-bill-wave text-success me-2"></i>

                            Harga

                        </label>


                        <div class="input-group">

                            <span class="input-group-text">
                                Rp
                            </span>


                            <input type="number"
                                class="form-control"
                                id="harga"
                                name="harga"
                                min="0"
                                step="1"
                                placeholder="Masukkan harga obat"
                                required>

                        </div>


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

                        Tambah Obat

                    </button>


                </div>


            </form>


        </div>


    </div>


</div>







<!-- ====================================================== -->
<!-- MODAL EDIT DAN HAPUS -->
<!-- ====================================================== -->

<?php foreach ($dataObatList as $data) { ?>



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

                                Edit Data Obat

                            </h5>

                            <small class="text-white-50">
                                Perbarui informasi obat
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

                <form action="pages/obat/updateObat.php"
                    method="post">


                    <input type="hidden"
                        name="id"
                        value="<?php echo (int) $data['id']; ?>">


                    <div class="modal-body p-4">


                        <!-- NAMA OBAT -->

                        <div class="mb-3">


                            <label class="form-label fw-semibold">

                                <i class="fas fa-pills text-success me-2"></i>

                                Nama Obat

                            </label>


                            <input type="text"
                                class="form-control"
                                name="nama_obat"
                                value="<?php echo htmlspecialchars($data['nama_obat']); ?>"
                                required>


                        </div>




                        <!-- KEMASAN -->

                        <div class="mb-3">


                            <label class="form-label fw-semibold">

                                <i class="fas fa-box text-success me-2"></i>

                                Kemasan

                            </label>


                            <input type="text"
                                class="form-control"
                                name="kemasan"
                                value="<?php echo htmlspecialchars($data['kemasan']); ?>"
                                required>


                        </div>




                        <!-- HARGA -->

                        <div>


                            <label class="form-label fw-semibold">

                                <i class="fas fa-money-bill-wave text-success me-2"></i>

                                Harga

                            </label>


                            <div class="input-group">


                                <span class="input-group-text">
                                    Rp
                                </span>


                                <input type="number"
                                    class="form-control"
                                    name="harga"
                                    min="0"
                                    step="1"
                                    value="<?php echo htmlspecialchars($data['harga']); ?>"
                                    required>


                            </div>


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

                                Hapus Data Obat

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

                <form action="pages/obat/hapusObat.php"
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
                                Yakin ingin menghapus obat?
                            </h5>


                            <p class="text-secondary mb-0">

                                Data obat

                                <strong class="text-dark">

                                    <?php
                                    echo htmlspecialchars(
                                        $data['nama_obat']
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