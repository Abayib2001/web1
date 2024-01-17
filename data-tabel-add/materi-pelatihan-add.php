<?php
if (isset($_POST['simpan'])) {
    $id_pelatihan = $_POST['id_pelatihan'];
    $judul_materi = $_POST['judul_materi'];
    $deskripsi_materi = $_POST['deskripsi_materi'];
    $durasi_materi = $_POST['durasi_materi'];

    $exe = mysqli_query($konek, "INSERT INTO materi_pelatihan (id_pelatihan, judul_materi, deskripsi_materi, durasi_materi) VALUES ('$id_pelatihan', '$judul_materi', '$deskripsi_materi', '$durasi_materi')");

    if ($exe) {
        echo "<script>alert('Data materi pelatihan berhasil ditambahkan!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=materi-pelatihan-read'>";
    } else {
        echo "<script>alert('Data materi pelatihan gagal ditambahkan!!!')</script>";
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
                    <h5 class="card-title fw-semibold mb-4">Tambah Data Materi Pelatihan</h5>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="exampleInputPelatihan" class="form-label">ID Pelatihan</label>
                            <select name="id_pelatihan" required class="form-control" id="exampleInputPelatihan">
                                <?php
                                $resultPelatihan = mysqli_query($konek, "SELECT id, nama_pelatihan FROM pelatihan");
                                while ($dataPelatihan = mysqli_fetch_assoc($resultPelatihan)) {
                                    echo "<option value='{$dataPelatihan['id']}'>{$dataPelatihan['id']} - {$dataPelatihan['nama_pelatihan']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputJudulMateri" class="form-label">Judul Materi</label>
                            <input type="text" name="judul_materi" required class="form-control" id="exampleInputJudulMateri">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDeskripsiMateri" class="form-label">Deskripsi Materi</label>
                            <textarea name="deskripsi_materi" required class="form-control" id="exampleInputDeskripsiMateri"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputDurasiMateri" class="form-label">Durasi Materi (menit)</label>
                            <input type="text" name="durasi_materi" required class="form-control" id="exampleInputDurasiMateri">
                        </div>

                        <button type="submit" name="simpan" class="btn btn-primary"><i class="ti ti-device-floppy"></i>Simpan</button>
                        <a href="?page=materi-pelatihan-read" class="btn btn-danger"><i class="ti ti-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
