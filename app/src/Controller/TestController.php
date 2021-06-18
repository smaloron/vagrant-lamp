<?php


namespace MyApp\Controller;


use MyApp\DAO\PersonDAO;
use MyApp\Model\Person;

class TestController
{

    /**
     * Instance de PDO
     * @return \PDO
     */
    private function getPDO(): \PDO
    {
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        $pdo = new \PDO(DSN, DB_USER, DB_PASS, $options);

        return $pdo;
    }

    public function insert(){
        try {
            // Instanciation de PDO
            $pdo = $this->getPDO();

            // Instanciation de Person
            $marie = new Person();
            $marie->setFirstName("Marie")->setName("Curie");

            var_dump($marie);

            // Instanciation du DAO
            $dao = new PersonDAO($pdo);
            $dao->insertOne($marie);

            var_dump($marie);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update(){
        try{
            $pdo = $this->getPDO();
            $marie = new Person();
            $marie->setFirstName("Marie")->setName("Stuart")->setId(1);

            $dao = new PersonDAO($pdo);

            $dao->updateOne($marie);

            var_dump($marie);
        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function findAll(){
        try{
            $pdo = $this->getPDO();

            $dao = new PersonDAO($pdo);

            $data = $dao->findAll();

            var_dump($data);
        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function findOne(){
        try{
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
            $pdo = $this->getPDO();

            $dao = new PersonDAO($pdo);

            $data = $dao->findOneById($id);

            var_dump($data);
        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function deleteOne(){
        try{
            $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
            $pdo = $this->getPDO();

            $dao = new PersonDAO($pdo);

            $dao->deleteOneById($id);

            var_dump($dao->findAll());

        } catch (\Exception $e){
            echo $e->getMessage();
        }
    }





}