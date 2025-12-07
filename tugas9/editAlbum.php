<?php
require_once 'album.php';
$album = new Album();

$id_album = $_GET['id'];
$data = $album->getAlbumById($id_album);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Album</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <a href="dataAlbum.php" class="btn-back">← Back</a>

    <div class="form-card">
        <form method="POST" enctype="multipart/form-data">
            <h2 class="title">Edit Album</h2>

            <label>Nama Album</label>
            <input type="text" name="nama_album" class="input-text"
                   value="<?= htmlspecialchars($data['nama_album']); ?>" required>

            <label>Nama Penyanyi</label>
            <input type="text" name="nama_penyanyi" class="input-text"
                   value="<?= htmlspecialchars($data['nama_penyanyi']); ?>" required>

            <label>Tahun Rilis</label>
            <input type="number" name="tahun_rilis" class="input-text"
                   value="<?= htmlspecialchars($data['tahun_rilis']); ?>" required>

            <label>Cover Album</label>
            <input type="file" name="cover" class="input-file" accept="image/*">
            <small>Biarkan kosong jika tidak ingin mengganti cover</small>

            <button type="submit" name="submit" class="btn-submit">Update Album</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {

            $nama_album     = $_POST['nama_album'];
            $nama_penyanyi  = $_POST['nama_penyanyi'];
            $tahun_rilis    = $_POST['tahun_rilis'];

            if (!empty($_FILES['cover']['name'])) {

                $fileName = $_FILES['cover']['name'];
                $tmpName  = $_FILES['cover']['tmp_name'];

                $newName = time() . "_" . rand(1000, 9999) . "_" . $fileName;
                move_uploaded_file($tmpName, "images/" . $newName);

            } else {
                $newName = $data['cover']; // pakai cover lama
            }

            $update = [
                "nama_album"    => $nama_album,
                "nama_penyanyi" => $nama_penyanyi,
                "tahun_rilis"   => $tahun_rilis,
                "cover"         => $newName
            ];

            if ($album->updateAlbum($id, $update)) {
                echo "<script>
                        alert('Album berhasil diupdate');
                        window.location='dataAlbum.php';
                      </script>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>


