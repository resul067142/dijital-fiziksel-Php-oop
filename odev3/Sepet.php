<?php
class Sepet implements MailGonderilebilir {
    private $urunler = [];
    private $musteriAdi;
    private $musteriAdresi;

    public function urunEkle(Urun $urun) {
        $this->urunler[] = $urun;
    }
    public function musteriBilgisiAyarla($adi, $adresi) {
        $this->musteriAdi = $adi;
        $this->musteriAdresi = $adresi;
    }
    public function siparisiOnayla() {
        $toplamFiyat = 0;
        echo "Sipariş Detayları:\n";
        foreach ($this->urunler as $urun) {
            echo "- " . $urun->getAd() . " - ₺" . $urun->getFiyat() . "\n";
            $toplamFiyat += $urun->getFiyat();
        }
        echo "Toplam Fiyat: ₺" . $toplamFiyat . "\n";

        if ($this->kargalanabilirUrunVarMi() && empty($this->musteriAdresi)) {
            echo "Fiziksel ürünler için adres bilgisi gereklidir.\n";
        } else {
            $this->epostaGonder();
        }
    }

    public function epostaGonder() {
        echo "Sipariş onaylandı. E-posta gönderiliyor...\n";
        // E-posta gönderme işlemleri burada gerçekleştirilebilir.
    }

    private function kargalanabilirUrunVarMi() {
        foreach ($this->urunler as $urun) {
            if ($urun instanceof Kargalanabilir) {
                return true;
            }
        }
        return false;
    }
}
