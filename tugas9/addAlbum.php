<?php
require_once 'album.php';
$album = new Album();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Album</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <a href="dataAlbum.php" class="btn-back">← Back</a>

    <div class="form-card">

        <form method="POST" enctype="multipart/form-data">
            <h2 class="title">Add Album</h2>

            <label>Nama Album</label>
            <input type="text" name="nama_album" class="input-text" required>

            <label>Nama Penyanyi</label>
            <input type="text" name="nama_penyanyi" class="input-text" required>

            <label>Tahun Rilis</label>
            <input type="number" name="tahun_rilis" class="input-text" required>

            <label>Cover Album</label>
            <input type="file" name="cover" class="input-file" accept="image/*" required>

            <button type="submit" name="submit" class="btn-submit">Submit Album</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {

            $nama_album     = $_POST['nama_album'];
            $nama_penyanyi  = $_POST['nama_penyanyi'];
            $tahun_rilis    = $_POST['tahun_rilis'];

            $fileName = $_FILES['cover']['name'];
            $tmpName  = $_FILES['cover']['tmp_name'];

            $newName = time() . "_" . rand(1000, 9999) . "_" . $fileName;

            $uploadPath = "images/" . $newName;

            if (move_uploaded_file($tmpName, $uploadPath)) {

                $data = [
                    "nama_album"    => $nama_album,
                    "nama_penyanyi" => $nama_penyanyi,
                    "tahun_rilis"   => $tahun_rilis,
                    "cover"         => $newName
                ];

                if ($album->tambahAlbum($data)) {
                    echo "<script>
                            alert('Album berhasil ditambahkan');
                            window.location.href='dataAlbum.php';
                          </script>";
                } else {
                    echo "<script>alert('Gagal menyimpan data ke database');</script>";
                }

            } else {
                echo "<script>alert('Upload file gagal');</script>";
            }
        }
        ?>

    </div>

</div>

</body>
</html>


