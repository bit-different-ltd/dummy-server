<?php

    require_once "include.php";

    //define response type by get / env / default
    $response_type = "html";
    if (isset($_GET["type"])){
        $requested_type = purge($_GET["type"]);
        if (isValidResponseType($requested_type)) $response_type = $requested_type;
    } else if (isset($_ENV["type"])){
        $requested_type = purge($_ENV["type"]);
        if (isValidResponseType($requested_type)) $response_type = $requested_type;
    }
    
    //define "name" variable by get / env / default
    $name_override = "noname";
    if (isset($_GET["name"])){
        $name_override = $_GET["name"];
    } else if (isset($_ENV["name"])){
        $name_override = $_ENV["name"];
    }

    //generate response
    $response = file_get_contents("response/" . $response_type);
    $response = str_replace("{name}", $name_override, $response);
    $response = str_replace("{motivation}", getMotivation(), $response);

    if ($response_type == "html"){
        $details = "";
        foreach ($_SERVER as $k => $v){
            $details .= "<tr><td>";
            $details .= str_replace("_", " ", $k);
            $details .= "</td><td>";
            $details .= (!is_array($v)) ? $v : print_r($v, true);
            $details .= "</td></tr>";
        }
        $response = str_replace("{details}", $details, $response);
         
    }

    //json format & special characters
    if ($response_type == "json"){
		header('Content-Type: application/json; charset=utf-8');
		$response = json_encode(array("response"=>$response));
	}
    
    echo $response;