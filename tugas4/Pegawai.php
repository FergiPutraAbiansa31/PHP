<?php
class Pegawai
{
    public $nip;
    public $nama;
    public $jabatan;
    public $agama;
    public $status;
    
    static $jumlah = 0;
    const PEGAWAI = 'P.T PUTRA JAYA';

    public function __construct($nip, $nama, $jabatan, $agama, $status){
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
    }

    public function setGajiPokok(){
        switch ($this->jabatan) {
            case 'Manager':
                $gapok = 15000000;
                break;
            case 'Asisten':
                $gapok = 10000000;
                break;
            case 'Kabag':
                $gapok = 7000000;
                break;
            case 'Staff':
                $gapok = 4000000;
                break;
            default:
                $gapok = 0;
        }
        return $gapok;
    }

    public function setTunjab(){
        $tunjabatan = $this->setGajiPokok() * 0.2;
        return $tunjabatan;
    }

    public function setTunkel(){
        $tunkeluarga = ($this->status == 'Menikah') ? $this->setGajiPokok() * 0.1 : 0;
        return $tunkeluarga;
    }

    public function setZakatProfesi(){
        $zakprof = ($this->agama == 'Islam' && $this->setGajiKotor() >= 6000000) ? $this->setGajiKotor() * 0.025 : 0;
        return $zakprof;
    }

    public function setGajiKotor(){
        $gator = $this->setGajiPokok() + $this->setTunjab() + $this->setTunkel();
        return $gator;
    }

    public function setTakeHomePay(){
        $takehomepay = $this->setGajiKotor() - $this->setZakatProfesi();
        return $takehomepay;
    }

    public function mencetak(){
        echo '<b><u>' . self::PEGAWAI . '</u></b>';
        echo '<br/>NIP : ' . $this->nip;
        echo '<br/>Nama : ' . $this->nama;
        echo '<br/>Jabatan : ' . $this->jabatan;
        echo '<br/>Agama : ' . $this->agama;
        echo '<br/>Status : ' . $this->status;
        echo '<br/>Gaji Pokok : Rp. ' . number_format($this->setGajiPokok(), 0, ',', '.');
        echo '<br/>Tunjangan Jabatan : Rp. ' . number_format($this->setTunjab(), 0, ',', '.');
        echo '<br/>Tunjangan Keluarga : Rp. ' . number_format($this->setTunkel(), 0, ',', '.');
        echo '<br/>Zakat Profesi : Rp. ' . number_format($this->setZakatProfesi(), 0, ',', '.');
        echo '<br/>Gaji Kotor : Rp. ' . number_format($this->setGajiKotor(), 0, ',', '.');
        echo '<br/>Take Home Pay : Rp. ' . number_format($this->setTakeHomePay(), 0, ',', '.');
        echo '<hr/>';
    }
}
