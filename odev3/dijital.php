<?php
class dijital extends Urun implements Indirilebilir {
    protected $indirmeLinki;
    public function __construct($ad, $fiyat, $indirmeLinki) {
        parent::__construct($ad, $fiyat);
        $this->indirmeLinki = $indirmeLinki;
    }
    public function getIndirmeLinki() {
        return $this->indirmeLinki;
    }
}
