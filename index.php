<?php
$showForm = true;

if (isset($_GET['first']) && isset($_GET['last']) && isset($_GET['age'])) {
    $firstName = filter_input(INPUT_GET, 'first', FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_GET, 'last', FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_input(INPUT_GET, 'age', FILTER_VALIDATE_INT);

    if (!empty($firstName) && !empty($lastName) && $age !== false && $age !== null) {
        $showForm = false;

        echo "<div class='container'>";
        echo "<div class='result'><h2>Hello, my name is $firstName $lastName.</h2>";
        echo "<h2>I am $age years old and </h2>";

        if ($age >= 18) {
            echo "<h2>I am old enough to vote in the United States.</h2>";
        } else {
            echo "<h2>I am not old enough to vote in the United States.</h2>";
        }

        $days = $age * 365;
        echo "<h2>That means I have been alive for approximately $days days.</h2>";

        $currDate = date("m-d-Y");
        echo "<h2>Current date: $currDate</h2></div>";

        
        echo '<form action="' . $_SERVER["PHP_SELF"] . '" method="get">';
        echo '<button class="reset-button" type="submit">Reset Form</button>';
        echo '</form>';
        echo "</div>";
    } else {
        echo '<script>alert("Error: Please provide valid first name, last name, and age parameters.");</script>';
    }
} else {
    echo '<script>alert("Error: Please provide first name, last name, and age parameters.");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET Proj Week 2-2</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php if ($showForm): ?>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>">
                <label class="label" for="first">First Name:</label>
                <input class="input" type="text" id="first" name="first" autocomplete="off"> 
                <label class="label" for="last">Last Name:</label>
                <input class="input" type="text" id="last" name="last" autocomplete="off">
                <label class="label" for="age">Age:</label>
                <input class="input" type="number" id="age" name="age" autocomplete="off">
                <button class="button" type="submit">Submit</button>
            </form>
    <?php endif; ?>
</body>
</html>