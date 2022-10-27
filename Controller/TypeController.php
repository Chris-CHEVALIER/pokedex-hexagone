<?php

class TypeController
{
    private PDO $db;

    public function __construct()
    {
        $dbName = "pokedex";
        $port = 8889;
        $userName = "root";
        $password = "root";
        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port;charset=utf8mb4", $userName, $password));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function setDb(PDO $db)
    {
        $this->db = $db;
        return $this;
    }

    public function create(Type $type)
    {
        $req = $this->db->prepare("INSERT INTO `type` (name, color) VALUES (:name, :color)");
        $req->bindValue(":name", $type->getName(), PDO::PARAM_STR);
        $req->bindValue(":color", $type->getColor(), PDO::PARAM_STR);
        $req->execute();
    }

    public function update(Type $type)
    {
        $req = $this->db->prepare("UPDATE `type` SET name = :name, color = :color WHERE id = :id");
        $req->bindValue(":id", $type->getId(), PDO::PARAM_INT);
        $req->bindValue(":name", $type->getName(), PDO::PARAM_STR);
        $req->bindValue(":color", $type->getColor(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(Type $type)
    {
        $req = $this->db->prepare("DELETE FROM `type` WHERE id = :id");
        $req->bindValue(":id", $type->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    public function read(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `type` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $type = new Type($data);
        return $type;
    }

    public function readAll()
    {
        $types = [];
        $req = $this->db->query("SELECT * FROM `type`");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $type = new Type($data);
            $types[] = $type;
        }
        return $types;
    }
}