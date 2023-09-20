<?php

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
