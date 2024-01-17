<?php
session_start();
if(!isset($_SESSION['id'])){
        header ('location:login/login_view.php');
}
include "pengaturan/koneksi.php";
include "template/header.php";
include "template/navbar.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
            case "dashboard-view":
            include "dashboard/dashboard-view.php";
            break;

            case "instruktur-read":
                include "data-tabel-read/instruktur-read.php";
            break;
            case "instruktur-add":
                include "data-tabel-add/instruktur-add.php";
            break;
            case "instruktur-edit":
                include "data-tabel-edit/instruktur-edit.php";
            break;
            case "instruktur-delete":
                include "data-tabel-delete/instruktur-delete.php";
            break;
    
            case "pelatihan-read":
                include "data-tabel-read/pelatihan-read.php";
                break;
            case "pelatihan-add":
                include "data-tabel-add/pelatihan-add.php";
                break;
            case "pelatihan-edit":
                    include "data-tabel-edit/pelatihan-edit.php";
                break;
            case "pelatihan-delete":
                    include "data-tabel-delete/pelatihan-delete.php";
                break;
    
            case "materi-pelatihan-read":
                include "data-tabel-read/materi-pelatihan-read.php";
                break;
            case "materi-pelatihan-add":
                include "data-tabel-add/materi-pelatihan-add.php";
                break;
            case "materi-pelatihan-edit":
                    include "data-tabel-edit/materi-pelatihan-edit.php";
                break;
            case "materi-pelatihan-delete":
                    include "data-tabel-delete/materi-pelatihan-delete.php";
                break;
    
            case "peserta-read":
                include "data-tabel-read/peserta-read.php";
                break;
            case "peserta-add":
                include "data-tabel-add/peserta-add.php";
                break;
            case "peserta-edit":
                    include "data-tabel-edit/peserta-edit.php";
                break;
            case "peserta-delete":
                    include "data-tabel-delete/peserta-delete.php";
                break;
    
            case "pendaftaran-read":
                include "data-tabel-read/pendaftaran-read.php";
                break;
            case "pendaftaran-add":
                include "data-tabel-add/pendaftaran-add.php";
                break;
            case "pendaftaran-edit":
                    include "data-tabel-edit/pendaftaran-edit.php";
                break;
            case "pendaftaran-delete":
                    include "data-tabel-delete/pendaftaran-delete.php";
                break;
    
            case "pilih-pelatihan-read":
                include "data-tabel-read/pilih-pelatihan-read.php";
                break;
            case "pilih-pelatihan-add":
                include "data-tabel-add/pilih-pelatihan-add.php";
                break;
            case "pilih-pelatihan-edit":
                    include "data-tabel-edit/pilih-pelatihan-edit.php";
                break;
            case "pilih-pelatihan-delete":
                    include "data-tabel-delete/pilih-pelatihan-delete.php";
                break;
            
            case "pengguna-read":
                include "pengguna/pengguna-read.php";
            break;
            case "pengguna-verifikasi":
                include "pengguna/pengguna-verifikasi.php";
            break;

            case "sejarah-read":
                    include "tentang/sejarah-read.php";
                break; 
            case "sarana-read":
                    include "tentang/sarana-read.php";
                break; 
            case "susunan-read":
                    include "tentang/susunan-read.php";
                break; 
            case "kepala-read":
                    include "tentang/kepala-read.php";
                break;    
        default:
            // Jika halaman tidak ditemukan, Anda dapat mengarahkannya ke halaman default atau menampilkan pesan kesalahan.
            include "error404.php";
            break;
    }
}
    include "template/footer.php";
?>