<?php

class ESeller extends EUser {    
    private $shopName;
    private float $shopRating=0;
    public array $catalogue = array();
    //private $sentMessages = array();
    //private $receivedMessages = array();

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
        return $this->shopRating;
    }
    public function setShopRating(float $shopRating): void {
        $this->shopRating = $shopRating;
    }
    /*
    public function setSentMessages(array $sentMessages): void {
        $this->sentMessages = $sentMessages;
    }
    public function getSentMessages(): array {
        return $this->sentMessages;
    }
    public function setReceivedMessages(array $receivedMessages): void {
        $this->receivedMessages = $receivedMessages;
    }
    public function getReceivedMessages(): array {
        return $this->receivedMessages;
    }
    */
}