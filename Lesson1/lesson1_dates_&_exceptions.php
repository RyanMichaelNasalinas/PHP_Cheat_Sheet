<!-- Lesson 1 (4th) -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial</title>
</head>

<body>
    <?php
    // PHP timezone - depends on your region 
    date_default_timezone_set('Asia/Manila');
    echo "Current Date : " . date('m-d-y'); // Current Date
    echo "<br>";
    echo "Date : " . date("I F m-d-y g:i:s A") . "<br>";
    $important_date = mktime(0, 0, 0, 12, 21, 1974);
    echo "Important Date : " . date("I F m-d-y g:i:s A", $important_date) . "<br>";
    ?>

    <br>

    <?php
    include "sayHello.php";
    ?>

    <h1>Exception Handling</h1>
    <?php
    // Exception Handling - handle error to keep out program running
    function badDivide($num)
    {
        if ($num == 0) {
            throw new Exception("You can`t divide by zero");
        }
        return $calc = 100 / $num;
    }

    try {
        badDivide(0);
    } catch (Exception $e) {
        echo "Exception : " . $e->getMessage();
    }

    ?>

</body>

</html>