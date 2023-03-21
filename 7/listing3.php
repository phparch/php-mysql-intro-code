<?php
$a_number = 1;
$another_number = 2;

$comparison_result = $a_number <=> $another_number;

switch ($comparison_result) {
	case -1;
		echo "$a_number < $another_number";
	    break;
	case 0;
		echo "$a_number == $another_number";
	    break;
	case 1;
		echo "$a_number > $another_number";
	    break;
   default:
      echo "Error!";
      break;
}