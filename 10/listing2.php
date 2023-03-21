<?php
function incrementValueNotWorking($value)
{
    $value++;
}

$number = 42;

echo "Before function call: $number<br/>";

incrementValueNotWorking($number);

echo "After function call: $number";