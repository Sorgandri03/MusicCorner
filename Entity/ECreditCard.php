<?php


class ECreditCard {
    private string $number;
    private string $expiration_date;
    private int $cvv;
    private ECustomer $owner;
    private string $billing_address;

    public function __construct(string $number, string $expiration_date, int $cvv, ECustomer $owner, string $billing_address) {
        $this->number = $number;
        $this->expiration_date = $expiration_date;
        $this->cvv = $cvv;
        $this->owner = $owner;
        $this->billing_address = $billing_address;
    }
    public function getNumber(): string {
        return $this->number;
    }
    public function getExpirationDate(): string {
        return $this->expiration_date;
    }
    public function getCvv(): int {
        return $this->cvv;
    }
    public function getOwnerName(): ECustomer {
        return $this->owner;
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
    public function setCvv(int $cvv): void {
        $this->cvv = $cvv;
    }
    public function setOwnerName(ECustomer $owner): void {
        $this->owner = $owner;
    }
    public function setBillingAddress(string $billing_address): void {
        $this->billing_address = $billing_address;
    }
}