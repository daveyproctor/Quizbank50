#!/usr/bin/env php
<?php
    //constant
    define("SUBJECT_INDEX", 6);
    //so max index is ten
    define("LINE_END", 11);
    //number of questions you want to insert
    define("END", 10);
    
    //helper function to insert question's several tags into tag table.
    function tag_insert($row, $question_id)
    {
        $index = SUBJECT_INDEX;
        while ($index < LINE_END)
        {
            if (empty($row[$index]))
            {
                print("this question didn't have full 5 tags");
                return true;
            }
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
    $row = explode(',', $row[0]);
    $boolean = CS50::query("INSERT IGNORE INTO questions (Year, Quiz_num, Question_num) VALUES (?,?,?)", $row[0], $row[1], $row[2]);
    if($boolean)
    {
        print("this worked\n");
    }
    //exit(0);
    
     //(($array = fgetcsv($fp, 1000, "\t")) != FALSE) 
    while (($row = fgetcsv($handle, 1000, "\t")) != FALSE && $question_id < END)
    {
        $row = explode(',', $row[0]);
        $boolean = CS50::query("INSERT IGNORE INTO questions (Year, Quiz_num, Question_num) VALUES (?,?,?)", $row[0], $row[1], $row[2]);
        if(!$boolean)
        {
            print("insertion into questions table failed\n");
        }
        if (!tag_insert($row, $question_id))
        {
            print("could not insert into tags table");
        }
        
        
        //$row = fgetcsv($handle, 1000, "\t");
    //$row = fgetcsv($handle, 1000, "\t");
        // $row = explode(',', $row[0]);
        // // insert question into database
        // //print($row);
        // print("got here");
        // exit(1);
        // var_dump($row);
        // //if (!(CS50::query("INSERT IGNORE INTO questions (Year, Quiz_num, Question_num) VALUES (?,?,?)", $row[0], $row[1], $row[2])))
        // // CS50::query("INSERT IGNORE INTO users (username, hash, viewNum, name1, name2) 
        // //     VALUES(?, ?, 1, ?, ?)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT), 
        // //     $_POST["name1"], $_POST["name2"]);
        // // {
        // //     print("Could not insert into questions table.\n");
        // // }
        // // if (!tag_insert($row, $question_id))
        // // {
        // //     print("could not insert into tags table");
        // // }
        $question_id++;
    }
    fclose($handle);

    print("ended");
    // success
    exit(0);
    
    //scrap2
    // print(json_encode($row));
    // print("\n");
    // print("result: ");
    // print(json_encode($row));
    // print("\n");
    // print($row[0]);
    // print("\n");
    // print($row[0][0]);
    // print("\n");
    
    
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
