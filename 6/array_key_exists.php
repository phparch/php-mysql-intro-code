<?php
$us_state_capitals = [
   "California" => "Sacramento",
   "Florida" => "Tallahassee",
   "Wisconsin" => "Madison"
];

if (array_key_exists('California', $us_state_capitals))
{
   echo "{$us_state_capitals['California']} is the captital of California<br/>";
}

if (!array_key_exists('Montana', $us_state_capitals)) 
{
   echo "The key 'Montana' was not found in us_state_capitals<br/>";
}

