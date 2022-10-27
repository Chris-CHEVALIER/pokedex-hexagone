<?php

class Pokemon
{
    private int $id;
    private string $name;
    private int $number;
    private int $id_type1;
    private int $id_type2;
    private string $image;
    private string $region;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key); // setId, setName, setNumber, setId_type1
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * $data = [
     *     "id" => 1,
     *     "name" => "Bulbizarre",
     *     "number" => 1,
     *     "id_type1" => 1,
     *     ...
     * ]
     */

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    public function getId_type1()
    {
        return $this->id_type1;
    }

    public function setId_type1($id_type1)
    {
        $this->id_type1 = $id_type1;
        return $this;
    }

    public function getId_type2()
    {
        return $this->id_type2;
    }

    public function setId_type2($id_type2)
    {
        $this->id_type2 = $id_type2;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }
}