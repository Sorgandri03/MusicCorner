<?php

class EReview {
    private string $article;
    private string $customer;
    private string $seller;
    private int $id;
    private string $reviewText;
    private int $articleRating;
    private int $sellerRating;

    public function __construct(string $article, string $customer, string $seller, string $reviewText, int $articleRating, int $sellerRating) {
    $this->article = $article;
    $this->customer = $customer;
    $this->seller = $seller;
    $this->reviewText = $reviewText;
    $this->articleRating = $articleRating;
    $this->sellerRating = $sellerRating;
    }

    public function getArticle(): string {
        return $this->article;
    }

    public function setArticle(string $article): void {
        $this->article = $article;
    }

    public function getCustomer(): string {
        return $this->customer;
    }

    public function setCustomer(string $customer): void {
        $this->customer = $customer;
    }

    public function getSeller(): string {
        return $this->seller;
    }
    public function setSeller(string $seller): void {
        $this->seller = $seller;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
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