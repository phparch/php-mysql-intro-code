<?php
function addTwoNumbers($num1, $num2)
{
    $sum = $num1 + $num2;
    echo "$num1 + $num2 = $sum<br/>";
}

function sum($num1, $num2)
{
    $sum = $num1 + $num2;
    return $sum;
}

addTwoNumbers(4, 5);
addTwoNumbers(-2, 5);

$first_num = 5;
$second_num = 7;

$sum_of_two_numbers = sum($first_num, $second_num);
echo "The result of adding $first_num and $second_num is $sum_of_two_numbers<br/>";
?>
