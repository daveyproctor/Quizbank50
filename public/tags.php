<?php
    require("../includes/config.php");
    // if ($_SERVER["REQUEST_METHOD"] == "GET")
    // {
        //$query_start = $_GET['start'] . '%';
        $query_start = "s%";
        $tags = CS50::query("SELECT DISTINCT tag FROM subject_tags WHERE tag like ?", $query_start);
        if (!$tags)
        {
            $array = ["key1" => "tag1", "key2" => "tag2"];
            print(json_encode($array));
        }
        else
        {
            print(json_encode($tags));
        }
    //}
?>