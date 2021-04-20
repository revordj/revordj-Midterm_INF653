<?php
    $lifetime = 60 * 60 * 24 * 7; //one week
    session_set_cookie_params($lifetime, '/');
    session_start();

    // Model 
    require('database.php');
    require('vehicle_db.php');
    require('type_db.php');
    require('class_db.php');
    require('make_db.php');

    // Get required data from Model
    $types = get_types();
    $classes = get_classes();
    $makes = get_makes();

    // Get Parameter data sent to Controller
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    $firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
    
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
    if (!$sort) $sort = 'price';

    // Get vehicles
    $vehicles = get_all_vehicles($sort);
    // Filter vehicles 
    if ($make_id) {
        $make_name = get_make_name($make_id);
        $vehicles = array_filter($vehicles, function($array) use ($make_name) {
            return $array["Make"] === $make_name;
        });
    }
    if ($type_id) {
        $type_name = get_type_name($type_id);
        $vehicles = array_filter($vehicles, function($array) use ($type_name) {
            return $array["Type"] === $type_name;
        });
    }
    if ($class_id) {
        $class_name = get_class_name($class_id);
        $vehicles = array_filter($vehicles, function($array) use ($class_name) {
            return $array["Class"] === $class_name;
        });
    }

    if ($firstname) { 
        $_SESSION['userid'] = $firstname;
    }

    switch($action) {
        case 'register':
            include('view/register.php');
            break;
        case 'logout':
            include('view/logout.php');
            break;
        default:
        include('view/vehicle_list.php');
    }
        
    


   