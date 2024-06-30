<?php

/**
 * The ECart class represents a shopping cart for a customer in the MusicCorner application.
 */
class ECart {
    private array $cartItems = array(); // Array to store the cart items
    private string $customer; // The customer's name

    /**
     * Constructs a new ECart object with the specified customer name.
     *
     * @param string $customer The name of the customer
     */
    public function __construct(string $customer) {
        $this->customer = $customer;
    }

    /**
     * Returns the array of cart items.
     *
     * @return array The array of cart items
     */
    public function getCartItems(): array {
        return $this->cartItems;
    }

    /**
     * Returns the name of the customer.
     *
     * @return string The name of the customer
     */
    public function getCustomer(): string {
        return $this->customer;
    }

    /**
     * Sets the name of the customer.
     *
     * @param string $customer The name of the customer
     * @return void
     */
    public function setCustomer(string $customer): void {
        $this->customer = $customer;
    }

    /**
     * Adds an article to the cart with the specified stock ID and quantity.
     * If the article already exists in the cart, the quantity is updated.
     *
     * @param int $stockId The stock ID of the article
     * @param int $quantity The quantity of the article
     * @return void
     */
    public function addArticle(int $stockId, int $quantity): void {
        if(count($this->cartItems) != 0){
            foreach($this->cartItems as $article => $amount){
                if($article == $stockId){
                    $this->cartItems[$stockId] = $amount + $quantity;
                    break;
                }
                else {
                    $this->cartItems[$stockId] = $quantity;
                }
            }
        }
        else{
            $this->cartItems[$stockId] = $quantity;
        }
    }

    /**
     * Removes the article with the specified stock ID from the cart.
     *
     * @param int $stockId The stock ID of the article to remove
     * @return void
     */
    public function removeArticle(int $stockId): void {
        unset($this->cartItems[$stockId]);
    }

    /**
     * Updates the quantity of the article with the specified stock ID in the cart.
     * If the quantity is 0, the article is removed from the cart.
     *
     * @param int $stockId The stock ID of the article to update
     * @param int $quantity The new quantity of the article
     * @return void
     */
    public function updateArticle(int $stockId, int $quantity): void {
        if($quantity == 0){
            $this->removeArticle($stockId);
        }
        else{
            $this->cartItems[$stockId] = $quantity;
        }
    }

    /**
     * Clears the cart by removing all items.
     *
     * @return void
     */
    public function clearCart(): void {
        $this->cartItems = array();
    }

    /**
     * Calculates and returns the total price of all items in the cart.
     *
     * @return float The total price of all items in the cart
     */
    public function getTotalPrice(): float {
        $price = 0;
        foreach ($this->cartItems as $item => $quantity) {
            $stock = FPersistentManager::getInstance()->retrieveObj(EStock::class, $item);
            $price += $stock->getPrice() * $quantity;
        }
        return $price;
    }

    /**
     * Calculates and returns the total quantity of all items in the cart.
     *
     * @return int The total quantity of all items in the cart
     */
    public function getCartQuantity(): int {
        $total = 0;
        foreach ($this->cartItems as $item => $quantity) {
            $total += $quantity;
        }
        return $total;
    }
}