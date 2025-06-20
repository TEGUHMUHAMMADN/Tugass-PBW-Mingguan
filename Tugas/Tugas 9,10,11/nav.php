<?php include 'config.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= $base_url ?>index.php">Toko Buku Online</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>index.php">Daftar Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>pages/buku/tambah_buku.php">Tambah Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>pages/transaksi/transaksi.php">Buat Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>pages/transaksi/lihat_transaksi.php">Lihat Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>pages/buku/hapus.php">Hapus Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>pages/pelanggan/daftar_pelanggan.php">Daftar Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>pages/pelanggan/register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a href="/Tugas%2011/logout.php " class="btn btn-danger">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
