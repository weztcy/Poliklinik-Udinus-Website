<?php

require_once 'config/koneksi.php';


// ======================================================
// VALIDASI ID DOKTER
// ======================================================

$id_dokter = isset($id_dokter) ? (int) $id_dokter : 0;


// ======================================================
// AMBIL DATA OBAT
// ======================================================

$dataObatList = [];

$queryObat = "
    SELECT 
        id,
        nama_obat
    FROM obat
    ORDER BY nama_obat ASC
";

$resultObat = mysqli_query($mysqli, $queryObat);

if ($resultObat) {

    while ($obat = mysqli_fetch_assoc($resultObat)) {

        $dataObatList[] = $obat;

    }

}


// ======================================================
// AMBIL DATA PASIEN DOKTER
// ======================================================

$dataPasienList = [];

$query = "
    SELECT
        daftar_poli.id,
        daftar_poli.keluhan,
        daftar_poli.status_periksa,
        pasien.nama
    FROM daftar_poli
    INNER JOIN pasien
        ON daftar_poli.id_pasien = pasien.id
    INNER JOIN jadwal_periksa
        ON daftar_poli.id_jadwal = jadwal_periksa.id
    INNER JOIN dokter
        ON jadwal_periksa.id_dokter = dokter.id
    WHERE dokter.id = $id_dokter
    ORDER BY daftar_poli.id DESC
";

$result = mysqli_query($mysqli, $query);


if ($result) {

    while ($data = mysqli_fetch_assoc($result)) {

        $dataPasienList[] = $data;

    }

}


// ======================================================
// HITUNG STATUS
// ======================================================

$totalPasien = count($dataPasienList);

$totalBelumPeriksa = 0;
$totalSudahPeriksa = 0;


