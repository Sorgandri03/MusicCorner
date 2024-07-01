<?php
/**
 * This class manages the interactions with the CreditCard table in the database.
 * It includes CRUD operations and methods to verify and retrieve articles.
 */
class FCreditCard{
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON

    private static $table = "CreditCard";
    private static $value = "(NULL, :cardNumber, :billingAddress, :owner, :customerId, :expiringDate, :cvv)";
    private static $key = "id";
    private static $updatequery = "cardNumber = :cardNumber, billingAddress = :billingAddress, owner = :owner, customerId = :customerId, expiringDate = :expiringDate, cvv = :cvv";
    /**
     * Return the fields of the table
     * @return string the fields of the table
     */
    public static function getValue(): string {
        return self::$value;
    }

    /**
     * Return the table name
     * @return string the table name
     */
    public static function getTable(): string {
        return self::$table;
    }
    /**
     * Return the key field of the table
     * @return string the table name
     */
    public static function getKey(): string {
        return self::$key;
    }
    /**
     * Return the update query
     * @return string the update query
     */
    public static function getUpdateQuery(): string {
        return self::$updatequery;
    }

    public static function bind($stmt, $creditCard){
        $stmt->bindValue(':cardNumber', $creditCard->getNumber(), PDO::PARAM_STR);
        $stmt->bindValue(':billingAddress', $creditCard->getBillingAddress(), PDO::PARAM_INT);
        $stmt->bindValue(':owner', $creditCard->getOwner(), PDO::PARAM_STR);
        $stmt->bindValue(':customerId', $creditCard->getCustomerId(), PDO::PARAM_STR);
        $stmt->bindValue(':expiringDate', $creditCard->getExpirationDate(), PDO::PARAM_STR);
        $stmt->bindValue(':cvv', $creditCard->getCvv(), PDO::PARAM_STR);
    }

    /**
     * Create an credit card in the database
     * @param $obj the article to create
     * @return bool succes/not success of the creation
     */
    public static function createObject($obj){
        $create = FDB::getInstance()->create(self::class, $obj);
        if($create !== null){
            $obj->setId($create);
            return true;
        }else{
            return false;
        }
    }

    /**
     * Retrieve an credit card from the database
     * @param $cardNumber the number of the credit card
     * @return ECreditCard|null the credit card
     */
    public static function retrieveObject($cardNumber){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $cardNumber);
        if(count($result) > 0){
            $card = self::createEntity($result);
            return $card;
        }else{
            return null;
        }
    }

    /**
     * Update an credit card in the database
     * @param $obj the credit card to update
     * @return bool succes/not success of the update
     */
    public static function updateObject($obj){
        $update = FDB::getInstance()->update(self::class, $obj);
        if($update !== null){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Delete the credit card from the database
     * @param $obj the credit card to delete
     * @return bool succes/not success of the deletion
     */
    public static function deleteObject($obj){
        $delete = FDB::getInstance()->delete(self::class, $obj);
        if($delete !== null){
            return true;
        }else{
            return false;
        }
    }

    //END CRUD

    /**
     * Create a ECreditCard object from the result of a query
     * @param $result the result of the query
     * @return ECreditCard the article object
     */
    public static function createEntity($result){
        $card = new ECreditCard($result[0]['cardNumber'], $result[0]['expiringDate'], $result[0]['cvv'], $result[0]['owner'], $result[0]['customerId'], $result[0]['billingAddress']);
        $card->setId($result[0][self::getKey()]);
        return $card;
    }

    /**
     * Get all the cards of a customer
     * @param $customerId the customer to get the cards from
     * @return ECreditCard[] array of ECreditCard
     */
    public static function getCardsByCustomer($customerId){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'customerId', $customerId);
        $cards = array();
        for($i = 0; $i < count($queryResult); $i++){
            $card = self::retrieveObject($queryResult[$i][self::getKey()]);
            $cards[] = $card;
        }
        return $cards;
    }
}