<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $tags = CS50::query("SELECT DISTINCT tags FROM subject_tags WHERE ")
        print(json_encode($array));
    }
?>