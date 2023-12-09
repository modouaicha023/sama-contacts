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

    public function getAllCategories()
    {
        try {
            $query = "SELECT * FROM category";
            $request = $this->connexion->prepare($query);
            $request->execute();

            $categories = $request->fetchAll(PDO::FETCH_ASSOC);
            return $categories;

        } catch (PDOException $pe) {
            echo "Error: " . $pe->getMessage();
            return [];
        }
    }

    function getAllContacts()
    {
        try {

            $query = "SELECT contact.*, category.name AS category_name FROM contact LEFT JOIN category ON contact.category_id = category.id";
            $request = $this->connexion->prepare($query);
            $request->execute();

            $data = $request->fetchAll(PDO::FETCH_ASSOC);
            return $data;

        } catch (PDOException $pe) {
            echo "Erreur : " . $pe->getMessage();
        }

    }

    public function addContact()
    {
        try {
            $query = "INSERT INTO contact (first_name, last_name, phone, email, address, category_id) 
                      VALUES (:first_name, :last_name, :phone, :email, :address, :category_id)";

            $request = $this->connexion->prepare($query);

            $request->bindParam(':first_name', $this->first_name, PDO::PARAM_STR);
            $request->bindParam(':last_name', $this->last_name, PDO::PARAM_STR);
            $request->bindParam(':phone', $this->phone, PDO::PARAM_STR);
            $request->bindParam(':email', $this->email, PDO::PARAM_STR);
            $request->bindParam(':address', $this->address, PDO::PARAM_STR);
            $request->bindParam(':category_id', $this->category_id, PDO::PARAM_INT);

            $request->execute();

            return true;

        } catch (PDOException $pe) {
            echo "Erreur : " . $pe->getMessage();
            return false;
        }
    }
}

?>