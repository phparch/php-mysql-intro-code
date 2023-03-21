<?php

function doSomething()
{
    $value1 = 10;

    if ($value1 >= 10)
    {
        $value2 = $value1;
    }
    else
    {
        $value3 = $value1;
    }

    echo $value2; // This outputs an undefined value
}