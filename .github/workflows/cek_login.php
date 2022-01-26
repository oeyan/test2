<?php
    session_start();
    include 'koneksi.php';
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $data_user = mysqli_query($conn, "SELECT * FROM user where username = '$user' AND password = '$pass' ");
    $cek = mysqli_num_rows($data_user);
    if($cek > 0){
    $r = mysqli_fetch_array($data_user);
    echo $r['nama_user'];
    echo $r['username'];

    if($r['level']=="mahasiswa"){
        $_SESSION['username'] = $user;
        $_SESSION['level'] = "mahasiswa";
        $_SESSION['nama_user']=$r['nama_user'];;
        header("location:halaman_mahasiswa.php");
        }
        else if($r['level']=="dosen pembimbing"){
        $_SESSION['username'] = $user;
        $_SESSION['level'] = "dosen pembimbing";
        $_SESSION['nama_user']=$r['nama_user'];
        header("location:halaman_dospem.php");
        }
        else if($r['level']=="prodi"){
        $_SESSION['username'] = $user;
        $_SESSION['level'] = "prodi";
        $_SESSION['nama_user']=$r['nama_user'];
        header("location:halaman_prodi.php");}
        else{

            // alihkan ke halaman login kembali
            echo "<script> alert ('Username dan Password Salah !')</script>";
            header ("refresh:0;login.php");
           } 
          }else{
            echo "<script> alert ('Username dan Password Salah !')</script>";
            header ("refresh:0;login.php");
          }
        
?>
