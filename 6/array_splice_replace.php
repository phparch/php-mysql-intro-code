$us_states = [
   "California", 
   "Arizona", 
   "Florida", 
   "Wisconsin"
];

$more_us_states = ["Virginia", "New York"];
// Removes 'Arizona' and 'Florida', and replaces
// them with 'Virginia' and 'New York'
array_splice($us_states, 1, 2, $more_us_states);

echo "<pre>";
print_r($us_states);
echo "</pre>";