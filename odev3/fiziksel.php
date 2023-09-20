<?php
class fiziksel extends Urun implements Kargolanabilir {
    protected $agirlik;
    protected $adi;
    protected $fiyat;
    public function __construct($adi, $fiyat, $agirlik) {
        parent::__construct($adi, $fiyat);
        $this->agirlik = $agirlik;
    }
    public function getAgirlik() {
        return $this->agirlik;
    }
}
