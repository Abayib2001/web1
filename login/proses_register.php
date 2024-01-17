<?php
if (isset($_POST['daftar'])) {
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_telp = $_POST['no_telp'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    include('../pengaturan/koneksi.php');
    
    $cek_akun = mysqli_query($konek, "select * from pengguna where nik='$nik'");
    
    if (mysqli_num_rows($cek_akun) > 0) {
        echo "<script>alert('NIK Sudah terdaftar di Sistem')</script>";
        echo "<meta http-equiv='refresh' content='0; url=register_view.php'>";
    } else {
        // Set the default role to 'peserta'
        $role = 'peserta';
        
        $exe = mysqli_query($konek, "insert into pengguna values ('$id', '$nik', '$nama_lengkap', '$no_telp', '$username', '$password', '$role', 'diajukan')");
        
        if ($exe) {
            echo "<script>alert('Akun Kamu berhasil didaftarkan ke sistem. Tunggu untuk proses verifikasi oleh operator')</script>";
            echo "<meta http-equiv='refresh' content='0; url=login_view.php'>";
        } else {
            echo "<script>alert('Pendaftaran akun kamu gagal disimpan. Harap isi data dengan benar')</script>";
            echo "<meta http-equiv='refresh' content='0; url=register_view.php'>";
        }
    }
}
?>
