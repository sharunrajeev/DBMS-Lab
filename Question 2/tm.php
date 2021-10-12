<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <style>
        table,
        tr,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        input {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php
    // header("refresh: 20");

    $words = array();

    // Change the username, password and database name
    $mysqli = new mysqli("localhost", "username", "password", "database");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    // Trucate all the rows
    $mysqli->query("TRUNCATE tasks");

    exec("ps aux | tail -n 10", $output);
    foreach ($output as $line) {
        $words = preg_split("/\s+/", $line);
        $mysqli->query("INSERT INTO tasks (USER,PID,CPU,MEM,VSZ,RSS,TTY,STAT,START,TIME,COMMAND) VALUES('$words[0]','$words[1]','$words[2]','$words[3]','$words[4]','$words[5]','$words[6]','$words[7]','$words[8]','$words[9]','$words[10]')");
    }

    // Displaying from DB
    echo '<form action="" method="POST">';
    echo '<table>';
    echo '<tr><th>KILL</th><th>USER</th><th>PID</th><th>CPU%</th><th>MEM%</th><th>VSZ</th><th>RSS</th><th>TTY</th><th>STAT</th><th>START</th><th>TIME</th><th>COMMAND</th></tr>';
    $result = $mysqli->query("SELECT * FROM tasks");
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo '<td><input type="checkbox" name="kill[]" value='.$row['PID'].'></td>';
            echo "<td>$row[USER]</td>";
            echo "<td>$row[PID]</td>";
            echo "<td>$row[CPU]</td>";
            echo "<td>$row[MEM]</td>";
            echo "<td>$row[VSZ]</td>";
            echo "<td>$row[RSS]</td>";
            echo "<td>$row[TTY]</td>";
            echo "<td>$row[STAT]</td>";
            echo "<td>$row[START]</td>";
            echo "<td>$row[TIME]</td>";
            echo "<td>$row[COMMAND]</td>";
            echo "</tr>";
        }
    }
    echo "</table>";

    // Submit button
    echo "<input type='submit' value='Submit' name='submit'>";
    echo "</form>";
    if (isset($_POST['submit'])) {
        if (!empty($_POST['kill'])) {
            foreach ($_POST['kill'] as $checked) {
                exec("kill -9".$checked, $unknown);
                echo implode("<br>",$unknown);
            }
        }
    }

    // Refresh button
    echo '<form action="" method="POST">';
    echo "<input type='submit' value='Refresh' name='refresh'>";
    echo "</form>";
    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['refresh'])) {
        header("refresh");
    }



    ?>
</body>

</html>