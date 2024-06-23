<?php 
session_start();
include "koneksi.php";
$username=$_POST['username'];
$password=$_POST['password'];

$login=mysqli_query($conn, "select * from user where username='$username' and password='$password'");
$cek=mysqli_num_rows($login);
if ($cek>0) {
  $data =mysqli_fetch_assoc($login);
  if ($data['role']=="guru") {
    $_SESSION['username'];
    $_SESSION['role']= "guru";
    header("location: guru/halaman_guru.php");
  }elseif ($data['role']=="siswa") {
    $_SESSION['username']=$username;
    $_SESSION['role']="siswa";
    header("location:siswa/halaman_siswa.php");
  } 
  else {
    header("location:index.php?pesan=gagal");
  }
}else {
  echo "<script>alert('username dan password tidak benar');location.href='login.php';</script>";
    
}
?>