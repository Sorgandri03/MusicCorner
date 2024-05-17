<?php


class FMessage{
    private static $instance = null;
    private function __construct(){}
    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
    //END SINGLETON

    private static $table = "Message";
    private static $value = "(NULL, :sender, :receiver, :text, :timestamp)";
    private static $key = "id";
    private static $updatequery = "sender = :sender, receiver = :receiver, text = :text, timestamp = :timestamp";
    public static function getValue(): string {
        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    public static function getKey(): string {
        return self::$key;
    }
    public static function getUpdateQuery(): string {
        return self::$updatequery;
    }

    public static function bind($stmt, $message){
        $stmt->bindValue(':sender', $message->getSender(), PDO::PARAM_STR);
        $stmt->bindValue(':receiver', $message->getReceiver(), PDO::PARAM_STR);
        $stmt->bindValue(':text', $message->getText(), PDO::PARAM_STR);
        $stmt->bindValue(':timestamp', $message->getTimestamp(), PDO::PARAM_STR);
    }

    //C
    public static function createObject ($obj){
        $saveArticle = FDB::getInstance()->create(self::class, $obj);
        if($saveArticle !== null){
            $obj->setId($saveArticle);
            return true;
        }else{
            return false;
        }
    }

    //R
    public static function retrieveObject($id){
        $result = FDB::getInstance()->retrieve(self::getTable(), self::getKey(), $id);
        if(count($result) > 0){
            $obj = self::createEntity($result);
            return $obj;
        }else{
            return null;
        }

    }

    //U
    public static function updateObject($obj){
        $updateArticle = FDB::getInstance()->update(self::class, $obj);
        if($updateArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    //D
    public static function deleteObject($obj){
        $deleteArticle = FDB::getInstance()->delete(self::class, $obj);
        if($deleteArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    // END OF CRUD

    public static function createEntity($result){
        $obj = new EMessage($result[0]['sender'], $result[0]['receiver'], $result[0]['text']);
        $obj->setId($result[0]['id']);
        $obj->setTimestamp(date_create_from_format('Y-m-d H:i:s', $result[0]['timestamp']));
        return $obj;
    }

    
    public static function getSentMessages($sender){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'sender', $sender);
        $sentMessages = array();
        for($i = 0; $i < count($queryResult); $i++){
            $message = self::retrieveObject($queryResult[$i][self::getKey()]);
            $sentMessages[] = $message;
        }
        return $sentMessages;
    }

    public static function getReceivedMessages($receiver){
        $queryResult = FDB::getInstance()->retrieve(self::getTable(), 'receiver', $receiver);
        $receivedMessages = array();
        for($i = 0; $i < count($queryResult); $i++){
            $message = self::retrieveObject($queryResult[$i][self::getKey()]);
            $receivedMessages[] = $message;
        }
        return $receivedMessages;
    }

}


    

    