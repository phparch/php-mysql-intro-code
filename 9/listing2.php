<?php
$random_words = ['happy', 'sad', 'finished', 'anxious', 'ecstatic'];

foreach ($random_words as $word)
{
    if ($word == 'finished')
    {
        break;
    }
    echo "$word<br/>";
}