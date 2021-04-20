<?php 

    function get_inventory($sortby){

        global $db;

        if($sortby == 'price'){
        $query = 'SELECT year, model, price, vtype, Make, Class, veh_id FROM vehicles
            LEFT JOIN types 
            ON vehicles.type_id = types.ID
            LEFT JOIN makes
            ON vehicles.make_id = makes.ID
            LEFT JOIN classes
            ON vehicles.class_id = classes.ID
            ORDER BY price DESC';
        }
        else{
            $query = 'SELECT year, model, price, vtype, Make, Class, veh_id FROM vehicles
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
        $query = 'SELECT year, model, price, vtype, Make, Class, veh_id FROM vehicles
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
            $query = 'SELECT year, model, price, vtype, Make, Class, veh_id FROM vehicles
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
        $query = 'SELECT year, model, price, vtype, Make, Class, veh_id FROM vehicles
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
            $query = 'SELECT year, model, price, vtype, Make, Class, veh_id FROM vehicles
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
        $query = 'SELECT year, model, price, vtype, Make, Class, veh_id FROM vehicles
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
            $query = 'SELECT year, model, price, vtype, Make, Class, veh_id FROM vehicles
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

    function delete_vehicle($vehicleID){
        global $db;
        $query = 'DELETE FROM vehicles WHERE veh_id = :vehicleID';
        $statement = $db->prepare($query);
        $statement-> bindValue(':vehicleID', $vehicleID);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_vehicle($addMake, $addType, $addClass, $addYear, $addModel, $addPrice){
        global $db;
        $query = 'INSERT INTO vehicles (make_id, type_id, class_id, year, model, price) VALUES (:addMake, :addType, :addClass, :addYear, :addModel, :addPrice)';
        $statement = $db->prepare($query);
        $statement-> bindValue(':addMake', $addMake);
        $statement-> bindValue(':addType', $addType);
        $statement-> bindValue(':addClass', $addClass);
        $statement-> bindValue(':addYear', $addYear);
        $statement-> bindValue(':addModel', $addModel);
        $statement-> bindValue(':addPrice', $addPrice);
        $statement->execute();
        $statement->closeCursor();
    }
