$us_states = [
   "California", 
   "Arizona", 
   "Florida", 
   "Wisconsin"
];
array_splice($us_states, 1, 2); // Removes 'Arizona' and 'Florida'

echo "<pre>";
print_r($us_states);
echo "</pre>";