<section class="py-2">


<div class="row g-4">



    <!-- ================= FORM DAFTAR POLI ================= -->

    <div class="col-xl-4 col-lg-5 col-md-12">


        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">



            <!-- Header -->

            <div class="bg-dark text-white p-4"
                style="min-height:95px;">


                <div class="d-flex align-items-center">


                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="
                        width:55px;
                        height:55px;
                        min-width:55px;
                        ">


                        <i class="fas fa-notes-medical fa-lg"></i>


                    </div>



                    <div>


                        <h4 class="fw-bold mb-1">

                            Daftar Poli

                        </h4>


                        <small class="text-white-50">

                            Buat jadwal pemeriksaan

                        </small>


                    </div>



                </div>


            </div>





            <!-- Body -->

            <div class="card-body p-4">


                <form action="pages/daftarPoli/daftarPoli.php"
                    method="post">





                    <!-- No RM -->

                    <div class="mb-3">


                        <label class="fw-semibold mb-2">


                            <i class="fas fa-id-card text-success me-2"></i>

                            No Rekam Medis


                        </label>



                        <input type="text"

                            class="form-control bg-light"

                            name="no_rm"

                            value="<?php echo $_SESSION['no_rm']; ?>"

                            readonly

                            required>


                    </div>







                    <!-- Poli -->

                    <div class="mb-3">


                        <label class="fw-semibold mb-2">


                            <i class="fas fa-hospital text-success me-2"></i>

                            Pilih Poli


                        </label>




                        <select class="form-select"
                            id="poli"
                            name="poli"
                            required>


                            <option value="" selected disabled>

                                Pilih Poli

                            </option>




                            <?php


                            require 'config/koneksi.php';


                            $query = "SELECT * FROM poli";


                            $result = mysqli_query($mysqli,$query);



                            while($dataPoli = mysqli_fetch_assoc($result)){


                            ?>



                            <option value="<?php echo $dataPoli['id']; ?>">


                                <?php echo $dataPoli['nama_poli']; ?>


                            </option>



                            <?php } ?>



                        </select>


                    </div>









                    <!-- Jadwal -->

                    <div class="mb-3">


                        <label class="fw-semibold mb-2">


                            <i class="fas fa-calendar-alt text-success me-2"></i>

                            Pilih Jadwal


                        </label>




                        <select class="form-select"
                            id="jadwal"
                            name="jadwal"
                            required>


                            <option value="" selected disabled>

                                Pilih jadwal pemeriksaan

                            </option>


                        </select>



                    </div>









                    <!-- Keluhan -->

                    <div class="mb-4">


                        <label class="fw-semibold mb-2">


                            <i class="fas fa-comment-medical text-success me-2"></i>

                            Keluhan


                        </label>




                        <textarea class="form-control"
                            rows="4"
                            id="keluhan"
                            name="keluhan"
                            placeholder="Tuliskan keluhan Anda..."
                            required></textarea>



                    </div>








                    <!-- Button -->

                    <button type="submit"

                        class="btn btn-success w-100 py-2 fw-bold rounded-3">


                        <i class="fas fa-check-circle me-2"></i>


                        Daftar Pemeriksaan



                    </button>



                </form>


            </div>


        </div>



    </div>












    <!-- ================= RIWAYAT ================= -->


    <div class="col-xl-8 col-lg-7 col-md-12">


        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">





            <!-- Header -->


            <div class="bg-dark text-white p-4"
                style="min-height:95px;">


                <div class="d-flex align-items-center">



                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"

                        style="
                        width:55px;
                        height:55px;
                        min-width:55px;
                        ">



                        <i class="fas fa-history fa-lg"></i>



                    </div>




                    <div>


                        <h4 class="fw-bold mb-1">

                            Riwayat Daftar Poli

                        </h4>



                        <small class="text-white-50">

                            Riwayat pendaftaran pemeriksaan Anda

                        </small>


                    </div>



                </div>



            </div>








            <!-- Table -->

            <div class="card-body p-0">



                <div class="table-responsive">



                    <table class="table table-hover align-middle mb-0">



                        <thead class="table-light">


                            <tr>


                                <th class="text-center">
                                    No
                                </th>


                                <th>
                                    Poli
                                </th>


                                <th>
                                    Dokter
                                </th>


                                <th>
                                    Hari
                                </th>


                                <th>
                                    Jam
                                </th>


                                <th class="text-center">
                                    Antrian
                                </th>


                                <th class="text-center">
                                    Aksi
                                </th>



                            </tr>



                        </thead>





                        <tbody>



                        <?php


                        require 'config/koneksi.php';


                        $no = 1;



                        $query = "

                        SELECT

                        daftar_poli.id as idDaftarPoli,

                        poli.nama_poli,

                        dokter.nama,

                        jadwal_periksa.hari,

                        jadwal_periksa.jam_mulai,

                        jadwal_periksa.jam_selesai,

                        daftar_poli.no_antrian


                        FROM daftar_poli


                        INNER JOIN jadwal_periksa

                        ON daftar_poli.id_jadwal = jadwal_periksa.id


                        INNER JOIN dokter

                        ON jadwal_periksa.id_dokter = dokter.id


                        INNER JOIN poli

                        ON dokter.id_poli = poli.id


                        WHERE daftar_poli.id_pasien='$idPasien'

                        ";



                        $result=mysqli_query($mysqli,$query);



                        while($data=mysqli_fetch_assoc($result)){



                        ?>




                        <tr>



                            <td class="text-center fw-bold">

                                <?php echo $no++; ?>

                            </td>






                            <td>


                                <span class="badge bg-success px-3 py-2">


                                    <?php echo $data['nama_poli']; ?>


                                </span>


                            </td>







                            <td>


                                <div class="d-flex align-items-center">


                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center me-2"

                                        style="
                                        width:35px;
                                        height:35px;
                                        ">


                                        <i class="fas fa-user-md text-primary"></i>


                                    </div>



                                    <?php echo $data['nama']; ?>



                                </div>



                            </td>







                            <td>

                                <?php echo $data['hari']; ?>

                            </td>







                            <td>


                                <small class="d-block">

                                    <?php echo $data['jam_mulai']; ?>

                                </small>


                                <small class="text-muted">

                                    s/d <?php echo $data['jam_selesai']; ?>

                                </small>



                            </td>








                            <td class="text-center">


                                <span class="badge bg-primary rounded-pill px-3 py-2">


                                    <?php echo $data['no_antrian']; ?>


                                </span>


                            </td>







                            <td class="text-center">


                                <a href="detailDaftarPoli.php?id=<?php echo $data['idDaftarPoli']; ?>"

                                class="btn btn-sm btn-outline-success rounded-pill px-3">


                                    <i class="fas fa-eye me-1"></i>

                                    Detail


                                </a>


                            </td>





                        </tr>





                        <?php } ?>





                        </tbody>




                    </table>




                </div>




            </div>






        </div>




    </div>





</div>


</section>