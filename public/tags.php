<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        //$tags = CS50::query("SELECT DISTINCT tags FROM subject_tags WHERE ")
        $array = ["key1" => "tag1", "key2" => "tag2"];
        print(json_encode($array));
    }
?>