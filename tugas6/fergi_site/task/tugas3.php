<?php
//array scalar (1 dimensi)
$m1 = ['nim' => 'a11202013130', 'nama' => 'Roni', 'nilai' => 55];
$m2 = ['nim' => 'a11202013131', 'nama' => 'Deni', 'nilai' => 70];
$m3 = ['nim' => 'a11202013132', 'nama' => 'Rini', 'nilai' => 80];
$m4 = ['nim' => 'a11202013133', 'nama' => 'Wulan', 'nilai' => 50];
$m5 = ['nim' => 'a11202013134', 'nama' => 'Galih', 'nilai' => 35];
$m6 = ['nim' => 'a11202013135', 'nama' => 'Faisal', 'nilai' => 75];
$m7 = ['nim' => 'a11202013136', 'nama' => 'Rizky', 'nilai' => 25];
$m8 = ['nim' => 'a11202013137', 'nama' => 'Dewi', 'nilai' => 90];
$m9 = ['nim' => 'a11202013138', 'nama' => 'Siti', 'nilai' => 100];
$m10 = ['nim' => 'a11202013139', 'nama' => 'Indra', 'nilai' => 60];

$ar_judul = ['No', 'NIM', 'NAMA', 'NILAI', 'KETERANGAN', 'GRADE', 'PREDIKAT'];

$mahasiswa = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10];

$jumlah_mahasiswa = count($mahasiswa);
$jumlah_nilai = array_column($mahasiswa, 'nilai');
$total_nilai = array_sum($jumlah_nilai);
$max_nilai = max($jumlah_nilai);
$min_nilai = min($jumlah_nilai);
$rata2 = $total_nilai / $jumlah_mahasiswa;

$keterangan = [
    'Jumlah Mahasiswa' => $jumlah_mahasiswa,
    'Total Nilai' => $total_nilai,
    'Jumlah Nilai Tertinggi' => $max_nilai,
    'Jumlah Nilai Terendah' => $min_nilai,
    'Rata - Rata' => $rata2
];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belajar Array</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <h3 class="text-center">Daftar Nilai Mahasiswa</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <?php
                foreach ($ar_judul as $jdl) {
                ?>
                    <th><?= $jdl ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($mahasiswa as $mhs) {
                $ket = ($mhs['nilai'] >= 60) ? "Lulus" : "Gagal";

                if ($mhs['nilai'] >= 85 && $mhs['nilai'] <= 100) $grade = 'A';
                else if ($mhs['nilai'] >= 75 && $mhs['nilai'] < 85) $grade = 'B';
                else if ($mhs['nilai'] >= 60 && $mhs['nilai'] < 75) $grade = 'C';
                else if ($mhs['nilai'] >= 30 && $mhs['nilai'] < 60) $grade = 'D';
                else if ($mhs['nilai'] >= 0 && $mhs['nilai'] < 30) $grade = 'E';
                else $grade = '';

                switch ($grade) {
                    case 'A':
                        $predikat = 'Memuaskan';
                        break;
                    case 'B':
                        $predikat = 'Bagus';
                        break;
                    case 'C':
                        $predikat = 'Cukup';
                        break;
                    case 'D':
                        $predikat = 'Kurang';
                        break;
                    case 'E':
                        $predikat = 'Buruk';
                        break;
                    default:
                        $predikat = '';
                }
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $mhs['nim'] ?></td>
                    <td><?= $mhs['nama'] ?></td>
                    <td><?= $mhs['nilai'] ?></td>
                    <td><?= $ket ?></td>
                    <td><?= $grade ?></td>
                    <td><?= $predikat ?></td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
        <tfoot>
            <?php
            foreach ($keterangan as $ket => $hasil) {
            ?>
                <tr>
                    <th colspan="6"><?= $ket ?></th>
                    <th><?= $hasil ?></th>
                </tr>
            <?php } ?>
        </tfoot>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>