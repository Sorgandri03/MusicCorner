<?php
namespace Entity;

class ESeller extends EUser {    
    private String $shopName;
    
    private float $shopRating;

    private array $catalogue = array();
    
    public function __construct(string $email, string $password, float $shopRating, string $shopName) {
        parent::__construct($email, $password);
        $this->shopName = $shopName;
        $this->shopRating=$shopRating;
    }
    public function addStock(float $price, int $quantity, EArticleDescription $article) {
        $catalogue[] = new EStock(  $article,  $quantity,  $price);
    }
    public function getShopName(): string {
        return $this->shopName;
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