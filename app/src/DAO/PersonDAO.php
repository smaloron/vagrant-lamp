<?php
namespace MyApp\DAO;

use MyApp\Model\Person;

class PersonDAO
{



    /**
     * Insertion d'un objet Person dans la BD
     * @param Person $person
     */
    public function insertOne(Person $person){
        $sql = "INSERT INTO persons (name, firstName) VALUES (?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $person->getName(),
            $person->getFirstName()
        ]);
        // Récupération de l'id généré dans la BD
        $person->setId($this->pdo->lastInsertId());
    }

    public function updateOne(Person $person){
        $sql = "UPDATE persons SET name=?, firstName=? WHERE id= ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            $person->getName(),
            $person->getFirstName(),
            $person->getId()
        ]);
    }

    public function findOneById(int $id){
        $sql = "SELECT * FROM persons WHERE id=?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }

    public function findAll(){
        $sql = "SELECT * FROM persons";
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll();
    }





}