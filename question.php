<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        //return("hello");
        // $questions_array;
        // $questions_array[0] = file_get_contents("question.html");
        // return(JSON_encode($questions_array));
        
        // print(file_get_contents("question.html"));
        // print("hi");
        
        $array["key"] = file_get_contents("question.html");
        print(json_encode(["key" => "value"]));
    }
?>