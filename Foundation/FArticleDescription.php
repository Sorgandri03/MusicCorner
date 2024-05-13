<?php

class FArticleDescription{
    private static $table = "ArticleDescription";
    private static $value = "(:EAN, :name, :artist, :genre, :format)";
    private static $key = "EAN";
    public static function getValue(): string {

        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }
    public static function getKey(): string {
        return self::$key;
    }

    public static function bind($stmt, $articleDescription){
        $stmt->bindValue(':EAN', $articleDescription->getEAN(), PDO::PARAM_STR);
        $stmt->bindValue(':name', $articleDescription->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':artist', $articleDescription->getArtist(), PDO::PARAM_STR);
        $stmt->bindValue(':genre', $articleDescription->getGenre(),PDO::PARAM_STR);
        $stmt->bindValue(':format', $articleDescription->getFormat(),PDO::PARAM_STR);
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