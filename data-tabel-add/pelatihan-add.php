<?php
if(isset($_POST['simpan'])){
    $nama_pelatihan = $_POST['nama_pelatihan'];
    $angkatan = $_POST['angkatan'];
    $provinsi = $_POST['provinsi'];
    $kabupaten = $_POST['kabupaten'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $lokasi_pelatihan = $_POST['lokasi_pelatihan'];
    $jumlah_peserta_pelatihan = $_POST['jumlah_peserta_pelatihan'];
    $tahun = $_POST['tahun'];

    $exe = mysqli_query($konek, "INSERT INTO pelatihan (nama_pelatihan, angkatan, provinsi, kabupaten, tanggal_mulai, tanggal_selesai, lokasi_pelatihan, jumlah_peserta_pelatihan, tahun) VALUES ('$nama_pelatihan', '$angkatan', '$provinsi', '$kabupaten', '$tanggal_mulai', '$tanggal_selesai', '$lokasi_pelatihan', '$jumlah_peserta_pelatihan', '$tahun')");

    if ($exe) {
        echo "<script>alert('Data pelatihan berhasil ditambahkan!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=pelatihan-read'>";
    } else {
        echo "<script>alert('Data pelatihan gagal ditambahkan!!!')</script>";
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
                    <h5 class="card-title fw-semibold mb-4">Tambah Data Pelatihan</h5>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Pelatihan</label>
                            <input type="text" name="nama_pelatihan" required class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Angkatan</label>
                            <input type="text" name="angkatan" required class="form-control" id="exampleInputPassword1">
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
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Kabupaten</label>
                            <input type="text" name="kabupaten" required class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" required class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tanggal Selesai</label>
                            <input type="date" name="tanggal_selesai" required class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Lokasi Pelatihan</label>
                            <input type="text" name="lokasi_pelatihan" required class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Jumlah Peserta Pelatihan</label>
                            <input type="text" name="jumlah_peserta_pelatihan" required class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tahun</label>
                            <select name="tahun" required class="form-control" id="exampleInputPassword1">
                                <?php
                                    $tahun_sekarang = date('Y');
                                    for ($i = 2014; $i <= 2024; $i++) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary"><i class="ti ti-device-floppy"></i>Simpan</button>
                        <a href="?page=pelatihan-read" class="btn btn-danger"><i class="ti ti-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
