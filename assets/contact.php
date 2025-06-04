<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // Email settings
    $to = "ieeeiobmstudentbranch@iobm.edu.pk";  // ← Change to your email
    $subject = "New Contact Form Submission from Technova Website";
    $body = "You have received a new message from the Technova contact form.\n\n".
            "Name: $name\n".
            "Email: $email\n".
            "Message:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Message failed to send.";
    }
} else {
    echo "Invalid request.";
}
?>

