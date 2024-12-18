<?php
// Initialize variables and error messages
include 'db.php';
$name = $email = $subject = $message = "";
$nameErr = $emailErr = $subjectErr = $messageErr = $successMsg = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate Name
    if (empty($_POST['name'])) {
        $nameErr = "Name is required.";
    } else {
        $name = htmlspecialchars(trim($_POST['name']));
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and spaces are allowed.";
        }
    }

    // Validate Email
    if (empty($_POST['email'])) {
        $emailErr = "Email is required.";
    } else {
        $email = htmlspecialchars(trim($_POST['email']));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format.";
        }
    }

    // Validate Subject
    if (empty($_POST['subject'])) {
        $subjectErr = "Subject is required.";
    } else {
        $subject = htmlspecialchars(trim($_POST['subject']));
    }

    // Validate Message
    if (empty($_POST['message'])) {
        $messageErr = "Message is required.";
    } else {
        $message = htmlspecialchars(trim($_POST['message']));
    }

    // If no errors, process the form
    if (empty($nameErr) && empty($emailErr) && empty($subjectErr) && empty($messageErr)) {
        $successMsg = "Thank you, $name! Your message has been sent successfully.";
        // You can add database saving or email sending logic here
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
<style>
    .myformbtn {
  background-color: #2e8b57;
  color: white;
}
.myformbtn:hover {
  color: #2e8b57;
  border: 1px solid #2e8b57;
  cursor: pointer;
}
</style>
</head>
<body>
<div class="row">
      <nav class="nav navbar navbar-expand-lg fixed-top mynav p-2">
        <div
          class="container-fluid collapse navbar-collapse"
          id="navbarSupportedContent"
        >
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-items">
              <a class="nav-link" href="home.html">Home</a>
            </li>
            <li class="nav-items">
              <a class="nav-link" href="#blogg">Categories</a>
            </li>
            <li class="nav-items">
              <a class="nav-link" href="case-study.html">Case Studies</a>
            </li>
            <li class="nav-items">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-items">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="container py-5">
        <h2>.</h2>
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <?php if (!empty($successMsg)): ?>
                    <div class="alert alert-success"><?php echo $successMsg; ?></div>
                <?php endif; ?>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control <?php echo !empty($nameErr) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter your name">
                        <div class="invalid-feedback"><?php echo $nameErr; ?></div>
                    </div>
                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?php echo !empty($emailErr) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your email">
                        <div class="invalid-feedback"><?php echo $emailErr; ?></div>
                    </div>
                    <!-- Subject Field -->
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control <?php echo !empty($subjectErr) ? 'is-invalid' : ''; ?>" id="subject" name="subject" value="<?php echo $subject; ?>" placeholder="Enter the subject">
                        <div class="invalid-feedback"><?php echo $subjectErr; ?></div>
                    </div>
                    <!-- Message Field -->
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control <?php echo !empty($messageErr) ? 'is-invalid' : ''; ?>" id="message" name="message" rows="4" placeholder="Write your message here"><?php echo $message; ?></textarea>
                        <div class="invalid-feedback"><?php echo $messageErr; ?></div>
                    </div>
                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn myformbtn btn-block">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
