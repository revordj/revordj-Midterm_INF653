<?php
class VehClassDB{
    public static function get_veh_class() {
        $db=Database::getDB();
        $query ='SELECT * from classes ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        $statement->closeCursor();
        return $categories;
    }

    public static function get_class_name($classID){
        if (!$classID) {
            return "All Classes";
        }

        $db=Database::getDB();
        $query = 'SELECT * FROM classes WHERE ID = :classID';
        $statement = $db->prepare($query);
        $statement->bindValue(':classID', $classID);
        $statement->execute();
        $class = $statement->fetch();
        $statement->closeCursor();
        $class_name = $class['Class'];
        return $class_name;
    }

    public static function delete_class($classID){
        $db=Database::getDB();
        $query = 'DELETE FROM classes WHERE ID = :classID';
        $statement = $db->prepare($query);
        $statement-> bindValue(':classID', $classID);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function add_class($class_name){
        $db=Database::getDB();
        $query = 'INSERT INTO classes (Class) VALUES (:class_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_name', $class_name);
        $statement->execute();
        $statement->closeCursor();
    }
}