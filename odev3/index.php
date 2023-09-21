<?php
// Aşagıda belirtilen php uzantılı dosyaları index.php dosyasına dahil ettik.

include  'Product.php';
include  'Shippable.php';
include  'Downloadable.php';
include  'Mailable.php';
include  'fiziksel.php';
include  'dijital.php';
include  'Sepet.php';

$gomlek =new fiziksel("Gömlek", 100, 0.5);
$yazilim = new dijital("Web Uygulama", 200, "http://ornek.com/indir");
$sepet = new Sepet();
$sepet->urunEkle($elbise);
$sepet->urunEkle($yazilim);
$sepet->musteriBilgisiAyarla("Ahmet", "Istanbul, Türkiye");
$sepet->siparisiOnayla();
