<div class="section section-5 bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-12 mb-5">
            <br>
            <br>
            <br>
                    <h4 class="card-title">Data Pelatihan</h4>
                    <p class="card-description">
                        Data <code>pelatihan</code>
                    </p>
                    <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Cari Pelatihan Berdasarkan ID dan Nama" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID PELATIHAN</th>
                                    <th>NAMA PELATIHAN</th>
                                    <th>ANGKATAN</th>
                                    <th>PROVINSI</th>
                                    <th>KABUPATEN</th>
                                    <th>TANGGAL MULAI</th>
                                    <th>TANGGAL SELESAI</th>
                                    <th>LOKASI PELATIHAN</th>
                                    <th>JUMLAH PESERTA</th>
                                    <th>TAHUN</th>
                                    <?php if($_SESSION['status'] == 'admin'): ?>
                                    <th>AKSI</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = mysqli_query($konek, "SELECT * FROM pelatihan");
                                while ($data = mysqli_fetch_array($query)) { 
                                ?>
                                    <tr>
                                        <td><?= $data['id'] ?></td>
                                        <td><?= $data['nama_pelatihan'] ?></td>
                                        <td><?= $data['angkatan'] ?></td>
                                        <td><?= $data['provinsi'] ?></td>
                                        <td><?= $data['kabupaten'] ?></td>
                                        <td><?= $data['tanggal_mulai'] ?></td>
                                        <td><?= $data['tanggal_selesai'] ?></td>
                                        <td><?= $data['lokasi_pelatihan'] ?></td>
                                        <td><?= $data['jumlah_peserta_pelatihan'] ?></td>
                                        <td><?= $data['tahun'] ?></td>
                                        <?php if($_SESSION['status'] == 'admin'): ?>
                                        <td>
                                            <a href="?page=pelatihan-edit&id=<?= $data['id'];?>" class="btn btn-sm btn-warning">
                                                <i class="ti ti-edit"></i> Ubah
                                            </a>
                                            <a href="?page=pelatihan-delete&id=<?= $data['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                <i class="ti ti-trash"></i> Hapus
                                            </a>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#navbar-search-input").on("keyup", function () {
            filterData();
        });

        function filterData() {
            var searchValue = $("#navbar-search-input").val().toLowerCase();

            $("tbody tr").filter(function () {
                var namaPelatihan = $(this).find("td:eq(1)").text().toLowerCase(); // Kolom Nama Pelatihan

                var namaPelatihanMatch = (namaPelatihan.indexOf(searchValue) > -1);

                $(this).toggle(namaPelatihanMatch);
            });

            resetNomorUrut();
        }

        function resetNomorUrut() {
            var nomorUrut = 1;
            $("tbody tr:visible").each(function () {
                $(this).find('td:first').text(nomorUrut++);
            });
        }
    });
</script>

