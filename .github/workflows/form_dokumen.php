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
    $nama = $_POST['nama'];
    $dir ="dokumen/";
    $nama_file = basename($_FILES['file']['name']);
    $ukuran = $_FILES['file']['size'];
    $tipe = strtolower(pathinfo($nama_file,PATHINFO_EXTENSION));
    $url = $dir.$nama_file;
    if($tipe == 'pdf')
    {
    if (move_uploaded_file($_FILES['file']['tmp_name'],$url))
    {
    $query = mysqli_query($conn, "insert into dokumen values('','$nama','$url')");
    if($query)
        {
            echo "<script> alert ('Upload berhasil')</script>";
            header ("refresh:0;halaman_prodi.php?halaman=halaman_dokumen");
        }
        else{
            echo "<script> alert ('Upload gagal')</script>";
            header ("refresh:0;halaman_prodi.php?halaman=halaman_dokumen");
        }
    } 
    else{
        echo "<script> alert ('Upload Gagal')</script>";
        header ("refresh:0;halaman_prodi.php?halaman=halaman_dokumen");
        }
    }   
    else{
        echo "<script> alert ('Upload Gagal')</script>";
        header ("refresh:0;halaman_prodi.php?halaman=halaman_dokumen");
        }
    }   
?>
<center>
<h1>Input Dokumen Proyek</h1>
<form method="post" action=""  enctype="multipart/form-data">
<table>
<tr>
        <td><label>Nama Dokumen</label></td>
        <td>:</td>
        <td><input type="text" name="nama" placeholder="Nama Dokumen" autofocus autocomplete="0"></td>
    </tr>
    <tr>
        <td><label>Dokumen</label></td>
        <td>:</td>
        <td><input type="file" name="file"></td>
    </tr>
    <tr>
    </tr>
    <tr>
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
</html>