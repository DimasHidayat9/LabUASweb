<?php
// Pastikan model sudah tersedia
$model = new KendaraanModel();
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$k = $model->getById($id); // Memanggil fungsi yang baru kita buat

if (!$k) {
    echo "<div class='container mt-5 text-center'><h3>Mohon ampun Yang Mulia, data unit tidak ditemukan.</h3><a href='index.php' class='btn btn-dark mt-3'>Kembali ke Katalog</a></div>";
    return;
}
?>
<div class="container mt-5">
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
        <div class="row g-0">
            <div class="col-md-6">
                <?php $img = !empty($k['gambar']) ? 'assets/img/'.$k['gambar'] : 'assets/img/default.jpg'; ?>
                <img src="<?= $img ?>" class="img-fluid h-100" style="object-fit: cover;" alt="Unit">
            </div>
            <div class="col-md-6 p-5">
                <h1 class="fw-bold"><?= $k['merk'] ?> <?= $k['model'] ?></h1>
                <span class="badge bg-primary mb-3"><?= $k['tipe'] ?></span>
                <h2 class="text-danger fw-bold mb-4">Rp <?= number_format($k['harga'], 0, ',', '.') ?></h2>
                <p class="text-muted">Spesifikasi Unit:</p>
                <ul>
                    <li>Tahun: <?= $k['tahun'] ?></li>
                    <li>Tersedia: <?= $k['stok'] ?> Unit</li>
                </ul>
                <hr>
                <a href="index.php" class="btn btn-outline-dark rounded-pill px-4">Kembali</a>
            </div>
        </div>
    </div>
</div>