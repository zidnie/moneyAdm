<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['password']) ) {
    echo "<center>Untuk mengakses modul, Anda harus Login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
}else{
  include "../../../lib/config.php";
  include "../../../lib/koneksi.php";

  $tanggal = $_POST['tanggal'];
  $idKat = $_POST['idKat'];
  $ket = $_POST['ket'];
  $pem = $_POST['pem'];

  if ($ket=="" && $pem=="") {
        echo "<script>alert('Data tidak boleh kosong'); window.location='$admin_url'+'main.php?module=tambah_pengeluaran';</script>"; 
  } elseif (!is_numeric($pem)){
                echo "<script>alert('Data jumlah Pengeluaran harus angka'); window.location='$admin_url'+'main.php?module=tambah_pengeluaran';</script>";
    } else{
  $querySimpan = mysqli_query($koneksi, 
          "INSERT INTO tbl_keuangan (tanggal, id_kat, keterangan, pengeluaran) 
          VALUES ('$tanggal', '$idKat', '$ket', '$pem')" );
      if($querySimpan){
        echo "<script>alert('Data Pengeluaran Berhasil Masuk'); window.location='$admin_url'+'main.php?module=keuangan ';</script>";
      }else{
        echo "<script>alert('Data Pengeluaran Gagal Masuk'); window.location='$admin_url'+'main.php?module=tambah_pengeluaran';</script>";
      }
  }
}
 ?>