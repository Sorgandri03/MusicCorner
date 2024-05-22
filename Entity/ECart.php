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
        $this->cartItems[$stockId] = $quantity;
    }
    public function removeArticle(int $stockId): void {
        unset($this->cartItems[$stockId]);
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
}