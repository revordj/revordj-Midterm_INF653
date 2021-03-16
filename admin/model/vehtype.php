<?php

    function get_type() {
        global $db;
        $query ='SELECT * from types ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        $statement->closeCursor();
        return $categories;
    }

    function get_type_name($typeID){
        if (!$typeID) {
            return "All types";
        }

        global $db;
        $query = 'SELECT * FROM types WHERE ID = :typeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $typeID);
        $statement->execute();
        $type = $statement->fetch();
        $statement->closeCursor();
        $type_name = $type['vType'];
        return $type_name;
    }

    function delete_type($typeID){
        global $db;
        $query = 'DELETE FROM types WHERE ID = :typeID';
        $statement = $db->prepare($query);
        $statement-> bindValue(':typeID', $typeID);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_type($type_name){
        global $db;
        $query = 'INSERT INTO types (vType) VALUES (:type_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_name', $type_name);
        $statement->execute();
        $statement->closeCursor();
    }