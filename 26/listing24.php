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