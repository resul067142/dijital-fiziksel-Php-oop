<?php

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
