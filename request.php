<?php

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: Labtask.html");
    exit();
}

// Initialize error message
$error = "";
$output = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm'])) {
    if (!empty($_POST['cities'])) {
        $selected_cities = $_POST['cities'];
        $city_count = count($selected_cities);
        
        if ($city_count === 10) {
           $_SESSION["selected_cities"] = $selected_cities;
header("Location: showAQI.php");
exit();
        } else {
            $error = "<p style='color: red;'>Please select exactly 10 cities.</p>";
        }
    } else {
        $error = "<p style='color: red;'>Please select exactly 10 cities.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Selection Form</title>
    <link rel="icon" type="image/x-icon" href="favicon1.ico">    <!-- Favicon -->
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'EB Garamond', serif;
            background-color: #f5fffa;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }
        h2 {
            color: #00563f; /* Header font color */
        }        .checkbox-container {
            margin-bottom: 15px;
        }
        .confirm-btn, .cancel-btn {
            padding: 10px 20px;
            color: white;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }
        .confirm-btn {
            background-color: #4CAF50;
        }
        .confirm-btn:hover {
            background-color: #45a049;
        }
        .cancel-btn {
            background-color: #f44336;
        }
        .cancel-btn:hover {
            background-color: #da190b;
        }
    </style>
</head>
<body>

    <h2>Select Asian Cities (Exactly 10 Required)</h2>
    <?php if (!empty($error)) echo $error; ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="checkbox-container">
            <input type="checkbox" id="tokyo" name="cities[]" value="Tokyo">
            <label for="tokyo">Tokyo</label><br>
            
            <input type="checkbox" id="seoul" name="cities[]" value="Seoul">
            <label for="seoul">Seoul</label><br>
            
            <input type="checkbox" id="beijing" name="cities[]" value="Beijing">
            <label for="beijing">Beijing</label><br>
            
            <input type="checkbox" id="bangkok" name="cities[]" value="Bangkok">
            <label for="bangkok">Bangkok</label><br>
            
            <input type="checkbox" id="singapore" name="cities[]" value="Singapore">
            <label for="singapore">Singapore</label><br>
            
            <input type="checkbox" id="delhi" name="cities[]" value="Delhi">
            <label for="delhi">Delhi</label><br>
            
            <input type="checkbox" id="jakarta" name="cities[]" value="Jakarta">
            <label for="jakarta">Jakarta</label><br>
            
            <input type="checkbox" id="manila" name="cities[]" value="Manila">
            <label for="manila">Manila</label><br>
            
            <input type="checkbox" id="kuala_lumpur" name="cities[]" value="Kuala Lumpur">
            <label for="kuala_lumpur">Kuala Lumpur</label><br>
            
            <input type="checkbox" id="hong_kong" name="cities[]" value="Hong Kong">
            <label for="hong_kong">Hong Kong</label><br>

            <input type="checkbox" id="dhaka" name="cities[]" value="Dhaka">
            <label for="dhaka">Dhaka</label><br>

            <input type="checkbox" id="kathmandu" name="cities[]" value="Kathmandu">
            <label for="kathmandu">Kathmandu</label><br>

            <input type="checkbox" id="thimphu" name="cities[]" value="Thimphu">
            <label for="thimphu">Thimphu</label><br>

            <input type="checkbox" id="hanoi" name="cities[]" value="Hanoi">
            <label for="hanoi">Hanoi</label><br>

            <input type="checkbox" id="vientiane" name="cities[]" value="Vientiane">
            <label for="vientiane">Vientiane</label><br>

            <input type="checkbox" id="phnom_penh" name="cities[]" value="Phnom Penh">
            <label for="phnom_penh">Phnom Penh</label><br>

            <input type="checkbox" id="taipei" name="cities[]" value="Taipei">
            <label for="taipei">Taipei</label><br>

            <input type="checkbox" id="colombo" name="cities[]" value="Colombo">
            <label for="colombo">Colombo</label><br>

            <input type="checkbox" id="male" name="cities[]" value="Male">
            <label for="male">Male</label><br>

            <input type="checkbox" id="ulaanbaatar" name="cities[]" value="Ulaanbaatar">
            <label for="ulaanbaatar">Ulaanbaatar</label><br>
        </div>
        <input type="submit" name="confirm" value="Confirm" class="confirm-btn">
        <input type="reset" name="cancel" value="Cancel" class="cancel-btn">
    </form>

    <?php
    // Display the output if form was submitted successfully
    if (!empty($output)) {
        echo $output;
    }
    ?>
</body>
</html>