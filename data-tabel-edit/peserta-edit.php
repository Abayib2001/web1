<?php

if(isset($_POST['update'])){
    $no_peserta = $_POST['no_peserta'];
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

    $exe = mysqli_query($konek, "UPDATE peserta SET
        nama_peserta='$nama_peserta',
        tempat_lahir='$tempat_lahir',
        tanggal_lahir='$tanggal_lahir',
        jenis_kelamin='$jenis_kelamin',
        pendidikan='$pendidikan',
        agama='$agama',
        alamat='$alamat',
        kecamatan='$kecamatan',
        kabupaten='$kabupaten',
        provinsi='$provinsi'
        WHERE no_peserta=$no_peserta");

    if ($exe) {
        echo "<script>alert('Data peserta berhasil diupdate!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=peserta-read'>";
    } else {
        echo "<script>alert('Data peserta gagal diupdate!!!')</script>";
        echo "<h1>" . mysqli_error($konek) . "</h1>";
    }
}

// Mendapatkan data peserta berdasarkan no_peserta yang dikirimkan melalui parameter
$no_peserta = $_GET['no_peserta'];
$result = mysqli_query($konek, "SELECT * FROM peserta WHERE no_peserta=$no_peserta");
$data = mysqli_fetch_assoc($result);
?>

<div class="section section-5" style="background-color: #E9E9E9;">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-12 mb-5">
            <br>
            <br>
            <br>
                    <h5 class="card-title fw-semibold mb-4">Edit Data Peserta</h5>
                    <form method="post" action="">
                        <input type="hidden" name="no_peserta" value="<?php echo $data['no_peserta']; ?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Peserta</label>
                            <input type="text" name="nama_peserta" required class="form-control" id="exampleInputEmail1" value="<?php echo $data['nama_peserta']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" required class="form-control" id="exampleInputPassword1" value="<?php echo $data['tempat_lahir']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" required class="form-control" id="exampleInputPassword1" value="<?php echo $data['tanggal_lahir']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" required class="form-control" id="jenis_kelamin">
                                <option value="Laki-Laki" <?php echo ($data['jenis_kelamin'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                                <option value="Perempuan" <?php echo ($data['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan</label>
                            <input type="text" name="pendidikan" required class="form-control" id="pendidikan" value="<?php echo $data['pendidikan']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="agama" class="form-label">Agama</label>
                            <select name="agama" required class="form-control" id="agama">
                                <option value="ISLAM" <?php echo ($data['agama'] == 'ISLAM') ? 'selected' : ''; ?>>ISLAM</option>
                                <option value="KRISTEN" <?php echo ($data['agama'] == 'KRISTEN') ? 'selected' : ''; ?>>KRISTEN</option>
                                <option value="KATOLIK" <?php echo ($data['agama'] == 'KATOLIK') ? 'selected' : ''; ?>>KATOLIK</option>
                                <option value="HINDU" <?php echo ($data['agama'] == 'HINDU') ? 'selected' : ''; ?>>HINDU</option>
                                <option value="BUDHA" <?php echo ($data['agama'] == 'BUDHA') ? 'selected' : ''; ?>>BUDHA</option>
                                <option value="KONGHUCU" <?php echo ($data['agama'] == 'KONGHUCU') ? 'selected' : ''; ?>>KONGHUCU</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" required class="form-control" id="alamat" value="<?php echo $data['alamat']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" required class="form-control" id="kecamatan" value="<?php echo $data['kecamatan']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="kabupaten" class="form-label">Kabupaten</label>
                            <input type="text" name="kabupaten" required class="form-control" id="kabupaten" value="<?php echo $data['kabupaten']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Provinsi</label>
                            <select name="provinsi" required class="form-control" id="provinsi">
                                <option value="KALIMANTAN TIMUR" <?php echo ($data['provinsi'] == 'KALIMANTAN TIMUR') ? 'selected' : ''; ?>>KALIMANTAN TIMUR</option>
                                <option value="KALIMANTAN SELATAN" <?php echo ($data['provinsi'] == 'KALIMANTAN SELATAN') ? 'selected' : ''; ?>>KALIMANTAN SELATAN</option>
                                <option value="KALIMANTAN UTARA" <?php echo ($data['provinsi'] == 'KALIMANTAN UTARA') ? 'selected' : ''; ?>>KALIMANTAN UTARA</option>
                                <option value="KALIMANTAN BARAT" <?php echo ($data['provinsi'] == 'KALIMANTAN BARAT') ? 'selected' : ''; ?>>KALIMANTAN BARAT</option>
                                <option value="KALIMANTAN TENGAH" <?php echo ($data['provinsi'] == 'KALIMANTAN TENGAH') ? 'selected' : ''; ?>>KALIMANTAN TENGAH</option>
                            </select>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Update</button>
                        <a href="?page=peserta-read" class="btn btn-danger"><i class="ti ti-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>