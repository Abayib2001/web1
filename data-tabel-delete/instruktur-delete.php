<?php 
$id = $_GET['id'];
    if(isset($id)){ //jika button simpan di klik
        $exe = mysqli_query($konek, "delete from instruktur where id='$id'");
    if ($exe) { //jika berhasil menghapus data
        echo "<script>alert('Data Instruktur berhasil dihapus!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=instruktur-read'>";
    } else { //jika gagal menghapus data
        echo "<script>alert('Data Instruktur gagal dihapus!!!')</script>"; //muncul pesan
        echo "<h1>" . mysqly_error($konek) . "</h1>"; //menampilkan isi pesan kesalahan
    }
}
?>