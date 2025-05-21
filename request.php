<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City Selection Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }
        .checkbox-container {
            margin-bottom: 15px;
        }
        .submit-btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Select Asian Cities</h2>
    <form action="request.php" method="POST">
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
            <input type="checkbox" id="dhili" name="cities[]" value="Dhili">
            <label for="dhili">Dhili</label><br>

        </div>
        <input type="submit" name="submit" value="Submit" class="submit-btn">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        if (!empty($_POST['cities'])) {
            echo "<h3>Selected Cities:</h3><ul>";
            foreach ($_POST['cities'] as $city) {
                echo "<li>" . htmlspecialchars($city) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No cities selected.</p>";
        }
    }
    ?>
</body>
</html>