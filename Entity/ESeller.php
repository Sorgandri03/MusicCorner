<?php

class ESeller extends EUser {    
    private String $shopName;
    
    private float $shopRating=0;

    public array $catalogue = array();
    
    public function __construct(string $email, string $password, string $shopName) {
        parent::__construct($email, $password);
        $this->shopName = $shopName;
    }
    
    public function addStock(EStock $stock): void {
        $this->catalogue[] = $stock;
    }
    
    public function getCatalogue(): array {
        return $this->catalogue; 
    }
    
    public function getShopName(): string {
    return $this->shopName;
    }
    public function setRating(): void {
      //DA FARE
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
//devo aggiunge metodi per il rating e lo stock
}