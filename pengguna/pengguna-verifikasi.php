<?php 
$id = $_GET['id'];
    if(isset($id)){ //jika button simpan di klik
        $status = $_GET['status'];
        $exe = mysqli_query($konek, "update pengguna set status_akun='$status' where id='$id'");
    if ($exe) { //jika berhasil menghapus data
        echo "<script>alert('Status Pengguna Berhasil Diubah Menjadi $status!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=pengguna-read'>";
    } else { //jika gagal menghapus data
        echo "<script>alert('Status akun Pengguna gagal $status!!')</script>"; //muncul pesan
        echo "<h1>" . mysqly_error($konek) . "</h1>"; //menampilkan isi pesan kesalahan
    }
}
?>