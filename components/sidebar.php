<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<aside class="bg-dark text-white h-100">

    <div class="p-3">


        <!-- ================= USER PROFILE ================= -->

        <div class="text-center rounded-4 p-3 mb-4"
            style="
                background:#343a40;
            ">


            <img src="assets/images/man.png"
                class="rounded-circle shadow mb-3"
                width="80"
                height="80"
                style="
                    object-fit:cover;
                "
                alt="User">


            <div class="fw-semibold text-white mb-2"
                style="
                    font-size:16px;
                ">

                <?php echo $username; ?>

            </div>



            <span class="badge bg-success px-3 py-2"
                style="
                    font-size:12px;
                ">

                <?php echo ucfirst($_SESSION['akses']); ?>

            </span>


        </div>





        <!-- ================= MENU ================= -->


        <div class="d-flex flex-column gap-2">





            <!-- ================= ADMIN ================= -->

            <?php if($_SESSION['akses']=="admin"){ ?>


                <a href="dashboard_admin.php"
                    class="text-decoration-none text-white rounded-3 d-flex align-items-center px-3 py-3"

                    style="
                    background:
                    <?php echo ($currentPage=='dashboard_admin.php')?'#198754':'transparent'; ?>;
                    ">

                    <i class="fas fa-home me-3"
                        style="width:20px;">
                    </i>

                    <span>
                        Dashboard
                    </span>

                </a>




                <a href="dokter.php"
                    class="text-decoration-none text-white rounded-3 d-flex align-items-center px-3 py-3"

                    style="
                    background:
                    <?php echo ($currentPage=='dokter.php')?'#198754':'transparent'; ?>;
                    ">


                    <i class="fas fa-user-md me-3"
                        style="width:20px;">
                    </i>


                    <span>
                        Dokter
                    </span>


                </a>





                <a href="poli.php"
                    class="text-decoration-none text-white rounded-3 d-flex align-items-center px-3 py-3"

                    style="
                    background:
                    <?php echo ($currentPage=='poli.php')?'#198754':'transparent'; ?>;
                    ">


                    <i class="fas fa-hospital me-3"
                        style="width:20px;">
                    </i>


                    <span>
                        Poli
                    </span>


                </a>





                <a href="obat.php"
                    class="text-decoration-none text-white rounded-3 d-flex align-items-center px-3 py-3"

                    style="
                    background:
                    <?php echo ($currentPage=='obat.php')?'#198754':'transparent'; ?>;
                    ">


                    <i class="fas fa-pills me-3"
                        style="width:20px;">
                    </i>


                    <span>
                        Obat
                    </span>


                </a>





                <a href="pasien.php"
                    class="text-decoration-none text-white rounded-3 d-flex align-items-center px-3 py-3"

                    style="
                    background:
                    <?php echo ($currentPage=='pasien.php')?'#198754':'transparent'; ?>;
                    ">


                    <i class="fas fa-users me-3"
                        style="width:20px;">
                    </i>


                    <span>
                        Pasien
                    </span>


                </a>


            <?php } ?>









            <!-- ================= DOKTER ================= -->

            <?php if($_SESSION['akses']=="dokter"){ ?>



                <a href="dashboard_dokter.php"
                    class="text-decoration-none text-white rounded-3 d-flex align-items-center px-3 py-3"

                    style="
                    background:
                    <?php echo ($currentPage=='dashboard_dokter.php')?'#198754':'transparent'; ?>;
                    ">


                    <i class="fas fa-home me-3"
                        style="width:20px;">
                    </i>


                    <span>
                        Dashboard
                    </span>


                </a>




                <a href="jadwalPeriksa.php"
                    class="text-decoration-none text-white rounded-3 d-flex align-items-center px-3 py-3"

                    style="
                    background:
                    <?php echo ($currentPage=='jadwalPeriksa.php')?'#198754':'transparent'; ?>;
                    ">


                    <i class="fas fa-calendar-alt me-3"
                        style="width:20px;">
                    </i>


                    <span>
                        Jadwal Periksa
                    </span>


                </a>





                <a href="periksaPasien.php"
                    class="text-decoration-none text-white rounded-3 d-flex align-items-center px-3 py-3"

                    style="
                    background:
                    <?php echo ($currentPage=='periksaPasien.php')?'#198754':'transparent'; ?>;
                    ">


                    <i class="fas fa-stethoscope me-3"
                        style="width:20px;">
                    </i>


                    <span>
                        Periksa Pasien
                    </span>


                </a>





                <a href="riwayatPasien.php"
                    class="text-decoration-none text-white rounded-3 d-flex align-items-center px-3 py-3"

                    style="
                    background:
                    <?php echo ($currentPage=='riwayatPasien.php')?'#198754':'transparent'; ?>;
                    ">


                    <i class="fas fa-file-medical me-3"
                        style="width:20px;">
                    </i>


                    <span>
                        Riwayat Pasien
                    </span>


                </a>





                <a href="editProfilDokter.php"
                    class="text-decoration-none text-white rounded-3 d-flex align-items-center px-3 py-3"

                    style="
                    background:
                    <?php echo ($currentPage=='editProfilDokter.php')?'#198754':'transparent'; ?>;
                    ">


                    <i class="fas fa-user-edit me-3"
                        style="width:20px;">
                    </i>


                    <span>
                        Edit Profil
                    </span>


                </a>



            <?php } ?>









            <!-- ================= PASIEN ================= -->


            <?php if($_SESSION['akses']=="pasien"){ ?>



                <a href="dashboard_pasien.php"
                    class="text-decoration-none text-white rounded-3 d-flex align-items-center px-3 py-3"

                    style="
                    background:
                    <?php echo ($currentPage=='dashboard_pasien.php')?'#198754':'transparent'; ?>;
                    ">


                    <i class="fas fa-home me-3"
                        style="width:20px;">
                    </i>


                    <span>
                        Dashboard
                    </span>


                </a>





                <a href="daftarPoliklinik.php"
                    class="text-decoration-none text-white rounded-3 d-flex align-items-center px-3 py-3"

                    style="
                    background:
                    <?php echo ($currentPage=='daftarPoliklinik.php')?'#198754':'transparent'; ?>;
                    ">


                    <i class="fas fa-stethoscope me-3"
                        style="width:20px;">
                    </i>


                    <span>
                        Daftar Poli
                    </span>


                </a>




            <?php } ?>



        </div>



    </div>


</aside>