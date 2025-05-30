<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['loginEmail'] ?? '');
    $password = trim($_POST['loginPassword'] ?? '');

    $authenticated = false;

    if (file_exists("users.txt")) {
        $lines = file("users.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $line = trim($line); // remove newline characters
            $parts = explode("|", $line);

            if (count($parts) === 2) {
                $savedEmail = trim($parts[0]);
                $savedPassword = trim($parts[1]);

                if ($email === $savedEmail && $password === $savedPassword) {
                    $authenticated = true;
                    break;
                }
            }
        }
    }

    if ($authenticated) {
        $_SESSION['user'] = $email;
        header("Location: request.php");
        exit();
    } else {
        echo "<script>
                alert('Invalid login credentials.');
                window.location.href = 'Labtask.html';
              </script>";
        exit();
    }
}
?>

