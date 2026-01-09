<?php
class KendaraanController {
    private $model;

    public function __construct() {
        $this->model = new KendaraanModel();
    }

    public function index() {
        $keyword = isset($_GET['cari']) ? $_GET['cari'] : null;
        $halamanAktif = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 6;
        $offset = ($halamanAktif - 1) * $limit;

        $kendaraan = $this->model->getAllKendaraan($keyword, $limit, $offset);
        $totalData = $this->model->countKendaraan($keyword);
        $totalHalaman = ceil($totalData / $limit);

        // Data dibungkus dalam array untuk dikirim ke View (image_4b507d.png)
        return [
            'kendaraan' => $kendaraan,
            'totalHalaman' => $totalHalaman,
            'halamanAktif' => $halamanAktif
        ];
    }
}