<?php

$username = $_SESSION['username'] ?? 'Pengguna';

$akses = $_SESSION['akses'] ?? 'user';

?>


<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm sticky-top"
    style="
        min-height:75px;
        z-index:1030;
    ">


    <div class="container-fluid px-3 px-lg-4">



        <!-- ================= LEFT TITLE ================= -->

        <div class="d-flex align-items-center">


            <!-- Icon -->

            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                style="
                    width:46px;
                    height:46px;
                    min-width:46px;
                ">

                <i class="fas fa-hospital"></i>

            </div>




            <!-- Static Dashboard Title -->

            <div>


                <h5 class="mb-0 text-dark"
                    style="
                        font-size:18px;
                        font-weight:700;
                        line-height:1.2;
                    ">

                    Dashboard Pasien

                </h5>



                <small class="text-secondary"
                    style="
                        font-size:13px;
                    ">

                    Sistem Informasi Poliklinik Udinus

                </small>


            </div>


        </div>






        <!-- Mobile Toggle -->

        <button class="navbar-toggler border-0 shadow-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarContent"
            aria-controls="navbarContent"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <i class="fas fa-bars text-dark"></i>

        </button>







        <!-- ================= RIGHT CONTENT ================= -->


        <div class="collapse navbar-collapse"
            id="navbarContent">


            <div class="navbar-nav ms-auto align-items-lg-center mt-3 mt-lg-0">





                <!-- User Profile -->

                <div class="d-flex align-items-center me-lg-4 mb-3 mb-lg-0">



                    <!-- Avatar -->

                    <div class="bg-light border rounded-circle d-flex align-items-center justify-content-center me-3"
                        style="
                            width:42px;
                            height:42px;
                            min-width:42px;
                        ">

                        <i class="fas fa-user text-success"></i>

                    </div>





                    <!-- User Info -->

                    <div>


                        <div class="text-dark"
                            style="
                                font-size:14px;
                                font-weight:600;
                            ">

                            <?php echo htmlspecialchars($username); ?>


                        </div>



                        <small class="text-secondary"
                            style="
                                font-size:12px;
                            ">

                            <?php echo ucfirst(htmlspecialchars($akses)); ?>


                        </small>


                    </div>



                </div>







                <!-- Logout Button -->


                <a href="pages/logout/logout.php"
                    class="btn btn-danger px-4 py-2 d-flex align-items-center justify-content-center"
                    style="
                        font-size:14px;
                        font-weight:600;
                    ">


                    <i class="fas fa-sign-out-alt me-2"></i>


                    Keluar


                </a>





            </div>


        </div>





    </div>


</nav>