<?php

/**
 * The EStock class represents an item in the stock of a music store.
 */
class EStock {
    private int $id;
    private float $price;
    private int $quantity;
    private string $article;
    private string $seller;
    
    /**
     * Constructs a new EStock object.
     *
     * @param string $article The name of the article.
     * @param int $quantity The quantity of the article in stock.
     * @param float $price The price of the article.
     * @param string $seller The name of the seller.
     */
    public function __construct(string $article, int $quantity, float $price, string $seller) {
        $this->article = $article;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->seller = $seller;
    }
    
    /**
     * Returns the name of the article.
     *
     * @return string The name of the article.
     */
    public function getArticle(): string {
        return $this->article;
    }

    /**
     * Returns the quantity of the article in stock.
     *
     * @return int The quantity of the article in stock.
     */
    public function getQuantity(): int {
        return $this->quantity;
    }

    /**
     * Returns the price of the article.
     *
     * @return float The price of the article.
     */
    public function getPrice(): float {
        return $this->price;
    }
  
    /**
     * Returns the ID of the EStock object.
     *
     * @return int The ID of the EStock object.
     */
    public function getId(): int {
        return $this->id;
    }
    
    /**
     * Sets the ID of the EStock object.
     *
     * @param int $id The ID to set.
     * @return void
     */
    public function setId(int $id): void {
        $this->id = $id;
    }
    
    /**
     * Returns the name of the seller.
     *
     * @return string The name of the seller.
     */
    public function getSeller(): string {
        return $this->seller;
    }
    
    /**
     * Sets the name of the article.
     *
     * @param string $article The name of the article to set.
     * @return void
     */
    public function setArticle(string $article): void {
        $this->article = $article;
    }
    
    /**
     * Sets the quantity of the article in stock.
     *
     * @param int $quantity The quantity to set.
     * @return void
     */
    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }
    
    /**
     * Sets the price of the article.
     *
     * @param float $price The price to set.
     * @return void
     */
    public function setPrice(float $price): void {
        $this->price = $price;
    }
    
    /**
     * Removes the article from the stock.
     *
     * @return void
     */
    public function removeArticle(): void {
        unset($this->quantity);
    }
    
    /**
     * Updates the article with the given quantity and price.
     * If the quantity is 0, the article is removed from the stock.
     *
     * @param int $quantity The new quantity of the article.
     * @param float $price The new price of the article.
     * @return void
     */
    public function updateArticle(int $quantity, float $price): void {
        if ($quantity == 0) {
            $this->removeArticle();
        } else {
            $this->quantity = $quantity;
            $this->price = $price;
        }
    }
}