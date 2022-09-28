<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas2_PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container p-4">
        <h1 class="text-center mb-3">Form Pegawai</h1>
        <div class="row justify-content-center">
            <div class="container p-4">
                <form action="" method="post">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Nama pegawai</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Agama</label>
                        <div class="col-sm-9">
                            <select class="form-select" aria-label="Default select example" name="agama">
                                <option selected>--- PILIH AGAMA ---</option>
                                <option value="Islam">Islam</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Kristen katolik">Kristen</option>
                                <option value="Kristen protestan">Katolik</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-3 pt-0">Jabatan pegawai</legend>
                        <div class="col-sm-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jabatan" id="jabatan1" value="Manager">
                                <label class="form-check-label">Manager</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jabatan" id="jabatan2" value="Asisten">
                                <label class="form-check-label">Asisten</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jabatan" id="jabatan3" value="Kabag">
                                <label class="form-check-label">Kabag</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jabatan" id="jabatan4" value="Staff">
                                <label class="form-check-label">Staff</label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status1" value="Menikah">
                                <label class="form-check-label">Menikah</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status2" value="Belum menikah">
                                <label class="form-check-label">Belum menikah</label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Jumlah anak</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="jml_anak" name="jml_anak">
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" name="proses" class="btn btn-primary btn-sm col-sm">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <?php
        error_reporting(0);
        $nama = $_POST['nama'];
        $agama = $_POST['agama'];
        $jabatan = $_POST['jabatan'];
        $status = $_POST['status'];
        $jml_anak = $_POST['jml_anak'];
        $submit = $_POST['proses'];

        switch ($jabatan) {
            case 'Manager':
                $gapok = '20000000';
                break;
            case 'Asisten':
                $gapok = '15000000';
                break;
            case 'Kabag':
                $gapok = '10000000';
                break;
            case 'Staff':
                $gapok = '4000000';
                break;
            default:
                $gapok = '';
        }

        $tunjabatan = $gapok * 0.2;

        if ($status == 'Menikah' && $jml_anak <= 2) {
            $tunkeluarga = $gapok * 0.05;
        } else if ($status == 'Menikah' && $jml_anak >= 3 && $jml_anak <= 5) {
            $tunkeluarga = $gapok * 0.1;
        } else if ($status == 'Menikah' && $jml_anak > 5) {
            $tunkeluarga = $gapok * 0.15;
        } else $tunkeluarga = '0';

        $gajikotor = $gapok + $tunjabatan + $tunkeluarga;

        $zakatprofesi = ($agama == 'Islam' && $gajikotor >= 6000000) ? $zakatprofesi = $gajikotor * 0.025 : $zakatprofesi = 0;

        $takehomepay = $gajikotor - $zakatprofesi;

        if (isset($submit)) { ?>
            <h3 class="text-center table-bg py-3">Tabel Gaji Pegawai</h3>
            <table class="table table-bordered text-center">
                <tr class="table">
                    <th>Nama Pegawai</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan Jabatan</th>
                    <th>Tunjangan Keluarga</th>
                    <th>Gaji Kotor</th>
                    <th>Zakat Profesi</th>
                    <th>Take Home Pay</th>
                </tr>
                <?php if (isset($submit)) : ?>
                    <tr class="table">
                        <td><?= $nama; ?></td>
                        <td>Rp <?= number_format($gapok, 0, ',', '.'); ?></td>
                        <td>Rp <?= number_format($tunjabatan, 0, ',', '.'); ?></td>
                        <td>Rp <?= number_format($tunkeluarga, 0, ',', '.'); ?></td>
                        <td>Rp <?= number_format($gajikotor, 0, ',', '.'); ?></td>
                        <td>Rp <?= number_format($zakatprofesi, 0, ',', '.'); ?></td>
                        <td>Rp <?= number_format($takehomepay, 0, ',', '.'); ?></td>
                    </tr>
                <?php endif ?>
            </table>
            <table class="table table-bordered table-sm">
                <tr>
                    <th>Nama pegawai</th>
                    <td> <?= $nama ?> </td>
                </tr>
                <tr>
                    <th>Agama Pegawai</th>
                    <td><?= $agama ?></td>
                </tr>
                <tr>
                    <th>Jabatan Pegawai</th>
                    <td><?= $jabatan ?></td>
                </tr>
                <tr>
                    <th>Status Pegawai</th>
                    <td><?= $status ?></td>
                </tr>
                <tr>
                    <th>Jumlah Anak</th>
                    <td><?= $jml_anak ?></td>
                </tr>
            </table>
        <?php } ?>

    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>