<?php
require_once 'album.php';
$album = new Album();

$id = $_GET['id'];

$data = $album->getAlbumById($id); 

if ($album->deleteAlbum($id)) {
    
    if (
        !empty($data['cover']) && 
        $data['cover'] != 'default_album.jpg' &&
        file_exists("images/" . $data['cover'])
    ) {
        unlink("images/" . $data['cover']);
    }
    
    echo "<script>
            alert('Data berhasil dihapus'); 
            window.location.href='dataAlbum.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data'); 
            window.location.href='dataAlbum.php';
          </script>";

}
