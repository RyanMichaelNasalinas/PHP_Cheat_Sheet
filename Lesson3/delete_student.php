<?php
$student_id = filter_input(INPUT_POST, "student_id", FILTER_VALIDATE_INT);

if ($student_id == null) {
    $err_msg = "Student ID should have values<br>";
    include('db_error.php');
} else {
    require_once('db_connect.php');
    $query = "DELETE FROM students WHERE student_id = :student_id";
    $stmt = $db->prepare($query);

    // $stmt->bindValue(':student_id', $student_id);

    $execute = $stmt->execute(['student_id' => $student_id]);
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

</body>

</html>