<?php


class ECartItem
{
    private EStock $article;
    private int $quantity;
    private ECart $cart;
    private int $id;


    public function __construct(EStock $article, int $quantity, ECart $cart)
    {
        $this->article = $article;
        $this->quantity = $quantity;
        $this->cart = $cart;
    }
    

    public function getArticle(): EStock
    {
        return $this->article;
    }
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    public function getCart(): ECart
    {
        return $this->cart;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
    public function setCart(ECart $cart): void
    {
        $this->cart = $cart;
    }
    public function setArticle(EStock $article): void
    {
        $this->article = $article;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}