<?php

require_once 'config/koneksi.php';


// ======================================================
// VALIDASI DATA SESSION DARI WRAPPER
// ======================================================

$id_dokter = isset($id_dokter) ? (int) $id_dokter : 0;
$id_poli   = isset($id_poli) ? (int) $id_poli : 0;


// ======================================================
// DAFTAR HARI
// ======================================================

$hariArray = [
    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu'
];


// ======================================================
// AMBIL DATA POLI
// ======================================================

$namaPoli = 'Poli';

$queryPoli = "
    SELECT nama_poli
    FROM poli
    WHERE id = $id_poli
    LIMIT 1
";

$resultPoli = mysqli_query($mysqli, $queryPoli);

if ($resultPoli && mysqli_num_rows($resultPoli) > 0) {

    $dataPoli = mysqli_fetch_assoc($resultPoli);

    $namaPoli = $dataPoli['nama_poli'];

}


// ======================================================
// AMBIL JADWAL DOKTER YANG LOGIN
// ======================================================

$dataJadwalDokter = [];

$queryJadwalDokter = "
    SELECT
        jadwal_periksa.id,
        jadwal_periksa.id_dokter,
        jadwal_periksa.hari,
        jadwal_periksa.jam_mulai,
        jadwal_periksa.jam_selesai,
        jadwal_periksa.aktif,
        dokter.nama,
        dokter.id_poli,
        poli.nama_poli
    FROM jadwal_periksa
    INNER JOIN dokter
        ON jadwal_periksa.id_dokter = dokter.id
    INNER JOIN poli
        ON dokter.id_poli = poli.id
    WHERE dokter.id_poli = $id_poli
        AND dokter.id = $id_dokter
    ORDER BY
        FIELD(
            jadwal_periksa.hari,
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu'
        ),
        jadwal_periksa.jam_mulai ASC
";

$resultJadwalDokter = mysqli_query(
    $mysqli,
    $queryJadwalDokter
);


if ($resultJadwalDokter) {

    while (
        $jadwal = mysqli_fetch_assoc(
            $resultJadwalDokter
        )
    ) {

        $dataJadwalDokter[] = $jadwal;

    }

}


// ======================================================
// AMBIL SELURUH JADWAL DOKTER DALAM POLI
// ======================================================

$dataJadwalPoli = [];

$queryJadwalPoli = "
    SELECT
        jadwal_periksa.id,
        jadwal_periksa.id_dokter,
        jadwal_periksa.hari,
        jadwal_periksa.jam_mulai,
        jadwal_periksa.jam_selesai,
        jadwal_periksa.aktif,
        dokter.nama,
        dokter.id_poli,
        poli.nama_poli
    FROM jadwal_periksa
    INNER JOIN dokter
        ON jadwal_periksa.id_dokter = dokter.id
    INNER JOIN poli
        ON dokter.id_poli = poli.id
    WHERE dokter.id_poli = $id_poli
    ORDER BY
        dokter.nama ASC,
        FIELD(
            jadwal_periksa.hari,
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu'
        ),
        jadwal_periksa.jam_mulai ASC
";

$resultJadwalPoli = mysqli_query(
    $mysqli,
    $queryJadwalPoli
);


if ($resultJadwalPoli) {

    while (
        $jadwalPoli = mysqli_fetch_assoc(
            $resultJadwalPoli
        )
    ) {

        $dataJadwalPoli[] = $jadwalPoli;

    }

}


// ======================================================
// HITUNG STATISTIK
// ======================================================

$totalJadwal = count($dataJadwalDokter);

$totalAktif = 0;
$totalTidakAktif = 0;


foreach ($dataJadwalDokter as $jadwal) {

    if ($jadwal['aktif'] === 'Y') {

        $totalAktif++;

    } else {

        $totalTidakAktif++;

    }

}


// ======================================================
// CEK PASIEN YANG MASIH MENUNGGU PEMERIKSAAN
// ======================================================

$jumlahPasienMenunggu = 0;

$queryPasienMenunggu = "
    SELECT COUNT(*) AS jumlah
    FROM daftar_poli
    INNER JOIN jadwal_periksa
        ON daftar_poli.id_jadwal = jadwal_periksa.id
    WHERE jadwal_periksa.id_dokter = $id_dokter
        AND daftar_poli.status_periksa = '0'
";

$resultPasienMenunggu = mysqli_query(
    $mysqli,
    $queryPasienMenunggu
);


