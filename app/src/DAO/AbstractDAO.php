<?php


namespace MyApp\DAO;


abstract class AbstractDAO
{
    protected string $tableName;

    protected \PDO $pdo;

    /**
     * PersonDAO constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo, string $tableName)
    {
        $this->pdo = $pdo;
        $this->tableName = $this->secureSQLString($tableName);
    }

    protected function secureSQLString($value){
        return "`".str_replace(";", "",$value)."`";
    }

    public function deleteOneById(int $id){
        $sql = "DELETE FROM ". $this->tableName." WHERE id=?";
        $statement = $this->pdo->prepare($sql);
        return $statement->execute([$id]);
    }
}

