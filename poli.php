<!DOCTYPE html>

<?php

session_start();

$id_dokter = $_SESSION['id'] ?? '';
$username  = $_SESSION['username'] ?? '';
$id_poli   = $_SESSION['id_poli'] ?? '';

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

    <title>Poliklinik</title>


    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&display=fallback">


    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="assets/plugins/fontawesome-free/css/all.min.css">


    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">


    <!-- Fav Icon -->
    <link rel="icon"
        type="image/png"
        href="assets/images/logo_dinus.png">

</head>


<body class="bg-light"
    style="
        font-family:'Source Sans Pro', sans-serif;
        min-height:100vh;
    ">


    <!-- ================= NAVBAR ================= -->

    <?php include('components/navbar.php'); ?>


    <!-- ================= MAIN LAYOUT ================= -->

    <div class="container-fluid">

        <div class="row min-vh-100">


            <!-- ================= SIDEBAR ================= -->

            <aside class="col-xl-2 col-lg-3 col-md-4 bg-dark p-0">

                <?php include('components/sidebar.php'); ?>

            </aside>


            <!-- ================= MAIN CONTENT ================= -->

            <main class="col-xl-10 col-lg-9 col-md-8 p-0">

                <div class="p-3 p-md-4">

                    <?php include('pages/poli/index.php'); ?>

                </div>

            </main>


        </div>

    </div>


    <!-- ================= BOOTSTRAP JS ================= -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>