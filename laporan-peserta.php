<?php include "pengaturan/koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Peserta</title>
    <style type="text/css">
        body{
            font-family: Arial;
        }

        @media print{
            .no-print{
                display: none;    
            }
        }

        table{
            border-collapse: collapse;
        }

        .header {
            text-align: center; /* Mengatur teks menjadi center */
            margin-bottom: 20px;
            display: flex;
            align-items: center; /* Membuat elemen berada di tengah secara vertikal */
            justify-content: center; /* Membuat elemen berada di tengah secara horizontal */
        }

        .header img {
            max-width: 100px;
            max-height: 100px;
            margin-right: 20px; /* Jarak antara gambar dan teks */
        }

        .header h4, .header h5, .header p {
            margin: 0; /* Menghilangkan margin bawaan dari elemen h4 dan p */
            text-align: center; /* Mengatur teks di dalam h4 dan p menjadi center */
        }
        .header p {
            margin: 0; /* Menghilangkan margin bawaan dari elemen p */
            text-align: center; /* Mengatur teks di dalam p menjadi center */
            font-size: 12px; /* Mengatur ukuran font pada elemen p */
        }
    </style>
</head>
<body>
<div class="header">
    <img src="images/logocetak.png" alt="Logo Instansi">
    <div>
        <h5>KEMENTERIAN DESA, PEMBANGUNAN DAERAH TERTINGGAL DAN TRANSMIGRASI RI BADAN PENGEMBANGAN SUMBER DAYA MANUSIA DAN PEMBERDAYAAN MASYARAKAT DESA, DAERAH TERTINGGAL, DAN TRANSMIGRASI
    </h5>
        <h5>BALAI peserta DAN PEMBERDAYAAN MASYARAKAT DESA, DAERAH<br> TERTINGGAL DAN TRANSMIGRASI BANJARMASIN</h5>
        <p>Jl. Handil Bhakti Km 9,5 Banjarmasin Kalimantan Selatan,Telp. 0811-5000344</p>
    </div>
</div>
<hr>
<h3 style="text-align: center;">Laporan Data Peserta</h3>

<table width="100%" border="1" cellspacing="0" cellpadding="4">
    <tr>
        <th>No.</th>
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
    </tr>
    <?php
    $sqlpeserta = mysqli_query($konek, "SELECT * FROM peserta ORDER BY no_peserta ASC");
    $no=1;
    while($d=mysqli_fetch_array($sqlpeserta)){
        echo "<tr>
           <td align='center'>$no</td>
           <td>$d[nama_peserta]</td>
           <td>$d[tempat_lahir]</td>
           <td>$d[tanggal_lahir]</td>
           <td>$d[jenis_kelamin]</td>
           <td>$d[pendidikan]</td>
           <td>$d[agama]</td>
           <td>$d[alamat]</td>
           <td>$d[kecamatan]</td>
           <td>$d[kabupaten]</td>
           <td>$d[provinsi]</td>
        </tr>";
        $no++;
    }
    ?>
</table> 

<table width="100%">
    <tr>
        <td></td>
        <td width="200px">
            <p>Batulicin, <?php echo date('d/m/Y'); ?><br/>
            Admin,</p>
            <br/>
            <br/>
            <p>__________________</p>
            <h>Annisa Noor Azizah</h>

        </td>
    </tr>
</table>        
<a href="#" class="no-print" onclick="window.print();">Cetak/Print</a>
</body>
</html>