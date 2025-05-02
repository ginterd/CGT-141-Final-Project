<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $query = $_POST['query'] ?? '';
    $message = $_POST['message'] ?? '';

    // Simple validation (already validated client-side, but double check)
    if (empty($email) || empty($query) || empty($message)) {
        echo "All fields are required.";
        exit();
    }

    // Do something with the data (save, send email, etc.)
    echo "Thanks, your message has been received!";
}
?>
