<?php
    $us_states = ["California", "Florida", "Wisconsin"];
    $more_us_states = ["Virginia", "Maryland", "New York"];
    $merged_us_states = array_merge($us_states, $more_us_states);
    echo "<pre>";
    print_r($merged_us_states);
    echo "</pre>";
?>
