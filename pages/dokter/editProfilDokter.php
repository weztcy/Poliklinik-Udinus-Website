<?php

require 'config/koneksi.php';


// ======================================================
// AMBIL DATA DOKTER
// ======================================================

$query = "
SELECT 
    id,
    nama,
    alamat,
    no_hp
FROM dokter
WHERE id='$id_dokter'
";


$result = mysqli_query($mysqli,$query);


$dataDokter = mysqli_fetch_assoc($result);



?>



<section class="py-2">



<!-- ====================================================== -->
<!-- HEADER -->
<!-- ====================================================== -->


<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">


<div class="bg-dark text-white p-4">


<div class="d-flex align-items-center">


<div class="
bg-success
rounded-circle
d-flex
align-items-center
justify-content-center
me-3
"
style="
width:55px;
height:55px;
">


<i class="fas fa-user-md fa-lg"></i>


</div>



<div>


<h4 class="fw-bold mb-1">

Profil Dokter

</h4>


<small class="text-white-50">

Kelola informasi pribadi dokter

</small>


</div>



</div>


</div>


</div>







<!-- ====================================================== -->
<!-- CONTENT -->
<!-- ====================================================== -->


<div class="row g-4">



<!-- PROFILE CARD -->

<div class="col-lg-4">


<div class="card border-0 shadow-sm rounded-4 h-100">


<div class="card-body text-center p-4">



<div class="
bg-success
bg-opacity-10
text-success
rounded-circle
d-flex
align-items-center
justify-content-center
mx-auto
mb-3
"
style="
width:90px;
height:90px;
">


<i class="fas fa-user-md fa-3x"></i>


</div>




<h4 class="fw-bold">

<?= htmlspecialchars($dataDokter['nama']); ?>

</h4>



<span class="badge bg-success px-3 py-2 rounded-pill">

Dokter

</span>



<hr>



<div class="text-start mt-4">



<div class="mb-3">


<small class="text-secondary d-block">

<i class="fas fa-phone text-success me-2"></i>

No HP

</small>


<span class="fw-semibold">

<?= htmlspecialchars($dataDokter['no_hp']); ?>

</span>


</div>





<div>


<small class="text-secondary d-block">

<i class="fas fa-map-marker-alt text-success me-2"></i>

Alamat

</small>


<span class="fw-semibold">

<?= nl2br(htmlspecialchars($dataDokter['alamat'])); ?>

</span>


</div>



</div>



</div>


</div>


</div>







<!-- DETAIL CARD -->


<div class="col-lg-8">



<div class="card border-0 shadow-sm rounded-4">


<div class="card-header bg-white border-0 p-4">


<div class="d-flex justify-content-between align-items-center">


<div>


<h5 class="fw-bold mb-1">

Informasi Dokter

</h5>


<small class="text-secondary">

Data profil dokter saat ini

</small>


</div>


<div class="
bg-primary
bg-opacity-10
text-primary
rounded-circle
d-flex
align-items-center
justify-content-center
"
style="
width:45px;
height:45px;
">


<i class="fas fa-id-card"></i>


</div>


</div>


</div>





<div class="card-body p-4">



<div class="row g-4">



<div class="col-md-6">


<label class="text-secondary small">

Nama Dokter

</label>


<div class="fw-semibold">

<?= htmlspecialchars($dataDokter['nama']); ?>

</div>


</div>





<div class="col-md-6">


<label class="text-secondary small">

Nomor Telepon

</label>


<div class="fw-semibold">

<?= htmlspecialchars($dataDokter['no_hp']); ?>

</div>


</div>





<div class="col-12">


<label class="text-secondary small">

Alamat

</label>


<div class="fw-semibold">

<?= nl2br(htmlspecialchars($dataDokter['alamat'])); ?>

</div>


</div>



</div>





<hr>




<div class="text-end">


<button 
class="btn btn-success px-4"
data-bs-toggle="modal"
data-bs-target="#editModal"
>


<i class="fas fa-edit me-2"></i>

Edit Profil


</button>


</div>




</div>


</div>


</div>


</div>


</section>








<!-- ====================================================== -->
<!-- MODAL EDIT -->
<!-- ====================================================== -->


<div class="modal fade"
id="editModal"
tabindex="-1">


<div class="modal-dialog modal-dialog-centered">


<div class="modal-content border-0 shadow rounded-4 overflow-hidden">



<div class="modal-header bg-dark text-white">


<div>


<h5 class="modal-title fw-bold">

Edit Profil Dokter

</h5>


<small class="text-white-50">

Perbarui data dokter

</small>


</div>



<button 
class="btn-close btn-close-white"
data-bs-dismiss="modal">
</button>


</div>





<form action="pages/dokter/updateProfilDokter.php"
method="post">


<input type="hidden"
name="id"
value="<?= $dataDokter['id']; ?>">



<div class="modal-body p-4">



<div class="mb-3">


<label class="form-label fw-semibold">


<i class="fas fa-user-md text-success me-2"></i>

Nama Dokter


</label>


<input type="text"
class="form-control"
name="nama"
value="<?= htmlspecialchars($dataDokter['nama']); ?>"
required>


</div>





<div class="mb-3">


<label class="form-label fw-semibold">


<i class="fas fa-map-marker-alt text-success me-2"></i>

Alamat


</label>


<textarea 
class="form-control"
rows="3"
name="alamat"
required><?= htmlspecialchars($dataDokter['alamat']); ?></textarea>


</div>





<div>


<label class="form-label fw-semibold">


<i class="fas fa-phone text-success me-2"></i>

Nomor Telepon


</label>


<input type="text"
class="form-control"
name="no_hp"
value="<?= htmlspecialchars($dataDokter['no_hp']); ?>"
required>


</div>




</div>





<div class="modal-footer border-0 px-4 pb-4">


<button 
type="button"
class="btn btn-light border"
data-bs-dismiss="modal">

Batal

</button>



<button 
type="submit"
class="btn btn-success px-4">


<i class="fas fa-save me-2"></i>

Simpan


</button>


</div>




</form>


</div>


</div>


</div>