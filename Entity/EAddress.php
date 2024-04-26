<?php

class EAddress {
    private string $street;
    private string $city;
    private int $cap;
    private string $receiver_name;

    public function __construct(string $street, string $city, int $cap, string $receiver_name) {
        $this->street = $street;
        $this->city = $city;
        $this->cap = $cap;
        $this->receiver_name = $receiver_name;
    }
    public function getStreet(): string {
        return $this->street;
    }
    public function getCity(): string {
        return $this->city;
    }
    public function getCap(): int {
        return $this->cap;
    }
    public function getReceiverName(): string {
        return $this->receiver_name;
    }
    public function setStreet(string $street): void {
        $this->street = $street;
    }
    public function setCity(string $city): void {
        $this->city = $city;
    }
    public function setCap(int $cap): void {
        $this->cap = $cap;
    }
    public function setReceiverName(string $receiver_name): void {
        $this->receiver_name = $receiver_name;
    }
}
    