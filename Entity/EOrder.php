<?php

class EOrder {
    private int $id;
    private string $customer;
    private DateTime $orderDateTime;
    private int $status=0;
    private float $price;
    private int $payment;
    private int $shippingAddress;
    private int $cart;

    public function __construct(string $customer, int $shippingAddress, int $payment, float $price, int $cart) {
        $this->customer = $customer;
        $this->shippingAddress = $shippingAddress;
        $this->payment = $payment;
        $this->cart = $cart;
        $this->price = $price;
        $this->orderDateTime = new DateTime();
    }
    public function getId(): int {
        return $this->id;
    }
    public function getOrderDateTime(): DateTime {
        return $this->orderDateTime;
    }
    public function getShippingAddress(): int {
        return $this->shippingAddress;
    }
    public function getPayment(): int {
        return $this->payment;
    }
    public function getStatus(): string {
        return Status[$this->status];
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function getCart(): int {
        return $this->cart;
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
    public function setStatus(int $status): void {
        $this->status = $status;
    }
    public function setPrice(float $price): void {
        $this->price = $price;
    }
    public function setCart(int $cart): void {
        $this->cart = $cart;
    }
}