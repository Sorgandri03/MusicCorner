<?php


    /**
     * Class ECustomer
     * Represents a customer entity in the MusicCorner application.
     */
class ECustomer extends EUser {
    
        private $username;
        private array $addresses = array();
        private array $creditCards = array();
        private array $orders = array();
        private $reviews = array();
        private DateTime $suspensionTime;

        /**
         * ECustomer constructor.
         * @param string $username The username of the customer.
         * @param string $email The email address of the customer.
         * @param string $password The password of the customer.
         */
        public function __construct(string $username, string $email, string $password) {
            $this->username = $username;
            parent::__construct($email, $password);
            $this->suspensionTime = new DateTime();
        }

        /**
         * Sets the credit cards associated with the customer.
         * @param array $creditCards An array of credit cards.
         */
        public function setCreditCards(array $creditCards): void {
            $this->creditCards = $creditCards;
        }

        /**
         * Gets the credit cards associated with the customer.
         * @return array An array of credit cards.
         */
        public function getCreditCards(): array {
            return $this->creditCards;
        }

        /**
         * Sets the addresses associated with the customer.
         * @param array $addresses An array of addresses.
         */
        public function setAddresses(array $addresses): void {
            $this->addresses = $addresses;
        }

        /**
         * Gets the addresses associated with the customer.
         * @return array An array of addresses.
         */
        public function getAddresses(): array {
            return $this->addresses;
        }

        /**
         * Sets the orders placed by the customer.
         * @param array $orders An array of orders.
         */
        public function setOrders(array $orders): void {
            $this->orders = $orders;
        }

        /**
         * Gets the orders placed by the customer.
         * @return array An array of orders.
         */
        public function getOrders(): array {
            return $this->orders;
        }

        /**
         * Gets the username of the customer.
         * @return string The username.
         */
        public function getUsername(): string {
            return $this->username;
        }

        /**
         * Sets the username of the customer.
         * @param string $username The username.
         */
        public function setUsername(string $username): void {
            $this->username = $username;
        }

        /**
         * Gets the ID of the customer.
         * @return string The ID.
         */
        public function getId(): string {
            return parent::getId();
        }

        /**
         * Sets the ID of the customer.
         * @param string $id The ID.
         */
        public function setId(string $id): void {
            parent::setId($id);
        }

        /**
         * Gets the suspension time of the customer.
         * @return DateTime The suspension time.
         */
        public function getSuspensionTime(): DateTime {
            return $this->suspensionTime;
        }

        /**
         * Sets the suspension time of the customer.
         * @param int $days The number of days for the suspension.
         */
        public function setBan(int $days): void {
            $this->suspensionTime = new DateTime();
            date_add($this->suspensionTime, date_interval_create_from_date_string($days . ' days'));
        }

        /**
         * Sets the suspension time of the customer.
         * @param DateTime $suspensionTime The suspension time.
         */
        public function setSuspensionTime(DateTime $suspensionTime): void {
            $this->suspensionTime = $suspensionTime;
        }

        /**
         * Gets the reviews made by the customer.
         * @return array An array of reviews.
         */
        public function getReviews(): array {
            return $this->reviews;
        }

        /**
         * Sets the reviews made by the customer.
         * @param array $reviews An array of reviews.
         */
        public function setReviews(array $reviews) {
            $this->reviews = $reviews;
        }
    }
