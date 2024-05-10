<?php

class ECustomer extends EUser {
    private $username;
    private int $suspensionTime=0;

    private array $addresses = array();
    
    private array $creditCards = array();

    private array $orders = array();
    
    public function addCreditCard(ECreditCard $creditCard) {
        $this->creditCards[] = $creditCard;
    }

    public function addAddress(EAddress $address) {
        $this->addresses[] = $address;
    }
    public function addOrder(EOrder $order) {
        $this->orders[] = $order;
    }
     
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

    public function setCreditCards(array $creditCards): void {
        $this->creditCards = $creditCards;
    }

}