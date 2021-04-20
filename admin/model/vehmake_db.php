<?php

    function get_make() {
        global $db;
        $query ='SELECT * from makes ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $categories = $statement->fetchAll();
        $statement->closeCursor();
        return $categories;
    }

    function get_make_name($makeID){
        if (!$makeID) {
            return "All makes";
        }

        global $db;
        $query = 'SELECT * FROM makes WHERE ID = :makeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->execute();
        $make = $statement->fetch();
        $statement->closeCursor();
        $make_name = $make['Make'];
        return $make_name;
    }

    function delete_make($makeID){
        global $db;
        $query = 'DELETE FROM makes WHERE ID = :makeID';
        $statement = $db->prepare($query);
        $statement-> bindValue(':makeID', $makeID);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_make($make_name){
        global $db;
        $query = 'INSERT INTO makes (Make) VALUES (:make_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_name', $make_name);
        $statement->execute();
        $statement->closeCursor();
    }