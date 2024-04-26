<?php

class ECreditCard {
    private string $number;
    private string $expiration_date;
    private string $cvv;
    private string $owner_name;
    private string $billing_address;

    public function __construct(string $number, string $expiration_date, string $cvv, string $owner_name, string $billing_address) {
        $this->number = $number;
        $this->expiration_date = $expiration_date;
        $this->cvv = $cvv;
        $this->owner_name = $owner_name;
        $this->billing_address = $billing_address;
    }
    public function getNumber(): string {
        return $this->number;
    }
    public function getExpirationDate(): string {
        return $this->expiration_date;
    }
    public function getCvv(): string {
        return $this->cvv;
    }
    public function getOwnerName(): string {
        return $this->owner_name;
    }
    public function getBillingAddress(): string {
        return $this->billing_address;
    }
    public function setNumber(string $number): void {
        $this->number = $number;
    }
    public function setExpirationDate(string $expiration_date): void {
        $this->expiration_date = $expiration_date;
    }
    public function setCvv(string $cvv): void {
        $this->cvv = $cvv;
    }
    public function setOwnerName(string $owner_name): void {
        $this->owner_name = $owner_name;
    }
    public function setBillingAddress(string $billing_address): void {
        $this->billing_address = $billing_address;
    }
}