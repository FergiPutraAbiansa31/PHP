<?php
require_once 'Bentuk2D.php';
class Segitiga extends Bentuk2D {
    public $alas;
    public $tinggi;
    const nama = 'Segitiga';

    public function __construct($alas, $tinggi){
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function namaBidang(){
        return (self::nama);
    }

    public function luasBidang(){
        return (0.5 * $this->alas * $this->tinggi);
    }

    public function setSisi(){
        return (sqrt(($this->alas * $this->alas) + ($this->tinggi * $this->tinggi)));
    }

    public function kelilingBidang(){
        return ($this->setSisi() * 3);
    }
}