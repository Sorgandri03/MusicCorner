<?php
/**
 * This class manages the interactions with the Orders table in the database.
 * It includes CRUD operations and methods to verify and retrieve orders.
 */
class FOrder{
    
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON

    private static $table = "Orders";
    public static $value = "(NULL, :customer, :orderDateTime, :price, :payment, :shippingAddress)";
    private static $key = "id";
    private static $updatequery = "customer = :customer, orderDateTime = :orderDateTime, price = :price, payment = :payment, shippingAddress = :shippingAddress";

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
    

    public static function bind($stmt, $order){
        $stmt->bindValue(':customer', $order->getCustomer(), PDO::PARAM_STR);
        $stmt->bindValue(':orderDateTime', $order->getOrderDateTime(), PDO::PARAM_STR);
        $stmt->bindValue(':price', (string) $order->getPrice(), PDO::PARAM_STR);
        $stmt->bindValue(':payment', $order->getPayment(), PDO::PARAM_INT);
        $stmt->bindValue(':shippingAddress', $order->getShippingAddress(), PDO::PARAM_INT);
    }

    /**
     * Create an Order in the database
     * @param $obj the order to create
     * @return bool succes/not success of the creation
     */
    public static function createObject($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        if($saveArticle !== null){
            $obj->setId($saveArticle);
            return true;
        }else{
            return false;
        }
    }

    /**
     * Retrieve an Order from the database
     * @param $id the id of the Order
     * @return EOrder|null the Order
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
     * Update an Order in the database
     * @param $obj the Order to update
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
     * Delete an Order and all its Order Items in the database
     * @param $obj the Order to update
     * @return bool succes/not success of the update
     */
    public static function deleteObject($obj){
        FOrderItem::deleteItemsByOrder($obj->getId());        
        $deleteArticle = FDB::getInstance()->delete(self::class, $obj);        
        if($deleteArticle !== null){
            return true;
        }else{
            return false;
        }
    }
    //END CRUD

    /**
     * Create a EOrder object from the result of a query
     * @param $result the result of the query
     * @return EOrder the article object
     */
    public static function createEntity($result){
        $obj = new EOrder($result[0]['customer'],$result[0]['shippingAddress'], $result[0]['payment'], $result[0]['price']);
        $obj->setId($result[0]['id']);
        $obj->setOrderDateTime(date_create_from_format('Y-m-d H:i:s', $result[0]['orderDateTime']));
        $obj->setOrderItems(FOrderItem::getItemsbyOrder($result[0]['id']));
        return $obj;
    }

    /**
     * Get all the orders of a customer
     * @param $customer the customer to get the articles from
     * @return EOrder[] the orders of the customer
     */
    public static function getOrdersbyCustomer($customer){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'customer', $customer);
        $orders = array();
        for($i = 0; $i < count($queryResult); $i++){
            $order = self::retrieveObject($queryResult[$i][self::getKey()]);
            $orders[] = $order;
        }
        return $orders;
    }
}