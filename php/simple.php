<?php
// Server-side: simple.php

// Capture the form fields (optional: add validation/sanitization)
$email = $_POST['email'] ?? '';
$query = $_POST['query'] ?? '';
$message = $_POST['message'] ?? '';

// You could store this in a database, email it, etc.
// For now, we just redirect.

header("Location: ../index.html?success=true"); // Go back to the HTML page
exit();
?>