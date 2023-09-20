<?php

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
