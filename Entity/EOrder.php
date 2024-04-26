<?php

class EOrder {
    private string $id;
    private ECustomer $customer;
    private DateTime $orderDate;
    private EAddress $shippingAddress;
    private ECreditCard $payment;
    private string $status;
    private string $price;
    private $cart;

    public function __construct(string $id, ECustomer $customer, DateTime $orderDate, EAddress $shippingAddress, ECreditCard $payment, string $status, string $price, EShoppingCart $cart) {
        $this->id = $id;
        $this->customer = $customer;
        $this->orderDate = $orderDate;
        $this->shippingAddress = $shippingAddress;
        $this->payment = $payment;
        $this->status = $status;
        $this->cart = $cart;
        
        
        
        $this->price = $price;
    }
    public function getId(): string {
        return $this->id;
    }
    public function getCustomer(): ECustomer {
        return $this->customer;
    }
    public function getOrderDate(): DateTime {
        return $this->orderDate;
    }
    public function getShippingAddress(): EAddress {
        return $this->shippingAddress;
    }
    public function getPayment(): ECreditCard {
        return $this->payment;
    }
    public function getStatus(): string {
        return $this->status;
    }
    public function getPrice(): string {
        return $this->price;
    }
    public function getCart(): EShoppingCart {
        return $this->cart;
    }
    public function setId(string $id): void {
        $this->id = $id;
    }
    public function setCustomer(ECustomer $customer): void {
        $this->customer = $customer;
    }
    public function setOrderDate(DateTime $orderDate): void {
        $this->orderDate = $orderDate;
    }
    public function setShippingAddress(EAddress $shippingAddress): void {
        $this->shippingAddress = $shippingAddress;
    }
    public function setPayment(ECreditCard $payment): void {
        $this->payment = $payment;
    }
    public function setStatus(string $status): void {
        $this->status = $status;
    }
    public function setPrice(string $price): void {
        $this->price = $price;
    }
    public function setCart(EShoppingCart $cart): void {
        $this->cart = $cart;
    }
    



}