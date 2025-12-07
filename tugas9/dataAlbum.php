<?php
require_once 'album.php';
$albm = new Album();
$albums = $albm->tampilData();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Album Musik</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar">
    <div class="nav-logo">Data Album Musik</div>
    <a href="addAlbum.php" class="btn-add">Tambah Album</a>
</nav>

<div class="container">
    <h2 class="page-title">Daftar Album</h2>

    <div class="album-container">

        <?php foreach ($albums as $album): ?>

            <div class="album-card">

                <?php 
                $cover = (!empty($album['cover']) && file_exists("images/" . $album['cover']))
                        ? $album['cover']
                        : "default_album.jpg";
                ?>

                <img src="images/<?php echo $cover ?>" class="album-image">

                <h3><?php echo $album['nama_album']; ?></h3>
                <p>Penyanyi: <?php echo $album['nama_penyanyi']; ?></p>
                <p>Tahun: <?php echo $album['tahun_rilis']; ?></p>

                <div class="album-actions">
                    <a href="editAlbum.php?id=<?php echo $album['id_album']; ?>" class="btn-edit">Edit</a>

                    <a href="deleteAlbum.php?id=<?php echo $album['id_album']; ?>"
                    class="btn-delete"
                    onclick="return confirm('Yakin ingin menghapus album ini?');">
                    Hapus
                    </a>
                </div>

            </div>

        <?php endforeach; ?>

    </div>
</div>
</body>
</html>
