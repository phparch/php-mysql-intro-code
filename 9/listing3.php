<?php
$random_words = ['one', 'two', 'three', 'anxious', 'ecstatic'];

for ($i = 1; $i <= 9; i++ )
{
    if ($i % 3)
    {
        continue;
    }

    echo "$i<br/>";
}