<?php
/**
 * This class provides a Singleton interface for managing database operations using PDO in PHP. It encapsulates CRUD operations and specific queries.
 * Is designed to be the sole direct interface for database operations. Other classes within the application should use the methods provided by this class
 * to access the database securely and efficiently.
 */
class FDB {
    private static $instance = null;
    private static $db;
    private function __construct(){
        try{
            self::$db = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST."; charset=utf8;", DB_USER, DB_PASS);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "ERROR". $e->getMessage();
            die;
        }
    }

    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    //END SINGLETON

    /**
     * Create an object in the database
     * @param $foundclass the class of the object to create
     * @param $obj the object to create
     * @return bool|string
     * @throws Exception if there is an error executing the SQL query.
     */
    public static function create($foundClass, $obj){
        try{
            $query = "INSERT INTO " . $foundClass::getTable() . " VALUES " . $foundClass::getValue() . ";";
            $stmt = self::$db->prepare($query);
            $foundClass::bind($stmt, $obj);
            $stmt->execute();
            $id = self::$db->lastInsertId();
            return $id;
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return null;
        }
    }

    /**
     * Retrieve an object from the database
     * @param string $table The name of the table from which retrieve records.
     * @param string $field The field name to match against the provided ID.
     * @param mixed $id The value to match against the specified field.
     * @return array An associative array of the matching records, or an empty array if no matches are found
     * @throws PDOException If there is an error executing the SQL query.
     */
    public static function retrieve($table, $field ,$id){
        try{
            $query = "SELECT * FROM " .$table. " WHERE ".$field." = '".$id."';";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $rowNum = $stmt->rowCount();
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
                return $result;
            }else{
                return array();
            }
        }catch(PDOException $e){
            echo "ERROR" . $e->getMessage();
            return array();
        }
    }

    /**
     * Updates a record in the database with the values from the provided object.
     * @param string $foundClass The class name which defines the table and key information.
     * @param object $obj The object containing the values to be updated.
     * @return bool Returns true if the update is successful, false otherwise.
     * @throws Exception If there is an error executing the SQL query.
     */
    public static function update($foundClass, $obj){
        try{
            $query = "UPDATE " . $foundClass::getTable() . " SET ". $foundClass::getUpdateQuery()  . " WHERE " . $foundClass::getKey() . " = '" . $obj->getId() . "';";
            $stmt = self::$db->prepare($query);
            $foundClass::bind($stmt, $obj);
            $stmt->execute();
            return true;
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Deletes a record from the database corresponding to the provided object.
     * @param string $foundClass The class name which defines the table and key information.
     * @param object $obj The object containing the ID of the record to be deleted.
     * @return bool Returns true if the deletion is successful, false otherwise.
     * @throws Exception If there is an error executing the SQL query.
     */
    public static function delete($foundClass, $obj){
        try{
            $query = "DELETE FROM " . $foundClass::getTable() . " WHERE " . $foundClass::getKey() . " = '" . $obj->getId() . "';";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            return true;
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }
    //END CRUD

    /**
     * Checks if the provided query result match any records in the database.
     * @param array $queryResult The result array from a database query.
     * @return bool Returns true if the result array contains one or more records, false otherwise.
     */
    public static function existInDb($queryResult){
        if(count($queryResult) > 0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Searches for articles in the database that match the provided search term.
     * @param string $search The search term to look for in the `ArticleDescription` table.
     * @return array|bool An associative array of the matching articles, or an empty array if no matches are found.
     * @throws Exception If there is an error executing the SQL query.
     */
    public static function searchArticles($search){
        try{
            $query = "SELECT * FROM ArticleDescription WHERE name LIKE '%" . $search . "%' OR EAN LIKE '%" . $search . "%' OR Artist LIKE '%" . $search . "%';";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $rowNum = $stmt->rowCount();
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
                return $result;
            }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Retrieves all entries from a specified table.
     * @param string $table The name of the table from which retrieve records.
     * @return array|bool An associative array of the retrieved records, or an empty array if no records are found.
     * @throws Exception If there is an error executing the SQL query.
     */
    public static function retrieveEntries($table){
        try{
            $query = "SELECT * FROM " . $table . ";";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $rowNum = $stmt->rowCount();
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
                return $result;
            }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Retrieves random articles from the `ArticleDescription` table.
     * @return array|bool An associative array of the retrieved random articles, or an empty array if no records are found.
     * @throws Exception If there is an error executing the SQL query.
     */
    public static function getRandomArticles(){
        try{
            $query = "SELECT * FROM ArticleDescription ORDER BY RAND() ;";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $rowNum = $stmt->rowCount();
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
                return $result;
            }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Retrieves articles from the `ArticleDescription` table that match the specified format.
     * @param string $format The format to filter articles by.
     * @return array|bool An associative array of the retrieved articles, or an empty array if no records are found.
     * @throws Exception If there is an error executing the SQL query.
    */
    public static function getArticlesByFormat($format){
        try{
            $query = "SELECT * FROM ArticleDescription WHERE format=" . $format . ";";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $rowNum = $stmt->rowCount();
            if($rowNum > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($row = $stmt->fetch()){
                    $result[] = $row;
                }
                return $result;
            }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Locks the stock table, starts a transaction, and then unlocks the table.
     * @return bool Returns true if the lock and transaction were successful, false otherwise.
     * @throws Exception If there is an error executing the SQL query.
     */
    public static function lockStockAndOrder(){
        try{
            self::$db->exec("LOCK TABLES Stock WRITE, Orders WRITE;");
            return true;
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Updates the stock table with the provided stock object.
     * @param EStock $stock The stock object to update the database with.
     * @return bool Returns true if the update was successful, false otherwise.
     * @throws Exception If there is an error executing the SQL query.
     */
    public static function commitStock($stock){
        try{
            self::$db->beginTransaction();
            self::update(FStock::class, $stock);
            self::$db->commit();
            return true;
        }catch(Exception $e){
            self::$db->rollBack();
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Unlocks the stock table.
     * @return bool Returns true if the unlock was successful, false otherwise.
     * @throws Exception If there is an error executing the SQL query.
     */
    public static function unlockStockAndOrder(){
        try{
            self::$db->exec("UNLOCK TABLES;");
            return true;
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

}