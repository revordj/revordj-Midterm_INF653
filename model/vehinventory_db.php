<?php 

    function get_inventory($sortby){

        global $db;

        if($sortby == 'price'){
        $query = 'SELECT year, model, price, vtype, Make, Class FROM vehicles
            LEFT JOIN types 
            ON vehicles.type_id = types.ID
            LEFT JOIN makes
            ON vehicles.make_id = makes.ID
            LEFT JOIN classes
            ON vehicles.class_id = classes.ID
            ORDER BY price DESC';
        }
        else{
            $query = 'SELECT year, model, price, vtype, Make, Class FROM vehicles
            LEFT JOIN types 
            ON vehicles.type_id = types.ID
            LEFT JOIN makes
            ON vehicles.make_id = makes.ID
            LEFT JOIN classes
            ON vehicles.class_id = classes.ID
            ORDER BY year DESC';
        }
        $statement = $db->prepare($query);
        $statement->execute();
        $inventory = $statement->fetchAll();
        $statement->closeCursor();
        return $inventory;
        
    }

    function get_inventory_by_make($passedmake, $sortby){

        global $db;

        if($sortby == 'price'){
        $query = 'SELECT year, model, price, vtype, Make, Class FROM vehicles
            LEFT JOIN types 
            ON vehicles.type_id = types.ID
            LEFT JOIN makes
            ON vehicles.make_id = makes.ID
            LEFT JOIN classes
            ON vehicles.class_id = classes.ID
            WHERE makes.ID = :passedmake
            ORDER BY price DESC';
        }
        else{
            $query = 'SELECT year, model, price, vtype, Make, Class FROM vehicles
            LEFT JOIN types 
            ON vehicles.type_id = types.ID
            LEFT JOIN makes
            ON vehicles.make_id = makes.ID
            LEFT JOIN classes
            ON vehicles.class_id = classes.ID
            WHERE makes.ID = :passedmake
            ORDER BY year DESC';   
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':passedmake', $passedmake);
        $statement->execute();
        $inventory = $statement->fetchAll();
        $statement->closeCursor();
        return $inventory;
    }

    function get_inventory_by_classes($passedclass, $sortby){

        global $db;

        if($sortby == 'price'){
        $query = 'SELECT year, model, price, vtype, Make, Class FROM vehicles
            LEFT JOIN types 
            ON vehicles.type_id = types.ID
            LEFT JOIN makes
            ON vehicles.make_id = makes.ID
            LEFT JOIN classes
            ON vehicles.class_id = classes.ID
            WHERE classes.ID = :passedclass
            ORDER BY price DESC';
        }
        else{
            $query = 'SELECT year, model, price, vtype, Make, Class FROM vehicles
            LEFT JOIN types 
            ON vehicles.type_id = types.ID
            LEFT JOIN makes
            ON vehicles.make_id = makes.ID
            LEFT JOIN classes
            ON vehicles.class_id = classes.ID
            WHERE classes.ID = :passedclass
            ORDER BY year DESC';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':passedclass', $passedclass);
        $statement->execute();
        $inventory = $statement->fetchAll();
        $statement->closeCursor();
        return $inventory;
    }

    function get_inventory_by_type($passedtype, $sortby){

        global $db;

        if($sortby == 'price'){
        $query = 'SELECT year, model, price, vtype, Make, Class FROM vehicles
            LEFT JOIN types 
            ON vehicles.type_id = types.ID
            LEFT JOIN makes
            ON vehicles.make_id = makes.ID
            LEFT JOIN classes
            ON vehicles.class_id = classes.ID
            WHERE types.ID = :passedtype
            ORDER BY price DESC';
        }
        else{
            $query = 'SELECT year, model, price, vtype, Make, Class FROM vehicles
            LEFT JOIN types 
            ON vehicles.type_id = types.ID
            LEFT JOIN makes
            ON vehicles.make_id = makes.ID
            LEFT JOIN classes
            ON vehicles.class_id = classes.ID
            WHERE types.ID = :passedtype
            ORDER BY year DESC';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':passedtype', $passedtype);
        $statement->execute();
        $inventory = $statement->fetchAll();
        $statement->closeCursor();
        return $inventory;
    }