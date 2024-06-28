<?php

class EOrder {
    private int $id;
    private string $customer;
    private DateTime $orderDateTime;
    private float $price;
    private int $payment;
    private int $shippingAddress;
    private array $orderItems = array();

    public function __construct(string $customer, int $shippingAddress, int $payment, float $price) {
        $this->customer = $customer;
        $this->shippingAddress = $shippingAddress;
        $this->payment = $payment;
        $this->price = $price;
        $this->orderDateTime = new DateTime();
    }

    public function getId(): int {
        return $this->id;
    }
    public function getOrderDateTime(): string {
        return $this->orderDateTime->format('Y-m-d H:i:s');
    }
    public function getShippingAddress(): int {
        return $this->shippingAddress;
    }
    public function getPayment(): int {
        return $this->payment;
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function getOrderItems(): array {
        return $this->orderItems;
    }
    public function getCustomer(): string {
        return $this->customer;
    }
    public function setCustomer(string $customer): void {
        $this->customer = $customer;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function setOrderDateTime(DateTime $orderDateTime): void {
        $this->orderDateTime = $orderDateTime;
    }
    public function setShippingAddress(int $shippingAddress): void {
        $this->shippingAddress = $shippingAddress;
    }
    public function setPayment(int $payment): void {
        $this->payment = $payment;
    }
    public function setPrice(float $price): void {
        $this->price = $price;
    }
    public function setOrderItems(array $orderItems): void {
        $this->orderItems = $orderItems;
    }
}