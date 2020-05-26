<?php
$first_name = filter_input(INPUT_POST, "first_name");
$last_name = filter_input(INPUT_POST, "last_name");
$email = filter_input(INPUT_POST, "email");
$street = filter_input(INPUT_POST, "street");
$city = filter_input(INPUT_POST, "city");
$state = filter_input(INPUT_POST, "state");
$zip = filter_input(INPUT_POST, "zip");
$phone = filter_input(INPUT_POST, "phone");
$birth_date = filter_input(INPUT_POST, "birth_date");
$sex = filter_input(INPUT_POST, "sex");
$lunch_cost = filter_input(INPUT_POST, "lunch_cost", FILTER_VALIDATE_FLOAT);
$date_entered = date('Y-m-d H:i:s');

if ($first_name == null || $last_name == null || $email == null || $street == null || $city == null || $state == null || $zip == null || $phone == null || $birth_date == null || $sex == null || $lunch_cost == false) {
    $err_msg = "All Fields should have values<br>";
    include('db_error.php');
} elseif (!preg_match("/[a-zA-Z]{3,30}$/", $first_name)) {
    $err_msg = "First name is not valid<br>";
    include('db_error.php');
} elseif (!preg_match("/[a-zA-Z]{3,30}$/", $last_name)) {
    $err_msg = "Last name is not valid<br>";
    include('db_error.php');
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $err_msg = "Email is not valid<br>";
    include('db_error.php');
} elseif (!preg_match("/^[a-zA-Z0-9 ,#'\/.]{3,50}$/", $street)) {
    $err_msg = "Street is not valid<br>";
    include('db_error.php');
} elseif (!preg_match("/^[a-zA-Z\- ]{2,58}$/", $city)) {
    $err_msg = "City is not valid<br>";
    include('db_error.php');
} elseif (!preg_match("/^(?:A[KLRZ]|C[AOT]|D[CE]|FL|GA|HI|I[ADLN]|K[SY]|LA|M[ADEINOST]|N[CDEHJMVY]|O[HKR]|PA|RI|S[CD]|T[NX]|UT|V[AT]|W[AIVY])*$/", $state)) {
    $err_msg = "State is not valid<br>";
    include('db_error.php');
} elseif (!preg_match("/^[0-9]{5}$/", $zip)) {
    $err_msg = "Zip Code is not valid<br>";
    include('db_error.php');
} elseif (!preg_match("/(([0-9]{1})*[- .(]*([0-9]{3})[- .)]*[0-9]{3}[- .]*[0-9]{4})+$/", $phone)) {
    $err_msg = "Phone is not valid<br>";
    include('db_error.php');
} elseif (!preg_match("/[0-9- ]{8,12}$/", $birth_date)) {
    $err_msg = "Birth date is not valid<br>";
    include('db_error.php');
} elseif (!preg_match("/[MFmf]{1}$/", $sex)) {
    $err_msg = "Sex is not valid";
    include('db_error.php');
} else {
    require_once('db_connect.php');
    $query = "INSERT into students(first_name, last_name, email, street, city, state, zip, phone,birth_date, sex, date_entered, lunch_cost, student_id) VALUES (:first_name,:last_name,:email,:street,:city,:state,:zip,:phone,:birth_date,:sex,:date_entered,:lunch_cost,:student_id)";

    $stmt = $db->prepare($query);
    $stmt->bindValue(':first_name', $first_name);
    $stmt->bindValue(':last_name', $last_name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':street', $street);
    $stmt->bindValue(':city', $city);
    $stmt->bindValue(':state', $state);
    $stmt->bindValue(':zip', $zip);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':birth_date', $birth_date);
    $stmt->bindValue(':sex', $sex);
    $stmt->bindValue(':date_entered', $date_entered);
    $stmt->bindValue(':lunch_cost', $lunch_cost);
    $stmt->bindValue(':student_id', NULL, PDO::PARAM_INT);

    $execute = $stmt->execute();
    $stmt->closeCursor();
    if (!$execute) {
        print_r($stmt->errorInfo()[2]);
    }
}
require('db_connect.php');
$query_students = "SELECT * FROM students ORDER BY student_id";
$student_stmt = $db->prepare($query_students);
$student_stmt->execute();
$students = $student_stmt->fetchAll();
$student_stmt->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Street</th>
                <th>City</th>
                <th>State</th>
                <th>Zip Code</th>
                <th>Phone</th>
                <th>Birth Date</th>
                <th>Sex</th>
                <th>Entered</th>
                <th>Lunch Cost</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student) : ?>
                <tr>
                    <td><?= $student['student_id']; ?></td>
                    <td><?= $student['first_name'] . " " . $student['last_name'];  ?></td>
                    <td><?= $student['email']; ?></td>
                    <td><?= $student['street']; ?></td>
                    <td><?= $student['city']; ?></td>
                    <td><?= $student['state']; ?></td>
                    <td><?= $student['zip']; ?></td>
                    <td><?= $student['phone']; ?></td>
                    <td><?= $student['birth_date']; ?></td>
                    <td><?= $student['sex']; ?></td>
                    <td><?= $student['date_entered']; ?></td>
                    <td><?= $student['lunch_cost']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h3>Update Student</h3>
    <form action="update_student.php" method="post" id="update_student_form">
        <div>
            <label>Student ID :</label>
            <br>
            <input type="text" name="student_id">
        </div>
        <div>
            <label>First Name :</label>
            <br>
            <input type="text" name="first_name">
        </div>
        <div>
            <label>Last Name :</label>
            <br>
            <input type="text" name="last_name">
        </div>
        <div>
            <label>Email :</label>
            <br>
            <input type="text" name="email">
        </div>
        <div>
            <label>Street :</label>
            <br>
            <input type="text" name="street">
        </div>
        <div>
            <label>City :</label>
            <br>
            <input type="text" name="city">
        </div>
        <div>
            <label>State :</label>
            <br>
            <input type="text" name="state">
        </div>
        <div>
            <label>Zip Code :</label>
            <br>
            <input type="text" name="zip">
        </div>
        <div>
            <label>Phone :</label>
            <br>
            <input type="text" name="phone">
        </div>
        <div>
            <label>Birth Date :</label>
            <br>
            <input type="text" name="birth_date">
        </div>
        <div>
            <label>Sex :</label>
            <br>
            <input type="text" name="sex">
        </div>
        <div>
            <label>Lunch Cost :</label>
            <br>
            <input type="text" name="lunch_cost">
        </div>
        <div>
            <br>
            <input type="submit" value="Update Student">
        </div>
    </form>
</body>

</html>