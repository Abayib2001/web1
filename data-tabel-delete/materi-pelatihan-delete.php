<?php 
$id = $_GET['id'];
    if(isset($id)){ //jika button simpan di klik
        $exe = mysqli_query($konek, "delete from materi_pelatihan where id='$id'");
    if ($exe) { //jika berhasil menghapus data
        echo "<script>alert('Data Materi Pelatihan berhasil dihapus!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=materi-pelatihan-read'>";
    } else { //jika gagal menghapus data
        echo "<script>alert('Data Materi Pelatihan gagal dihapus!!!')</script>"; //muncul pesan
        echo "<h1>" . mysqly_error($konek) . "</h1>"; //menampilkan isi pesan kesalahan
    }
}
?>