<?php

class Dbh
{
    private $dbh;
    private $error;

    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=localhost;dbname=00252698_rrm', 'root', '');
    }

    public function executeQuery($query)
    {
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt        = $this->dbh->prepare($query);
        $result      = $stmt->execute();
        $this->error = $this->dbh->errorInfo();
    }

    public function executeSelect($query)
    {
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt   = $this->dbh->prepare($query);
        $result = $stmt->execute();
        $this->error = $this->dbh->errorInfo();
        $entry = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $entry;
    }
}
$conn = mysqli_connect("localhost", "root", "", "00252698_rrm");
?>
