<?php

function add($name)
{
    echo 'Labas '. $name;
}

foreach ($argv as $i=>$arg )
{
    if ( $arg == "add" )
    {
        add($argv[$i+1]);
    }
}

// For input
// Hello World
$a = readline('Enter a string: ');

// Input section
// $a = 10
$a = (int)readline('Enter an integer: ');

// Input 10 20
list($var1, $var2)
    = explode(' ', readline(' Enter $var1 and $var2: '));

// For input
// 1 2 3 4 5 6
$arr = explode(' ', readline('Enter array (1 2 3 4): '));

// Input 1 5
fscanf(STDIN, "%d %d", $a, $b);