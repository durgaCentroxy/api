<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../config/database.php';
    include_once '../objects/employee.php';

    $database = new database();
    $db = $database->getConnection();

    $employee = new employee($db);

    $statement = $employee->read();
    $num = $statement->rowCount();
    echo "<br>";
    // echo "$";
    if($num > 0)
    {
        
        exit();
        $employee_arr = array();
        $employee_arr["records"] = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $employee_details = array("id" => $id, "name" => $name, "mail" => $mail, "number" => $number);
            array_push($employee_arr["records"], $employee_details);
        }
        http_response_code(200);
        echo json_encode($employee_arr);
    }
    else{
        http_response_code(404);
        echo json_encode(array("message" => "No employees found"));
    }
?>