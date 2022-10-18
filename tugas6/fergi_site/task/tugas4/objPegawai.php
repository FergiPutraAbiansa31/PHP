<?php
require 'Pegawai.php';

$p1 = new Pegawai('11202013131', 'Riyan Doni', 'Manager', 'Islam', 'Menikah');
$p2 = new Pegawai('11202013132', 'Rendy Dwi', 'Asisten', 'Islam', 'Menikah');
$p3 = new Pegawai('11202013133', 'Ahmad Rudi', 'Staff', 'Budha', 'Belum Menikah');
$p4 = new Pegawai('11202013134', 'Michael Xaverius ', 'Kabag', 'Kristen', 'Menikah');
$p5 = new Pegawai('11202013135', 'Agus', 'Staff', 'Hindu', 'Menikah');

echo '<h3 align="center">' . Pegawai::PEGAWAI . '</h3>';
$p1->mencetak();
$p2->mencetak();
$p3->mencetak();
$p4->mencetak();
$p5->mencetak();
echo 'Jumlah Pegawai : ' . Pegawai::$jumlah;
