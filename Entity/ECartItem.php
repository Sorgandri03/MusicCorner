<?php


class ECartItem
{
    private int $stock;
    private int $quantity;
    private int $cart;
    private int $id;


    public function __construct(int $stock, int $quantity, int $cart)
    {
        $this->stock = $stock;
        $this->quantity = $quantity;
        $this->cart = $cart;
    }
    

    public function getStock(): int {
        return $this->stock;
    }
    public function getQuantity(): int {
        return $this->quantity;
    }
    public function getCart(): int {
        return $this->cart;
    }
    public function getId(): int {
        return $this->id;
    }
    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }
    public function setCart(int $cart): void {
        $this->cart = $cart;
    }
    public function setStock(int $stock): void {
        $this->stock = $stock;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function getPrice(): float {
        $stock = FPersistentManager::getInstance()->retrieveObj(EStock::class, $this->stock);
        $price = 0;
        $price += $stock->getPrice() * $this->quantity;
        return $price;
    }
}