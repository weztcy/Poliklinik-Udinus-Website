<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Poliklinik Udinus</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">


<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">



<style>


*{
    font-family:'Poppins',sans-serif;
}


body{

    min-height:100vh;

    background:#f4f8f6;

}



.login-wrapper{

    min-height:100vh;

}



.left-panel{


    background:
    linear-gradient(
    rgba(0,60,45,.85),
    rgba(0,35,25,.9)
    ),
    url("assets/images/hospitalbg.jpg");


    background-size:cover;

    background-position:center;

    color:white;

    display:flex;

    align-items:center;


}



.brand{

    padding:60px;

}



.logo{

    width:80px;

    background:white;

    border-radius:20px;

    padding:10px;

}



.brand h1{

    font-size:45px;

    font-weight:700;

}



.role-card{

    margin-top:35px;

    padding:25px;

    background:rgba(255,255,255,.15);

    border-radius:20px;

    backdrop-filter:blur(10px);

}



.role-icon{

    width:60px;

    height:60px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:50%;

    background:white;

    color:#198754;

    font-size:25px;

}




.right-panel{

    display:flex;

    align-items:center;

    justify-content:center;

}



.login-card{


    width:430px;

    background:white;

    padding:45px;


    border-radius:30px;


    box-shadow:

    0 20px 60px rgba(0,0,0,.12);


}



.login-card h2{

    font-weight:700;

}



.form-control{

    height:55px;

    border-radius:15px;

    padding-left:50px;

}



.input-icon{

    position:absolute;

    top:50%;

    left:18px;

    transform:translateY(-50%);

    color:#198754;

}



.eye{

    position:absolute;

    right:18px;

    top:50%;

    transform:translateY(-50%);

    cursor:pointer;

}



.btn-login{

    height:55px;

    border-radius:15px;

    font-weight:600;

}



.back-btn{

    border-radius:15px;

}



@media(max-width:992px){

.left-panel{

display:none;

}

}



</style>


</head>



<body>



<div class="container-fluid login-wrapper">


<div class="row min-vh-100">



<!-- LEFT SIDE -->

<div class="col-lg-6 left-panel">


<div class="brand">


<img src="assets/images/logo_dinus.png"
class="logo mb-4">



<h1>

Poliklinik

<span class="text-warning">
Udinus
</span>

</h1>



<p class="lead">

Sistem pelayanan kesehatan
terintegrasi Universitas Dian Nuswantoro.

</p>




<div class="role-card">


<div class="d-flex align-items-center">


<div class="role-icon me-3">


<?php


if(isset($_GET['role'])){


$role=$_GET['role'];


if($role=="dokter"){

echo '<i class="bi bi-person-vcard"></i>';

}

elseif($role=="admin"){

echo '<i class="bi bi-gear"></i>';

}

else{

echo '<i class="bi bi-person"></i>';

}


}

else{

echo '<i class="bi bi-person"></i>';

}


?>


</div>




<div>


<h5 class="mb-1">

<?php


if(isset($_GET['role'])){


if($_GET['role']=="dokter"){

echo "Portal Dokter";

}

elseif($_GET['role']=="admin"){

echo "Portal Admin";

}

else{

echo "Portal Pasien";

}


}

else{

echo "Portal Login";

}


?>

</h5>



<small>


<?php


if(isset($_GET['role'])){


if($_GET['role']=="dokter"){

echo "Kelola pelayanan medis pasien";

}

elseif($_GET['role']=="admin"){

echo "Manajemen sistem poliklinik";

}

else{

echo "Akses layanan kesehatan";

}


}

?>


</small>



</div>


</div>


</div>



</div>


</div>








<!-- RIGHT -->

<div class="col-lg-6 right-panel">


<div class="login-card">



<div class="text-center mb-4">


<img src="assets/images/logo_dinus.png"
width="60">


<h2 class="mt-3">

Masuk Akun


<?php


if(isset($_GET['role'])){


if($_GET['role']=="dokter"){

echo "Dokter";

}

elseif($_GET['role']=="admin"){

echo "Admin";

}

else{

echo "Pasien";

}


}


?>

</h2>


<p class="text-muted">

Silahkan login untuk melanjutkan

</p>



</div>







<form action="pages/login/checkLogin.php"
method="post">





<div class="position-relative mb-3">


<i class="bi bi-person input-icon"></i>


<input type="text"
name="username"
class="form-control"
placeholder="Username"
required>


</div>






<div class="position-relative mb-4">


<i class="bi bi-lock input-icon"></i>


<input type="password"
id="password"
name="password"
class="form-control"
placeholder="Password"
required>


<i class="bi bi-eye eye"
onclick="togglePassword()"
id="eye">

</i>



</div>







<button class="btn btn-success btn-login w-100">

<i class="bi bi-box-arrow-in-right me-2"></i>

Masuk

</button>




</form>






<button onclick="history.back()"
class="btn btn-outline-danger w-100 mt-3 back-btn">


<i class="bi bi-arrow-left"></i>

Kembali


</button>





</div>



</div>


</div>


</div>





<script>


function togglePassword(){


let pass=document.getElementById("password");

let eye=document.getElementById("eye");



if(pass.type==="password"){


pass.type="text";

eye.classList.remove("bi-eye");

eye.classList.add("bi-eye-slash");


}

else{


pass.type="password";


eye.classList.remove("bi-eye-slash");

eye.classList.add("bi-eye");


}



}


</script>



</body>

</html>
```
