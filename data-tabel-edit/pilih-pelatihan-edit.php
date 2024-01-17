<?php
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $no_peserta = $_POST['no_peserta'];
    $id_pelatihan = $_POST['id_pelatihan'];
    $id_instruktur = $_POST['id_instruktur'];

    $exe = mysqli_query($konek, "UPDATE PilihPelatihan SET
        no_peserta='$no_peserta',
        id_pelatihan='$id_pelatihan',
        id_instruktur='$id_instruktur'
        WHERE id=$id");

    if ($exe) {
        echo "<script>alert('Data PilihPelatihan berhasil diupdate!!!')</script>";
        echo "<meta http-equiv='refresh' content='0; url=?page=pendaftaran-read'>";
    } else {
        echo "<script>alert('Data PilihPelatihan gagal diupdate!!!')</script>";
        echo "<h1>" . mysqli_error($konek) . "</h1>";
    }
}

// Mendapatkan data PilihPelatihan berdasarkan ID yang dikirimkan melalui parameter
$id = $_GET['id'];
$result = mysqli_query($konek, "SELECT * FROM pilih_pelatihan WHERE id=$id");
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
                    <h5 class="card-title fw-semibold mb-4">Edit Data PilihPelatihan</h5>
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <div class="mb-3">
                            <label for="exampleInputNoPeserta" class="form-label">No. Peserta</label>
                            <input type="text" name="no_peserta" class="form-control" id="exampleInputNoPeserta" value="<?php echo $data['no_peserta']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPelatihan" class="form-label">ID Pelatihan</label>
                            <input type="text" name="id_pelatihan" class="form-control" id="exampleInputPelatihan" value="<?php echo $data['id_pelatihan']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputInstruktur" class="form-label">ID Instruktur</label>
                            <input type="text" name="id_instruktur" class="form-control" id="exampleInputInstruktur" value="<?php echo $data['id_instruktur']; ?>">
                        </div>
                        <button type="submit" name="update" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Update</button>
                        <a href="?page=pendaftaran-read" class="btn btn-danger"><i class="ti ti-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
