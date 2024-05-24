<?php

class ECustomer extends EUser {
    private $username;
    private array $addresses = array();
    private array $creditCards = array();
    private array $orders = array();
    private DateTime $suspensionTime;


    public function __construct(string $username, string $email, string $password) {
        $this->username = $username;
        parent::__construct($email, $password);
        $this->suspensionTime = new DateTime();
    }

    public function setCreditCards(array $creditCards): void {
        $this->creditCards = $creditCards;
    }
    public function getCreditCards(): array {
        return $this->creditCards;
    }

    public function setAddresses(array $addresses): void {
        $this->addresses = $addresses;
    }
    public function getAddresses(): array {
        return $this->addresses;
    }

    public function setOrders(array $orders): void {
        $this->orders = $orders;
    }

    public function getOrders(): array {
        return $this->orders;
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
    public function setId(string $id): void {
        parent::setId($id);
    }
    public function getSuspensionTime(): DateTime {
        return $this->suspensionTime;
    }
    public function setSuspensionTime(int $days): void {
        $this->suspensionTime = new DateTime();
        date_add($this->suspensionTime, date_interval_create_from_date_string($days . ' days'));
    }    

}