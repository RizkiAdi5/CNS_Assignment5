<?php
// database connection
include ("dbconnect.php");

$id = $_GET['id'];
// show data related to GET

$sql = "SELECT * FROM student WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .container {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 350px;
    }
    h2 {
        text-align: center;
        color: #333;
    }
    table {
        width: 100%;
    }
    td {
        padding: 10px;
    }
    input, select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="radio"] {
        width: auto;
        margin-right: 5px;
    }
    .submit-btn {
        width: 100%;
        background: #007BFF;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .submit-btn:hover {
        background: #0056b3;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Update Student Info</h2>
    <form action="updated.php" method="post" name="register">
        <input type="hidden" value="<?php echo $row['id']; ?>" name="id" />
        <table>
            <tr>
                <td>Student ID</td>
                <td>:</td>
                <td><input name="studentid" type="text" value="<?php echo $row['student_id']; ?>" ></td>
            </tr>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><input name="name" type="text" value="<?php echo $row['name']; ?>"></td>
            </tr>
            <tr>
                <td>Faculty</td>
                <td>:</td>
                <td>
                    <select name="faculty" id="faculty">
                        <option value="<?php echo $row['faculty']; ?>" selected><?php echo $row['faculty']; ?> </option>
                        <?php 
                            $sql=mysqli_query($conn, "SELECT * FROM faculty");
                            while ($data=mysqli_fetch_array($sql)) {
                        ?>
                        <option value="<?=$data['faculty']?>"><?=$data['faculty']?></option> 
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>
                    <label><input type="radio" name="gender" value="Female" <?php if ($row['gender'] == 'Female') echo 'checked="checked"'; ?>> Female</label>
                    <br/>
                    <label><input type="radio" name="gender" value="Male" <?php if ($row['gender'] == 'Male') echo 'checked="checked"'; ?>> Male</label>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="Submit" value="Submit" class="submit-btn">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
