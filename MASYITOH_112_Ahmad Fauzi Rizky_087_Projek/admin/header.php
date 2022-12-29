</<?php
session_start();
include '../koneksi.php';
if (!isset($_SESSION['status_login'])) {
    echo "<script>window.location = '../login.php?msg=Harap login terlebih dahulu!'</script>";
}
date_default_timezone_set("Asia/Jakarta");
?> <!DOCTYPE html>
<html>

    <head>
        <title>Panel Sijago Academy</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body class="bg-light">
        <!-- Navbar -->
        <div class="navbar">
            <div class="container">
                <!-- Navbar Brand -->
                <h2 class="nav-brand float-left"><a href="">Nama Sekolah</a></h2>
                <!-- NavabaMenu -->
                <ul class="nav-menu float-left">
                    <li><a href="index.php">Dashboard</a></li> <?php if ($_SESSION['ulevel'] == 'Super Admin') { ?> <li>
                        <a href="pengguna.php">Pengguna</a>
                    </li> <?php } elseif ($_SESSION['ulevel'] == 'Admin') { ?> <li>
                        <a href="pengguna.php">Pengguna</a>
                    </li>
                    <li><a href="kontak.php">Kontak</a></li>
                     <?php } ?> <li>
                        <a href="#"><?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>) <i class="fa 
                        fa-caret-down"></i></a>
                        <!-- Sub Menu -->
                        <ul class="dropdown">
                            <li><a href="ubah-password.php">Ubah Password</a></li>
                            <li><a href="logout.php">Keluar</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>