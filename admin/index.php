<?php
    require('model/vehclass_db.php');
    require('model/vehinventory_db.php');
    require('model/database.php');
    require('model/vehtype.php');
    require('model/vehmake_db.php');
    
    if(isset($_GET['action'])){
        $theAction = $_GET['action'];
    }
    else{
        $theAction = 'display_Inventory';
    }
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

    switch($theAction){
        case 'display_Inventory':
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
            break;
        
        case 'delete_vehicle':
            
            if(isset($_GET['veh_id'])){
                delete_vehicle($_GET['veh_id']);
            }
            else{
                echo("Error in deletion.");
            }
            header("Refresh:0; url=index.php");

            break;

        case 'add_vehicle':
            include('view/addveh.php');
            break;

        case 've_makes':
            include('view/makeadmin.php');
            break;

        case 've_types':
            include('view/typeadmin.php');
            break;

        case 've_classes':
            include('view/classadmin.php');
            break;

        default:
            $inventory = get_inventory($sortby);
            include('view/inventory.php');
            
        }

