<?php

class EStock {
    private EArticleDescription $Article;
    private int $quantity;
    private float $price;

    public function __construct(EArticleDescription $Article, int $quantity, float $price) {
        $this->Article = $Article;
        $this->quantity = $quantity;
        $this->price = $price;
    }
    
    public function getArticle(): EArticleDescription {
        return $this->Article;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getPrice(): float {
        return $this->price;
    }
    public function __toString(): string {
        return $this->Article->getArtists() . " " . $this->Article->getName() . " " . $this->Article->getGenre() . " " . $this->Article->getFormat() . " " . $this->quantity . " " . $this->price;
    }
}