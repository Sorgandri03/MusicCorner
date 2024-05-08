<?php

class FStock{
    private static $table = "stock";
    /* Manca stock e la chiave*/
    public static $value = "(:price, :quantity, :article, NULL)";
    public static function getValue(): string {
        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    public static function getKey(): string {
        return "id";
    }


    public static function bind($stmt, $Seller){
        $stmt->bindValue(':email', $Seller->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':shopName', $Seller->getShopName(), PDO::PARAM_STR);
        $stmt->bindValue(':shopRating', $Seller->getShopRating(), PDO::PARAM_STR);
        // manca stock $stmt->bindValue(':Format', $Seller->getFormat(), PDO::PARAM_STR);
    }

    public static function saveObj($obj){
        $saveArticle = FDB::getInstance()->saveObject(self::class, $obj);
        if($saveArticle !== null){
            $obj->setId($saveArticle);
            return true;
        }else{
            return false;
        }
    }

    
    public static function read($EAN){
        /*$result = FDB::getinstance()->query("SELECT * FROM articledescription WHERE EAN = $EAN");
        
        while($row = $result->fetch()) {
            $EAN = $row['EAN'];
            $Name = $row['Name'];   
            $Artists = $row['Artists'];
            $Genre = $row['Genre'];

            switch($row['Format']){
                case "CD":
                    $Format = Format::CD;
                case "Vynil":
                    $Format = Format::Vinyl;
                case "Cassette":
                    $Format = Format::Cassette;
                default:
                    $Format = Format::CD;
            }
        }

        return new EArticleDescription($EAN, $Name, $Artists, $Genre, $Format);*/
        echo "funzia";
        
    }
    
}