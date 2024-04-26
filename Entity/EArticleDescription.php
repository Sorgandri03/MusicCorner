<?php

class ArticleDescription {
    private string $ean;
    private string $name;
    private string $artist;
    private string $genre;
    
    enum Format: string {
        case CD = "CD";
        case Cassette = "Cassette";
        case Vinyl = "Vinyl";
    }

    
}