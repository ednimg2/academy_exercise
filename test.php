<?php

function Message($name, $lastname)
{
    echo 'Labas '. $name . ' ' . $lastname;
}

var_dump($argv);

foreach ($argv as $i=>$arg )
{
    if ($arg == "car_park")
    {
        Message($argv[$i+1], $argv[$i+2]);
    }

    if ($arg == "create_car")
    {
        Message($argv[$i+1], $argv[$i+2]);
    }
}


/*$a = readline('Enter a string: ');

echo $a;*/

/*$a = (int)readline('Enter an integer: ');

echo $a;*/

//list($var1, $var2) = explode(' ', readline(' Enter $var1 and $var2: '));

//echo $var1.PHP_EOL;
//echo $var2.PHP_EOL;

//$arr = explode(' ', readline('Enter array (1 2 3 4): '));
//var_dump($arr);

//fscanf(STDIN, "%d %d", $a, $b);

//echo $a .' '. $b;