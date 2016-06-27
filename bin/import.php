#!/usr/bin/env php
<?php
    //constant
    define("SUBJECT_INDEX", 6);
    //so max index is ten
    define("LINE_END", 11);
    
    //helper function to insert question's several tags into tag table.
    function tag_insert($row, $question_id)
    {
        $index = SUBJECT_INDEX;
        while ($index < LINE_END)
        {
            $insertion = CS50::query("INSERT INTO subject_tags (question_id, tag) VALUES (?,?)", $question_id, $row[$index]);
            if ($insertion === false)
            {
                print("failed in subject_tags insertion");
                return false;
            }
            $index++;
        }
        return true;
    }
    // requirements
    require(__DIR__ . "/../includes/config.php");
    
    $handle = fopen(__DIR__ . "/../questions.csv", "r");
    
    if ($handle === false)
    {
        //print("Could not open file: {$argv[1]}\n");
        print("could not open file");
        exit(1);
    }

    $question_id = 1;
    // iterate over file's rows
    //get past the header.
    $row = fgetcsv($handle, 1000, "\t");
    print(json_encode($row));
    print("\n");
    
    // $row = explode(',', $row[0]);
    // print($row[0]);
    // print("\n");
    // print($row[0][0]);
    // print("\n");
    // exit(0);
    while ($row = fgetcsv($handle, 0, "\t") && $question_id < 10)
    {
        $row = explode(',', $row[0]);
        // insert question into database
        print($row);
        if (!(CS50::query("INSERT INTO questions (Year, Quiz_num, Question_num) VALUES (?,?,?)",
        $row[0], $row[1], $row[2])) && tag_insert($row, $question_id))
        {
            printf("Could not insert into database.\n");
        }
        $question_id++;
    }
    fclose($handle);

    print("ended");
    // success
    exit(0);
    
    
    //scrap
        
    //print("hello world");
    // // ensure proper usage
    // if ($argc !== 2)
    // {
    //     print("Usage: import /path/to/txt\n");
    //     exit(1);
    // }

    // // ensure file exists
    // if (!file_exists($argv[1]))
    // {
    //     print("File does not exist: {$argv[1]}\n");
    //     exit(1);
    // }

    // // ensure file is readable
    // if (!is_readable($argv[1]))
    // {
    //     print("File is not readable: {$argv[1]}\n");
    //     exit(1);
    // }

    // open file
    //$handle = fopen($argv[1], "r");

?>
