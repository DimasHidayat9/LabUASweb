<?php
// Aktifkan laporan error secara paksa
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// CEK APAKAH FILE MODEL ADA (Penyebab utama blank)
if (!file_exists('app/Models.php')) {
    die("<div style='color:red; font-family:sans-serif; padding:20px;'>
            <h2>Mohon Ampun, Yang Mulia!</h2>
            <p>File <b>app/Models.php</b> tidak ditemukan. Mohon pastikan folder <b>app</b> ada di dalam folder proyek Anda.</p>
         </div>");
}

require_once 'app/Models.php';

try {
    $model = new KendaraanModel();
} catch (Exception $e) {
    die("Gagal memuat Database: " . $e->getMessage());
}

if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $user = $model->login($u, $p);
    
    if ($user) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau Password salah, Bro";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Showroom Dimas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #0f172a; display: flex; align-items: center; height: 100vh; }
        .card { border-radius: 15px; padding: 30px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <h3 class="text-center fw-bold mb-4">LOG IN</h3>
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger p-2 small text-center"><?= $error ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="small fw-bold">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="admin" required>
                        </div>
                        <div class="mb-4">
                            <label class="small fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="admin123" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary w-100 fw-bold">Masuk Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>