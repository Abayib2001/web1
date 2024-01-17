<div class="section section-5 bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-12 mb-5">
            <br>
            <br>
            <br>
                    <h4 class="card-title">Pilihan Pelatihan</h4>
                    <p class="card-description">
                        Data <code>pilih_pelatihan</code>
                    </p>
                    <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Cari Pilihan Pelatihan" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID PILIH PELATIHAN</th>
                                    <th>NO PESERTA</th>
                                    <th>ID PELATIHAN</th>
                                    <th>ID INSTRUKTUR</th>
                                    <?php if($_SESSION['status'] == 'admin'): ?>
                                    <th>AKSI</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = mysqli_query($konek, "SELECT * FROM pilih_pelatihan");
                                while ($data = mysqli_fetch_array($query)) { 
                                ?>
                                    <tr>
                                        <td><?= $data['id'] ?></td>
                                        <td><?= $data['no_peserta'] ?></td>
                                        <td><?= $data['id_pelatihan'] ?></td>
                                        <td><?= $data['id_instruktur'] ?></td>
                                        <?php if($_SESSION['status'] == 'admin'): ?>
                                        <td>
                                            <a href="?page=pilih-pelatihan-edit&id=<?= $data['id'];?>" class="btn btn-sm btn-warning">
                                                <i class="ti ti-edit"></i> Ubah
                                            </a>
                                            <a href="?page=pilih-pelatihan-delete&id=<?= $data['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
                var noPeserta = $(this).find("td:eq(1)").text().toLowerCase(); // Kolom Nomor Peserta
                var idPelatihan = $(this).find("td:eq(2)").text().toLowerCase(); // Kolom ID Pelatihan
                var idInstruktur = $(this).find("td:eq(3)").text().toLowerCase(); // Kolom ID Instruktur

                var matchCondition = (
                    noPeserta.indexOf(searchValue) > -1 ||
                    idPelatihan.indexOf(searchValue) > -1 ||
                    idInstruktur.indexOf(searchValue) > -1
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
