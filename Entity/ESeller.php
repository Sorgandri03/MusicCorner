<?php
class ESeller extends EUser {
    private String $shopId;

    private String $shopName;
    
    private $stock;

    private float $shopRating;
    
    public function __construct(string $email, string $password, string $shopId, string $shopName) {
        parent::__construct($email, $password);
        $this->shopId = $shopId;
        $this->shopName = $shopName;
    }
    
    public function getShopId(): string {
        return $this->shopId;
    }

    public function setShopId(string $shopId): void {
        $this->shopId = $shopId;
    }

    public function getShopName(): string {
        return $this->shopName;
    }

    public function setShopName(string $shopName): void {
        $this->shopName = $shopName;
    }

    public function getStock(): EStock {
        return $this->stock;
    }
    
    public function setStock(EStock $stock): void {
        $this->stock = $stock;
    }

    public function getShopRating(): float {
        return $this->shopRating;
    }

    public function setShopRating(float $shopRating): void {
        $this->shopRating = $shopRating;
    }
//devo aggiunge metodi per il rating e lo stock
}