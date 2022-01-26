<!DOCTYPE html>
<html>
<head>
    <title>Website Bimbingan Proyek 1</title>
    <link rel="stylesheet" type="text/css" href="styleawalprodi.css">
    </head>
<body>
  <header>
    <h1>Website Bimbingan Proyek 1</h1>
  </header>
  <section>
  <nav>
    <a href="halaman_prodi.php"><img src="home_logo.png"></a> 
    <?php include "menu_prodi.php";?>
</nav>
<content>
<?php
include("koneksi.php");
if (isset($_POST['input']))
{
    $judul = $_POST['judul'];
    $pembuat1=$_POST['mhs1'];
    $pembuat2=$_POST['mhs2'];
    $pembimbing=$_POST['pmb'];
    $abstrak=$_POST['abstrak'];
    $dir = "datapencarian/";
    $nama_file = basename($_FILES['file']['name']);
    $ukuran = $_FILES['file']['size'];
    $tipe = strtolower(pathinfo($nama_file,PATHINFO_EXTENSION));
    $url = $dir.$nama_file;
    if($tipe == 'pdf')
    {
    if (move_uploaded_file($_FILES['file']['tmp_name'],$url))
    {
        $query = mysqli_query($conn, "insert into upload values( ' ', '$judul','$pembuat1','$pembuat2','$pembimbing','$abstrak','$url')");
        if($query)
        {
            echo "<script> alert ('Upload berhasil')</script>";
            header ("refresh:0;halaman_prodi.php?halaman=halaman_update");
        }
        else{
            echo "<script> alert ('Upload gagal')</script>";
            header ("refresh:0;halaman_prodi.php?halaman=halaman_update");
        }
    } 
    else{
        echo "<script> alert ('Upload Gagal')</script>";
        header ("refresh:0;halaman_prodi.php?halaman=halaman_update");
        }
    }   
    else{
        echo "<script> alert ('Jenis File tidak diizinkan')</script>";
        header ("refresh:0;halaman_prodi.php?halaman=halaman_update");
        }
    }   
?>
<h2>Form Update Database</h2>
<form method="post" action="" enctype="multipart/form-data">
<center>
<table>
<tr>
        <td><label>Judul Proyek</label></td>
        <td>:</td>
        <td><input type="text" name="judul" placeholder="Judul proyek"></td>
    </tr>
    <tr>
        <td><label>Nama pembuat 1</label></td>
        <td>:</td>
        <td><input type="text" name="mhs1" placeholder="Nama mahasiswa">
    </tr>
    <tr>
        <td><label>Nama pembuat 2</label></td>
        <td>:</td>
        <td><input type="text" name="mhs2" placeholder="Nama mahasiswa">
    </tr>
    <tr>
        <td><label>Nama pembimbing</label></td>
        <td>:</td>
        <td><input type="text" name="pmb" placeholder="Nama pembimbing"></td>
    </tr>
    <tr>
        <td><label>Abstrak Laporan</label></td>
        <td>:</td>
        <td><textarea name="abstrak" placeholder="Masukan abstrak laporan"></textarea></td>
    </tr>
    <tr>
        <td><label>File Jurnal</label></td>
        <td>:</td>
        <td><input type="file" name="file"></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><button type="submit" name="input" class="submit">Submit</button></td>
    </tr>
</table>
</form>
</center>
</content>
</body>
</form>