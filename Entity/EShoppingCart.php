use EArticleDescription;
<?php
namespace Entity;
class EShoppingCart {
    private string $id;
    private array $articles;
    private ECustomer $customer;
    public function __construct(string $id, array $articles, ECustomer $customer) {
        $this->id = $id;
        $this->articles = $articles;
        $this->customer = $customer;
    }
   
}