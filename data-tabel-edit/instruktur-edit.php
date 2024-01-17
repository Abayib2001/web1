<?php
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama_instruktur = $_POST['nama_instruktur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telpon = $_POST['no_telpon'];
    $bidang_keahlian = $_POST['bidang_keahlian'];

    $exe = mysqli_query($konek, "UPDATE instruktur SET 
    nama_instruktur='$nama_instruktur',
    jenis_kelamin='$jenis_kelamin',
    no_telpon='$no_telpon',
    bidang_keahlian='$bidang_keahlian'
    WHERE id=$id");

    if ($exe) {
        echo "<script>alert('Data instruktur berhasil diupdate!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=instruktur-read'>";
    } else {
        echo "<script>alert('Data instruktur gagal diupdate!!!')</script>";
        echo "<h1>" . mysqli_error($konek) . "</h1>";
    }
}

// Mendapatkan data instruktur berdasarkan ID yang dikirimkan melalui parameter
$id = $_GET['id'];
$result = mysqli_query($konek, "SELECT * FROM instruktur WHERE id=$id");
$data = mysqli_fetch_assoc($result);
?>

<div class="section section-5" style="background-color: #E9E9E9;">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-12 mb-5">
            <br>
            <br>
            <br>
                    <h5 class="card-title fw-semibold mb-4">Edit Data Instruktur</h5>
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Instruktur</label>
                            <input type="text" name="nama_instruktur" required class="form-control" id="exampleInputEmail1" value="<?php echo $data['nama_instruktur']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" required class="form-control" id="exampleInputPassword1">
                                <option value="PEREMPUAN" <?php echo ($data['jenis_kelamin'] == 'PEREMPUAN') ? 'selected' : ''; ?>>PEREMPUAN</option>
                                <option value="LAKI-LAKI" <?php echo ($data['jenis_kelamin'] == 'LAKI-LAKI') ? 'selected' : ''; ?>>LAKI-LAKI</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">No. Telpon</label>
                            <input type="text" name="no_telpon" required class="form-control" id="exampleInputPassword1" value="<?php echo $data['no_telpon']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Bidang Keahlian</label>
                            <input type="text" name="bidang_keahlian" required class="form-control" id="exampleInputPassword1" value="<?php echo $data['bidang_keahlian']; ?>">
                        </div>
                        <button type="submit" name="update" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Update</button>
                        <a href="?page=instruktur-read" class="btn btn-danger"><i class="ti ti-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
