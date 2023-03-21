<?php
/*
We are formatting phone numbers by stripping all characters
then putting parens around the first 3 numbers adding a
space then grouping the next 3 numbers adding a dash
then the last 4 numbers
*/
function formatPhoneNumber($phone_string)
{
   if (preg_match('/^\+\d(\d{3})(\d{3})(\d{4})$/', $data,  $matches))
   {
      $result = "($matches[1]) $matches[2]-$matches[3]";
      return $result;
   }
}