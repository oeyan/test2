<!DOCTYPE html>
<html>
<head>
    <title>Website Bimbingan Proyek 1</title>
    <link rel="stylesheet" type="text/css" href="style_awalmahasiswa.css">
    </head>
<body>
  <header>
    <h1>Website Bimbingan Proyek 1</h1>
  </header>
  <section>
  <nav>
    <a href="halaman_mahasiswa.php"><img src="home_logo.png"></a> 
    <?php include "menu_mahasiswa.php";?>
    </nav>
<content>
<?php
    session_start();
    include 'koneksi.php';
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Pengumpulan Laporan</title>
</head>
<body>
<center>
<?php
include("koneksi.php");
if (isset($_POST['input']))
{
$mahasiswa2=$_POST['mhs2'];
$pembimbing=$_POST['pmb'];
$keterangan=$_POST['ket'];
$dir ="laporan/";
$nama_file = basename($_FILES['file']['name']);
$ukuran = $_FILES['file']['size'];
$tipe = strtolower(pathinfo($nama_file,PATHINFO_EXTENSION));
$url = $dir.$nama_file;
if($tipe == 'pdf'||$tipe == 'docx')
{
if (move_uploaded_file($_FILES['file']['tmp_name'],$url))
{
    $query = mysqli_query($conn, "insert into laporan values('','$_SESSION[nama_user]','$mahasiswa2','$pembimbing','$keterangan','$url',sysdate())");
    $query .= mysqli_query($conn, "insert into lihat values('','$_SESSION[nama_user]','$mahasiswa2','$pembimbing','$keterangan','$url',sysdate())");
    if($query)
        {
            echo "<script> alert ('Upload berhasil')</script>";
            header ("refresh:0;halaman_mahasiswa.php?halaman=kumpul_laporan");
        }
        else{
            echo "<script> alert ('Upload gagal')</script>";
            header ("refresh:0;halaman_mahasiswa.php?halaman=kumpul_laporan");
        }
    } 
    else{
        echo "<script> alert ('Upload Gagal')</script>";
        header ("refresh:0;halaman_mahasiswa.php?halaman=kumpul_laporan");
        }
    }   
    else{
        echo "<script> alert ('Upload Gagal')</script>";
        header ("refresh:0;halaman_mahasiswa.php?halaman=kumpul_laporan");
        }
    }   
?>
<h1>Pengumpulan Laporan Bimbingan</h1>
<form method="post" action="" enctype="multipart/form-data">
<table>
    <tr>
        <td><label>Nama Teman Proyek</label></td>
        <td>:</td>
        <td><input type="text" name="mhs2" placeholder="Nama mahasiswa"></td>
    </tr>

    <tr>
        <td><label>Pembimbing</label></td>
        <td>:</td>
        <td><select name="pmb">
            <option value="">Nama pembimbing</option>
            <?php
                $sql = mysqli_query($conn,"select * from user where level ='dosen pembimbing'");
                while ($data=mysqli_fetch_array($sql)){
            ?>
                 <option value = "<?php echo $data['nama_user']?>"><?php echo $data['nama_user']?></option>
            <?php
                }
            ?>
                
            </select>
        </td>
    </tr>

    <tr>
        <td><label>Keterangan Laporan</label></td>
        <td>:</td>
        <td><textarea name="ket" placeholder="Ex: Laporan Bimbingan 1"></textarea></td>
    </tr>
    <tr>
        <td><label>File Proposal</label></td>
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
</content>
</body>
</html>