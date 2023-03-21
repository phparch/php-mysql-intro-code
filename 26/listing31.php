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