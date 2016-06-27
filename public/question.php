<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $array["key"] = file_get_contents("../public/uploads/" . "question.html");
        //print(json_encode(["key" => "value"]));
        print(json_encode($array));
    }
    
    //scrap
            //return("hello");
        // $questions_array;
        // $questions_array[0] = file_get_contents("question.html");
        // return(JSON_encode($questions_array));
        
        // print(file_get_contents("question.html"));
        // print("hi");
?>