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

    return $rows_affected; // Returns the number or rows affected by the UPDATE
}