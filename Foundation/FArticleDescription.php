<?php

require_once 'FDB.php';
require_once '..\Entity\EArticleDescription.php';

class FArticleDescription{
    
    private static $table = "articledescription";

    public static $value = "(:EAN, :Name, :Artists, :Genre, :Format)";

    public static function getValue(): string {
        return self::$value;
    }
    

    public static function bind($stmt, $ArticleDescription){
        $stmt->bindValue(':EAN', $ArticleDescription->getEan(), PDO::PARAM_STR);
        $stmt->bindValue(':Name', $ArticleDescription->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':Artists', $ArticleDescription->getArtists(), PDO::PARAM_STR);
        $stmt->bindValue(':Genre', $ArticleDescription->getGenre(), PDO::PARAM_STR);
        $stmt->bindValue(':Format', $ArticleDescription->getFormat(), PDO::PARAM_STR);
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

    public static function getTable(): string {
        return self::$table;
    }
    
}