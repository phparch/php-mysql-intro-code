<?php
    require_once('Student.php');

    class StudentManager
    {
        // Database connection constants
        private const DB_TECHNOLOGY = "mysql";
        private const DB_HOST = "database";
        private const DB_NAME = "Student";
        private const DB_USER = "testuser";
        private const DB_PASSWORD = "testuser";

        // Results in DSN = "mysql:host=localhost;dbname=Student"
        private const DSN = self::DB_TECHNOLOGY.':host='.self::DB_HOST.';dbname='.self::DB_NAME;

        public function create($first_name, $last_name, $email)
        {
            $db = new PDO(self::DSN, self::DB_USER, self::DB_PASSWORD);

            // Insert  a new record
            $sql = "INSERT INTO student(`first_name`, `last_name`, `email`) VALUES (:first_name, :last_name, :email)";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try
            {
                $query = $db->prepare($sql);
                $query->bindParam(":first_name", $first_name, PDO::PARAM_STR);
                $query->bindParam(":last_name", $last_name, PDO::PARAM_STR);
                $query->bindParam(":email", $email, PDO::PARAM_STR);
                $query->execute();
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage() . "<br/>";
            }

            return $db->lastInsertId(); // Returns the primary key of this INSERT
        }

        public function readAll()
        {
            $db = new PDO(self::DSN, self::DB_USER, self::DB_PASSWORD);

            // Read all records
            $sql = "SELECT * FROM student";

            try 
            {
                $query = $db->prepare($sql);
                $query->execute();

                // Gets a numeric array of the query results with each element
                // set to a Student object containing the row's fields
                $results = $query->fetchAll(PDO::FETCH_CLASS, "Student");
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }

            return $results;
        }
            
        public function readById($id)
        {
            $db = new PDO(self::DSN, self::DB_USER, self::DB_PASSWORD);

            // Read the record given by the id
            $sql = "SELECT * FROM student WHERE id=:id";

            try 
            {
                $query = $db->prepare($sql);
                $query->bindParam(":id", $id, PDO::PARAM_INT);
                $query->execute();

                // Fetch result into instance of a Student object
                $result = $query->fetchObject("Student"); 
            }
            catch(Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }

            return $result;
        }

        public function update($id, $first_name, $last_name, $email)
        {
            $db = new PDO(self::DSN, self::DB_USER, self::DB_PASSWORD);

            // UPDATE a record with a given first name, last name, and email for a given id
            $sql = "UPDATE student SET `first_name`=:first_name, `last_name`=:last_name, "
                    . "`email`=:email WHERE id=:id";

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            try
            {
                $query = $db->prepare($sql);
                $query->bindParam(":id", $id, PDO::PARAM_INT);
                $query->bindParam(":first_name", $first_name, PDO::PARAM_STR);
                $query->bindParam(":last_name", $last_name, PDO::PARAM_STR);
                $query->bindParam(":email", $email, PDO::PARAM_STR);
                $query->execute();
                $rows_affected = $query->rowCount();
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage() . "<br/>";
            }
        
            return $rows_affected; // Returns the number of rows affected by the UPDATE
        }        

        public function delete($id)
        {
            $db = new PDO(self::DSN, self::DB_USER, self::DB_PASSWORD);
        
            // Delete a record
            $sql = "DELETE FROM student WHERE id=:id";
        
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            try
            {
                $query = $db->prepare($sql);
                $query->bindParam(":id", $id, PDO::PARAM_INT);
                $query->execute();
                $rows_affected = $query->rowCount();
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage() . "<br/>";
            }
        
            return $rows_affected; // Returns the number of rows affected by the DELETE
        }        
    }