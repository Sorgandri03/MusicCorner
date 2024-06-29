<?php


class EOrderItem
{
    private int $id;
    private string $article;
    private string $seller;
    private int $quantity;
    private float $price;
    private int $orderId;
    private bool $shipped = false;

    /**
     * Create a new order item
     * @param string $article the article of the order item
     * @param string $seller the seller of the order item
     * @param int $quantity the quantity that the user bought
     * @param float $price the price of the order item
     * @param int $orderId the id of the order that contains the order item
     */
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

    public function getSeller(): string
    {
        return $this->seller;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }
    
    public function isShipped(): bool
    {
        return $this->shipped;
    }

    public function setShipped(bool $shipped): void
    {
        $this->shipped = $shipped;
    }
}