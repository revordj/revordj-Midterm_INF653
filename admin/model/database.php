<?php
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

?>
