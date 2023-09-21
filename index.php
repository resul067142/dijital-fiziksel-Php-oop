<?php
//rsl tst
// Shippable interface tanımı
interface Shippable {
public function getWeight();
}

// Downloadable interface tanımı
interface Downloadable {
public function getDownloadLink();
}

// Mailable interface tanımı
interface Mailable {
public function sendEmail();
}

// Ürün sınıfı (abstract)
abstract class Product {
protected $name;
protected $price;

public function __construct($name, $price) {
$this->name = $name;
$this->price = $price;
}

public function getName() {
return $this->name;
}

public function getPrice() {
return $this->price;
}
}

// Elbise sınıfı (Fiziksel ürün)
class Dress extends Product implements Shippable {
protected $weight;

public function __construct($name, $price, $weight) {
parent::__construct($name, $price);
$this->weight = $weight;
}

public function getWeight() {
return $this->weight;
}
}

// Yazılım sınıfı (Dijital ürün)
class Software extends Product implements Downloadable {
protected $downloadLink;

public function __construct($name, $price, $downloadLink) {
parent::__construct($name, $price);
$this->downloadLink = $downloadLink;
}

public function getDownloadLink() {
return $this->downloadLink;
}
}

// Sepet sınıfı
class Cart implements Mailable {
private $items = [];
private $customerName;
private $customerAddress;

public function addProduct(Product $product) {
$this->items[] = $product;
}

public function setCustomerInfo($name, $address) {
$this->customerName = $name;
$this->customerAddress = $address;
}

public function confirmOrder() {
$totalPrice = 0;
echo "Sipariş Detayları:\n";
foreach ($this->items as $item) {
echo "- " . $item->getName() . " - $" . $item->getPrice() . "\n";
$totalPrice += $item->getPrice();
}
echo "Toplam Fiyat: $" . $totalPrice . "\n";

if ($this->hasPhysicalProducts() && empty($this->customerAddress)) {
echo "Fiziksel ürünler için adres bilgisi gereklidir.\n";
} else {
$this->sendEmail();
}
}

public function sendEmail() {
echo "Sipariş onaylandı. E-posta gönderiliyor...\n";
// E-posta gönderme işlemleri burada gerçekleştirilebilir.
}

private function hasPhysicalProducts() {
foreach ($this->items as $item) {
if ($item instanceof Shippable) {
return true;
}
}
return false;
}
}

// Örnek kullanım
$dress = new Dress("Gömlek", 30, 0.5);
$software = new Software("Web Uygulama", 50, "http://example.com/download");

$cart = new Cart();
$cart->addProduct($dress);
$cart->addProduct($software);
$cart->setCustomerInfo("Ahmet", "İstanbul, Türkiye");
$cart->confirmOrder();
