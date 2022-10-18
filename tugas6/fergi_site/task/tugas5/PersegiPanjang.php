<?php
require_once 'Bentuk2D.php';
class PersegiPanjang extends Bentuk2D {
    public $panjang;
    public $lebar;
    const nama = 'Persegi Panjang';

    public function __construct($panjang, $lebar){
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function namaBidang(){
        return (self::nama);
    }

    public function luasBidang(){
        return ($this->panjang * $this->lebar);
    }

    public function kelilingBidang(){
        return (2 * ($this->panjang + $this->lebar));
    }
}