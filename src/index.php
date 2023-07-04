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
    
    //define "var" by get / env / default
    $var_override = "noname";
    if (isset($_GET["var"])){
        $var_override = $_GET["var"];
    } else if (isset($_ENV["var"])){
        $var_override = $_ENV["var"];
    }

    //generate response
    $response = file_get_contents("response/" . $response_type);
    $response = str_replace("{var}", $var_override, $response);
    $response = str_replace("{motivation}", getMotivation(), $response);
    
    echo $response;