<?php

class EStock {
    private int $id;
    private float $price;
    private int $quantity;
    private string $article;
    private string $seller;
    public function __construct(string $article, int $quantity, float $price, string $seller) {
        $this->article = $article;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->seller = $seller;
    }
    
    public function getArticle(): string {
    public function getArticle(): string {
        return $this->article;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function getPrice(): float {
        return $this->price;
    }
  
    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function getSeller(): string {
        return $this->seller;
    }
}