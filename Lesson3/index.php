<!-- Lesson 3 (1st) -->
<?php
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
    <title>PHP Tutorial</title>
</head>

<body>
    <h1 style="text-align:center">Student Lists</h1>
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
    <h3>Insert Student</h3>
    <form action="add_student.php" method="post" id="add_student_form">
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
            <input type="submit" value="Add Student">
        </div>
    </form>
</body>

</html>