<!-- Lesson 2 (1st) -->
<?php
function check_empty($field)
{
    return (empty($field)) ?  true :  false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial</title>
</head>

<body>
    <form action="" method="post">
        <label>Email : </label>
        <input type="text" name="email"><br>
        <label>Number 1 : </label>
        <input type="text" name="num1"><br>
        <label>Number 2 : </label>
        <input type="text" name="num2"><br>
        <label>Website : </label>
        <input type="text" name="website"><br>
        <input type="submit" value="Submit">
    </form>
</body>
<?php

// Filter/Sanitize Values
if (isset($_POST['email']) && check_empty($_POST['email'])) {
    echo "Email should not be empty<br>";
} else {
    if (isset($_POST['email'])) {
        // Filter Email
        if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
            echo "Email is not valid<br>";
        } else {
            echo "Email is valid<br>";
        }
    }
}

if (isset($_POST['num1']) && check_empty($_POST['num1']) && check_empty($_POST['num2']) && check_empty($_POST['website'])) {
    echo "Number 1 field should not be empty<br>";
    echo "Number 2 field should not be empty<br>";
    echo "Website field should not be empty<br>";
} else {
    if (isset($_POST['num1']) && !empty($_POST['num2'])) {
        // Filter inputs
        $num1 = filter_input(INPUT_POST, 'num1', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $num2 = filter_input(INPUT_POST, 'num2', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $output = sprintf("%.1f + %.1f = %.1f", $num1, $num2, ($num1 + $num2));
        echo htmlspecialchars($output) . '<br>';

        if (isset($_POST['website'])) {
            $website = filter_input(INPUT_POST, 'website', FILTER_VALIDATE_URL);
            echo 'Website : ' . htmlspecialchars($website) . '<br>';
        }
    }
}

// Other Validations: php.net/manual/en/filter.filters.validate.php
// Sanitization Filters : php.net/manual/en/filter.filters.sanitize.php
?>
<br>
<?php
// Sanitize URL 
$con_html = '<a href="#">Sample</a>';
echo $con_html . '<br>';
echo htmlspecialchars($con_html) . '<br>';
echo strip_tags($con_html, '<a>') . '<br>';
$con_html = strip_tags($con_html) . '<br>';
echo $con_html . '<br>';
?>

</html>