<?php

class ECustomer extends EUser {
    private $username;
    private int $suspensionTime=0;
     
    //metodo per il ban

    public function __construct(string $username, string $email, string $password) {
        $this->username = $username;
        parent::__construct($email, $password);
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }
    public function getId(): string {
        return parent::getId();
    }

}