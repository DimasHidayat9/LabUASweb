<?php
$model = new KendaraanModel();
$id = $_GET['id'];
$k = $model->getById($id);
if (isset($_POST['update'])) {
    $model->update($id, $_POST);
    echo "<script>window.location='index.php?url=admin';</script>";
}
?>
<div class="container mt-4">
    <div class="card p-4 mx-auto" style="max-width: 500px;">
        <h5>Edit Kendaraan</h5>
        <form method="POST">
            <input type="text" name="merk" class="form-control mb-2" value="<?= $k['merk'] ?>">
            <input type="text" name="model" class="form-control mb-2" value="<?= $k['model'] ?>">
            <input type="number" name="harga" class="form-control mb-3" value="<?= $k['harga'] ?>">
            <button name="update" class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</div>