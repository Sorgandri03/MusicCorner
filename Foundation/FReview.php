<?php

class FReview {
    private static $table = "reviews";
    public static $value = "(:customer, :reviewText, :articleRating, :sellerRating, :article, :seller)";
    public static function getValue(): string {
        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    //Tocca vede come è fatto il db perche non so la chiave
    public static function bind($stmt, $Review){
        $stmt->bindValue(':customer', $Review->getCustomer()->getEmail(),PDO::PARAM_STR);
        $stmt->bindValue(':reviewText', $Review->getReviewText(), PDO::PARAM_STR);
        $stmt->bindValue(':articleRating', $Review->getArticleRating(),PDO::PARAM_STR);
        $stmt->bindValue(':sellerRating', $Review->getSellerRating(), PDO::PARAM_STR);
        $stmt->bindValue(':article', $Review->getArticle()->getEan(),PDO::PARAM_STR);
        $stmt->bindValue(':seller',$Review->getSeller()->getEmail(), PDO::PARAM_STR);

    }

    public static function saveObj($obj){
        $saveArticle = FDB::getInstance()->saveObject(self::class, $obj);
        if($saveArticle !== null){
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