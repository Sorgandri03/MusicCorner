<?php


class ECartItem
{
    private EArticleDescription $article;
    private int $quantity;
    private ECart $cart;
    private ESeller $seller;
    private int $id;


    public function __construct(EArticleDescription $article, int $quantity, ECart $cart, ESeller $seller)
    {
        $this->article = $article;
        $this->quantity = $quantity;
        $this->cart = $cart;
        $this->seller = $seller;
    }
    

    public function getArticle(): EArticleDescription
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
    public function getSeller(): ESeller
    {
        return $this->seller;
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
    public function setSeller(ESeller $seller): void
    {
        $this->seller = $seller;
    }
    public function setArticle(EArticleDescription $article): void
    {
        $this->article = $article;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}