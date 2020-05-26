<!-- Lesson3 (2nd) -->
<?php
// Allowed cookie to be access in any page = "/"
$set_cookie = setcookie("my_cookie", "test_cookie", time() + 86400, "/");
// Delete cookie by rolling back the time
// $delete_cookie = setcookie("my_cookie", "test_cookie", time() - 86400, "/");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie</title>
</head>

<body>
    <?php
    if (!isset($_COOKIE['my_cookie'])) {
        echo "Cookie is not set";
    } else {
        echo "Cookie Value : " . $_COOKIE['my_cookie'] . "<br>";
    }
    ?>

</body>

</html>