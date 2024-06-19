<?php

class ECart {
    private array $cartItems = array();
    private string $customer;

    public function __construct(string $customer) {
        $this->customer = $customer;
    }

    public function getCartItems(): array {
        return $this->cartItems;
    }
    public function getCustomer(): string {
        return $this->customer;
    }
    public function setCustomer(string $customer): void {
        $this->customer = $customer;
    }
    public function addArticle(int $stockId, int $quantity): void {
        if(count($this->cartItems) != 0){
            foreach($this->cartItems as $article => $amount){
                if($article == $stockId){
                    $this->cartItems[$stockId] = $amount + $quantity;
                    break;
                }
                else {
                    $this->cartItems[$stockId] = $quantity;
                }
            }
        }
        else{
            $this->cartItems[$stockId] = $quantity;
        }
    }
    public function removeArticle(int $stockId): void {
        unset($this->cartItems[$stockId]);
    }
    public function updateArticle(int $stockId, int $quantity): void {
        if($quantity == 0){
            $this->removeArticle($stockId);
        }
        else{
            $this->cartItems[$stockId] = $quantity;
        }
    }
    public function clearCart(): void {
        $this->cartItems = array();
    }
    public function getTotalPrice(): float {
        $price = 0;
        foreach ($this->cartItems as $item => $quantity) {
            $stock = FPersistentManager::getInstance()->retrieveObj(EStock::class, $item);
            $price += $stock->getPrice() * $quantity;
        }
        return $price;
    }
    public function getCartQuantity(): int {
        $total = 0;
        foreach ($this->cartItems as $item => $quantity) {
            $total += $quantity;
        }
        return $total;
    }
}