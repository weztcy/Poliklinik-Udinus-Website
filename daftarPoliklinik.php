<!DOCTYPE html>

<?php

session_start();


$username = $_SESSION['username'] ?? '';

$idPasien = $_SESSION['id'] ?? '';



if ($username == "") {

    header("location:loginUser.php");
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




<!-- Google Font -->

<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700">




<!-- Font Awesome -->

<link rel="stylesheet"
href="assets/plugins/fontawesome-free/css/all.min.css">




<!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
rel="stylesheet">




<link rel="icon"
type="image/png"
href="assets/images/logo_dinus.png">



</head>





<body class="bg-light"
style="
font-family:'Source Sans Pro',sans-serif;
margin:0;
padding:0;
">







<!-- ================= NAVBAR ================= -->


<?php include('components/navbar.php'); ?>









<!-- ================= MAIN ================= -->


<div class="container-fluid px-0">


    <div class="row gx-0 min-vh-100">





        <!-- ================= SIDEBAR ================= -->


        <aside class="col-xl-2 col-lg-3 col-md-4 bg-dark p-0">


            <?php include('components/sidebar.php'); ?>


        </aside>









        <!-- ================= CONTENT ================= -->


        <main class="col-xl-10 col-lg-9 col-md-8 p-0">


            <div class="p-3 p-md-4">


                <?php include('pages/daftarPoli/index.php'); ?>


            </div>


        </main>






    </div>


</div>








<!-- ================= SCRIPT ================= -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>


<script src="assets/plugins/jquery/jquery.min.js">
</script>





<script>


$(document).ready(function(){


    $('#poli').on('change',function(){


        let poliId = $(this).val();



        $.ajax({


            type:'POST',

            url:'getJadwal.php',

            data:{
                poliId:poliId
            },


            success:function(data){


                $('#jadwal').html(data);


            }



        });


    });



});



</script>





</body>


</html>