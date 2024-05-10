<?php

class ECart {
    private string $id;
    private array $articles = array();
    private ECustomer $customer;
    public function __construct(ECustomer $customer) {
        $this->customer = $customer;
    }
    public function setId(string $id): void {
        $this->id = $id;
    }
    public function getId(): string {
        return $this->id;
    }
    public function getArticles(): array {
        return $this->articles;
    }
    public function getCustomer(): ECustomer {
        return $this->customer;
    }

    public function addArticle(ECartItem $article): void {
        $this->articles[] = $article;
    }
    public function addArticles(array $articles): void {
        $this->articles = $articles;
    }
   
}