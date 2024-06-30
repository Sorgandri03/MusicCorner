<?php

/**
 * Represents an order in the MusicCorner application.
 */
class EOrder {
    private int $id;
    private string $customer;
    private DateTime $orderDateTime;
    private float $price;
    private int $payment;
    private int $shippingAddress;
    private array $orderItems = array();

    /**
     * Constructs a new EOrder object.
     *
     * @param string $customer The name of the customer placing the order.
     * @param int $shippingAddress The ID of the shipping address for the order.
     * @param int $payment The ID of the payment method used for the order.
     * @param float $price The total price of the order.
     */
    public function __construct(string $customer, int $shippingAddress, int $payment, float $price) {
        $this->customer = $customer;
        $this->shippingAddress = $shippingAddress;
        $this->payment = $payment;
        $this->price = $price;
        $this->orderDateTime = new DateTime();
    }

    /**
     * Gets the ID of the order.
     *
     * @return int The ID of the order.
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Gets the date and time when the order was placed.
     *
     * @return string The order date and time in the format 'Y-m-d H:i:s'.
     */
    public function getOrderDateTime(): string {
        return $this->orderDateTime->format('Y-m-d H:i:s');
    }

    /**
     * Gets the ID of the shipping address for the order.
     *
     * @return int The ID of the shipping address.
     */
    public function getShippingAddress(): int {
        return $this->shippingAddress;
    }

    /**
     * Gets the ID of the payment method used for the order.
     *
     * @return int The ID of the payment method.
     */
    public function getPayment(): int {
        return $this->payment;
    }

    /**
     * Gets the total price of the order.
     *
     * @return float The total price of the order.
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * Gets the array of order items included in the order.
     *
     * @return array The array of order items.
     */
    public function getOrderItems(): array {
        return $this->orderItems;
    }

    /**
     * Gets the name of the customer placing the order.
     *
     * @return string The name of the customer.
     */
    public function getCustomer(): string {
        return $this->customer;
    }

    /**
     * Sets the name of the customer placing the order.
     *
     * @param string $customer The name of the customer.
     */
    public function setCustomer(string $customer): void {
        $this->customer = $customer;
    }

    /**
     * Sets the ID of the order.
     *
     * @param int $id The ID of the order.
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * Sets the date and time when the order was placed.
     *
     * @param DateTime $orderDateTime The order date and time.
     */
    public function setOrderDateTime(DateTime $orderDateTime): void {
        $this->orderDateTime = $orderDateTime;
    }

    /**
     * Sets the ID of the shipping address for the order.
     *
     * @param int $shippingAddress The ID of the shipping address.
     */
    public function setShippingAddress(int $shippingAddress): void {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * Sets the ID of the payment method used for the order.
     *
     * @param int $payment The ID of the payment method.
     */
    public function setPayment(int $payment): void {
        $this->payment = $payment;
    }

    /**
     * Sets the total price of the order.
     *
     * @param float $price The total price of the order.
     */
    public function setPrice(float $price): void {
        $this->price = $price;
    }

    /**
     * Sets the array of order items included in the order.
     *
     * @param array $orderItems The array of order items.
     */
    public function setOrderItems(array $orderItems): void {
        $this->orderItems = $orderItems;
    }
}