<?php
/**
 * This class manages the interactions with the OrderItem table in the database.
 * It includes CRUD operations and methods to verify and retrieve articles.
 */
class FOrderItem{
    private static $instance = null;
    private function __construct(){}
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON
    
    private static $table = "OrderItem";
    private static $value = "(NULL, :article, :seller, :quantity, :price, :orderID, :shipped)";
    private static $key = "id";
    private static $updatequery = "article = :article, seller = :seller, quantity = :quantity, price = :price, orderID = :orderID, shipped = :shipped";

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

    public static function bind($stmt, $orderItem){
        $stmt->bindValue(':article', $orderItem->getArticle(), PDO::PARAM_STR);
        $stmt->bindValue(':seller', $orderItem->getSeller(), PDO::PARAM_STR);
        $stmt->bindValue(':quantity', $orderItem->getQuantity(), PDO::PARAM_INT);
        $stmt->bindValue(':price', $orderItem->getPrice(), PDO::PARAM_STR);
        $stmt->bindValue(':orderID', $orderItem->getOrderId(), PDO::PARAM_INT);
        $stmt->bindValue(':shipped', $orderItem->isShipped(), PDO::PARAM_BOOL);
    }

    /**
     * Create an orderitem in the database
     * @param $obj
     * @return bool
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
     * Retrieve an orderitem from the database
     * @param $id the EAN of the orderitem
     * @return EOrderItem|null the orderitem
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
     * Update an orderitem in the database
     * @param $obj the orderitem to update
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
     * Delete the orderitem from the database
     * @param $obj the orderitem to delete
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

    //END OF CRUD

    /**
     * Create a EOrderItem object from the result of a query
     * @param $result the result of the query
     * @return EOrderItem the review
     */
    public static function createEntity($result){
        $obj = new EOrderItem($result[0]['article'], $result[0]['seller'], $result[0]['quantity'], $result[0]['price'], $result[0]['orderID']);
        $obj->setId($result[0]['id']);
        $obj->setShipped($result[0]['shipped']);
        return $obj;
    }

    /**
     * Get all the items of an order
     * @param $order the order to get the order-item from
     * @return EOrderItem[] the order-item
     */
    public static function getItemsbyOrder($order){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'orderID', $order);
        $items = array();
        for($i = 0; $i < count($queryResult); $i++){
            $item = self::retrieveObject($queryResult[$i][self::getKey()]);
            $items[] = $item;
        }
        return $items;
    }

    /**
     * Get all the items ordered from a seller
     * @param $seller the seller to get the order-item from
     * @return EOrderItem[] the order-item
     */
    public static function getOrdersBySeller($seller){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), "seller", $seller);
        $orders = array();
        for($i = 0; $i < count($queryResult); $i++){
            $order = self::retrieveObject($queryResult[$i]['id']);
            $orders[] = $order;
        }
        return $orders;
    }

    /**
     * Delete all the order items of an order
     * @param $order the order to delete the order items from
     * @return void
     */
    public static function deleteItemsByOrder($order){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'orderID', $order);
        for($i = 0; $i < count($queryResult); $i++){
            self::deleteObject($queryResult[$i][self::getKey()]);
        }
    }
}