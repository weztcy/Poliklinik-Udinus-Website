<?php

require 'config/koneksi.php';


// ======================================================
// AMBIL DATA RIWAYAT PASIEN
// ======================================================

$query = "

SELECT 
    daftar_poli.status_periksa,
    periksa.id,
    pasien.alamat,
    pasien.id AS idPasien,
    pasien.no_ktp,
    pasien.no_hp,
    pasien.no_rm,
    periksa.tgl_periksa,
    pasien.nama AS namaPasien,
    dokter.nama AS namaDokter,
    daftar_poli.keluhan,
    periksa.catatan,
    GROUP_CONCAT(obat.nama_obat) AS namaObat,
    SUM(obat.harga) AS hargaObat

FROM detail_periksa

INNER JOIN periksa 
ON detail_periksa.id_periksa = periksa.id

INNER JOIN daftar_poli 
ON periksa.id_daftar_poli = daftar_poli.id

INNER JOIN pasien 
ON daftar_poli.id_pasien = pasien.id

INNER JOIN obat 
ON detail_periksa.id_obat = obat.id

INNER JOIN jadwal_periksa 
ON daftar_poli.id_jadwal = jadwal_periksa.id

INNER JOIN dokter 
ON jadwal_periksa.id_dokter = dokter.id

WHERE status_periksa='1'

GROUP BY pasien.id

";


$result = mysqli_query($mysqli,$query);


$dataRiwayat=[];


while($row=mysqli_fetch_assoc($result)){

    $dataRiwayat[]=$row;

}


?>



<section class="py-2">



<!-- ================= HEADER ================= -->


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


<i class="fas fa-history fa-lg"></i>


</div>


<div>


<h4 class="fw-bold mb-1">

Riwayat Pasien

</h4>


<small class="text-white-50">

Daftar pasien yang telah selesai diperiksa

</small>


</div>



</div>


</div>


</div>






<!-- ================= STATISTIK ================= -->


<div class="row g-4 mb-4">


<div class="col-lg-4">


<div class="card border-0 shadow-sm rounded-4">


<div class="card-body p-4">


<div class="d-flex align-items-center">


<div class="
bg-primary 
bg-opacity-10 
text-primary 
rounded-circle 
d-flex 
align-items-center 
justify-content-center 
me-3
"
style="
width:52px;
height:52px;
">


<i class="fas fa-user-check"></i>


</div>


<div>


<small class="text-secondary">

Total Pasien Diperiksa

</small>


<h3 class="fw-bold mb-0">

<?= count($dataRiwayat); ?>

</h3>


</div>


</div>


</div>


</div>


</div>


</div>






<!-- ================= TABLE ================= -->


<div class="card border-0 shadow-sm rounded-4 overflow-hidden">



<div class="card-header bg-white border-0 p-4">


<div class="d-flex justify-content-between align-items-center">


<div>


<h5 class="fw-bold mb-1">

Daftar Riwayat Pemeriksaan

</h5>


<small class="text-secondary">

Data pasien yang sudah mendapatkan pelayanan

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


<i class="fas fa-notes-medical"></i>


</div>


</div>


</div>





<div class="card-body p-0">


<div class="table-responsive">


<table class="table table-hover align-middle mb-0">


<thead class="table-light">


<tr>


<th class="text-center">
No
</th>


<th>
Pasien
</th>


<th>
Alamat
</th>


<th>
No RM
</th>


<th>
Telepon
</th>


<th class="text-center">
Aksi
</th>


</tr>


</thead>



<tbody>


<?php if(count($dataRiwayat)>0){ ?>


<?php 
$no=1;

foreach($dataRiwayat as $data){

?>


<tr>


<td class="text-center fw-semibold">

<?= $no++; ?>

</td>




<td>


<div class="d-flex align-items-center">


<div class="
bg-primary 
bg-opacity-10 
text-primary 
rounded-circle 
d-flex 
align-items-center 
justify-content-center 
me-3
"
style="
width:42px;
height:42px;
">


<i class="fas fa-user"></i>


</div>


<div>


<div class="fw-semibold">

<?= htmlspecialchars($data['namaPasien']); ?>

</div>


<small class="text-secondary">

<?= $data['no_ktp']; ?>

</small>


</div>


</div>


</td>





<td>

<?= htmlspecialchars($data['alamat']); ?>

</td>




<td>

<span class="badge bg-light text-dark border">

<?= $data['no_rm']; ?>

</span>

</td>




<td>

<?= $data['no_hp']; ?>

</td>




<td class="text-center">


<button 
class="btn btn-sm btn-outline-primary px-3"
data-bs-toggle="modal"
data-bs-target="#detail<?= $data['id']; ?>"
>


<i class="fas fa-eye me-1"></i>

Detail


</button>


</td>


</tr>




<!-- ================= MODAL DETAIL ================= -->


<div class="modal fade"
id="detail<?= $data['id']; ?>">


<div class="modal-dialog modal-xl modal-dialog-centered">


<div class="modal-content border-0 shadow rounded-4 overflow-hidden">


<div class="modal-header bg-dark text-white">


<h5 class="modal-title fw-bold">

Riwayat <?= $data['namaPasien']; ?>

</h5>


<button 
class="btn-close btn-close-white"
data-bs-dismiss="modal">
</button>


</div>





<div class="modal-body p-4">



<div class="table-responsive">


<table class="table table-hover">


<thead class="table-light">


<tr>

<th>No</th>
<th>Tanggal</th>
<th>Dokter</th>
<th>Keluhan</th>
<th>Obat</th>
<th>Biaya</th>

</tr>


</thead>



<tbody>



<?php


$idPasien=$data['idPasien'];


$detail=mysqli_query($mysqli,


"

SELECT

periksa.tgl_periksa,
dokter.nama,
daftar_poli.keluhan,
GROUP_CONCAT(obat.nama_obat) AS namaObat,
periksa.biaya_periksa


FROM detail_periksa


INNER JOIN periksa
ON detail_periksa.id_periksa=periksa.id


INNER JOIN daftar_poli
ON periksa.id_daftar_poli=daftar_poli.id


INNER JOIN jadwal_periksa
ON daftar_poli.id_jadwal=jadwal_periksa.id


INNER JOIN dokter
ON jadwal_periksa.id_dokter=dokter.id


INNER JOIN obat
ON detail_periksa.id_obat=obat.id


WHERE daftar_poli.id_pasien='$idPasien'


GROUP BY periksa.id


"

);


$nomor=1;


while($d=mysqli_fetch_assoc($detail)){


?>


<tr>


<td>

<?= $nomor++; ?>

</td>


<td>

<?= $d['tgl_periksa']; ?>

</td>


<td>

<?= $d['nama']; ?>

</td>


<td>

<?= $d['keluhan']; ?>

</td>


<td>

<?= $d['namaObat']; ?>

</td>


<td>

Rp <?= number_format($d['biaya_periksa'],0,',','.'); ?>

</td>


</tr>


<?php } ?>


</tbody>


</table>


</div>



</div>



<div class="modal-footer">


<button 
class="btn btn-secondary"
data-bs-dismiss="modal">

Tutup

</button>


</div>



</div>


</div>


</div>



<?php } ?>



<?php }else{ ?>


<tr>

<td colspan="6" class="text-center py-5">


<i class="fas fa-folder-open fa-3x text-secondary mb-3"></i>


<h6>

Belum ada riwayat pasien

</h6>


</td>


</tr>


<?php } ?>



</tbody>


</table>


</div>


</div>


</div>



</section>