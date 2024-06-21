<?php

class EArticleDescription {
    private string $ean;
    private string $name;
    private string $artist;
    private int $format;
    private $stocks = array();

    public function __construct(string $ean, string $name, string $artist, int $format) {
        $this->ean = $ean;
        $this->name = $name;
        $this->artist = $artist;
        $this->format = $format;
    }
    
    public function getId(): string {
        return $this->ean;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getArtist(): string {
        return $this->artist;
    }

    public function getFormat(): int {
        return $this->format;
    }
    public function getFormatString(): string {
        return Format[$this->format];
    }
    public function setArtist(string $artist) {
        $this->artist = $artist;
    }
    public function setName(string $name) {
        $this->name = $name;
    }

    public function setFormat(int $format) {
        $this->format = $format;
    }
    public function getStocks(): array {
        return $this->stocks;
    }
    public function setStocks(array $stocks) {
        $this->stocks = $stocks;
        usort($this->stocks, "EArticleDescription::cmp");
    }
    public function getLowestPrice(){
        $lowestPrice = 0;
        foreach($this->stocks as $stock){
            if($lowestPrice == 0 || $stock->getPrice() < $lowestPrice){
                $lowestPrice = $stock->getPrice();
                
            }
        }
        return $lowestPrice;   
    }
    public static function cmp($a, $b) {
        return strcmp($a->getPrice(), $b->getPrice());
    }
}