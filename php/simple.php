<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $query = $_POST['query'] ?? '';
    $message = $_POST['message'] ?? '';

    // You could email this or save to DB here

    // Redirect back with success flag
    header("Location: /contact.html?success=true");
    exit();
}
?>