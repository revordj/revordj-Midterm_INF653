<?php
    require('model/vehclass_db.php');
    require('model/vehinventory_db.php');
    require('model/database.php');
    require('model/vehtype.php');
    require('model/vehmake_db.php');
    
    if(isset($_GET['makeID'])){
        $makeID = $_GET['makeID'];
    }
    else{
        $makeID=0;
    }
   
    if(isset($_GET['typesID'])){
        $typesID = $_GET['typesID'];
    }
    else{
        $typesID= 0;
    }
    
    if(isset($_GET['classesID'])){
        $classesID = $_GET['classesID'];
    }
    else{
        $classesID= 0;
    }

    if(isset($_GET['rdosort'])){
        $sortby = $_GET['rdosort'];
    }
    else{
        $sortby= 'price';
    }

    if(!$makeID && !$typesID && !$classesID){
        $inventory = get_inventory($sortby);
    }
    elseif($makeID <> 0){
        $inventory = get_inventory_by_make($makeID, $sortby);
    }
    elseif($typesID <> 0){
        $inventory = get_inventory_by_type($typesID, $sortby);
    }
    elseif($classesID <> 0){
        $inventory = get_inventory_by_classes($classesID, $sortby);
    }
    else{
        echo("Error in search contents, please reload the page.");
    }
    
    
    include('view/inventory.php');
