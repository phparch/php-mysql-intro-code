<?php
function incrementValue($value)
{
    $value++;

    return $value;
}

$number = 42;

echo "Before function call: $number<br/>";

$number = incrementValue($number);

echo "After function call: $number";