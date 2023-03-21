if (is_readable($_FILES['picture']['tmp_name'])) 
{
   $file_size = getimagesize($_FILES['picture']['tmp_name']);
   if (!empty($file_size) && ($file_size[0] !== 0) && ($file_size[1] !== 0))
   {
       // You're good to go!
   }
   else
   {
       // We've got a problem!
   }
}