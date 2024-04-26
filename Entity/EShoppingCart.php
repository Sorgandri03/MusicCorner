<?php
namespace Entity;
class EShoppingCart {
    private string $id;
    private array $articles = array();
    private ECustomer $customer;
    public function __construct(string $id, ECustomer $customer) {
        $this->id = $id;
        $this->customer = $customer;
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

    public function addArticle(EArticleDescription $article): void {
        $this->articles[] = $article;
    }
   
}