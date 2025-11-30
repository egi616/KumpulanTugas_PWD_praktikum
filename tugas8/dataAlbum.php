<?php
require_once 'album.php';

$albm = new Album();
$albums = $albm->tampilData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil data dari database</title>
</head>
<body>
    <h1>Data Album Musik</h1>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Id Album</th>
            <th>Nama Album</th>
            <th>Nama Penyanyi</th>
            <th>Tahun Rilis</th>
        </tr>

        <?php 
        $no = 1;
        foreach($albums as $album) { ?>
            <tr>
                <td><?= $album['id_album']; ?></td>
                <td><?= $album['nama_album']; ?></td>
                <td><?= $album['nama_penyanyi']; ?></td>
                <td><?= $album['tahun_rilis']; ?></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
