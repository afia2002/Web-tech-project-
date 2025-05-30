<?php
session_start();

// Handle logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: Labtask.html");
    exit();
}

// Redirect to login if user is not authenticated or hasn't selected cities
if (!isset($_SESSION["user"]) || !isset($_SESSION["selected_cities"])) {
    header("Location: Labtask.html");
    exit();
}

// Array of city data: City, Country, AQI
$city_data = [
    ["Tokyo", "Japan", 45],
    ["Seoul", "South Korea", 60],
    ["Beijing", "China", 120],
    ["Bangkok", "Thailand", 80],
    ["Singapore", "Singapore", 30],
    ["Delhi", "India", 150],
    ["Jakarta", "Indonesia", 90],
    ["Manila", "Philippines", 85],
    ["Kuala Lumpur", "Malaysia", 55],
    ["Hong Kong", "Hong Kong", 65],
    ["Dhaka", "Bangladesh", 140],
    ["Kathmandu", "Nepal", 110],
    ["Thimphu", "Bhutan", 25],
    ["Hanoi", "Vietnam", 95],
    ["Vientiane", "Laos", 70],
    ["Phnom Penh", "Cambodia", 75],
    ["Taipei", "Taiwan", 50],
    ["Colombo", "Sri Lanka", 60],
    ["Male", "Maldives", 35],
    ["Ulaanbaatar", "Mongolia", 100]
];

// Filter city_data to include only the selected cities
$selected_cities = $_SESSION["selected_cities"];
$filtered_data = array_filter($city_data, function($city) use ($selected_cities) {
    return in_array($city[0], $selected_cities);
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Quality Index Table</title>
<link rel="icon" type="image/x-icon" href="favicon1.ico">    <!-- Favicon -->

    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'EB Garamond', serif;
            background-color: #f5fffa;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #00563f;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .logout-form {
            text-align: center;
            margin-top: 30px;
        }
        .logout-btn {
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
        }
        .logout-btn:hover {
            background-color: #da190b;
        }
    </style>
</head>
<body>
<!-- Header Section -->
<div style="padding: 20px; background-color:#e9ffdb; position: sticky; top: 0; z-index: 1000;">

    <!-- Logo -->
    <img src="logo.jpg" alt="Logo" style="width: 80px; height: 80px; border-radius: 50%; display: block; margin: 0 auto;">
    <h2>Air Quality Index for Selected Cities</h2>
    <table>
        <tr>
            <th>City</th>
            <th>Country</th>
            <th>AQI</th>
        </tr>
        <?php
        foreach ($filtered_data as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row[0]) . "</td>";
            echo "<td>" . htmlspecialchars($row[1]) . "</td>";
            echo "<td>" . htmlspecialchars($row[2]) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <div class="logout-form">
        <form method="POST">
            <input type="submit" name="logout" value="Logout" class="logout-btn">
        </form>
    </div>
</body>
</html>
