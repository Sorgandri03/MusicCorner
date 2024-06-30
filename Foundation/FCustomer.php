<?php
/**
 * This class manages the interactions with the Customer table in the database.
 * It includes CRUD operations and methods to verify and retrieve articles.
 */
class FCustomer {
    
    private static $table = "Customer";
    public static $value = "(:email, :username, :suspensionTime)";
    public static $key = "email";
    private static $updatequery = "email = :email, username = :username, suspensionTime= :suspensionTime" ;
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

    public static function bind($stmt, $customer){
        $stmt->bindValue(':username', $customer->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $customer->getId(), PDO::PARAM_STR);
        $stmt->bindValue(':suspensionTime', $customer->getSuspensionTime()->format('Y-m-d H:i:s'), PDO::PARAM_STR);
    }

    /**
     * Create a customer in the database
     * @param $obj the customer to create
     * @return bool succes/not success of the creation
     */
    public static function createObject($obj){
        $saveCustomer = FDB::getInstance()->create(self::class, $obj);
        $saveUser = FUser::createObject(new EUser($obj->getId(), $obj->getPassword()));
        if($saveCustomer !== null && $saveUser !== null){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * Retrieve a customer from the database
     * @param $email the email of the customer
     * @return ECustomer|null the customer
     */
    public static function retrieveObject($email){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $email);
        if(count($result) > 0){
            $customer = self::createEntity($result);
            return $customer;
        }else{
            return null;
        }
    }
    
    /**
     * Update a customer in the database
     * @param $obj the customer to update
     * @return bool succes/not success of the update
     */
    public static function updateObject($obj){
        $update = FDB::getInstance()->update(self::class, $obj);
        $user = new EUser($obj->getId(), $obj->getPassword());
        $updateUser = FUser::updateObject($user);
        if($update !== null && $updateUser !== null){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Delete the customer from the database
     * @param $obj the customer to delete
     * @return bool succes/not success of the deletion
     */
    public static function deleteObject($obj){
        $delete = FDB::getInstance()->delete(self::class, $obj);
        $user = new EUser($obj->getId(), $obj->getPassword());
        $deleteUser = FUser::deleteObject($user);
        foreach($obj->getCreditCards() as $card){
            FCreditCard::deleteObject($card);
        }
        foreach($obj->getAddresses() as $address){
            FAddress::deleteObject($address);
        }
        if($delete !== null && $deleteUser !== null){
            return true;
        }else{
            return false;
        }

    }
    //END CRUD

    /**
     * Create a ECustomer object from the result of a query
     * @param $result the result of the query
     * @return ECustomer the customer object
     */
    public static function createEntity($result){
        $user = FUser::retrieveObject($result[0]['email']);
        $customer = new ECustomer($result[0]['username'], $result[0]['email'], $user->getPassword());
        $customer->setCreditCards(FCreditCard::getCardsByCustomer($customer->getId()));
        $customer->setAddresses(FAddress::getAddressesByCustomer($customer->getId()));
        $customer->setOrders(FOrder::getOrdersByCustomer($customer->getId()));
        $customer->setSuspensionTime(date_create_from_format('Y-m-d H:i:s', $result[0]['suspensionTime']));
        $customer->setReviews(FReview::getReviewsByCustomer($result[0]['email']));
        return $customer;
    }
    /**
     * Retrieve all the customers from the database
     * @return ECustomer[] the customers
     */
    public static function retrieveAllObjects(){
        $queryResult = FDB::getInstance()->retrieveEntries(self::getTable());
        $customers = array();
        for($i = 0; $i < count($queryResult); $i++){
            $customer = self::retrieveObject($queryResult[$i][self::getKey()]);
            $customers[] = $customer;
        }
        return $customers;
    }

    /**
     * Verify if an customer exists in the database
     * @param $field the field to verify
     * @param $id the id to verify for
     * @return bool the result of the verification
     */
    public static function verify($field, $id){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), $field, $id);
        return FDB::getInstance()->existInDb($queryResult);
    }
}