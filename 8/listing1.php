<?php
$word1 = 'flibertigibbits'; // $word1 is set, but not empty
$word2 = '';                // $word2 is set, but it is also empty

if (isset($word1))
{
    echo '$word1 is set<br />';
}
else
{
    echo '$word1 is NOT set<br />';
}

if (empty($word1))
{
    echo '$word1 is empty<br />';
}
else
{
    echo '$word1 is NOT empty<br />';
}

if (isset($word2))
{
    echo '$word2 is set<br />';
}
else
{
    echo '$word2 is NOT set<br />';
}

if (empty($word2))
{
    echo '$word2 is empty<br />';
}
else
{
    echo '$word2 is NOT empty<br />';
}

if (isset($word3))
{
    echo '$word3 is set<br />';
}
else
{
    echo '$word3 is NOT set<br />'; // $word3 doesn't exist so it is not set
}

if (empty($word3))
{
    echo '$word3 is empty<br />';   // $word3 is considered empty even though it doesn't exist
}
else
{
    echo '$word3 is NOT empty<br />';
}