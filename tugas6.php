<!DOCTYPE html>
<html>
<head>
    <title>Tugas 6</title>
    <style>
        table.solid {
            border: 1px solid;
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            border: 1px solid;
            border: 1px solid black;
            padding: 5px 10px;
        }
        th {
            border: 1px solid;
            background-color: #00FF00;
        }
        .genap {
            background-color: cyan;
        }
        .ganjil {
            background-color: #FFFF00; 
        }
        .bilangan {
            background-color: white; 
            color: black;              
        }
    </style>
</head>
<body>

<h4>1. Bilangan Genap dari 1 sampai 10</h4>
<?php
for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        echo $i . " ";
    }
}
?>

<h4>2. Tabel Perkalian 1–10</h4>
<table>
    <tr>
        <th class="bilangan">bilangan</th>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            echo "<th>$i</th>";
        }
        ?>
    </tr>

    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo "<tr>";
        echo "<th>$i</th>";

        for ($j = 1; $j <= 10; $j++) {
            $hasil = $i * $j;

            // cek ganjil atau genap
            $kelas = ($hasil % 2 == 0) ? "genap" : "ganjil";

            echo "<td class='$kelas'>$hasil</td>";
        }

        echo "</tr>";
    }
    ?>
</table>

</body>
</html>