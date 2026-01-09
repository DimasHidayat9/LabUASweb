<?php
// 1. Proteksi Keamanan (Wajib ada di paling atas)
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}

$model = new KendaraanModel();

// 2. Logika Tambah Data (image_4a892c.png)
if (isset($_POST['tambah'])) {
    if ($model->tambah($_POST)) {
        echo "<script>alert('Berhasil Menambah Unit, Bro'); window.location='index.php?url=admin';</script>";
    }
}

// 3. Logika Hapus Data (image_4a892c.png)
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($model->hapus($id)) {
        echo "<script>alert('Unit Telah Dihapus!'); window.location='index.php?url=admin';</script>";
    }
}

// 4. AMBIL DATA (PENTING: Pastikan variabel ini dipanggil di tabel bawah)
$semua_kendaraan = $model->getAll(); 
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 rounded-4 p-4">
                <h5 class="fw-bold mb-3 text-primary">Tambah Unit Baru</h5>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label class="small fw-bold">Foto Kendaraan</label>
                        <input type="file" name="gambar" class="form-control" accept="image/*">
                    </div>
                    <input type="text" name="merk" class="form-control mb-2" placeholder="Merk (Toyota, dll)" required>
                    <input type="text" name="model" class="form-control mb-2" placeholder="Model (Avanza, dll)" required>
                    <select name="tipe" class="form-select mb-2">
                        <option value="Mobil">Mobil</option>
                        <option value="Motor">Motor</option>
                    </select>
                    <div class="row g-2 mb-2">
                        <div class="col-6"><input type="number" name="tahun" class="form-control" placeholder="Tahun"></div>
                        <div class="col-6"><input type="number" name="stok" class="form-control" placeholder="Stok"></div>
                    </div>
                    <input type="number" name="harga" class="form-control mb-3" placeholder="Harga (Angka saja)">
                    <button type="submit" name="tambah" class="btn btn-primary w-100 fw-bold rounded-pill">Simpan ke Database</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4 p-4">
                <h5 class="fw-bold mb-3">Daftar Inventaris Yang Mulia</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Unit</th>
                                <th>Tipe</th>
                                <th>Harga</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Pastikan variabel $semua_kendaraan tidak kosong
                            if ($semua_kendaraan && $semua_kendaraan->num_rows > 0): 
                                while($k = $semua_kendaraan->fetch_assoc()): 
                            ?>
                            <tr>
                                <td>
                                    <div class="fw-bold"><?= $k['merk'] ?> <?= $k['model'] ?></div>
                                    <small class="text-muted">Tahun <?= $k['tahun'] ?></small>
                                </td>
                                <td><span class="badge bg-info text-dark"><?= $k['tipe'] ?></span></td>
                                <td class="fw-bold text-danger">Rp <?= number_format($k['harga']) ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="index.php?url=admin/edit&id=<?= $k['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="index.php?url=admin&hapus=<?= $k['id'] ?>" 
                                           class="btn btn-sm btn-danger" 
                                           onclick="return confirm('Apakah Yang Mulia yakin ingin menghapus unit ini?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                                endwhile; 
                            else: 
                            ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">Belum ada data kendaraan dalam sistem, Yang Mulia.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>