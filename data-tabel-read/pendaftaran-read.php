<div class="section section-5 bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-12 mb-5">
            <br>
            <br>
            <br>
                    <h4 class="card-title">Pendaftaran Pelatihan</h4>
                    <p class="card-description">
                        Data <code>pendaftaran</code>
                    </p>
                    <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Cari Id Pendaftaran" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID PENDAFTARAN</th>
                                    <th>ID PELATIHAN</th>
                                    <th>NO PESERTA</th>
                                    <th>TANGGAL PENDAFTARAN</th>
                                    <th>STATUS PENDAFTARAN</th>
                                    <?php if($_SESSION['status'] == 'admin'): ?>
                                    <th>AKSI</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = mysqli_query($konek, "SELECT * FROM pendaftaran");
                                while ($data = mysqli_fetch_array($query)) { 
                                ?>
                                    <tr>
                                        <td><?= $data['id'] ?></td>
                                        <td><?= $data['id_pelatihan'] ?></td>
                                        <td><?= $data['no_peserta'] ?></td>
                                        <td><?= $data['tanggal_pendaftaran'] ?></td>
                                        <td><?= $data['status_pendaftaran'] ?></td>
                                        <td>
                                            <a href="?page=pendaftaran-edit&id=<?= $data['id'];?>" class="btn btn-sm btn-warning">
                                                <i class="ti ti-edit"></i> Ubah
                                            </a>
                                            <a href="?page=pendaftaran-delete&id=<?= $data['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                <i class="ti ti-trash"></i> Hapus
                                            </a>
                                        </td>
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
                var noPeserta = $(this).find("td:eq(2)").text().toLowerCase(); // Kolom Nomor Peserta

                var noPesertaMatch = (noPeserta.indexOf(searchValue) > -1);

                $(this).toggle(noPesertaMatch);
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
