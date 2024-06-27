<?php

class EAdmin extends EUser {
    private $sentMessages = array();
    private $receivedMessages = array();

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