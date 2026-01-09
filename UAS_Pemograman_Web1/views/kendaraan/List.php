<div class="container mt-5">
    <div class="row g-4">
        <?php 
        // Proteksi jika $data['kendaraan'] null atau undefined (image_4b507d.png)
        if (isset($data['kendaraan']) && is_array($data['kendaraan'])): 
            foreach ($data['kendaraan'] as $k): 
        ?>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="p-3">
                    <?php $img = !empty($k['gambar']) ? 'assets/img/'.$k['gambar'] : 'assets/img/default.jpg'; ?>
                    <img src="<?= $img ?>" class="card-img-top rounded-4" style="height: 200px; object-fit: cover;">
                </div>
                <div class="card-body px-4 pb-4">
                    <h5 class="fw-bold"><?= $k['merk'] ?> <?= $k['model'] ?></h5>
                    <h5 class="text-danger fw-bold">Rp <?= number_format($k['harga']) ?></h5>
                    <a href="index.php?url=kendaraan/detail&id=<?= $k['id'] ?>" class="btn btn-outline-dark w-100 rounded-pill mt-3">Detail</a>
                </div>
            </div>
        </div>
        <?php 
            endforeach; 
        else:
            echo "<div class='text-center py-5'><p class='text-muted'>Data tidak tersedia.</p></div>";
        endif; 
        ?>
    </div>
</div>