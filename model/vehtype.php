<?php
class Vehtype{
    public static function get_type() {
        $db = Database::getDB();
        $query ='SELECT * from types ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        $statement->closeCursor();
        return $categories;
    }

    public static function get_type_name($typeID){
        if (!$typeID) {
            return "All types";
        }

        $db = Database::getDB();
        $query = 'SELECT * FROM types WHERE ID = :typeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $typeID);
        $statement->execute();
        $type = $statement->fetch();
        $statement->closeCursor();
        $type_name = $type['vType'];
        return $type_name;
    }

    public static function delete_type($typeID){
        $db = Database::getDB();
        $query = 'DELETE FROM types WHERE ID = :typeID';
        $statement = $db->prepare($query);
        $statement-> bindValue(':typeID', $typeID);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function add_type($type_name){
        $db = Database::getDB();
        $query = 'INSERT INTO types (vType) VALUES (:type_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_name', $type_name);
        $statement->execute();
        $statement->closeCursor();
    }
}