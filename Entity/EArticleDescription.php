<?php

enum Format {
    case CD;
    case Cassette;
    case Vinyl;
}

class EArticleDescription {
    private string $ean;
    private string $name;
    private string $artists;
    private string $genre;
    private Format $format;

    public function __construct(string $ean, string $name, string $artists, string $genre, Format $format) {
        $this->ean = $ean;
        $this->name = $name;
        $this->artists = $artists;
        $this->genre = $genre;
        $this->format = $format;
    }
    
    public function getEan(): string {
        return $this->ean;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getArtists(): string {
        return $this->artists;
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