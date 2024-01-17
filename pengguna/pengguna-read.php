<div class="section section-5 bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-12 mb-5">
            <br>
            <br>
            <br>
      <h5 class="card-title fw-semibold mb-4">Data Pengguna</h5>
      <hr>
            <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>nik</th>
                <th>Nama Lengkap</th>
                <th>No Telpon</th>
                <th>Status Akun</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
            <?php
              $no = 1;
              $query = mysqli_query($konek, "select * from pengguna where status='peserta'");
              while ($data = mysqli_fetch_array($query)) { 
            ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nik'] ?></td>
                <td><?= $data['nama_lengkap'] ?></td>
                <td><?= $data['no_telp'] ?></td>
                <td><?= $data['status_akun'] ?></td>
                <td>
            <?php if($data['status_akun'] == 'diajukan') : ?>
                <a href="?page=pengguna-verifikasi&id=<?= $data['id'];?>&status=diverifikasi" class="btn btn-sm btn-success" onclick="return confirm('Yakin ingin menyetujui akun pengguna ini?');" ><i class="ti ti-check" ></i>Disetujui</a>
                <a href="?page=pengguna-verifikasi&id=<?= $data[0];?>&status=ditolak"class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menolak akun pengguna ini?');"><i class="ti ti-ban"></i>Ditolak</a>
                <?php endif; ?>
                </td>
              </tr>
            <?php } ?>
            </tbody>
            </table>
    </div>
  </div>
</div>
            </div>