<?php
enum Status {
    case Received;
    case Processing;
    case Shipped;
    case InDelivery;
    case Delivered;
}

class EOrder {
    private int $id;
    private ECustomer $customer;
    private DateTime $orderDateTime;
    private Status $status;
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
    public function getCustomer(): ECustomer {
        return $this->customer;
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
        switch ($this->status) {
            case Status::Received:
                return "Received";
            case Status::Processing:
                return "Processing";
            case Status::Shipped:
                return "Shipped";
            case Status::InDelivery:
                return "InDelivery";
            case Status::Delivered:
                return "Delivered";
            default:
                return ""; // Add a default case to handle unknown formats
        }
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function getCart(): ECart {
        return $this->cart;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function setCustomer(ECustomer $customer): void {
        $this->customer = $customer;
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
    public function setStatus(Status $status): void {
        $this->status = $status;
    }
    public function setPrice(float $price): void {
        $this->price = $price;
    }
    public function setCart(ECart $cart): void {
        $this->cart = $cart;
    }
    



}