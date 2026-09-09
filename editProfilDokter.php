<!DOCTYPE html>

<?php

session_start();


// ======================================================
// SESSION
// ======================================================

$id_dokter = $_SESSION['id'] ?? '';

$username = $_SESSION['username'] ?? '';


// ======================================================
// VALIDASI LOGIN
// ======================================================

if ($username == "") {

    header("location:login.php");
    exit;

}

?>


<html lang="id">


<head>


    <meta charset="utf-8">


    <meta name="viewport"
        content="width=device-width, initial-scale=1">


    <title>
        Poliklinik
    </title>


    <!-- ====================================================== -->
    <!-- GOOGLE FONT -->
    <!-- ====================================================== -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&display=fallback">


    <!-- ====================================================== -->
    <!-- FONT AWESOME -->
    <!-- ====================================================== -->

    <link rel="stylesheet"
        href="assets/plugins/fontawesome-free/css/all.min.css">


    <!-- ====================================================== -->
    <!-- BOOTSTRAP 5 -->
    <!-- ====================================================== -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- ====================================================== -->
    <!-- FAV ICON -->
    <!-- ====================================================== -->

    <link rel="icon"
        type="image/png"
        href="assets/images/logo_dinus.png">


</head>



<body class="bg-light"
    style="
        font-family:'Source Sans Pro', sans-serif;
        min-height:100vh;
        margin:0;
        padding:0;
    ">


    <!-- ====================================================== -->
    <!-- NAVBAR -->
    <!-- ====================================================== -->

    <?php include('components/navbar.php'); ?>



    <!-- ====================================================== -->
    <!-- MAIN LAYOUT -->
    <!-- ====================================================== -->

    <div class="container-fluid px-0">


        <div class="row g-0 min-vh-100">


            <!-- ================================================== -->
            <!-- SIDEBAR -->
            <!-- ================================================== -->

            <aside class="col-xl-2 col-lg-3 col-md-4 bg-dark p-0">


                <?php include('components/sidebar.php'); ?>


            </aside>



            <!-- ================================================== -->
            <!-- CONTENT -->
            <!-- ================================================== -->

            <main class="col-xl-10 col-lg-9 col-md-8 bg-light p-0">


                <div class="p-3 p-md-4">


                    <?php include('pages/dokter/editProfilDokter.php'); ?>


                </div>


            </main>


        </div>


    </div>



    <!-- ====================================================== -->
    <!-- BOOTSTRAP JS -->
    <!-- ====================================================== -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>


</body>


</html>