<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate name
    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required';
    }

    // Validate email
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }
 // Validate Location
 if (empty($_POST['location'])) {
    $errors['email'] = 'Location is required';
} elseif (!filter_var($_POST['Location'], FILTER_VALIDATE_Location)) {
    $errors['location'] = 'Invalid location format';
}

// Validate subject
if (empty($_POST['subject'])) {
    $errors['subject'] = 'Subject is required';
}

    // Validate message
    if (empty($_POST['message'])) {
        $errors['message'] = 'Message is required';
    }

    // I)
    if (empty($errors)) {
        // Process the form, for example, send email
        $to = 'your@example.com';
        $subject = 'Contact Form Submission';
        $message = $_POST['message'];
        $headers = 'From: ' . $_POST['email'];

        mail($to, $subject, $message, $headers);

        // 
        header('Location: thank-you.php');
        exit();
    }
}
?>
