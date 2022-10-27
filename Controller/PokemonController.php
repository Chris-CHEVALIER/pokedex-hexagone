<?php

class PokemonController
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

    public function create(Pokemon $pokemon)
    {
        $req = $this->db->prepare("INSERT INTO `pokemon` (name, number, id_type1, id_type2, image, region) VALUES (:name, :number, :id_type1, :id_type2, :image, :region)");
        $req->bindValue(":name", $pokemon->getName(), PDO::PARAM_STR);
        $req->bindValue(":number", $pokemon->getNumber(), PDO::PARAM_INT);
        $req->bindValue(":id_type1", $pokemon->getId_type1(), PDO::PARAM_INT);
        $req->bindValue(":id_type2", $pokemon->getId_type2(), PDO::PARAM_INT);
        $req->bindValue(":image", $pokemon->getImage(), PDO::PARAM_STR);
        $req->bindValue(":region", $pokemon->getRegion(), PDO::PARAM_STR);
        $req->execute();
    }

    public function update(Pokemon $pokemon)
    {
        $req = $this->db->prepare("UPDATE `pokemon` SET name = :name, number = :number, id_type1 = :id_type1, id_type2 = :id_type2, image = :image, region = :region WHERE id = :id");
        $req->bindValue(":id", $pokemon->getId(), PDO::PARAM_INT);
        $req->bindValue(":name", $pokemon->getName(), PDO::PARAM_STR);
        $req->bindValue(":number", $pokemon->getNumber(), PDO::PARAM_INT);
        $req->bindValue(":id_type1", $pokemon->getId_type1(), PDO::PARAM_INT);
        $req->bindValue(":id_type2", $pokemon->getId_type2(), PDO::PARAM_INT);
        $req->bindValue(":image", $pokemon->getImage(), PDO::PARAM_STR);
        $req->bindValue(":region", $pokemon->getRegion(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(Pokemon $pokemon)
    {
        $req = $this->db->prepare("DELETE FROM `pokemon` WHERE id = :id");
        $req->bindValue(":id", $pokemon->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    public function read(int $id)
    {
        $req = $this->db->prepare("SELECT * FROM `pokemon` WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $pokemon = new Pokemon($data);
        return $pokemon;
    }

    public function readAll()
    {
        $pokemons = [];
        $req = $this->db->query("SELECT * FROM `pokemon`");
        $req->execute();
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $pokemon = new Pokemon($data);
            //array_push($pokemons, $pokemon);
            $pokemons[] = $pokemon;
        }
        return $pokemons;
    }
}