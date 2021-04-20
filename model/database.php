<?php
/*
    $dsn = 'mysql:host=xlf3ljx3beaucz9x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=tok9nrasvgonhajh';
    $username = 'y0uzwzfmp9elkru6';
    $password = 'djyrnk2c0wij60f4';

    try{
        //$db = new PDO($dsn, $username);
        $db = new PDO($dsn, $username, $password);

    }   catch(PDOException $e) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        echo $error_message;
        exit();
    }
*/
?>

<?php
class Database {
    private static $dsn = 'mysql:host=xlf3ljx3beaucz9x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=tok9nrasvgonhajh';
    private static $username = 'y0uzwzfmp9elkru6';
    private static $password = 'djyrnk2c0wij60f4';
    private static $db;

    private function __construct() {}

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
            } catch (PDOException $e) {
                $error_message = $e ->getMessage();
                echo $error_message;
                exit();
            }
        }
        return self::$db;
    }
}
?>