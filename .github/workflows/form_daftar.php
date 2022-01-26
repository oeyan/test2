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
    $npm1 = $_POST['npm1'];
    $mahasiswa1=$_POST['mhs1'];
    $npm2=$_POST['npm2'];
    $mahasiswa2=$_POST['mhs2'];
    $pembimbing=$_POST['pmb'];
    $judul=$_POST['jdl'];
    $query = mysqli_query($conn, "INSERT into data VALUES( ' ', '$npm1','$mahasiswa1','$npm2','$mahasiswa2','$pembimbing','$judul')");
    if($query)
        {
            echo "<script> alert ('Upload berhasil')</script>";
            header ("refresh:0;halaman_prodi.php?halaman=halaman_daftar_mahasiswa");
        }
    
        else{
            echo "<script> alert ('Upload gagal')</script>";
            header ("refresh:0;halaman_prodi.php?halaman=halaman_daftar_mahasiswa");
        }
}
?>
<center>
<h1> Form Input Mahasiswa </h1>
<form method="post" action="">
<table>
<tr>
        <td><label>NPM 1</label></td>
        <td>:</td>
        <td><input type="text" name="npm1" placeholder="NPM mahasiswa"></td>
    </tr>
<tr>
        <td><label>Nama Mahasiswa 1</label></td>
        <td>:</td>
        <td><input type="text" name="mhs1" placeholder="Nama mahasiswa"></td>
    </tr>
    <tr>
        <td><label>NPM 2</label></td>
        <td>:</td>
        <td><input type="text" name="npm2" placeholder="NPM mahasiswa"></td>
    </tr>
    <tr>
        <td><label>Nama Mahasiswa 2</label></td>
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
        <td><label>Judul Proyek</label></td>
        <td>:</td>
        <td><textarea name="jdl"></textarea></td>
    </tr>
    <tr>
    </tr>
    <tr>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    </table>
    <button onclick="" type="submit" name="input" class="submit">Submit</button>
    </form>
</center>
</content>
</body>
</html>