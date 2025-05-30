<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and assign values
    $name = isset($_POST['fullName']) ? htmlspecialchars(trim($_POST['fullName'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
    $dob = isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : '';
    $country = isset($_POST['country']) ? htmlspecialchars($_POST['country']) : '';
    $comments = isset($_POST['comments']) ? htmlspecialchars(trim($_POST['comments'])) : '';
    $terms = isset($_POST['terms']) ? 'Agreed' : 'Not Agreed';

    // Passwords 
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';

    // Basic validation (since JS already did validation)
    if ($name && $email && $gender && $dob && $password && $confirmPassword && ($password === $confirmPassword)) {
        echo "<h2>Registration Successful!</h2>";
        echo "<p><strong>Full Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Date of Birth:</strong> $dob</p>";
        echo "<p><strong>Country:</strong> $country</p>";
        echo "<p><strong>Comments:</strong> " . ($comments ? $comments : 'None') . "</p>";
        echo "<p><strong>Terms and Conditions:</strong> $terms</p>";

// Redirect after 5 seconds
    echo "<p>You will be redirected to the login page shortly...</p>";
    echo "<meta http-equiv='refresh' content='5;url=labtask.html'>";

// Save credentials
file_put_contents("users.txt", "$email|$password\n", FILE_APPEND);



    } else {
        echo "<h2 style='color:red;'>Error: Missing or invalid fields.</h2>";
        echo "<p>Please go back and ensure all required fields are correctly filled out.</p>";
    }
} else {
    echo "<h2>No form was submitted.</h2>";
}

?>
