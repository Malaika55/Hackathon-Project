<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farming_website";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize message variable for user feedback
$message = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the data is set before accessing it
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message_content = isset($_POST['message']) ? $_POST['message'] : '';

    // Check if any field is empty
    if (empty($name) || empty($email) || empty($subject) || empty($message_content)) {
        $message = "All fields are required.";
    } else {
        // Sanitize inputs to prevent SQL injection
        $name = $conn->real_escape_string($name);
        $email = $conn->real_escape_string($email);
        $subject = $conn->real_escape_string($subject);
        $message_content = $conn->real_escape_string($message_content);

        // Insert data into the database
        $sql = "INSERT INTO contact_form (name, email, subject, message) 
                VALUES ('$name', '$email', '$subject', '$message_content')";

        if ($conn->query($sql) === TRUE) {
            $message = "Your message has been sent successfully!";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

