<?php
abstract class Urun {
    protected $ad;
    protected $fiyat;
    public function __construct($ad, $fiyat) {
        $this->ad = $ad;
        $this->fiyat = $fiyat;
    }
    public function getAd() {
        return $this->ad;
    }
    public function getFiyat() {
        return $this->fiyat;
    }
}
