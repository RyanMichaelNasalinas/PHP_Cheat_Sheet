<!-- Lesson 1 (3rd) -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorial</title>
</head>

<body>
    <h1>Loopings</h1>

    <?php
    // While Loop
    $i = 0;
    while ($i < 10) {
        echo ++$i . ', ';
    }

    echo "<br>";

    for ($i = 0; $i < 10; $i++) {
        // print odd numbers
        if (($i % 2) == 0) {
            continue;
        }
        if ($i == 7) break;
        echo $i . ", ";
    }

    echo "<br>";
    $i = 0;
    do {
        echo "Do While : $i<br>";
    } while ($i > 0);
    echo "<br>";
    ?>

    <h1>Functions</h1>
    <?php
    function addNumbers($num1 = 0, $num2 = 0)
    {
        return $num1 + $num2;
    }
    printf("5 + 4 = %d<br>", addNumbers(5, 4));

    // Reference the value inside the function
    function changeMe(&$change)
    {
        $change = 10;
    }
    $change = 5;

    changeMe($change);

    echo "Change : $change<br>";
    ?>

    <?php
    // Convert any parameter to array
    function getSum(...$nums)
    {
        $sum = 0;
        foreach ($nums as $num) {
            $sum += $num;
        }
        return $sum;
    }

    printf("Sum = %d<br>", getSum(1, 2, 3, 4, 5, 6, 7, 8, 9, 10));
    echo "<br>";
    // Return Multiple Values
    function doMath($x, $y)
    {
        return [
            $x + $y,
            $x - $y,
            $x * $y,
            $x / $y,
            $x % $y
        ];
    }

    list($sum, $difference, $product, $quotient, $modulo) = doMath(200, 5);

    echo "Sum = $sum<br>";
    echo "Difference = $difference<br>";
    echo "Product = $product<br>";
    echo "Quotient = $quotient<br>";
    echo "Modulo = $modulo<br>";

    echo "<br>";
    ?>

    <?php
    // Multiply value by itself
    function double($x)
    {
        return $x * $x;
    }
    $list = [1, 2, 3, 4];
    $dbl_list = array_map('double', $list);
    print_r($dbl_list);
    echo "<br>";
    // Reduce the value in a array into a single value
    function mult($x, $y)
    {
        $x *= $y;
        return $x;
    }
    $list = [1, 2, 3, 4];
    $prod = array_reduce($list, 'mult', 1);
    print_r($prod); // return 24 if third param is 2 will return 48

    echo "<br>";
    // Filter Value
    function isEven($x)
    {
        return ($x % 2) == 0;
    }
    echo "<br>";
    $list = [1, 2, 3, 4];
    $even_list = array_filter($list, 'isEven');
    foreach ($even_list as $even) {
        echo "Even Numbers : $even<br>";
    }
    // print_r($even_list);
    ?>


</body>

</html>