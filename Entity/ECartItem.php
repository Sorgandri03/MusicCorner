<?php

namespace Entity;

class CartItem
{
    private EArticleDescription $article;
    private int $quantity;
    private EShoppingCart $cartID;
    private ESeller $sellerID;


    public function __construct(EArticleDescription $article, int $quantity, EShoppingCart $cartID, ESeller $sellerID)
    {
        $this->article = $article;
        $this->quantity = $quantity;
        $this->cartID = $cartID;
        $this->sellerID = $sellerID;
    }
    

    public function getArticle(): EArticleDescription
    {
        return $this->article;
    }
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    public function getCartID(): EShoppingCart
    {
        return $this->cartID;
    }
    public function getSellerID(): ESeller
    {
        return $this->sellerID;
    }
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
    public function setCartID(EShoppingCart $cartID): void
    {
        $this->cartID = $cartID;
    }
    public function setSellerID(ESeller $sellerID): void
    {
        $this->sellerID = $sellerID;
    }
    public function setArticle(EArticleDescription $article): void
    {
        $this->article = $article;
    }
}