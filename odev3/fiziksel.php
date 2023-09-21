<?php
class fiziksel extends Urun implements Kargolanabilir {
    protected $agirlik;
    protected $adi;
    protected $fiyat;
    protected $fiyatı;

    /**
     * @param $agirlik
     * @param $adi
     * @param $fiyat
     */
    public function __construct($agirlik, $adi, $fiyat)
    {
        $this->agirlik = $agirlik;
        $this->adi = $adi;
        $this->fiyat = $fiyat;
    }

}
