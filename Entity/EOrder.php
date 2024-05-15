<?php

class EOrder {
    private int $id;
    private ECustomer $customer;
    private DateTime $orderDateTime;
    private int $status=0;
    private float $price;
    private ECreditCard $payment;
    private EAddress $shippingAddress;
    private $cart;

    public function __construct(ECustomer $customer, EAddress $shippingAddress, ECreditCard $payment, float $price, ECart $cart) {
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
    public function getShippingAddress(): EAddress {
        return $this->shippingAddress;
    }
    public function getPayment(): ECreditCard {
        return $this->payment;
    }
    public function getStatus(): string {
        return Status[$this->status];
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function getCart(): ECart {
        return $this->cart;
    }
    public function getCustomer(): ECustomer {
        return $this->customer;
    }
    public function setCustomer(ECustomer $customer): void {
        $this->customer = $customer;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function setOrderDateTime(DateTime $orderDateTime): void {
        $this->orderDateTime = $orderDateTime;
    }
    public function setShippingAddress(EAddress $shippingAddress): void {
        $this->shippingAddress = $shippingAddress;
    }
    public function setPayment(ECreditCard $payment): void {
        $this->payment = $payment;
    }
    public function setStatus(int $status): void {
        $this->status = $status;
    }
    public function setPrice(float $price): void {
        $this->price = $price;
    }
    public function setCart(ECart $cart): void {
        $this->cart = $cart;
    }
}