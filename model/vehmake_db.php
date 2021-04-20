<?php
class Vehmake{
    public static function get_make() {
        $db = Database::getDB();
        $query ='SELECT * from makes ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        $statement->closeCursor();
        return $categories;
    }

    public static function get_make_name($makeID){
        if (!$makeID) {
            return "All makes";
        }

        $db = Database::getDB();
        $query = 'SELECT * FROM makes WHERE ID = :makeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->execute();
        $make = $statement->fetch();
        $statement->closeCursor();
        $make_name = $make['Make'];
        return $make_name;
    }

    public static function delete_make($makeID){
        $db = Database::getDB();
        $query = 'DELETE FROM makes WHERE ID = :makeID';
        $statement = $db->prepare($query);
        $statement-> bindValue(':makeID', $makeID);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function add_make($make_name){
        $db = Database::getDB();
        $query = 'INSERT INTO makes (Make) VALUES (:make_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_name', $make_name);
        $statement->execute();
        $statement->closeCursor();
    }
}