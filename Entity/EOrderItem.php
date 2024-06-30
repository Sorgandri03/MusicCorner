<?php
/**
 * Represents an order item in the MusicCorner application.
 */
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
     * Create a new order item.
     *
     * @param string $article The article of the order item.
     * @param string $seller The seller of the order item.
     * @param int $quantity The quantity that the user bought.
     * @param float $price The price of the order item.
     * @param int $orderId The ID of the order that contains the order item.
     */
    public function __construct(string $article, string $seller, int $quantity, float $price, int $orderId)
    {
        $this->article = $article;
        $this->seller = $seller;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->orderId = $orderId;
    }
    

    /**
     * Get the ID of the order item.
     *
     * @return int The ID of the order item.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the ID of the order item.
     *
     * @param int $id The ID of the order item.
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Get the article of the order item.
     *
     * @return string The article of the order item.
     */
    public function getArticle(): string
    {
        return $this->article;
    }

    /**
     * Get the seller of the order item.
     *
     * @return string The seller of the order item.
     */
    public function getSeller(): string
    {
        return $this->seller;
    }

    /**
     * Get the quantity that the user bought.
     *
     * @return int The quantity that the user bought.
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * Get the price of the order item.
     *
     * @return float The price of the order item.
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Get the ID of the order that contains the order item.
     *
     * @return int The ID of the order that contains the order item.
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }
    
    /**
     * Check if the order item has been shipped.
     *
     * @return bool True if the order item has been shipped, false otherwise.
     */
    public function isShipped(): bool
    {
        return $this->shipped;
    }

    /**
     * Set the shipped status of the order item.
     *
     * @param bool $shipped The shipped status of the order item.
     * @return void
     */
    public function setShipped(bool $shipped): void
    {
        $this->shipped = $shipped;
    }
}