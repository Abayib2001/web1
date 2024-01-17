<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $id_pelatihan = $_POST['id_pelatihan'];
    $judul_materi = $_POST['judul_materi'];
    $deskripsi_materi = $_POST['deskripsi_materi'];
    $durasi_materi = $_POST['durasi_materi'];

    $exe = mysqli_query($konek, "UPDATE materi_pelatihan SET
        id_pelatihan='$id_pelatihan',
        judul_materi='$judul_materi',
        deskripsi_materi='$deskripsi_materi',
        durasi_materi='$durasi_materi'
        WHERE id=$id");

    if ($exe) {
        echo "<script>alert('Data materi pelatihan berhasil Diubah!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=materi-pelatihan-read'>";
    } else {
        echo "<script>alert('Data materi pelatihan gagal Diubah!!!')</script>";
        echo "<h1>" . mysqli_error($konek) . "</h1>";
    }
}
$id = $_GET['id'];
$result = mysqli_query($konek, "SELECT * FROM materi_pelatihan WHERE id=$id");
$data = mysqli_fetch_assoc($result);

?>

<div class="section section-5" style="background-color: #E9E9E9;">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-12 mb-5">
            <br>
            <br>
            <br>
                    <h5 class="card-title fw-semibold mb-4">Edit Data Materi Pelatihan</h5>
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <div class="mb-3">
                            <label for="exampleInputPelatihan" class="form-label">ID Pelatihan</label>
                            <input type="text" name="id_pelatihan" class="form-control" id="exampleInputPelatihan" value="<?php echo $data['id_pelatihan']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputJudulMateri" class="form-label">Judul Materi</label>
                            <input type="text" name="judul_materi" required class="form-control" id="exampleInputJudulMateri" value="<?php echo $data['judul_materi']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDeskripsiMateri" class="form-label">Deskripsi Materi</label>
                            <textarea name="deskripsi_materi" required class="form-control" id="exampleInputDeskripsiMateri"><?php echo $data['deskripsi_materi']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDurasiMateri" class="form-label">Durasi Materi (menit)</label>
                            <input type="text" name="durasi_materi" required class="form-control" id="exampleInputDurasiMateri" value="<?php echo $data['durasi_materi']; ?>">
                        </div>

                        <button type="submit" name="update" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Update</button>
                        <a href="?page=materi-pelatihan-read" class="btn btn-danger"><i class="ti ti-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
