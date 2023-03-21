<?php

class StudentManager
{
   // Database connection constants
   private const DB_TECHNOLOGY = "mysql";
   private const DB_HOST = "localhost";
   private const DB_NAME = "Student";
   private const DB_USER = "testuser";
   private const DB_PASSWORD = "testuser";

   // Results in DSN = "mysql:host=localhost;dbname=Student"
   private const DSN = self::DB_TECHNOLOGY
                     . ':host=' . self::DB_HOST
                     . ';dbname=' . self::DB_NAME;

   public function create($first_name, $last_name, $email)
   {
      $db = new PDO(self::DSN, self::DB_USER, self::DB_PASSWORD);

      // Insert  a new record
      $sql = "INSERT INTO student(`first_name`, `last_name`, `email`) 
                    VALUES (:first_name, :last_name, :email)";

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      try
      {
         $query = $db->prepare($sql);
         $query->bindParam(":first_name", $first_name, PDO::PARAM_STR);
         $query->bindParam(":last_name", $last_name, PDO::PARAM_STR);
         $query->bindParam(":email", $email, PDO::PARAM_STR);
         $query->execute();
      } catch (Exception $ex)
      {
         echo $ex->getMessage() . "<br/>";
      }

      // Returns the primary key of this INSERT
      return $db->lastInsertId();
   }
}