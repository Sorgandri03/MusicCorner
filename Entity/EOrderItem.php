<?php


class EOrderItem
{
    private int $id;
    private string $article;
    private string $seller;
    private int $quantity;
    private float $price;
    private int $orderId;


    public function __construct(string $article, string $seller, int $quantity, float $price, int $orderId)
    {
        $this->article = $article;
        $this->seller = $seller;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->orderId = $orderId;
    }
    

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getArticle(): string
    {
        return $this->article;
    }

    public function setArticle(string $article): void
    {
        $this->article = $article;
    }

    public function getSeller(): string
    {
        return $this->seller;
    }

    public function setSeller(string $seller): void
    {
        $this->seller = $seller;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }
}