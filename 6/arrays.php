<?php
    // Fun with arrays
    $us_states = ['California', 'Florida', 'Wisconsin'];

    foreach ($us_states as $state)
    {
        echo "I've lived in: $state.<br/>";
    }
    $us_state_capitals = [
            "California" => "Sacramento",
            "Florida" => "Tallahassee",
            "Wisconsin" => "Madison"];


    echo "<br/>";
    echo "The capital of California is {$us_state_capitals['California']}<br/>";
    echo "The capital of Florida is {$us_state_capitals['Florida']}<br/>";
    echo "The capital of Wisconsin is {$us_state_capitals['Wisconsin']}<br/>";
?>
