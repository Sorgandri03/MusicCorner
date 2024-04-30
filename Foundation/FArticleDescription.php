<?php

require_once 'FDB.php';
require_once '..\Entity\EArticleDescription.php';

class FArticleDescription{
    
    public function read($EAN){
        $result = FDB::getinstance()->query("SELECT * FROM articledescription WHERE EAN = $EAN");
        
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

        return new EArticleDescription($EAN, $Name, $Artists, $Genre, $Format);
        
    }
    
}