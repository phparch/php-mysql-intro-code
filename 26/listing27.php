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