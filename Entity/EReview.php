<?php

/**
 * Class EReview represents a review entity.
 */
class EReview {
   
    private string $article;
    private string $customer;
    private string $seller;
    private int $id;
    private string $reviewText;
    private int $articleRating;
    private int $sellerRating;
    private int $orderItemID;
    private bool $answered = false;

    /**
     * EReview constructor.
     *
     * @param string $customer The customer who wrote the review.
     * @param string $reviewText The text of the review.
     * @param int $articleRating The rating given to the article.
     * @param int $sellerRating The rating given to the seller.
     * @param string $article The article being reviewed.
     * @param string $seller The seller being reviewed.
     * @param int $orderItemID The ID of the order item associated with the review.
     */
    public function __construct(string $customer, string $reviewText, int $articleRating, int $sellerRating, string $article, string $seller, int $orderItemID) {
        $this->article = $article;
        $this->customer = $customer;
        $this->seller = $seller;
        $this->reviewText = $reviewText;
        $this->articleRating = $articleRating;
        $this->sellerRating = $sellerRating;
        $this->orderItemID = $orderItemID;
    }

    /**
     * Get the article being reviewed.
     *
     * @return string The article being reviewed.
     */
    public function getArticle(): string {
        return $this->article;
    }

    /**
     * Set the article being reviewed.
     *
     * @param string $article The article being reviewed.
     */
    public function setArticle(string $article): void {
        $this->article = $article;
    }

    /**
     * Get the customer who wrote the review.
     *
     * @return string The customer who wrote the review.
     */
    public function getCustomer(): string {
        return $this->customer;
    }

    /**
     * Set the customer who wrote the review.
     *
     * @param string $customer The customer who wrote the review.
     */
    public function setCustomer(string $customer): void {
        $this->customer = $customer;
    }

    /**
     * Get the seller being reviewed.
     *
     * @return string The seller being reviewed.
     */
    public function getSeller(): string {
        return $this->seller;
    }

    /**
     * Set the seller being reviewed.
     *
     * @param string $seller The seller being reviewed.
     */
    public function setSeller(string $seller): void {
        $this->seller = $seller;
    }

    /**
     * Get the ID of the review.
     *
     * @return int The ID of the review.
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Set the ID of the review.
     *
     * @param int $id The ID of the review.
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * Get the text of the review.
     *
     * @return string The text of the review.
     */
    public function getReviewText(): string {
        return $this->reviewText;
    }

    /**
     * Set the text of the review.
     *
     * @param string $reviewText The text of the review.
     */
    public function setReviewText(string $reviewText): void {
        $this->reviewText = $reviewText;
    }

    /**
     * Get the rating given to the article.
     *
     * @return int The rating given to the article.
     */
    public function getArticleRating(): int {
        return $this->articleRating;
    }

    /**
     * Set the rating given to the article.
     *
     * @param int $articleRating The rating given to the article.
     */
    public function setArticleRating(int $articleRating): void {
        $this->articleRating = $articleRating;
    }

    /**
     * Get the rating given to the seller.
     *
     * @return int The rating given to the seller.
     */
    public function getSellerRating(): int {
        return $this->sellerRating;
    }

    /**
     * Set the rating given to the seller.
     *
     * @param int $sellerRating The rating given to the seller.
     */
    public function setSellerRating(int $sellerRating): void {
        $this->sellerRating = $sellerRating;
    }

    /**
     * Get the ID of the order item associated with the review.
     *
     * @return int The ID of the order item associated with the review.
     */
    public function getOrderItemID(): int {
        return $this->orderItemID;
    }

    /**
     * Set the ID of the order item associated with the review.
     *
     * @param int $orderItemID The ID of the order item associated with the review.
     */
    public function setOrderItemID(int $orderItemID): void {
        $this->orderItemID = $orderItemID;
    }

    /**
     * Check if the review has been answered.
     *
     * @return bool True if the review has been answered, false otherwise.
     */
    public function isAnswered(): bool {
        return $this->answered;
    }

    /**
     * Set if the review has been answered.
     *
     * @param bool $answered True if the review has been answered, false otherwise.
     */
    public function setAnswered(bool $answered): void {
        $this->answered = $answered;
    }
}