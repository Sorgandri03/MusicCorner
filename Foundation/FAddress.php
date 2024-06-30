<?php
/**
 * This class manages the interactions with the Address table in the database.
 * It includes CRUD operations and methods to verify and retrieve addresses.
 */
class FAddress{
    private static $instance = null;
    private function __construct(){}
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON

    private static $table = "Address";
    private static $value = "(NULL, :street, :cap, :city, :name, :customer)";
    private static $key = "id";
    private static $updatequery = "street = :street, cap = :cap, city = :city, name = :name, customer = :customer";
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

    public static function bind($stmt, $address){
        $stmt->bindValue(':street', $address->getStreet(), PDO::PARAM_STR);
        $stmt->bindValue(':cap', $address->getCap(), PDO::PARAM_STR);
        $stmt->bindValue(':city', $address->getCity(), PDO::PARAM_STR);
        $stmt->bindValue(':name', $address->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':customer', $address->getCustomer(), PDO::PARAM_STR);
    }

    /**
     * Create an address in the database
     * @param $obj the article to create
     * @return bool succes/not success of the creation
     */
    public static function createObject ($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        if($saveArticle !== null){
            $obj->setId($saveArticle);
            return true;
        }else{
            return false;
        }
    }

    /**
     * Retrieve an address from the database
     * @param $id the EAN of the address
     * @return EAddress|null the address
     */
    public static function retrieveObject($id){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $id);
        if(count($result) > 0){
            $obj = self::createEntity($result);
            return $obj;
        }else{
            return null;
        }

    }

    /**
     * Update an address in the database
     * @param $obj the address to update
     * @return bool succes/not success of the update
     */
    public static function updateObject($obj){
        $updateArticle = FDB::getInstance()->update(self::class, $obj);
        if($updateArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Delete the address from the database
     * @param $obj the address to delete
     * @return bool succes/not success of the deletion
     */
    public static function deleteObject($obj){
        $deleteArticle = FDB::getInstance()->delete(self::class, $obj);
        if($deleteArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    // END OF CRUD
    
    /**
     * Create a EAddress object from the result of a query
     * @param $result the result of the query
     * @return EAddress the article object
     */
    public static function createEntity($result){
        $obj = new EAddress($result[0]['street'], $result[0]['city'], $result[0]['cap'], $result[0]['name'], $result[0]['customer']);
        $obj->setId($result[0]['id']);
        return $obj;
    }

    /**
     * Get all the article of an artist
     * @param $artist the artist to get the articles from
     * @return EAddress[] array of EAddress
     */
    public static function getAddressesbyCustomer($customer){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'customer', $customer);
        $addresses = array();
        for($i = 0; $i < count($queryResult); $i++){
            $address = self::retrieveObject($queryResult[$i][self::getKey()]);
            $addresses[] = $address;
        }
        return $addresses;
    }

}


    

    