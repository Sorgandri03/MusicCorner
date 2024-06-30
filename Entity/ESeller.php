<?php

/**
 * The ESeller class represents a seller entity in the MusicCorner application.
 * It extends the EUser class and adds additional properties and methods specific to sellers.
 */
class ESeller extends EUser {    
    
    private string $shopName;
    private float $shopRating = 0;
    public array $catalogue = array();
    private $reviews = array();
    private $recentorders = array();
    
    /**
     * Creates a new ESeller instance.
     *
     * @param string $email The email address of the seller.
     * @param string $password The password of the seller.
     * @param string $shopName The name of the seller's shop.
     */
    public function __construct(string $email, string $password, string $shopName) {
        $this->shopName = $shopName;
        parent::__construct($email, $password);
    }
    
    /**
     * Sets the stocks in the seller's catalogue.
     *
     * @param array $stocks The array of stocks to set.
     */
    public function setStocks(array $stocks): void {
        $this->catalogue = $stocks;
    }
    
    /**
     * Returns the stocks in the seller's catalogue.
     *
     * @return array The array of stocks.
     */
    public function getStocks(): array {
        return $this->catalogue;
    }
    
    /**
     * Returns the catalogue of products available in the seller's shop.
     *
     * @return array The catalogue of products.
     */
    public function getCatalogue(): array {
        return $this->catalogue; 
    }
    
    /**
     * Returns the name of the seller's shop.
     *
     * @return string The name of the shop.
     */
    public function getShopName(): string {
        return $this->shopName;
    }
    
    /**
     * Returns the ID of the seller.
     *
     * @return string The ID of the seller.
     */
    public function getId(): string { 
        return parent::getId();
    }
    
    /**
     * Sets the ID of the seller.
     *
     * @param string $email The email address to set as the ID.
     */
    public function setId(string $email): void {
        parent::setId($email); 
    }
    
    /**
     * Sets the name of the seller's shop.
     *
     * @param string $shopName The name of the shop to set.
     */
    public function setShopName(string $shopName): void {
        $this->shopName = $shopName;
    }
    
    /**
     * Returns the reviews received by the seller.
     *
     * @return array The array of reviews.
     */
    public function getReviews(): array {
        return $this->reviews;
    }
    
    /**
     * Sets the reviews received by the seller.
     *
     * @param array $reviews The array of reviews to set.
     */
    public function setReviews(array $reviews) {
        $this->reviews = $reviews;
    }
    
    /**
     * Returns the rating of the seller's shop.
     *
     * @return float The rating of the shop.
     */
    public function getShopRating(): float {
        $this->calculateShopRating();
        return $this->shopRating;
    }
    
    /**
     * Returns the recent orders placed with the seller that are not yet shipped.
     *
     * @return array The array of recent orders.
     */
    public function getRecentOrders(): array {
        $array = array();
        foreach ($this->recentorders as $orderitem) {
            if ($orderitem->isShipped() == false) {
                $array[] = $orderitem;
            }
        }
        return $array;
    }
    
    /**
     * Sets the recent orders placed with the seller.
     *
     * @param array $orders The array of recent orders to set.
     */
    public function setRecentOrders(array $orders): void {
        $this->recentorders = $orders;
    }
    
    /**
     * Calculates the rating of the seller's shop based on the received reviews.
     */
    private function calculateShopRating(): void {
        $this->getReviews();
        $count = 0;
        $rating = 0;
        foreach ($this->reviews as $review) {
            $rating += $review->getSellerRating();
            $count++;
        }
        if ($count != 0) {
            $rating = $rating / $count;
        }
        $this->shopRating = $rating;        
    }
    
    /**
     * Returns the average rating of the seller's shop as an integer.
     *
     * @return int The average rating as an integer.
     */
    public function averageRatingInt(): int {
        return floor($this->shopRating);
    }
    
    /**
     * Returns the decimal part of the average rating of the seller's shop.
     *
     * @return float The decimal part of the average rating.
     */
    public function averageRatingDecimal(): float {
        return $this->shopRating - floor($this->shopRating);
    }
}