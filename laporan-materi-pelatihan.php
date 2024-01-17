<?php include "pengaturan/koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Data Materi Pelatihan</title>
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
        <h5>BALAI PELATIHAN DAN PEMBERDAYAAN MASYARAKAT DESA, DAERAH<br> TERTINGGAL DAN TRANSMIGRASI BANJARMASIN</h5>
        <p>Jl. Handil Bhakti Km 9,5 Banjarmasin Kalimantan Selatan,Telp. 0811-5000344</p>
    </div>
</div>
<hr>
<h3 style="text-align: center;">Laporan Data Materi Pelatihan</h3>

<table width="100%" border="1" cellspacing="0" cellpadding="4">
    <tr>
        <th>No.</th>
        <th>JUDUL MATERI</th>
        <th>DESKRIPSI MATERI</th>
        <th>DURASI MATERI</th>
    </tr>
    <?php
    $sqlmateri_pelatihan = mysqli_query($konek, "SELECT * FROM materi_pelatihan ORDER BY id ASC");
    $no=1;
    while($d=mysqli_fetch_array($sqlmateri_pelatihan)){
        echo "<tr>
           <td align='center'>$no</td>
           <td>$d[judul_materi]</td>
           <td>$d[deskripsi_materi]</td>
           <td>$d[durasi_materi]</td>
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