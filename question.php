<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $questions_array;
        $questions_array[0] = file_get_contents("question.html");
        return(JSON_encode($questions_array));
    }
?>