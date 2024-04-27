<?php
namespace Entity;

class ECustomer extends EUser {
    private  $username;

    private String $customerId;
    
    private int $suspensionTime=0;

    private array $addresses = array();
    
    private array $creditCards = array();

    private array $orders = array();
    
    public function addCreditCard(string $number, string $expiration_date, string $cvv, string $owner_name, string $billing_address) {
        $creditCards[] = new ECreditCard( $number,  $expiration_date,  $cvv,  $owner_name,  $billing_address);
    }

    public function addAddress(string $street, string $city, int $cap, string $receiver_name) {
        $creditCards[] = new EAddress( $street,  $city,  $cap,  $receiver_name);
    }
    public function addOrder(string $id, ECustomer $customer, \DateTime $orderDate, EAddress $shippingAddress, ECreditCard $payment, string $status, string $price, EShoppingCart $cart) {
        $orders[] = new EOrder( $id,  $customer,  $orderDate,  $shippingAddress,  $payment,  $status,  $price,  $cart);
    }
     
    //metodo per il ban

    public function __construct(string $username, string $customerId) {
        $this->username = $username;
        $this->customerId = $customerId;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getCustomerId(): string {
        return $this->customerId;
    }

    public function setCustomerId(string $customerId): void {
        $this->customerId = $customerId;
    }


}