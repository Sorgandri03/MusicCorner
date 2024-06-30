<?php
/**
 * The EAddress class represents the address of a customer in the MusicCorner application.
 */

class EAddress {
    private string $street;
    private string $city;
    private string $cap;
    private string $name;
    private string $customer = "";
    private int $id;

    /**
     * Create a new address
     * @param string $street the street of the address
     * @param string $city the city of the address
     * @param string $cap the cap of the address
     * @param string $name the name of the owner of the address
     * @param string $customer the customer that owns the address, it is populated only if the customer wants to save the address
     */
    public function __construct(string $street, string $city, string $cap, string $name, string $customer) {
        $this->street = $street;
        $this->city = $city;
        $this->cap = $cap;        
        $this->name = $name;
        $this->customer = $customer;
    }

    /**
     * Get the id of the address
     * @return int the id of the address
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Set the id of the address
     * @param int $id the id of the address
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * Get the street of the address
     * @return string the street of the address
     */
    public function getStreet(): string {
        return $this->street;
    }

    /**
     * Get the city of the address
     * @return string the city of the address
     */
    public function getCity(): string {
        return $this->city;
    }
    
    /**
     * Get the cap of the address
     * @return string the cap of the address
     */
    public function getCap(): string {
        return $this->cap;
    }

    /**
     * Get the name of the owner of the address
     * @return string the name of the owner of the address
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get the customer that owns the address
     * @return string the customer that owns the address
     */
    public function getCustomer(): string {
        return $this->customer;
    }
}
    