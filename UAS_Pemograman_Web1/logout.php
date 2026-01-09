<?php
// logout.php
session_start();
session_unset();
session_destroy();

// Redirect kembali ke halaman utama
header("Location: index.php");
exit;