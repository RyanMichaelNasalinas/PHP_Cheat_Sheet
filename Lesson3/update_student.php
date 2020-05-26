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
$student_id = filter_input(INPUT_POST, "student_id", FILTER_VALIDATE_INT);

if ($first_name == null || $last_name == null || $email == null || $street == null || $city == null || $state == null || $zip == null || $phone == null || $birth_date == null || $sex == null || $lunch_cost == false || $student_id == null) {
    $err_msg = "All Fields should have values<br>";
    include('db_error.php');
} else {
    require_once('db_connect.php');
    $query = "UPDATE students SET first_name = :first_name, last_name = :last_name, email = :email, street = :street, city = :city, state = :state, zip = :zip, phone = :phone, birth_date = :birth_date, sex = :sex, lunch_cost = :lunch_cost  WHERE student_id = :student_id;";


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
    // $stmt->bindValue(':date_entered', $date_entered);
    $stmt->bindValue(':lunch_cost', $lunch_cost);
    $stmt->bindValue(':student_id', $student_id);

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
    <h3>Delete Student</h3>
    <form action="delete_student.php" method="post" id="delete_student_form">
        <label>Student ID : </label><br>
        <input type="text" name="student_id"><br><br>
        <input type="submit" value="Delete Student">
    </form>

</body>

</html>