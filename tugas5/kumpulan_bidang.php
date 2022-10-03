<?php
require_once 'Lingkaran.php';
require_once 'PersegiPanjang.php';
require_once 'Segitiga.php';

$ling = new Lingkaran(4);
$pp = new PersegiPanjang(4, 10);
$st = new Segitiga(5, 12);

$bidang = [$ling, $pp, $st];

$arrJudul = ['No', 'Nama Bidang', 'Keliling Bidang', 'Luas Bidang'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 5 PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Kumpulan Bidang</h1>
        <div class="row justify-content-center">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <?php
                        foreach ($arrJudul as $jdl) {
                        ?>
                            <th><?= $jdl ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($bidang as $bd) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $bd->namaBidang() ?></td>
                            <td><?= $bd->luasBidang() ?></td>
                            <td><?= $bd ->kelilingBidang() ?></td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>

        </div>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>