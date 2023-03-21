$us_cities_we_lived_in = [
   "Ken" => [
      "California" => "San Diego",
      "Florida" => "Orlando",
      "Wisconsin" => "Madison"
   ],
   "Oscar" => [
      "New York" => "New York",
      "Maryland" => "Baltimore",
      "Virginia" => "Richmond"
   ]
];

echo "I live in {$us_cities_we_lived_in['Ken']['Wisconsin']},<br/>";
echo "and Oscar lives in {$us_cities_we_lived_in['Oscar']['Virginia']}.";