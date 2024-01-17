<?php
if (isset($_POST['simpan'])) {
    $id_pelatihan = $_POST['id_pelatihan'];
    $no_peserta = $_POST['no_peserta'];
    $tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];

    // Set nilai default untuk status_pendaftaran menjadi "BELUM DIVERIFIKASI"
    $status_pendaftaran = "BELUM DIVERIFIKASI";

    $exe = mysqli_query($konek, "INSERT INTO pendaftaran (id_pelatihan, no_peserta, tanggal_pendaftaran, status_pendaftaran) VALUES ('$id_pelatihan', '$no_peserta', '$tanggal_pendaftaran', '$status_pendaftaran')");

    if ($exe) {
        echo "<script>alert('Data pendaftaran berhasil ditambahkan!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=pendaftaran-read'>";
    } else {
        echo "<script>alert('Data pendaftaran gagal ditambahkan!!!')</script>";
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
                    <h5 class="card-title fw-semibold mb-4">Tambah Data Pendaftaran</h5>
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
                            <label for="exampleInputNoPeserta" class="form-label">No. Peserta</label>
                            <select name="no_peserta" required class="form-control" id="exampleInputNoPeserta">
                                <?php
                                $resultPeserta = mysqli_query($konek, "SELECT no_peserta, nama_peserta FROM peserta");
                                while ($dataPeserta = mysqli_fetch_assoc($resultPeserta)) {
                                    echo "<option value='{$dataPeserta['no_peserta']}'>{$dataPeserta['no_peserta']} - {$dataPeserta['nama_peserta']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputTanggalPendaftaran" class="form-label">Tanggal Pendaftaran</label>
                            <input type="date" name="tanggal_pendaftaran" required class="form-control" id="exampleInputTanggalPendaftaran">
                        </div>
                        <!-- Status pendaftaran akan diisi otomatis sebagai "BELUM DIVERIFIKASI" -->
                        <input type="hidden" name="status_pendaftaran" value="BELUM DIVERIFIKASI">

                        <button type="submit" name="simpan" class="btn btn-primary"><i class="ti ti-device-floppy"></i>Simpan</button>
                        <a href="?page=pendaftaran-read" class="btn btn-danger"><i class="ti ti-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
