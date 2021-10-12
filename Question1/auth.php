<?php

    $mysqli = new mysqli("localhost", "username", "password", "database");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $regno = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $password = hash('sha512', $password);

    // Login logic
    $query = "SELECT * FROM student_20219078 WHERE RegNo = '$regno' AND Password = '$password'";

    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            echo "Register Number : " . $row['RegNo'] . "<br>";
            echo "Name : " . $row['Name'] . "<br>";
            echo "Course : " . $row['Course'] . "<br>";
            echo "Phone : " . $row['Phone'] . "<br>";
            echo "Email : " . $row['Email'] . "<br>";
            echo "Semester : " . $row['Semester'] . "<br>";
            echo "Description : " . $row['Description'] . "<br>";
            echo "Photo : " . $row['Photo'] . "<br>";
       }
    } else {
        echo "Wrong username or password.";
    }

    echo "<br>";
    echo "<a href='login.html'>Go back to login page</a>";

    $mysqli->close();

?>