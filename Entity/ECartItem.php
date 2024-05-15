<?php


class ECartItem
{
    private string $article;
    private int $quantity;
    private int $cart;
    private int $id;


    public function __construct(string $article, int $quantity, int $cart)
    {
        $this->article = $article;
        $this->quantity = $quantity;
        $this->cart = $cart;
    }
    

    public function getArticle(): string
    {
        return $this->article;
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
    public function setArticle(string $article): void {
        $this->article = $article;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
}