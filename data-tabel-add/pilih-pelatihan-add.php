<?php
if (isset($_POST['simpan'])) {
    $no_peserta = $_POST['no_peserta'];
    $id_pelatihan = $_POST['id_pelatihan'];
    $id_instruktur = $_POST['id_instruktur'];

    $exe = mysqli_query($konek, "INSERT INTO pilih_pelatihan (no_peserta, id_pelatihan, id_instruktur) VALUES ('$no_peserta', '$id_pelatihan', '$id_instruktur')");

    if ($exe) {
        echo "<script>alert('Data pemilihan pelatihan berhasil ditambahkan!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=pilih-pelatihan-read'>";
    } else {
        echo "<script>alert('Data pemilihan pelatihan gagal ditambahkan!!!')</script>";
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
                    <h5 class="card-title fw-semibold mb-4">Tambah Data Pilihan Pelatihan</h5>
                    <form method="post" action="">
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
                            <label for="exampleInputInstruktur" class="form-label">ID Instruktur</label>
                            <select name="id_instruktur" required class="form-control" id="exampleInputInstruktur">
                                <?php
                                $resultInstruktur = mysqli_query($konek, "SELECT id, bidang_keahlian, nama_instruktur FROM instruktur");
                                while ($dataInstruktur = mysqli_fetch_assoc($resultInstruktur)) {
                                    echo "<option value='{$dataInstruktur['id']}'>{$dataInstruktur['nama_instruktur']} - INSTRUKTUR - {$dataInstruktur['bidang_keahlian']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" name="simpan" class="btn btn-primary"><i class="ti ti-device-floppy"></i>Simpan</button>
                        <a href="?page=pilih-pelatihan-read" class="btn btn-danger"><i class="ti ti-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
