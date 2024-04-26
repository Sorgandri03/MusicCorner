<?php


class ECustomer extends EUser {
    private String $username;

    private String $customerId;
    
    private int $suspensionTime;

    private array $addresses;
    
    private array $creditCards = array();
    
    private function addCreditCard() {
        $creditCards[] = new ECreditCard();
    }

}