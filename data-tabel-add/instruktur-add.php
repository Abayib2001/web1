<?php
if(isset($_POST['simpan'])){
    $nama_instruktur = $_POST['nama_instruktur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telpon = $_POST['no_telpon'];
    $bidang_keahlian = $_POST['bidang_keahlian'];

    $exe = mysqli_query($konek, "INSERT INTO instruktur (nama_instruktur, jenis_kelamin, no_telpon, bidang_keahlian) VALUES ('$nama_instruktur', '$jenis_kelamin', '$no_telpon', '$bidang_keahlian')");

    if ($exe) {
        echo "<script>alert('Data instruktur berhasil ditambahkan!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=instruktur-read'>";
    } else {
        echo "<script>alert('Data instruktur gagal ditambahkan!!!')</script>";
        echo "<h1>" . mysqli_error($konek) . "</h1>";
    }
}
?>
<div class="section section-5" style="background-color: #E9E9E9;">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-12 mb-5">
            <br>
            <br>
            <br>
            <h5 class="card-title fw-semibold mb-4">Tambah Data Instruktur</h5>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Instruktur</label>
                    <input type="text" name="nama_instruktur" required class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required class="form-control" id="exampleInputPassword1">
                        <option value="PEREMPUAN">PEREMPUAN</option>
                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">No. Telpon</label>
                    <input type="text" name="no_telpon" required class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Bidang Keahlian</label>
                    <input type="text" name="bidang_keahlian" required class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="simpan" class="btn btn-primary"><i class="ti ti-device-floppy"></i>Simpan</button>
                <a href="?page=kategori_read" class="btn btn-danger"><i class="ti ti-arrow-left"></i> Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>