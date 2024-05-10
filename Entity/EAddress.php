<?php


class EAddress {
    private string $street;
    private string $city;
    private string $cap;
    private string $name;
    private ECustomer $customer;
    private int $id;

    public function __construct(string $street, string $city, string $cap, string $name, ECustomer $customer) {
        $this->street = $street;
        $this->city = $city;
        $this->cap = $cap;        
        $this->name = $name;
        $this->customer = $customer;
    }
    public function getCustomer(): ECustomer {
        return $this->customer;
    }
    public function getStreet(): string {
        return $this->street;
    }
    public function getCity(): string {
        return $this->city;
    }
    public function getCap(): string {
        return $this->cap;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getId(): int {
        return $this->id;
    }
    public function setStreet(string $street): void {
        $this->street = $street;
    }
    public function setCity(string $city): void {
        $this->city = $city;
    }
    public function setCap(string $cap): void {
        $this->cap = $cap;
    }
    public function setName(string $name): void {
        $this->name = $name;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function setCustomer(ECustomer $customer): void {
        $this->customer = $customer;
    }
}
    