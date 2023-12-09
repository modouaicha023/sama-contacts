<?php
require_once('contact.class.php');

$contacts = new Contact();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $contacts->setFirstName($_POST["first_name"]);
    $contacts->setLastName($_POST["last_name"]);
    $contacts->setPhone($_POST["phone"]);
    $contacts->setEmail($_POST["email"]);
    $contacts->setAddress($_POST["address"]);
    $contacts->setCategory($_POST["category_id"]);

    if ($contacts->addContact()) {
        echo json_encode(["status" => "success", "message" => "Contact added successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error adding contact."]);
    }
    exit;
}

if ($_GET['action'] == 'getCategories') {
    $categories = $contacts->getAllCategories();
    header('Content-Type: application/json');
    echo json_encode($categories);
    exit;
}
if ($_GET['action'] == 'getAllContacts') {
    $data = $contacts->getAllContacts();
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}
?>