foreach ($dataPasienList as $data) {

    if ((int) $data['status_periksa'] === 1) {

        $totalSudahPeriksa++;

    } else {

        $totalBelumPeriksa++;

    }

}

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

                            <i class="fas fa-stethoscope fa-lg"></i>

                        </div>

                        <div>

                            <h4 class="fw-bold mb-1">
                                Periksa Pasien
                            </h4>

                            <small class="text-white-50">
                                Kelola pemeriksaan pasien yang terdaftar pada jadwal Anda
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>





    <!-- ====================================================== -->
    <!-- STATISTIK -->
    <!-- ====================================================== -->

    <div class="row g-4 mb-4">


        <!-- TOTAL -->

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">

                    <div class="d-flex align-items-center">

                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:52px;
                                height:52px;
                                min-width:52px;
                            ">

                            <i class="fas fa-users"></i>

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




        <!-- BELUM DIPERIKSA -->

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

                            <i class="fas fa-clock"></i>

                        </div>

                        <div>

                            <small class="text-secondary d-block">
                                Belum Diperiksa
                            </small>

                            <h3 class="fw-bold mb-0">

                                <?php echo number_format($totalBelumPeriksa); ?>

                            </h3>

                        </div>

                    </div>

                </div>

            </div>

        </div>




        <!-- SUDAH DIPERIKSA -->

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">

                    <div class="d-flex align-items-center">

                        <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:52px;
                                height:52px;
                                min-width:52px;
                            ">

                            <i class="fas fa-check-circle"></i>

                        </div>

                        <div>

                            <small class="text-secondary d-block">
                                Sudah Diperiksa
                            </small>

                            <h3 class="fw-bold mb-0">

                                <?php echo number_format($totalSudahPeriksa); ?>

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


        <!-- HEADER TABLE -->

        <div class="card-header bg-white border-0 p-4">

            <div class="d-flex align-items-center justify-content-between">

                <div>

                    <h5 class="fw-bold text-dark mb-1">
                        Daftar Pasien
                    </h5>

                    <small class="text-secondary">
                        Pasien yang terdaftar pada jadwal pemeriksaan Anda
                    </small>

                </div>


                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                    style="
                        width:45px;
                        height:45px;
                        min-width:45px;
                    ">

                    <i class="fas fa-clipboard-list"></i>

                </div>

            </div>

        </div>





        <!-- TABLE -->

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
                                Keluhan
                            </th>

                            <th class="text-center py-3">
                                Status
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


                                <!-- NO -->

                                <td class="text-center px-4 fw-semibold">

                                    <?php echo $no++; ?>

                                </td>




                                <!-- NAMA PASIEN -->

                                <td style="min-width:220px;">

                                    <div class="d-flex align-items-center">

                                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="
                                                width:42px;
                                                height:42px;
                                                min-width:42px;
                                            ">

                                            <i class="fas fa-user"></i>

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
                                                Pasien
                                            </small>

                                        </div>

                                    </div>

                                </td>




                                <!-- KELUHAN -->

                                <td style="
                                    min-width:280px;
                                    white-space:normal;
                                ">

                                    <div class="text-secondary">

                                        <i class="fas fa-comment-medical text-success me-2"></i>

                                        <?php
                                        echo nl2br(
                                            htmlspecialchars(
                                                $data['keluhan']
                                            )
                                        );
                                        ?>

                                    </div>

                                </td>




                                <!-- STATUS -->

                                <td class="text-center">

                                    <?php if ((int) $data['status_periksa'] === 1) { ?>

                                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">

                                            <i class="fas fa-check-circle me-1"></i>

                                            Sudah Diperiksa

                                        </span>

                                    <?php } else { ?>

                                        <span class="badge bg-warning bg-opacity-10 text-dark px-3 py-2 rounded-pill">

                                            <i class="fas fa-clock me-1"></i>

                                            Menunggu

                                        </span>

                                    <?php } ?>

                                </td>




                                <!-- AKSI -->

                                <td class="text-center px-4"
                                    style="min-width:170px;">


                                    <?php if ((int) $data['status_periksa'] === 1) { ?>


                                        <button type="button"
                                            class="btn btn-sm btn-outline-warning px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editModal<?php echo (int) $data['id']; ?>">

                                            <i class="fas fa-edit me-1"></i>

                                            Edit

                                        </button>


                                    <?php } else { ?>


                                        <button type="button"
                                            class="btn btn-sm btn-success px-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#periksaModal<?php echo (int) $data['id']; ?>">

                                            <i class="fas fa-stethoscope me-1"></i>

                                            Periksa

                                        </button>


                                    <?php } ?>


                                </td>


                            </tr>


                        <?php } ?>


                    <?php } else { ?>


                        <tr>

                            <td colspan="5"
                                class="text-center py-5">

                                <div class="text-secondary">

                                    <i class="fas fa-user-injured fa-3x mb-3 opacity-50"></i>

                                    <h6 class="fw-bold">
                                        Belum Ada Pasien
                                    </h6>

                                    <small>
                                        Belum ada pasien yang terdaftar pada jadwal pemeriksaan Anda.
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







<?php foreach ($dataPasienList as $data) { ?>


    <?php if ((int) $data['status_periksa'] !== 1) { ?>


        <!-- ================================================== -->
        <!-- MODAL PERIKSA PASIEN -->
        <!-- ================================================== -->

        <div class="modal fade"
            id="periksaModal<?php echo (int) $data['id']; ?>"
            tabindex="-1"
            aria-labelledby="periksaModalLabel<?php echo (int) $data['id']; ?>"
            aria-hidden="true">


            <div class="modal-dialog modal-dialog-centered modal-lg">


                <div class="modal-content border-0 shadow rounded-4 overflow-hidden">


                    <!-- HEADER -->

                    <div class="modal-header bg-dark text-white border-0 p-4">


                        <div class="d-flex align-items-center">

                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="
                                    width:48px;
                                    height:48px;
                                    min-width:48px;
                                ">

                                <i class="fas fa-stethoscope"></i>

                            </div>


                            <div>

                                <h5 class="modal-title fw-bold mb-0"
                                    id="periksaModalLabel<?php echo (int) $data['id']; ?>">

                                    Periksa Pasien

                                </h5>

                                <small class="text-white-50">

                                    Masukkan hasil pemeriksaan pasien

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

                    <form action="pages/periksaPasien/periksaPasien.php"
                        method="post">


                        <input type="hidden"
                            name="id"
                            value="<?php echo (int) $data['id']; ?>">


                        <div class="modal-body p-4">


                            <div class="row g-4">


                                <!-- LEFT -->

                                <div class="col-lg-6">


                                    <!-- NAMA -->

                                    <div class="mb-3">

                                        <label class="form-label fw-semibold">

                                            <i class="fas fa-user text-success me-2"></i>

                                            Nama Pasien

                                        </label>


                                        <input type="text"
                                            class="form-control bg-light"
                                            value="<?php echo htmlspecialchars($data['nama']); ?>"
                                            readonly>

                                    </div>




                                    <!-- TANGGAL -->

                                    <div class="mb-3">

                                        <label class="form-label fw-semibold">

                                            <i class="fas fa-calendar-alt text-success me-2"></i>

                                            Tanggal Periksa

                                        </label>


                                        <input type="datetime-local"
                                            class="form-control"
                                            name="tanggal_periksa"
                                            required>

                                    </div>




                                    <!-- CATATAN -->

                                    <div>

                                        <label class="form-label fw-semibold">

                                            <i class="fas fa-notes-medical text-success me-2"></i>

                                            Catatan Pemeriksaan

                                        </label>


                                        <textarea class="form-control"
                                            rows="5"
                                            name="catatan"
                                            placeholder="Masukkan diagnosa atau catatan pemeriksaan..."
                                            required></textarea>

                                    </div>


                                </div>





                                <!-- RIGHT -->

                                <div class="col-lg-6">


                                    <label class="form-label fw-semibold mb-2">

                                        <i class="fas fa-pills text-success me-2"></i>

                                        Pilih Obat

                                    </label>


                                    <div class="border rounded-3 p-3 bg-light"
                                        style="
                                            max-height:310px;
                                            overflow-y:auto;
                                        ">


                                        <?php if (!empty($dataObatList)) { ?>


                                            <?php foreach ($dataObatList as $obat) { ?>


                                                <div class="form-check py-2 border-bottom">

                                                    <input class="form-check-input"
                                                        type="checkbox"
                                                        name="obat[]"
                                                        value="<?php echo (int) $obat['id']; ?>"
                                                        id="obatPeriksa<?php echo (int) $data['id']; ?>_<?php echo (int) $obat['id']; ?>">


                                                    <label class="form-check-label w-100"
                                                        for="obatPeriksa<?php echo (int) $data['id']; ?>_<?php echo (int) $obat['id']; ?>">

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $obat['nama_obat']
                                                        );
                                                        ?>

                                                    </label>

                                                </div>


                                            <?php } ?>


                                        <?php } else { ?>


                                            <div class="text-center text-secondary py-4">

                                                <i class="fas fa-pills fa-2x mb-2 opacity-50"></i>

                                                <div>
                                                    Belum ada data obat.
                                                </div>

                                            </div>


                                        <?php } ?>


                                    </div>


                                    <small class="text-secondary d-block mt-2">

                                        Pilih satu atau beberapa obat sesuai kebutuhan pasien.

                                    </small>


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

                                Simpan Pemeriksaan

                            </button>


                        </div>


                    </form>


                </div>


            </div>


        </div>


    <?php } ?>



    <?php if ((int) $data['status_periksa'] === 1) { ?>


        <?php

        // ==================================================
        // AMBIL DATA PEMERIKSAAN
        // ==================================================

        $idDaftarPoli = (int) $data['id'];

        $ambilDataPeriksa = mysqli_query(
            $mysqli,
            "
            SELECT
                periksa.id,
                periksa.tgl_periksa,
                periksa.catatan
            FROM periksa
            WHERE periksa.id_daftar_poli = $idDaftarPoli
            LIMIT 1
            "
        );


        $ambilData = null;

        if ($ambilDataPeriksa) {

            $ambilData = mysqli_fetch_assoc($ambilDataPeriksa);

        }


        // ==================================================
        // OBAT YANG SUDAH DIPILIH
        // ==================================================

        $obatTerpilih = [];


        if ($ambilData && isset($ambilData['id'])) {

            $idPeriksa = (int) $ambilData['id'];

            $queryObatTerpilih = mysqli_query(
                $mysqli,
                "
                SELECT id_obat
                FROM detail_periksa
                WHERE id_periksa = $idPeriksa
                "
            );


            if ($queryObatTerpilih) {

                while ($obatData = mysqli_fetch_assoc($queryObatTerpilih)) {

                    $obatTerpilih[] = (int) $obatData['id_obat'];

                }

            }

        }


        // ==================================================
        // FORMAT DATETIME-LOCAL
        // ==================================================

        $tanggalPeriksa = '';


        if (
            $ambilData &&
            !empty($ambilData['tgl_periksa'])
        ) {

            $timestamp = strtotime($ambilData['tgl_periksa']);

            if ($timestamp !== false) {

                $tanggalPeriksa = date(
                    'Y-m-d\TH:i',
                    $timestamp
                );

            }

        }


        $catatanPeriksa =
            $ambilData['catatan'] ?? '';

        ?>



        <!-- ================================================== -->
        <!-- MODAL EDIT PEMERIKSAAN -->
        <!-- ================================================== -->

        <div class="modal fade"
            id="editModal<?php echo $idDaftarPoli; ?>"
            tabindex="-1"
            aria-labelledby="editModalLabel<?php echo $idDaftarPoli; ?>"
            aria-hidden="true">


            <div class="modal-dialog modal-dialog-centered modal-lg">


                <div class="modal-content border-0 shadow rounded-4 overflow-hidden">


                    <!-- HEADER -->

                    <div class="modal-header bg-dark text-white border-0 p-4">


                        <div class="d-flex align-items-center">


                            <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                                style="
                                    width:48px;
                                    height:48px;
                                    min-width:48px;
                                ">

                                <i class="fas fa-edit text-dark"></i>

                            </div>


                            <div>

                                <h5 class="modal-title fw-bold mb-0"
                                    id="editModalLabel<?php echo $idDaftarPoli; ?>">

                                    Edit Pemeriksaan

                                </h5>

                                <small class="text-white-50">

                                    Perbarui hasil pemeriksaan pasien

                                </small>

                            </div>


                        </div>


                        <button type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                        </button>


                    </div>




                    <form action="pages/periksaPasien/editPeriksa.php"
                        method="post">


                        <input type="hidden"
                            name="id"
                            value="<?php echo $idDaftarPoli; ?>">


                        <div class="modal-body p-4">


                            <?php if ($ambilData) { ?>


                                <div class="row g-4">


                                    <!-- LEFT -->

                                    <div class="col-lg-6">


                                        <!-- NAMA -->

                                        <div class="mb-3">

                                            <label class="form-label fw-semibold">

                                                <i class="fas fa-user text-success me-2"></i>

                                                Nama Pasien

                                            </label>


                                            <input type="text"
                                                class="form-control bg-light"
                                                value="<?php echo htmlspecialchars($data['nama']); ?>"
                                                readonly>

                                        </div>




                                        <!-- TANGGAL -->

                                        <div class="mb-3">

                                            <label class="form-label fw-semibold">

                                                <i class="fas fa-calendar-alt text-success me-2"></i>

                                                Tanggal Periksa

                                            </label>


                                            <input type="datetime-local"
                                                class="form-control"
                                                name="tanggal_periksa"
                                                value="<?php echo htmlspecialchars($tanggalPeriksa); ?>"
                                                required>

                                        </div>




                                        <!-- CATATAN -->

                                        <div>

                                            <label class="form-label fw-semibold">

                                                <i class="fas fa-notes-medical text-success me-2"></i>

                                                Catatan Pemeriksaan

                                            </label>


                                            <textarea class="form-control"
                                                rows="5"
                                                name="catatan"
                                                required><?php echo htmlspecialchars($catatanPeriksa); ?></textarea>

                                        </div>


                                    </div>




                                    <!-- RIGHT -->

                                    <div class="col-lg-6">


                                        <label class="form-label fw-semibold mb-2">

                                            <i class="fas fa-pills text-success me-2"></i>

                                            Obat

                                        </label>


                                        <div class="border rounded-3 p-3 bg-light"
                                            style="
                                                max-height:310px;
                                                overflow-y:auto;
                                            ">


                                            <?php if (!empty($dataObatList)) { ?>


                                                <?php foreach ($dataObatList as $obat) { ?>


                                                    <?php

                                                    $obatId = (int) $obat['id'];

                                                    $checked = in_array(
                                                        $obatId,
                                                        $obatTerpilih,
                                                        true
                                                    );

                                                    ?>


                                                    <div class="form-check py-2 border-bottom">


                                                        <input class="form-check-input"
                                                            type="checkbox"
                                                            name="obat[]"
                                                            value="<?php echo $obatId; ?>"
                                                            id="obatEdit<?php echo $idDaftarPoli; ?>_<?php echo $obatId; ?>"
                                                            <?php echo $checked ? 'checked' : ''; ?>>


                                                        <label class="form-check-label w-100"
                                                            for="obatEdit<?php echo $idDaftarPoli; ?>_<?php echo $obatId; ?>">

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $obat['nama_obat']
                                                            );
                                                            ?>

                                                        </label>


                                                    </div>


                                                <?php } ?>


                                            <?php } else { ?>


                                                <div class="text-center text-secondary py-4">

                                                    <i class="fas fa-pills fa-2x mb-2 opacity-50"></i>

                                                    <div>
                                                        Belum ada data obat.
                                                    </div>

                                                </div>


                                            <?php } ?>


                                        </div>


                                        <small class="text-secondary d-block mt-2">

                                            Obat yang sebelumnya diberikan sudah otomatis terpilih.

                                        </small>


                                    </div>


                                </div>


                            <?php } else { ?>


                                <div class="alert alert-warning mb-0">


                                    <i class="fas fa-exclamation-triangle me-2"></i>

                                    Data pemeriksaan tidak ditemukan.


                                </div>


                            <?php } ?>


                        </div>




                        <!-- FOOTER -->

                        <?php if ($ambilData) { ?>


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


                        <?php } ?>


                    </form>


                </div>


            </div>


        </div>


    <?php } ?>


<?php } ?>