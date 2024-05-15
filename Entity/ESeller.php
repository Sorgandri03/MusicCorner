<?php

class ESeller extends EUser {    
    private String $shopName;
    
    private float $shopRating=0;

    public array $catalogue = array();
    
    public function __construct(string $email, string $password, string $shopName) {
        parent::__construct($email, $password);
        $this->shopName = $shopName;
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
    
    public function getShopRating(): float {
        return $this->shopRating;
    }

    public function setShopRating(float $shopRating): void {
        $this->shopRating = $shopRating;
    }

}