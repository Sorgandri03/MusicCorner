<?php

enum Format {
    case CD;
    case Cassette;
    case Vinyl;
}

class EArticleDescription {
    private string $ean;
    private string $name;
    private string $artist;
    private string $genre;
    private Format $format;

    public function __construct(string $ean, string $name, string $artist, string $genre, Format $format) {
        $this->ean = $ean;
        $this->name = $name;
        $this->artist = $artist;
        $this->genre = $genre;
        $this->format = $format;
    }
    
    public function getEan(): string {
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
        switch ($this->format) {
            case Format::CD:
                return "CD";
            case Format::Cassette:
                return "Cassette";
            case Format::Vinyl:
                return "Vinyl";
            default:
                return ""; // Add a default case to handle unknown formats
        }
    }
}