<?php 
    include "../pengaturan/koneksi.php";
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $cek_login = mysqli_query($konek, "select * from pengguna where username='$username' and password='$password'");
         if(mysqli_num_rows($cek_login) > 0){
            session_start();
            $datalogin = mysqli_fetch_array($cek_login);
            if($datalogin['status_akun'] == 'diverifikasi'){
            $_SESSION['id'] = $datalogin['id'];
            $_SESSION['nama'] = $datalogin['nama_lengkap'];
            $_SESSION['status'] = $datalogin['status'];
            echo "<script>alert('selamat datang di aplikasi BPPMDDTT')</script>";
            echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
            }else if($datalogin['status_akun'] == 'diajukan'){
                echo "<script>alert('akun kamu belum diverifikasi oleh operator kemahasiswaan. silahkan hubungii operator kemahasiswaan')</script>";
                echo "<meta http-equiv='refresh' content='0; url=login_view.php'>";
        }else{
            echo "<script>alert('akun kamu ditolak oleh operator kemahasiswaan. silahkan daftar akun ulang dengan data yang benar')</script>";
            echo "<meta http-equiv='refresh' content='0; url=register_view.php'>";
        }
         }else{
            echo "<script>alert('username dan password tidak ditemukan')</script>";
            echo "<meta http-equiv='refresh' content='0; url=login_view.php'>";
         }
    }