if ($resultPasienMenunggu) {

    $dataMenunggu = mysqli_fetch_assoc(
        $resultPasienMenunggu
    );

    $jumlahPasienMenunggu =
        (int) ($dataMenunggu['jumlah'] ?? 0);

}

?>


<section class="py-2">


    <!-- ====================================================== -->
    <!-- HEADER -->
    <!-- ====================================================== -->

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">


        <div class="bg-dark text-white p-4">


            <div class="row align-items-center g-3">


                <!-- LEFT -->

                <div class="col-lg-7">


                    <div class="d-flex align-items-center">


                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:55px;
                                height:55px;
                                min-width:55px;
                            ">

                            <i class="fas fa-calendar-alt fa-lg"></i>

                        </div>


                        <div>


                            <h4 class="fw-bold mb-1">

                                Jadwal Periksa

                            </h4>


                            <small class="text-white-50">

                                Kelola jadwal praktik dan pemeriksaan Anda

                            </small>


                        </div>


                    </div>


                </div>




                <!-- RIGHT -->

                <div class="col-lg-5">


                    <div class="d-flex flex-column flex-sm-row justify-content-lg-end gap-2">


                        <button type="button"
                            class="btn btn-outline-light px-3 py-2 fw-semibold"
                            data-bs-toggle="modal"
                            data-bs-target="#cekJadwal">


                            <i class="fas fa-calendar-week me-2"></i>

                            Lihat Jadwal Poli


                        </button>



                        <button type="button"
                            class="btn btn-success px-3 py-2 fw-semibold"
                            data-bs-toggle="modal"
                            data-bs-target="#addModal">


                            <i class="fas fa-plus-circle me-2"></i>

                            Tambah Jadwal


                        </button>


                    </div>


                </div>


            </div>


        </div>


    </div>






    <!-- ====================================================== -->
    <!-- STATISTIK -->
    <!-- ====================================================== -->

    <div class="row g-4 mb-4">


        <!-- TOTAL JADWAL -->

        <div class="col-xl-3 col-md-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex align-items-center">


                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:52px;
                                height:52px;
                                min-width:52px;
                            ">

                            <i class="fas fa-calendar-alt"></i>

                        </div>


                        <div>


                            <small class="text-secondary d-block">

                                Total Jadwal

                            </small>


                            <h3 class="fw-bold mb-0">

                                <?php echo number_format($totalJadwal); ?>

                            </h3>


                        </div>


                    </div>


                </div>


            </div>


        </div>




        <!-- JADWAL AKTIF -->

        <div class="col-xl-3 col-md-6">


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

                                Jadwal Aktif

                            </small>


                            <h3 class="fw-bold mb-0">

                                <?php echo number_format($totalAktif); ?>

                            </h3>


                        </div>


                    </div>


                </div>


            </div>


        </div>




        <!-- TIDAK AKTIF -->

        <div class="col-xl-3 col-md-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex align-items-center">


                        <div class="bg-secondary bg-opacity-10 text-secondary rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:52px;
                                height:52px;
                                min-width:52px;
                            ">

                            <i class="fas fa-times-circle"></i>

                        </div>


                        <div>


                            <small class="text-secondary d-block">

                                Tidak Aktif

                            </small>


                            <h3 class="fw-bold mb-0">

                                <?php echo number_format($totalTidakAktif); ?>

                            </h3>


                        </div>


                    </div>


                </div>


            </div>


        </div>




        <!-- PASIEN MENUNGGU -->

        <div class="col-xl-3 col-md-6">


            <div class="card border-0 shadow-sm rounded-4 h-100">


                <div class="card-body p-4">


                    <div class="d-flex align-items-center">


                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="
                                width:52px;
                                height:52px;
                                min-width:52px;
                            ">

                            <i class="fas fa-user-clock"></i>

                        </div>


                        <div>


                            <small class="text-secondary d-block">

                                Pasien Menunggu

                            </small>


                            <h3 class="fw-bold mb-0">

                                <?php
                                echo number_format(
                                    $jumlahPasienMenunggu
                                );
                                ?>

                            </h3>


                        </div>


                    </div>


                </div>


            </div>


        </div>


    </div>






    <!-- ====================================================== -->
    <!-- TABLE JADWAL DOKTER -->
    <!-- ====================================================== -->

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">


        <!-- HEADER TABLE -->

        <div class="card-header bg-white border-0 p-4">


            <div class="d-flex align-items-center justify-content-between">


                <div>


                    <h5 class="fw-bold text-dark mb-1">

                        Daftar Jadwal Periksa

                    </h5>


                    <small class="text-secondary">

                        Jadwal praktik Anda pada
                        <?php echo htmlspecialchars($namaPoli); ?>

                    </small>


                </div>



                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center"
                    style="
                        width:45px;
                        height:45px;
                        min-width:45px;
                    ">

                    <i class="fas fa-calendar-check"></i>

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

                                Dokter

                            </th>


                            <th class="py-3">

                                Hari

                            </th>


                            <th class="py-3">

                                Jam Mulai

                            </th>


                            <th class="py-3">

                                Jam Selesai

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


                    <?php if (!empty($dataJadwalDokter)) { ?>


                        <?php

                        $no = 1;

                        foreach ($dataJadwalDokter as $data) {

                        ?>


                            <tr>


                                <!-- NO -->

                                <td class="text-center px-4 fw-semibold">

                                    <?php echo $no++; ?>

                                </td>




                                <!-- DOKTER -->

                                <td style="min-width:220px;">


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

                                                <?php
                                                echo htmlspecialchars(
                                                    $data['nama_poli']
                                                );
                                                ?>

                                            </small>


                                        </div>


                                    </div>


                                </td>




                                <!-- HARI -->

                                <td>


                                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">

                                        <i class="fas fa-calendar-day me-1"></i>

                                        <?php
                                        echo htmlspecialchars(
                                            $data['hari']
                                        );
                                        ?>

                                    </span>


                                </td>




                                <!-- JAM MULAI -->

                                <td style="min-width:120px;">


                                    <i class="fas fa-clock text-success me-2"></i>

                                    <?php
                                    echo htmlspecialchars(
                                        substr(
                                            $data['jam_mulai'],
                                            0,
                                            5
                                        )
                                    );
                                    ?>


                                </td>




                                <!-- JAM SELESAI -->

                                <td style="min-width:120px;">


                                    <i class="fas fa-clock text-danger me-2"></i>

                                    <?php
                                    echo htmlspecialchars(
                                        substr(
                                            $data['jam_selesai'],
                                            0,
                                            5
                                        )
                                    );
                                    ?>


                                </td>




                                <!-- STATUS -->

                                <td class="text-center">


                                    <?php if ($data['aktif'] === 'Y') { ?>


                                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2">

                                            <i class="fas fa-check-circle me-1"></i>

                                            Aktif

                                        </span>


                                    <?php } else { ?>


                                        <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3 py-2">

                                            <i class="fas fa-times-circle me-1"></i>

                                            Tidak Aktif

                                        </span>


                                    <?php } ?>


                                </td>




                                <!-- AKSI -->

                                <td class="text-center px-4">


                                    <button type="button"
                                        class="btn btn-sm btn-outline-warning px-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal<?php echo (int) $data['id']; ?>">


                                        <i class="fas fa-edit me-1"></i>

                                        Edit


                                    </button>


                                </td>


                            </tr>


                        <?php } ?>


                    <?php } else { ?>


                        <tr>


                            <td colspan="7"
                                class="text-center py-5">


                                <div class="text-secondary">


                                    <i class="fas fa-calendar-times fa-3x mb-3 opacity-50"></i>


                                    <h6 class="fw-bold">

                                        Belum Ada Jadwal Periksa

                                    </h6>


                                    <small>

                                        Silakan tambahkan jadwal periksa terlebih dahulu.

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
<!-- MODAL TAMBAH JADWAL -->
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

                        <i class="fas fa-calendar-plus"></i>

                    </div>


                    <div>


                        <h5 class="modal-title fw-bold mb-0"
                            id="addModalLabel">

                            Tambah Jadwal Periksa

                        </h5>


                        <small class="text-white-50">

                            Buat jadwal praktik baru

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

            <form action="pages/jadwalPeriksa/tambahJadwal.php"
                method="post">


                <div class="modal-body p-4">


                    <!-- HARI -->

                    <div class="mb-3">


                        <label for="hariTambah"
                            class="form-label fw-semibold">

                            <i class="fas fa-calendar-day text-success me-2"></i>

                            Hari

                        </label>


                        <select class="form-select"
                            id="hariTambah"
                            name="hari"
                            required>


                            <option value=""
                                selected
                                disabled>

                                Pilih Hari

                            </option>


                            <?php foreach ($hariArray as $hari) { ?>


                                <option value="<?php echo htmlspecialchars($hari); ?>">

                                    <?php echo htmlspecialchars($hari); ?>

                                </option>


                            <?php } ?>


                        </select>


                    </div>




                    <!-- JAM MULAI -->

                    <div class="mb-3">


                        <label for="jamMulaiTambah"
                            class="form-label fw-semibold">

                            <i class="fas fa-clock text-success me-2"></i>

                            Jam Mulai

                        </label>


                        <input type="time"
                            class="form-control"
                            id="jamMulaiTambah"
                            name="jamMulai"
                            required>


                    </div>




                    <!-- JAM SELESAI -->

                    <div>


                        <label for="jamSelesaiTambah"
                            class="form-label fw-semibold">

                            <i class="fas fa-clock text-danger me-2"></i>

                            Jam Selesai

                        </label>


                        <input type="time"
                            class="form-control"
                            id="jamSelesaiTambah"
                            name="jamSelesai"
                            required>


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

                        Tambah Jadwal

                    </button>


                </div>


            </form>


        </div>


    </div>


</div>








<!-- ====================================================== -->
<!-- MODAL LIHAT JADWAL POLI -->
<!-- ====================================================== -->

<div class="modal fade"
    id="cekJadwal"
    tabindex="-1"
    aria-labelledby="cekJadwalLabel"
    aria-hidden="true">


    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">


        <div class="modal-content border-0 shadow rounded-4 overflow-hidden">


            <!-- HEADER -->

            <div class="modal-header bg-dark text-white border-0 p-4">


                <div class="d-flex align-items-center">


                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="
                            width:45px;
                            height:45px;
                            min-width:45px;
                        ">

                        <i class="fas fa-calendar-week"></i>

                    </div>


                    <div>


                        <h5 class="modal-title fw-bold mb-0"
                            id="cekJadwalLabel">

                            Jadwal Poli
                            <?php echo htmlspecialchars($namaPoli); ?>

                        </h5>


                        <small class="text-white-50">

                            Seluruh jadwal dokter pada poli ini

                        </small>


                    </div>


                </div>



                <button type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal"
                    aria-label="Close">
                </button>


            </div>




            <!-- BODY -->

            <div class="modal-body p-0">


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
                                    Hari
                                </th>


                                <th class="py-3">
                                    Jam Mulai
                                </th>


                                <th class="py-3">
                                    Jam Selesai
                                </th>


                                <th class="text-center py-3">
                                    Status
                                </th>


                            </tr>


                        </thead>




                        <tbody>


                        <?php if (!empty($dataJadwalPoli)) { ?>


                            <?php

                            $nomor = 1;

                            foreach ($dataJadwalPoli as $jadwalPoli) {

                            ?>


                                <tr>


                                    <td class="text-center px-4 fw-semibold">

                                        <?php echo $nomor++; ?>

                                    </td>




                                    <td>


                                        <div class="d-flex align-items-center">


                                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center me-3"
                                                style="
                                                    width:38px;
                                                    height:38px;
                                                    min-width:38px;
                                                ">

                                                <i class="fas fa-user-md"></i>

                                            </div>


                                            <span class="fw-semibold">

                                                <?php
                                                echo htmlspecialchars(
                                                    $jadwalPoli['nama']
                                                );
                                                ?>

                                            </span>


                                        </div>


                                    </td>




                                    <td>


                                        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">

                                            <?php
                                            echo htmlspecialchars(
                                                $jadwalPoli['hari']
                                            );
                                            ?>

                                        </span>


                                    </td>




                                    <td>

                                        <?php
                                        echo htmlspecialchars(
                                            substr(
                                                $jadwalPoli['jam_mulai'],
                                                0,
                                                5
                                            )
                                        );
                                        ?>

                                    </td>




                                    <td>

                                        <?php
                                        echo htmlspecialchars(
                                            substr(
                                                $jadwalPoli['jam_selesai'],
                                                0,
                                                5
                                            )
                                        );
                                        ?>

                                    </td>




                                    <td class="text-center">


                                        <?php if ($jadwalPoli['aktif'] === 'Y') { ?>


                                            <span class="badge bg-success px-3 py-2 rounded-pill">

                                                Aktif

                                            </span>


                                        <?php } else { ?>


                                            <span class="badge bg-secondary px-3 py-2 rounded-pill">

                                                Tidak Aktif

                                            </span>


                                        <?php } ?>


                                    </td>


                                </tr>


                            <?php } ?>


                        <?php } else { ?>


                            <tr>


                                <td colspan="6"
                                    class="text-center py-5">


                                    <i class="fas fa-calendar-times fa-3x text-secondary opacity-50 mb-3"></i>


                                    <h6 class="fw-bold">

                                        Belum Ada Jadwal

                                    </h6>


                                    <small class="text-secondary">

                                        Belum ada jadwal dokter pada poli ini.

                                    </small>


                                </td>


                            </tr>


                        <?php } ?>


                        </tbody>


                    </table>


                </div>


            </div>




            <!-- FOOTER -->

            <div class="modal-footer border-0">


                <button type="button"
                    class="btn btn-dark px-4"
                    data-bs-dismiss="modal">

                    Tutup

                </button>


            </div>


        </div>


    </div>


</div>








<!-- ====================================================== -->
<!-- MODAL EDIT JADWAL -->
<!-- ====================================================== -->

<?php foreach ($dataJadwalDokter as $data) { ?>


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

                                Edit Jadwal Periksa

                            </h5>


                            <small class="text-white-50">

                                Perbarui jadwal dan status praktik

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

                <form action="pages/jadwalPeriksa/updateJadwal.php"
                    method="post">


                    <input type="hidden"
                        name="id"
                        value="<?php echo (int) $data['id']; ?>">


                    <div class="modal-body p-4">


                        <!-- HARI -->

                        <div class="mb-3">


                            <label for="hariEdit<?php echo (int) $data['id']; ?>"
                                class="form-label fw-semibold">

                                <i class="fas fa-calendar-day text-success me-2"></i>

                                Hari

                            </label>


                            <select class="form-select"
                                id="hariEdit<?php echo (int) $data['id']; ?>"
                                name="hari"
                                required>


                                <?php foreach ($hariArray as $hari) { ?>


                                    <option
                                        value="<?php echo htmlspecialchars($hari); ?>"

                                        <?php
                                        echo (
                                            $data['hari'] === $hari
                                        ) ? 'selected' : '';
                                        ?>>


                                        <?php echo htmlspecialchars($hari); ?>


                                    </option>


                                <?php } ?>


                            </select>


                        </div>




                        <!-- JAM MULAI -->

                        <div class="mb-3">


                            <label for="jamMulaiEdit<?php echo (int) $data['id']; ?>"
                                class="form-label fw-semibold">

                                <i class="fas fa-clock text-success me-2"></i>

                                Jam Mulai

                            </label>


                            <input type="time"
                                class="form-control bg-light"
                                id="jamMulaiEdit<?php echo (int) $data['id']; ?>"
                                name="jamMulai"
                                value="<?php echo htmlspecialchars(substr($data['jam_mulai'], 0, 5)); ?>"
                                readonly
                                required>


                            <small class="text-secondary">

                                Jam mulai tidak dapat diubah.

                            </small>


                        </div>




                        <!-- JAM SELESAI -->

                        <div class="mb-3">


                            <label for="jamSelesaiEdit<?php echo (int) $data['id']; ?>"
                                class="form-label fw-semibold">

                                <i class="fas fa-clock text-danger me-2"></i>

                                Jam Selesai

                            </label>


                            <input type="time"
                                class="form-control bg-light"
                                id="jamSelesaiEdit<?php echo (int) $data['id']; ?>"
                                name="jamSelesai"
                                value="<?php echo htmlspecialchars(substr($data['jam_selesai'], 0, 5)); ?>"
                                readonly
                                required>


                            <small class="text-secondary">

                                Jam selesai tidak dapat diubah.

                            </small>


                        </div>




                        <!-- STATUS -->

                        <div>


                            <label for="aktifEdit<?php echo (int) $data['id']; ?>"
                                class="form-label fw-semibold">

                                <i class="fas fa-toggle-on text-success me-2"></i>

                                Status Jadwal

                            </label>


                            <select class="form-select"
                                id="aktifEdit<?php echo (int) $data['id']; ?>"
                                name="aktif"
                                required>


                                <option value="Y"
                                    <?php echo $data['aktif'] === 'Y' ? 'selected' : ''; ?>>

                                    Aktif

                                </option>


                                <option value="N"
                                    <?php echo $data['aktif'] === 'N' ? 'selected' : ''; ?>>

                                    Tidak Aktif

                                </option>


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


<?php } ?>