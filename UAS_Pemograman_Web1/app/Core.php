<?php
// app/Core.php
spl_autoload_register(function ($class_name) {
    // Mencari file di dalam folder app/ berdasarkan nama Class
    $path = __DIR__ . '/' . $class_name . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});