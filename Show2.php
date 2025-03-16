<?php
include ("dbconnect.php");

if(isset($_POST["studentid"]) && isset($_POST["name"]) && isset($_POST["faculty"])&& isset($_POST["gender"]))
{
    $studentid = $_POST['studentid'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $faculty = $_POST['faculty'];
    $sql = "INSERT INTO student(student_id, name, faculty, gender) VALUES ('$studentid', '$name', '$faculty', '$gender')";
    $insert = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student List</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }
    h2 {
        text-align: center;
        color: #333;
    }
    form {
        background: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    input, select {
        padding: 8px;
        margin: 5px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    button {
        padding: 8px 15px;
        border: none;
        background-color: #007BFF;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }
    button:hover {
        background-color: #0056b3;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        text-align: center;
    }
    th, td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        position: relative;
    }
    th {
        background: #007BFF;
        color: white;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
    td:not(:last-child)::after {
        content: "";
        position: absolute;
        width: 1px;
        height: 100%;
        background-color: #ddd;
        right: 0;
        top: 0;
    }
    a {
        text-decoration: none;
        color: #007BFF;
        font-weight: bold;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
<h2>Student List</h2>

<form method="POST">
    <input type="text" name="studentid" placeholder="Student ID" required>
    <input type="text" name="name" placeholder="Name" required>
    <select name="faculty" required>
        <option value="">Select Faculty</option>
        <option value="Engineering">Engineering</option>
        <option value="Business">Business</option>
        <option value="Arts">Arts</option>
    </select>
    <select name="gender" required>
        <option value="">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    <button type="submit">Add Student</button>
</form>

<table>
    <tr>
        <th>NO</th>
        <th>Student ID</th>
        <th>NAME</th>
        <th>FACULTY</th>
        <th>GENDER</th>
        <th>Action</th>
    </tr>
    <?php
        $student = mysqli_query($conn, "SELECT * FROM student");
        $no = 1;
        foreach ($student as $row) {
            echo "<tr>
                <td>$no</td>
                <td>" . $row['student_id'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['faculty'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td>
                    <a href='delete.php?id=" . $row['id'] . "'>Delete</a> &nbsp;
                    <a href='editdata.php?id=" . $row['id'] . "'>Update</a>
                </td>
            </tr>";
            $no++;
        }
    ?>
</table>
</body>
</html>