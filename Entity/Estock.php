<?php

class EStock {
    private int $id;
    private float $price;
    private int $quantity;
    private EArticleDescription $article;
    private ESeller $seller;

    public function __construct(EArticleDescription $article, ESeller $seller, int $quantity, float $price) {
        $this->article = $article;
        $this->seller = $seller;
        $this->quantity = $quantity;
        $this->price = $price;
    }
    
    public function getArticle(): EArticleDescription {
        return $this->article;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getPrice(): float {
        return $this->price;
    }
    public function __toString(): string {
        return $this->article->getArtist() . " " . $this->article->getName() . " " . $this->article->getGenre() . " " . $this->article->getFormat() . " " . $this->quantity . " " . $this->price;
    }
    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function getSeller(): ESeller {
        return $this->seller;
    }
}