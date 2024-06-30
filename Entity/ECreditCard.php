<?php


/**
 * Represents a credit card entity.
 *
 * This class encapsulates the properties and methods related to a credit card.
 * It provides getters and setters for accessing and modifying the credit card details.
 */
class ECreditCard {

    private int $id;
    private string $number;
    private string $expiration_date;
    private string $cvv;
    private string $owner;
    private string $customerId;
    private int $billing_address;

    /**
     * Creates a new instance of the ECreditCard class.
     *
     * @param string $number The number of the credit card.
     * @param string $expiration_date The expiration date of the credit card.
     * @param string $cvv The CVV (Card Verification Value) of the credit card.
     * @param string $owner The owner of the credit card.
     * @param string $customerId The customer ID associated with the credit card.
     * @param int $billing_address The ID of the billing address associated with the credit card.
     */
    public function __construct(string $number, string $expiration_date, string $cvv, string $owner, string $customerId, int $billing_address) {
        $this->number = $number;
        $this->expiration_date = $expiration_date;
        $this->cvv = $cvv;
        $this->owner = $owner;
        $this->customerId = $customerId;
        $this->billing_address = $billing_address;
    }

    /**
     * Gets the ID of the credit card.
     *
     * @return int The ID of the credit card.
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Gets the number of the credit card.
     *
     * @return string The number of the credit card.
     */
    public function getNumber(): string {
        return $this->number;
    }

    /**
     * Gets the expiration date of the credit card.
     *
     * @return string The expiration date of the credit card.
     */
    public function getExpirationDate(): string {
        return $this->expiration_date;
    }

    /**
     * Gets the CVV (Card Verification Value) of the credit card.
     *
     * @return string The CVV of the credit card.
     */
    public function getCvv(): string {
        return $this->cvv;
    }

    /**
     * Gets the owner of the credit card.
     *
     * @return string The owner of the credit card.
     */
    public function getOwner(): string {
        return $this->owner;
    }

    /**
     * Gets the customer ID associated with the credit card.
     *
     * @return string The customer ID associated with the credit card.
     */
    public function getCustomerId(): string {
        return $this->customerId;
    }

    /**
     * Gets the billing address associated with the credit card.
     *
     * @return int The ID of the billing address associated with the credit card.
     */
    public function getBillingAddress(): int {
        return $this->billing_address;
    }

    /**
     * Sets the ID of the credit card.
     *
     * @param int $id The ID of the credit card.
     * @return void
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * Sets the number of the credit card.
     *
     * @param string $number The number of the credit card.
     * @return void
     */
    public function setNumber(string $number): void {
        $this->number = $number;
    }

    /**
     * Sets the expiration date of the credit card.
     *
     * @param string $expiration_date The expiration date of the credit card.
     * @return void
     */
    public function setExpirationDate(string $expiration_date): void {
        $this->expiration_date = $expiration_date;
    }

    /**
     * Sets the CVV (Card Verification Value) of the credit card.
     *
     * @param string $cvv The CVV of the credit card.
     * @return void
     */
    public function setCvv(string $cvv): void {
        $this->cvv = $cvv;
    }

    /**
     * Sets the owner of the credit card.
     *
     * @param string $owner The owner of the credit card.
     * @return void
     */
    public function setOwner(string $owner): void {
        $this->owner = $owner;
    }

    /**
     * Sets the customer ID associated with the credit card.
     *
     * @param string $customerId The customer ID associated with the credit card.
     * @return void
     */
    public function setCustomerId(string $customerId): void {
        $this->customerId = $customerId;
    }

    /**
     * Sets the billing address associated with the credit card.
     *
     * @param int $billing_address the billing address associated with the credit card.
     * @return void
     */
    public function setBillingAddress(int $billing_address): void {
        $this->billing_address = $billing_address;
    }
}