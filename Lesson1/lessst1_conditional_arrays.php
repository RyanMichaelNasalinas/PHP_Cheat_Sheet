<!-- Lesson 1 (2nd) -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Tutorial</title>
</head>

<body>
  <?php
  // Conditional Operators : == != <> <= >= and with
  // Logical Operators : && || !
  $num_oranges = 4;
  $num_bananas = 36;
  // if elseif else, conditional statement
  if (($num_oranges > 25) && ($num_bananas > 30)) {
    echo "25% Discount<br>";
  } elseif (($num_oranges > 25) || ($num_bananas > 35)) {
    echo "15% Discount<br>";
  } elseif (((!$num_oranges < 5)) || ((!$num_bananas < 5))) {
    echo "5% Discount<br>";
  } else {
    echo "No Discount<br>";
  }
  ?>

  <?php
  // Switch Statement
  $age = 17;
  switch (true) {
    case ($age < 5):
      echo "Stay at home<br>";
      break;
    case ($age == 5):
      echo "Go to Kindergarten<br>";
      break;
    case (in_array($age, range(6, 17))):
      $grade = $age - 5;
      echo "Go to grade $grade<br>";
      break;
    default:
      echo "Go to college<br>";
  }
  ?>

  <?php
  // Ternary Operator
  $age = 12;
  $can_vote = ($age >= 18) ? "Can Vote" : 'Can`t Vote';
  echo "Can Vote?" . "&nbsp" . "<b>$can_vote</b><br>";

  // Identical Operator, check data type 
  if ("10" === 10) {
    echo "They are equal<br>";
  } else {
    echo "They aren't equal<br>";
  }
  ?>

  <?php
  // printf - Output a formatted string
  // %c - typ specifier printed
  // %d - integer
  // %.d2f - floating point 2 decimal places
  // %s - string
  printf("%c %d %.2f %s<br>", 65, 65, 1.234, "string");
  echo "<br>";
  ?>

  <?php
  echo "<b>String Length and Numbers</b><br>";
  $rand_str = "          Random String     ";
  printf("Length : %d<br>", strlen($rand_str));
  printf("Length Left Trim : %d<br>", strlen(ltrim($rand_str)));
  printf("Length Right Trim : %d<br>", strlen(rtrim($rand_str)));
  $rand_str = trim($rand_str);
  printf("Uppercase : %s<br>", strtoupper($rand_str));
  printf("Uppercase : %s<br>", strtolower($rand_str));
  printf("Uppercase : %s<br>", ucfirst($rand_str));
  printf("Get the first 6 char : %s<br>", substr($rand_str, 0, 6));
  printf("Index : %s<br>", strpos(strtolower($rand_str), "string"));
  $rand_str = str_replace("String", "<b>Replace Str</b>", $rand_str);
  printf("Replace: %s<br>", $rand_str);
  // 0 - equal,  1st str > 2nd str = + value,1st str < 2nd str = - value 
  printf("A == B: %d<br>", strcmp("A", "B"));
  ?>

  <?php
  echo "<br>";
  echo "<b>Arrays</b><br>";
  // Arrays - store multiple values
  $numbers = ['One', 'Two', 'Three'];
  echo "Number : " . $numbers[0] . "<br>";
  $numbers[3] = 'Four';
  foreach ($numbers as $num) {
    printf("Number : %s<br>", $num);
  }

  $info = ['Name' => 'Ryan', 'Street' => "BHNS"];
  foreach ($info as $key => $value) {
    printf("%s : %s<br>", $key, $value);
  }
  // Add array
  $number2 = ['Five', 'Six'];
  $newNumbers = $numbers + $number2;

  sort($newNumbers); // Sort - ASC
  rsort($newNumbers); // Reverse Sort
  asort($info); // Sort Key Values
  krsort($info); // Sort By Key, DESC

  // Multidimensional array
  $customers = [
    ['Ryan', '123 Main'],
    ['Mike', '123 Main'],
  ];
  echo "<br>";
  // Looping in multidimensional array
  for ($row = 0; $row < 2; $row++) {
    for ($col = 0; $col < 2; $col++) {
      echo $customers[$row][$col] . ', ';
    }
    echo "<br>";
  }
  echo "<br>";
  // Convert String to Array
  $let_str = "A B C D";
  $let_str = explode(' ', $let_str);
  foreach ($let_str as $s) {
    printf("String to Array : %s<br>", $s);
  }
  echo "<br>";
  // Convert Array to String
  $let_str2 = implode(' ', $let_str);
  echo $let_str2 . "<br>";
  echo "<br>";
  // 1 Means true Name key exists
  printf('Key Exists: %d<br>', array_key_exists('Name', $info));
  // Check if parameter exists in array - 0 Means not existing in array
  printf('In Array : %d<br>', in_array('Joy', $numbers));
  ?>
</body>

</html>