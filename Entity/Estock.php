<?php

class EStock {
    private int $id;
    private float $price;
    private int $quantity;
    private string $article;

    public function __construct(string $article, int $quantity, float $price) {
        $this->article = $article;
        $this->quantity = $quantity;
        $this->price = $price;
    }
    
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
}