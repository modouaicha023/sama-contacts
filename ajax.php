<?php
require_once('contact.class.php');

$contacts = new Contact();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['contact_id'])) {
        $contactId = $_POST['contact_id'];
        $formData = $_POST['formData'];


        $contacts->setFirstName($formData['first_name-details']);
        $contacts->setLastName($formData['last_name-details']);
        $contacts->setPhone($formData['phone-details']);
        $contacts->setEmail($formData['email-details']);
        $contacts->setAddress($formData['address-details']);
        $contacts->setCategory($formData['category_id-details']);

        if ($contacts->editContact($contactId)) {
            ob_clean();
            echo json_encode(["status" => "success", "message" => "Contact updated successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error updating contact."]);
            echo json_encode(["status" => "error", "message" => "Error updating contact."]);
            echo json_encode(["status" => "error", "message" => "Error updating contact."]);
            echo json_encode(["status" => "error", "message" => "Error updating contact."]);
            echo json_encode(["status" => "error", "message" => "Error updating contact."]);
            echo json_encode(["status" => "error", "message" => "Error updating contact."]);
            echo json_encode(["status" => "error", "message" => "Error updating contact."]);
        }
        exit;
    }


    $contacts->setFirstName($_POST["first_name"]);
    $contacts->setLastName($_POST["last_name"]);
    $contacts->setPhone($_POST["phone"]);
    $contacts->setEmail($_POST["email"]);
    $contacts->setAddress($_POST["address"]);
    $contacts->setCategory($_POST["category_id"]);

    if ($contacts->addContact()) {
        ob_clean();
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