<?php

    echo "This is the PHP page<br>";

    $names[] = "Mark";
    $names[] = "John";
    $names[] = "Shaun";
    $names[] = "Harry";
    $names[] = "Walton";
    $names[] = "Lara";

    $c = 1;

    foreach ($names as $name) 
    {
        echo $c . " " . $name . "<br>";

        $c++;
    }