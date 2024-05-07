<?php


class CartItem
{
    private EArticleDescription $article;
    private int $quantity;
    private EShoppingCart $cartID;
    private ESeller $seller;


    public function __construct(EArticleDescription $article, int $quantity, EShoppingCart $cartID, ESeller $seller)
    {
        $this->article = $article;
        $this->quantity = $quantity;
        $this->cartID = $cartID;
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
    public function getCartID(): EShoppingCart
    {
        return $this->cartID;
    }
    public function getSeller(): ESeller
    {
        return $this->seller;
    }
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
    public function setCartID(EShoppingCart $cartID): void
    {
        $this->cartID = $cartID;
    }
    public function setSeller(ESeller $seller): void
    {
        $this->seller = $seller;
    }
    public function setArticle(EArticleDescription $article): void
    {
        $this->article = $article;
    }
}