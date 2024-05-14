<?php

class EAdmin extends EUser {
    public function __construct(string $email, string $password) {
        parent::__construct($email, $password);
    }
    public function getId(): string {
        return parent::getId();
    }
    public function setId(string $id) :void{
        parent::setId($id);
    }
}