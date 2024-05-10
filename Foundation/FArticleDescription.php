<?php

class FArticleDescription{
    private static $table = "ArticleDescription";
    private static $value = "(:EAN, :name, :artist, genre, format )";
    private static $key = ":EAN";
    public static function getValue(): string {

        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    public static function getKey(): string {
        return self::$key;
    }

    public static function bind($stmt, $ArticleDescription){
        $stmt->bindValue(':EAN', $ArticleDescription->getEAN(), PDO::PARAM_STR);
        $stmt->bindValue(':name', $ArticleDescription->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':artist', $ArticleDescription->getArtists(), PDO::PARAM_STR);
        $stmt->bindValue(':genre', $ArticleDescription->getGenre(),PDO::PARAM_STR);
        $stmt->bindValue(':format', $ArticleDescription->getFormat(),PDO::PARAM_INT);
    }

    public static function saveObj($obj){
        $saveArticle = FDB::getInstance()->saveObject(self::class, $obj);
        if($saveArticle !== null){
            return true;
        }else{
            return false;
        }
    }

    public static function getObj($id){
        $result = FDB::getInstance()->retriveObj(self::getTable(), self::getKey(), $id);
        if(count($result) > 0){
            $obj = self::createObj($result);
            return $obj;
        }else{
            return null;
        }

    }

    public static function createObj($result){
        $obj = new EArticleDescription($result[0]['EAN'], $result[0]['name'], $result[0]['artist'], $result[0]['genre'], $result[0]['format']);
        return $obj;
    }

}