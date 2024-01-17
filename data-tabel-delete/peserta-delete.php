<?php 
$no_peserta = $_GET['no_peserta'];
    if(isset($no_peserta)){ //jika button simpan di klik
        $exe = mysqli_query($konek, "delete from peserta where no_peserta='$no_peserta'");
    if ($exe) { //jika berhasil menghapus data
        echo "<script>alert('Data peserta berhasil dihapus!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=peserta-read'>";
    } else { //jika gagal menghapus data
        echo "<script>alert('Data peserta gagal dihapus!!!')</script>"; //muncul pesan
        echo "<h1>" . mysqly_error($konek) . "</h1>"; //menampilkan isi pesan kesalahan
    }
}
?>