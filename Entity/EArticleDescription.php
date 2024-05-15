<?php

class EArticleDescription {
    private string $ean;
    private string $name;
    private string $artist;
    private string $genre;
    private int $format;

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
    public function getFormat(): string {
        return Format[$this->format];
    }
}