<?php

class ECustomer extends EUser {
    private $username;
    
    private int $suspensionTime=0;

    private array $addresses = array();
    
    private array $creditCards = array();

    private array $orders = array();
    
    public function addCreditCard(string $number, string $expiration_date, string $cvv, EAddress $billing_address) {
        $this->creditCards[] = new ECreditCard( $number,  $expiration_date,  $cvv,  $this,  $billing_address);
    }

    public function addAddress(string $street, string $city, int $cap, string $receiver_name) {
        $this->addresses[] = new EAddress($street, $city, $cap, $receiver_name);
    }
    public function addOrder(DateTime $orderDate, EAddress $shippingAddress, ECreditCard $payment, string $status, string $price, ECart $cart) {
        $this->orders[] = new EOrder($this, $shippingAddress, $payment, $price, $cart);
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