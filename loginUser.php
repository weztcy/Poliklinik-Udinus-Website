<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Poliklinik Udinus - Login</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">



    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }



        body {

            min-height: 100vh;
            background: #f5f9f7;

        }



        .main-wrapper {

            min-height: 100vh;

        }



        .left-side {

            background:
                linear-gradient(rgba(0, 80, 50, .75),
                    rgba(0, 40, 30, .85)),
                url("assets/images/hospitalbg.jpg");

            background-size: cover;
            background-position: center;

            color: white;

            display: flex;
            align-items: center;

        }



        .brand-box {

            padding: 60px;

        }



        .brand-logo {

            width: 75px;
            background: white;
            padding: 10px;
            border-radius: 20px;

        }



        .brand-title {

            font-size: 42px;
            font-weight: 700;

        }



        .feature {

            display: flex;
            align-items: center;
            margin-top: 25px;

        }



        .feature i {

            width: 45px;
            height: 45px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #198754;

            margin-right: 15px;

        }





        .right-side {

            display: flex;
            align-items: center;
            justify-content: center;

        }





        .auth-card {

            width: 450px;

            background: white;

            border-radius: 30px;

            padding: 40px;

            box-shadow:
                0 20px 50px rgba(0, 0, 0, .12);

        }



        .logo-mobile {

            width: 60px;

        }



        .nav-tabs {

            border: none;

        }



        .nav-tabs .nav-link {
            border-radius: 12px 12px 0 0;
            transition: .3s;
        }


        .nav-tabs .nav-link.active {
            color: #198754;
            font-weight: 700;
            background: #f0faf5;
            border-bottom: 3px solid #198754;
        }




        .form-control {

            border-radius: 15px;

            padding: 14px 45px;

            border: 1px solid #ddd;

        }



        .form-control:focus {

            border-color: #198754;

            box-shadow:
                0 0 0 .2rem rgba(25, 135, 84, .15);

        }



        .input-group-icon {

            position: absolute;

            left: 18px;

            top: 50%;

            transform: translateY(-50%);

            color: #198754;

        }



        .password-eye {

            position: absolute;

            right: 18px;

            top: 50%;

            transform: translateY(-50%);

            cursor: pointer;

        }



        .btn-premium {

            background: #198754;

            color: white;

            border-radius: 15px;

            padding: 14px;

            font-weight: 600;

        }



        .btn-premium:hover {

            background: #146c43;

            color: white;

        }




        .switch-text {

            cursor: pointer;

            color: #198754;

            font-weight: 600;

        }



        .form-section {

            display: none;

        }



        .form-section.active {

            display: block;

        }





        @media(max-width:992px) {


            .left-side {

                display: none;

            }


            .auth-card {

                width: 95%;

            }


        }
    </style>


</head>


