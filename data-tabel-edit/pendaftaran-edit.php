<?php
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $id_pelatihan = $_POST['id_pelatihan'];
    $no_peserta = $_POST['no_peserta'];
    $tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];
    $status_pendaftaran = $_POST['status_pendaftaran'];

    $exe = mysqli_query($konek, "UPDATE pendaftaran SET
        id_pelatihan='$id_pelatihan',
        no_peserta='$no_peserta',
        tanggal_pendaftaran='$tanggal_pendaftaran',
        status_pendaftaran='$status_pendaftaran'
        WHERE id=$id");

    if ($exe) {
        echo "<script>alert('Data pendaftaran berhasil diupdate!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=pendaftaran-read'>";
    } else {
        echo "<script>alert('Data pendaftaran gagal diupdate!!!')</script>";
        echo "<h1>" . mysqli_error($konek) . "</h1>";
    }
}

// Mendapatkan data pendaftaran berdasarkan ID yang dikirimkan melalui parameter
$id = $_GET['id'];
$result = mysqli_query($konek, "SELECT * FROM pendaftaran WHERE id=$id");
$data = mysqli_fetch_assoc($result);

// Ambil data untuk dropdown (id_pelatihan dan no_peserta) dari tabel lain jika diperlukan
// ...

?>

<div class="section section-5" style="background-color: #E9E9E9;">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-12 mb-5">
            <br>
            <br>
            <br>
                    <h5 class="card-title fw-semibold mb-4">Edit Data Pendaftaran</h5>
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <div class="mb-3">
                            <label for="exampleInputPelatihan" class="form-label">ID Pelatihan</label>
                            <input type="text" name="id_pelatihan" class="form-control" id="exampleInputPelatihan" value="<?php echo $data['id_pelatihan']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputNoPeserta" class="form-label">No. Peserta</label>
                            <input type="text" name="no_peserta" class="form-control" id="exampleInputNoPeserta" value="<?php echo $data['no_peserta']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
                            <input type="date" name="tanggal_pendaftaran" required class="form-control" id="tanggal_pendaftaran" value="<?php echo $data['tanggal_pendaftaran']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="status_pendaftaran" class="form-label">Status Pendaftaran</label>
                            <select name="status_pendaftaran" required class="form-control" id="status_pendaftaran">
                                <option value="DITOLAK" <?php echo ($data['status_pendaftaran'] == 'DITOLAK') ? 'selected' : ''; ?>>DITOLAK</option>
                                <option value="DITERIMA" <?php echo ($data['status_pendaftaran'] == 'DITERIMA') ? 'selected' : ''; ?>>DITERIMA</option>
                            </select>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Update</button>
                        <a href="?page=pendaftaran-read" class="btn btn-danger"><i class="ti ti-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
