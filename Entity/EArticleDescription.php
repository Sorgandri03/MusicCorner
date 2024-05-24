<?php

class EArticleDescription {
    private string $ean;
    private string $name;
    private string $artist;
    private string $genre;
    private int $format;
    private $stocks = array();

    public function __construct(string $ean, string $name, string $artist, string $genre, int $format) {
        $this->ean = $ean;
        $this->name = $name;
        $this->artist = $artist;
        $this->genre = $genre;
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
    public function getGenre(): string {
        return $this->genre;
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
    public function setGenre(string $genre) {
        $this->genre = $genre;
    }
    public function setFormat(int $format) {
        $this->format = $format;
    }
    public function getStocks(): array {
        return $this->stocks;
    }
    public function setStocks(array $stocks) {
        $this->stocks = $stocks;
    }
}