<body>


    <div class="container-fluid main-wrapper">


        <div class="row min-vh-100">



            <!-- LEFT -->

            <div class="col-lg-6 left-side">


                <div class="brand-box">



                    <img src="assets/images/logo_dinus.png" class="brand-logo mb-4">



                    <h1 class="brand-title">

                        Poliklinik
                        <span class="text-warning">
                            Udinus
                        </span>

                    </h1>



                    <p class="lead">

                        Pelayanan kesehatan modern
                        untuk mahasiswa, karyawan,
                        dan masyarakat umum.

                    </p>





                    <div class="feature">

                        <i class="bi bi-person-vcard"></i>

                        <div>

                            <b>Dokter Profesional</b>

                            <br>

                            <small>
                                Tenaga medis terpercaya
                            </small>

                        </div>


                    </div>





                    <div class="feature">

                        <i class="bi bi-heart-pulse"></i>

                        <div>

                            <b>Layanan Lengkap</b>

                            <br>

                            <small>
                                Berbagai jenis poli kesehatan
                            </small>

                        </div>


                    </div>





                    <div class="feature">

                        <i class="bi bi-shield-check"></i>

                        <div>

                            <b>Data Aman</b>

                            <br>

                            <small>
                                Sistem kesehatan terintegrasi
                            </small>

                        </div>


                    </div>



                </div>


            </div>







            <!-- RIGHT -->


            <div class="col-lg-6 right-side">


                <div class="auth-card">



                    <div class="text-center mb-4">


                        <img src="assets/images/logo_dinus.png" class="logo-mobile mb-3">


                        <h3 class="fw-bold">

                            Portal Pasien

                        </h3>


                        <p class="text-muted">

                            Masuk atau buat akun baru

                        </p>


                    </div>





                    <ul class="nav nav-tabs justify-content-center mb-4">


                        <li class="nav-item">

                            <button id="loginTab" class="nav-link active" onclick="showLogin()">

                                Masuk

                            </button>

                        </li>



                        <li class="nav-item">

                            <button id="registerTab" class="nav-link" onclick="showRegister()">

                                Daftar

                            </button>

                        </li>


                    </ul>







                    <!-- LOGIN -->


                    <div id="loginForm" class="form-section active">


                        <form action="pages/loginUser/checkLoginUser.php" method="post">



                            <div class="position-relative mb-3">


                                <i class="bi bi-person input-group-icon"></i>


                                <input type="text" name="username" class="form-control" placeholder="Username" required>


                            </div>





                            <div class="position-relative mb-4">


                                <i class="bi bi-lock input-group-icon"></i>


                                <input type="password" id="login-password" name="password" class="form-control"
                                    placeholder="Password" required>


                                <i class="bi bi-eye password-eye" onclick="togglePassword('login-password',this)">
                                </i>


                            </div>





                            <button class="btn btn-premium w-100">

                                <i class="bi bi-box-arrow-in-right me-2"></i>

                                Masuk

                            </button>



                        </form>


                    </div>









                    <!-- REGISTER -->


                    <div id="registerForm" class="form-section">


                        <form action="pages/register/checkRegister.php" method="post">



                            <div class="position-relative mb-3">

                                <i class="bi bi-person input-group-icon"></i>

                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>

                            </div>




                            <div class="position-relative mb-3">

                                <i class="bi bi-credit-card input-group-icon"></i>

                                <input type="number" name="no_ktp" class="form-control" placeholder="Nomor KTP"
                                    required>

                            </div>





                            <div class="position-relative mb-3">

                                <i class="bi bi-geo-alt input-group-icon"></i>

                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>

                            </div>






                            <div class="position-relative mb-3">

                                <i class="bi bi-phone input-group-icon"></i>

                                <input type="number" name="no_hp" class="form-control" placeholder="Nomor HP" required>

                            </div>







                            <div class="position-relative mb-4">

                                <i class="bi bi-lock input-group-icon"></i>


                                <input type="password" id="register-password" name="password" class="form-control"
                                    placeholder="Password" required>


                                <i class="bi bi-eye password-eye" onclick="togglePassword('register-password',this)">
                                </i>


                            </div>





                            <button class="btn btn-primary w-100 rounded-4 py-3">

                                <i class="bi bi-person-plus me-2"></i>

                                Daftar

                            </button>




                        </form>


                    </div>







                    <button class="btn btn-outline-danger w-100 mt-4 rounded-4" onclick="history.back()">


                        <i class="bi bi-arrow-left"></i>

                        Kembali


                    </button>






                </div>


            </div>


        </div>


    </div>






    <script>


        function showLogin() {


            document.getElementById("loginForm")
                .classList.add("active");


            document.getElementById("registerForm")
                .classList.remove("active");


            // ubah tab aktif

            document.getElementById("loginTab")
                .classList.add("active");


            document.getElementById("registerTab")
                .classList.remove("active");


        }





        function showRegister() {


            document.getElementById("registerForm")
                .classList.add("active");


            document.getElementById("loginForm")
                .classList.remove("active");


            // ubah tab aktif

            document.getElementById("registerTab")
                .classList.add("active");


            document.getElementById("loginTab")
                .classList.remove("active");


        }





        function togglePassword(id, icon) {


            let input = document.getElementById(id);



            if (input.type === "password") {

                input.type = "text";

                icon.classList.remove("bi-eye");

                icon.classList.add("bi-eye-slash");


            } else {


                input.type = "password";


                icon.classList.remove("bi-eye-slash");

                icon.classList.add("bi-eye");


            }


        }



    </script>



</body>

</html>
