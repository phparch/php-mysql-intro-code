<?php
$bool_value = false;
$int_value = 42;
$float_value = 37.4;
$string_value = "The answer to life, the universe, and everything";

if (is_bool($bool_value))
{
    echo '$bool_value IS a boolean data type<br/>';
}

if (is_int($int_value))
{
    echo '$int_value IS an integer data type<br/>';
}

if (is_float($float_value))
{
    echo '$float_value IS a floating point data type<br/>';
}

if (is_string($string_value))
{
    echo '$string_value IS a string data type<br/>';
}