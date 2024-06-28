<?php

class EAdmin extends EUser {
    private $reviews = array();
    public function __construct(string $email, string $password) {
        parent::__construct($email, $password);
    }
    public function getId(): string {
        return parent::getId();
    }
    public function setId(string $id) :void{
        parent::setId($id);
    }
    public function getReviews(): array {
        return $this->reviews;
    }

    public function setReviews(array $reviews) {
        $this->reviews = $reviews;
    }
    
}