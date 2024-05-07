<?phpphp
class FArticleDescription{
    private static $table = "customer";
    public static $value = "(username:, customerId:, :addresses, :creditcard, :Format)";
    public static function getValue(): string {
        return self::$value;
    }
    public static function getTable(): string {
        return self::$table;
    }

    public static function bind($stmt, $ArticleDescription){
        $stmt->bindValue(':username', $ArticleDescription->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':customerId', $ArticleDescription->getCustomerId(), PDO::PARAM_STR);
        $stmt->bindValue(':addresses', $ArticleDescription->getAddresses(), PDO::PARAM_STR);
        $stmt->bindValue(':creditcard', $ArticleDescription->getCreditCard(), PDO::PARAM_STR);
        $stmt->bindValue(':Format', $ArticleDescription->getFormat(), PDO::PARAM_STR);
    }
