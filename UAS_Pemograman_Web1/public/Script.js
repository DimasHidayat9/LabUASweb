// public/Script.js
document.addEventListener('DOMContentLoaded', function() {
    // Animasi fade in saat halaman dimuat
    document.body.style.opacity = '0';
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.5s ease-in';
        document.body.style.opacity = '1';
    }, 100);

    // Konfirmasi Hapus Data
    const deleteButtons = document.querySelectorAll('.btn-danger');
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (!confirm('Apakah Yang Mulia yakin ingin menghapus data kendaraan ini?')) {
                e.preventDefault();
            }
        });
    });
});