<?php

$a_word = "serendipity";
$some_words = array("some", "random", "words");

if (is_scalar($a_word))
{
    echo '$a_word IS a scalar variable<br/>';
}

if (!is_scalar($some_words))
{
    echo '$some_words IS NOT a scalar variable<br/>';
}