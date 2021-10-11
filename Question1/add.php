<?php
    $mysqli = new mysqli("localhost", "20219078", "Sharun@123", "Sharun");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $regno = $_POST['regno'];
    $name = $_POST["name"];
    $course = $_POST["course"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $description = $_POST["description"];
    $password = $_POST["password"];
    
    // image...
    $image = $_FILES['photo']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

    // Convert password to SHA512
    $password = hash('sha512', $password);

    // Data add to database
    $query = "INSERT INTO student_20219078 (RegNo, Name, Course, Phone, Email, Semester, Description, Photo, Password) VALUES ('$regno', '$name', '$course', '$phone', '$email', '$semester', '$description', '$imgContent', '$password')";
    if ($mysqli->query($query) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }

    echo "<br>";
    echo "<a href='login.html'>Go back to login page</a>";

    $mysqli->close();
?>
