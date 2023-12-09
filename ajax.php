<?php
require_once('contact.class.php');

// Créer une instance de la classe contact
$contacts = new Contact();

$data = $contacts->getAllContacts();

header('Content-Type: application/json');
echo json_encode($data);
?>