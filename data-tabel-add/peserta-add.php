<?php
if (isset($_POST['simpan'])){
    $nama_peserta = $_POST['nama_peserta'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $pendidikan = $_POST['pendidikan'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $kecamatan = $_POST['kecamatan'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi = $_POST['provinsi'];

    $exe = mysqli_query($konek, "INSERT INTO peserta (nama_peserta, tempat_lahir, tanggal_lahir, jenis_kelamin, pendidikan, agama, alamat, kecamatan, kabupaten, provinsi) VALUES ('$nama_peserta', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$pendidikan', '$agama', '$alamat', '$kecamatan', '$kabupaten', '$provinsi')");

    if ($exe) {
        echo "<script>alert('Data peserta berhasil ditambahkan!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=peserta-read'>";
    } else {
        echo "<script>alert('Data peserta gagal ditambahkan!!!')</script>";
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
                    <h5 class="card-title fw-semibold mb-4">Tambah Data Peserta</h5>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Peserta</label>
                            <input type="text" name="nama_peserta" required class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" required class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" required class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" required class="form-control" id="exampleInputPassword1">
                                <option value="PEREMPUAN">PEREMPUAN</option>
                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Pendidikan</label>
                            <input type="text" name="pendidikan" required class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Agama</label>
                            <select name="agama" required class="form-control" id="exampleInputPassword1">
                                <option value="ISLAM">ISLAM</option>
                                <option value="KRISTEN">KRISTEN</option>
                                <option value="KATOLIK">KATOLIK</option>
                                <option value="HINDU">HINDU</option>
                                <option value="BUDHA">BUDHA</option>
                                <option value="KONGHUCU">KONGHUCU</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Alamat</label>
                            <input type="text" name="alamat" required class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" required class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Kabupaten</label>
                            <input type="text" name="kabupaten" required class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Provinsi</label>
                            <select name="provinsi" required class="form-control" id="exampleInputPassword1">
                                <option value="KALIMANTAN TIMUR">KALIMANTAN TIMUR</option>
                                <option value="KALIMANTAN SELATAN">KALIMANTAN SELATAN</option>
                                <option value="KALIMANTAN UTARA">KALIMANTAN UTARA</option>
                                <option value="KALIMANTAN BARAT">KALIMANTAN BARAT</option>
                                <option value="KALIMANTAN TENGAH">KALIMANTAN TENGAH</option>
                            </select>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary"><i class="ti ti-device-floppy"></i>Simpan</button>
                        <a href="?page=peserta-read" class="btn btn-danger"><i class="ti ti-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>