<?php

class ESeller extends EUser {    
    private string $shopName;
    private float $shopRating=0;
    public array $catalogue = array();

    private $reviews = array();
    
    public function __construct(string $email, string $password, string $shopName) {
        $this->shopName = $shopName;
        parent::__construct($email, $password);
    }
    
    
    public function setStocks(array $stocks): void {
        $this->catalogue = $stocks;
    }
    public function getStocks(): array {
        return $this->catalogue;
    }    
    public function getCatalogue(): array {
        return $this->catalogue; 
    }    
    public function getShopName(): string {
    return $this->shopName;
    }    
    public function getId(): string { 
        return parent::getId();
    }
    public function setId(string $email): void {
        parent::setId( $email); 
    }
    public function setShopName(string $shopName): void {
        $this->shopName = $shopName;
    } 
    public function getReviews(): array {
        return $this->reviews;
    }
    public function setReviews(array $reviews) {
        $this->reviews = $reviews;
    }
    public function getShopRating(): float {
        $this->calculateShopRating();
        return $this->shopRating;
    }
    private function calculateShopRating(): void {
        $this->getReviews();
        $count=0;
        $rating=0;
        foreach($this->reviews as $review) {
            $rating += $review->getSellerRating();
            $count++;
        }
        if($count!=0) {
            $rating = $rating/$count;
        }
        $this->shopRating = $rating;        
    }
    public function averageRatingInt() : int {
        return floor($this->shopRating);
    }
    public function averageRatingDecimal() : float {
        return $this->shopRating - floor($this->shopRating);
    }
}