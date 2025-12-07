<?php
require_once 'album.php';
$album = new Album();

$id = $_GET['id'];

// 1. Ambil data album sebelum dihapus untuk mendapatkan nama file cover
$data = $album->getAlbumById($id); 

// 2. Lakukan penghapusan dari database
if ($album->deleteAlbum($id)) {
    
    // 3. Jika penghapusan dari DB sukses, hapus file cover (jika ada)
    if (
        !empty($data['cover']) && 
        $data['cover'] != 'default_album.jpg' && // Hindari hapus file default
        file_exists("images/" . $data['cover'])
    ) {
        unlink("images/" . $data['cover']); // Fungsi untuk menghapus file fisik
    }
    
    // 4. Beri notifikasi dan redirect
    echo "<script>
            alert('Data berhasil dihapus'); 
            window.location.href='dataAlbum.php';
          </script>";
} else {
    // 5. Tangani kegagalan
    echo "<script>
            alert('Gagal menghapus data'); 
            window.location.href='dataAlbum.php';
          </script>";
}