<?php


class ECreditCard {
    private int $id;
    private string $number;
    private string $expiration_date;
    private string $cvv;
    private string $owner;
    private string $customerId;
    private int $billing_address;

    public function __construct(string $number, string $expiration_date, string $cvv, string $owner, string $customerId, int $billing_address) {
        $this->number = $number;
        $this->expiration_date = $expiration_date;
        $this->cvv = $cvv;
        $this->owner = $owner;
        $this->customerId = $customerId;
        $this->billing_address = $billing_address;
    }
    public function getId(): int {
        return $this->id;
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
    public function getOwner(): string {
        return $this->owner;
    }
    public function getCustomerId(): string {
        return $this->customerId;
    }
    public function getBillingAddress(): int {
        return $this->billing_address;
    }
    public function setId(int $id): void {
        $this->id = $id;
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
    public function setOwner(string $owner): void {
        $this->owner = $owner;
    }
    public function setCustomerId(string $customerId): void {
        $this->customerId = $customerId;
    }
    public function setBillingAddress(int $billing_address): void {
        $this->billing_address = $billing_address;
    }
}