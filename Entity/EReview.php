<?php

class EReview {
    private EArticleDescription $article;
    private ECustomer $customer;
    private ESeller $seller;
    private ECreditCard $payment;
    private string $reviewText;
    private int $articleRating;
    private int $sellerRating;

    public function __construct(EArticleDescription $article, ECustomer $customer, ESeller $seller, ECreditCard $payment, string $reviewText, int $articleRating, int $sellerRating ) {
    $this->article = $article;
    $this->customer = $customer;
    $this->seller = $seller;
    $this->payment = $payment;
    $this->reviewText = $reviewText;
    $this->articleRating = $articleRating;
    $this->sellerRating = $sellerRating;
    }

    public function getArticle(): EArticleDescription {
        return $this->article;
    }

    public function setArticle(EArticleDescription $article): void {
        $this->article = $article;
    }

    public function getCustomer(): ECustomer {
        return $this->customer;
    }

    public function setCustomer(ECustomer $customer): void {
        $this->customer = $customer;
    }

    public function getSeller(): ESeller {
        return $this->seller;
    }
    public function setSeller(ESeller $seller): void {
        $this->seller = $seller;
    }

    public function getPayment(): ECreditCard {
        return $this->payment;
    }

    public function setPayment(ECreditCard $payment): void {
        $this->payment = $payment;
    }

    public function getReviewText(): string {
        return $this->reviewText;
    }

    public function setReviewText(string $reviewText): void {
        $this->reviewText = $reviewText;
    }

    public function getArticleRating(): int {
        return $this->articleRating;
    }

    public function setArticleRating(int $articleRating): void {
        $this->articleRating = $articleRating;
    }

    public function getSellerRating(): int {
        return $this->sellerRating;
    }
    
    public function setSellerRating(int $sellerRating): void {
        $this->sellerRating = $sellerRating;
    }
}