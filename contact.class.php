<?php
class Contact
{
    private $first_name;
    private $last_name;
    private $phone;
    private $email;
    private $address;
    private $category_id;

    private $connexion;

    private $DB_DHN = "mysql:host=localhost;dbname=test";
    private $DB_USERNAME = "root";
    private $DB_PASSWORD = "";

    public function __construct()
    {
        try {
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $this->connexion = new PDO($this->DB_DHN, $this->DB_USERNAME, $this->DB_PASSWORD, $options);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getCategory()
    {
        return $this->category_id;
    }

    public function setCategory($category_id)
    {
        $this->category_id = $category_id;
    }



    function getAllContacts()
    {
        try {

            $query = "SELECT * FROM contact";
            $request = $this->connexion->prepare($query);
            $request->execute();

            $data = $request->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        } catch (PDOException $pe) {
            echo "Erreur : " . $pe->getMessage();
        }



    }
}

?>