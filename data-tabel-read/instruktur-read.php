<div class="section section-5 bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-12 mb-5">
            <br>
            <br>
            <br>
                    <h4 class="card-title">Instruktur</h4>
                    <p class="card-description">
                        Data <code>instruktur</code>
                    </p>
                    <div class="row">
    <div class="col-lg-12">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                    </div>
                    <input type="text" class="form-control" id="navbar-search-input" placeholder="Cari Data Instruktur Berdasarkan Id & Nama" aria-label="search" aria-describedby="search">
                </div>
            </li>
        </ul>
    </div>
</div>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID INSTRUKTUR</th>
                                    <th>NAMA INSTRUKTUR</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>NOMOR TELPON</th>
                                    <th>BIDANG KEAHLIAN</th>
                                    <?php if($_SESSION['status'] == 'admin'): ?>
                                    <th>AKSI</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = mysqli_query($konek, "select * from instruktur");
                                while ($data = mysqli_fetch_array($query)) { 
                                ?>
                                    <tr>
                                        <td><?=$data['id'] ?></td>
                                        <td><?= $data['nama_instruktur'] ?></td>
                                        <td><?= $data['jenis_kelamin'] ?></td>
                                        <td><?= $data['no_telpon'] ?></td>
                                        <td><?= $data['bidang_keahlian'] ?></td>
                                        <?php if($_SESSION['status'] == 'admin'): ?>
                                        <td>
                                            <a href="?page=instruktur-edit&id=<?= $data['id'];?>" class="btn btn-sm btn-warning">
                                                <i class="ti ti-edit"></i> Ubah
                                            </a>
                                            <a href="?page=instruktur-delete&id=<?= $data['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
                var namaInstruktur = $(this).find("td:eq(1)").text().toLowerCase(); // Kolom Nama Instruktur
                var noTelpon = $(this).find("td:eq(3)").text(); // Kolom No Telpon
                var bidangKeahlian = $(this).find("td:eq(4)").text().toLowerCase(); // Kolom Bidang Keahlian

                // Menggunakan regex untuk mencocokkan huruf pertama dengan 0
                var matchCondition = /^0/.test(searchValue) && noTelpon.startsWith(searchValue);

                // Pencarian berdasarkan nama_instruktur, no_telpon, dan bidang_keahlian
                matchCondition = matchCondition || namaInstruktur.indexOf(searchValue) > -1 ||
                    noTelpon.indexOf(searchValue) > -1 ||
                    bidangKeahlian.indexOf(searchValue) > -1;

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

