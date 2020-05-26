<!-- Lesson 1 (1st) -->
<?php
// Variables
$f_name = "Ryan";
$l_name = "Nasalinas";
$age = 23;
$height = 1.67;
$can_vote = true;
$address = ['street' => '123 Main Street', 'city' => 'Quezon City'];
$state = NULL;
define('PI', 3.1415); // Constant

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP Tutorial</title>
</head>

<body>

	<p>Name: <?= $f_name . ' ' . $l_name; ?></p>
	<form action="" method="GET">
		<label>Your State</label>
		<input type="text" name="state">
		<br>
		<label>Number 1</label>
		<input type="number" name="num1">
		<br>
		<label>Number 2</label>
		<input type="number" name="num2">
		<br>
		<input type="submit" value="Submit">
	</form>
	<?php
	if (isset($_GET) && array_key_exists('state', $_GET)) {
		// Assign GET values
		$state = $_GET['state'];
		if (isset($state) && !empty($state)) {
			echo 'You live in ' . $state . '<br>';
			echo "$f_name lives in $state <br>";
		}
		if (count($_GET) >= 3) {
			$num1 = $_GET['num1'];
			$num2 = $_GET['num2'];
			echo "$num1 + $num2 = " . ($num1 + $num2) . "<br>";
			echo "$num1 - $num2 = " . ($num1 - $num2) . "<br>";
			echo "$num1 * $num2 = " . ($num1 * $num2) . "<br>";
			echo "$num1 / $num2 = " . ($num1 / $num2) . "<br>";
			echo "$num1 % $num2 = " . ($num1 % $num2) . "<br>";
			echo "Increment $num1 = " . ($num1++) . "<br>";
			echo "Decrement $num1 = " . ($num1--) . "<br>";
			echo "<b>Math Functions</b> <br>";
			echo "abs(-5) = " . (abs(-5)) . "<br>";
			echo "ceil(4.45) = " . (ceil(4.45)) . "<br>";
			echo "floor(4.45) = " . (floor(4.45)) . "<br>";
			echo "round(4.45) = " . (round(4.45)) . "<br>";
			echo "max(4,5) = " . (max(4, 5)) . "<br>";
			echo "min(4,5) = " . (min(4, 5)) . "<br>";
			// Raised the power of 2
			echo "pow(4,2) = " . (pow(4, 2)) . "<br>";
			// Square Root
			echo "sqrt(16) = " . (sqrt(16)) . "<br>";
			// Exponent
			echo "exp(1) = " . (exp(1)) . "<br>";
			echo "log(e) = " . (log(exp(1))) . "<br>";
			echo "log10(10) = " . (log10(exp(10))) . "<br>";
			echo "PI = " . pi() . "<br>";
			// Hypotenuse
			echo "hypot(10,10) = " . hypot(10, 10) . "<br>";
			// Degrees to radians
			echo "deg2rad(90) = " . deg2rad(90) . "<br>";
			echo "rad2deg(1.57) = " . rad2deg(1.57) . "<br>";
			// Fast Random Number Generator
			echo "mt_rand(1,50) = " . mt_rand(1, 50) . "<br>";
			// Original Random number generator
			echo "rand(1,50) = " . rand(1, 50) . "<br>";
			// Max Random Number Generator
			echo "Max Random = " . mt_getrandmax() . "<br>";
			echo "is_finite(10) = " . is_finite(10) . "<br>";
			echo "is_finite(10) = " . is_infinite(log(0)) . "<br>";
			echo "is_numeric(\"10\") = " . is_numeric("10") . "<br>";
			// sin, cos, tan, asin, acos, atan, asinh, acosh, atanh, atan2
			echo "sin(0) = " . sin(0) . "<br>";
			echo number_format(12345.6789, 1) . "<br>";
		}
	}
	?>

</body>

</html>