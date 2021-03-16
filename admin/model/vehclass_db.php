<?php

    function get_veh_class() {
        global $db;
        $query ='SELECT * from classes ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        $statement->closeCursor();
        return $categories;
    }

    function get_class_name($classID){
        if (!$classID) {
            return "All Classes";
        }

        global $db;
        $query = 'SELECT * FROM classes WHERE ID = :classID';
        $statement = $db->prepare($query);
        $statement->bindValue(':classID', $classID);
        $statement->execute();
        $class = $statement->fetch();
        $statement->closeCursor();
        $class_name = $class['Class'];
        return $class_name;
    }

    function delete_class($classID){
        global $db;
        $query = 'DELETE FROM classes WHERE ID = :classID';
        $statement = $db->prepare($query);
        $statement-> bindValue(':classID', $classID);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_class($class_name){
        global $db;
        $query = 'INSERT INTO classes (Class) VALUES (:class_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_name', $class_name);
        $statement->execute();
        $statement->closeCursor();
    }