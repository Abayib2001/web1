<div class="section section-5 bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-12 mb-5">
            <br>
            <br>
            <br>
                    <h4 class="card-title">Peserta Pelatihan</h4>
                    <p class="card-description">
                        Data <code>pelatihan</code>
                    </p>
                    <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Cari Peserta Berdasarkan No Peserta & Nama" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO PESERTA</th>
                                    <th>NAMA PESERTA</th>
                                    <th>TEMPAT LAHIR</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>PENDIDIKAN</th>
                                    <th>AGAMA</th>
                                    <th>ALAMAT</th>
                                    <th>KECAMATAN</th>
                                    <th>KABUPATEN</th>
                                    <th>PROVINSI</th>
                                    <?php if($_SESSION['status'] == 'admin'): ?>
                                    <th>AKSI</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = mysqli_query($konek, "SELECT * FROM peserta");
                                while ($data = mysqli_fetch_array($query)) { 
                                ?>
                                    <tr>
                                    <td><?= $data['no_peserta'] ?></td>
                                        <td><?= $data['nama_peserta'] ?></td>
                                        <td><?= $data['tempat_lahir'] ?></td>
                                        <td><?= $data['tanggal_lahir'] ?></td>
                                        <td><?= $data['jenis_kelamin'] ?></td>
                                        <td><?= $data['pendidikan'] ?></td>
                                        <td><?= $data['agama'] ?></td>
                                        <td><?= $data['alamat'] ?></td>
                                        <td><?= $data['kecamatan'] ?></td>
                                        <td><?= $data['kabupaten'] ?></td>
                                        <td><?= $data['provinsi'] ?></td>
                                        <?php if($_SESSION['status'] == 'admin'): ?>
                                        <td>
                                            <a href="?page=peserta-edit&no_peserta=<?= $data['no_peserta'];?>" class="btn btn-sm btn-warning">
                                                <i class="ti ti-edit"></i> Ubah
                                            </a>
                                            <a href="?page=peserta-delete&no_peserta=<?= $data['no_peserta'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
                var noPeserta = $(this).find("td:eq(0)").text().toLowerCase(); // Kolom Nomor Peserta
                var namaPeserta = $(this).find("td:eq(1)").text().toLowerCase(); // Kolom Nama Peserta
                var kabupaten = $(this).find("td:eq(9)").text().toLowerCase(); // Kolom Kabupaten
                var provinsi = $(this).find("td:eq(10)").text().toLowerCase(); // Kolom Provinsi

                var matchCondition = (
                    noPeserta.indexOf(searchValue) > -1 ||
                    namaPeserta.indexOf(searchValue) > -1 ||
                    kabupaten.indexOf(searchValue) > -1 ||
                    provinsi.indexOf(searchValue) > -1
                );

                $(this).toggle(matchCondition);
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
