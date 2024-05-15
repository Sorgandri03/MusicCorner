<?php


class ECartItem
{
    private string $stock;
    private int $quantity;
    private int $cart;
    private int $id;


    public function __construct(string $stock, int $quantity, int $cart)
    {
        $this->stock = $stock;
        $this->quantity = $quantity;
        $this->cart = $cart;
    }
    

    public function getStock(): string {
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
    public function setStock(string $stock): void {
        $this->stock = $stock;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
}