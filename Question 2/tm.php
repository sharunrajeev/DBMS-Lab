<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
</head>
<body>
    <?php
        require("db.php");
        exec("ps aux | head -n 1", $header);
        exec("ps aux | tail -n 2", $output);
        echo "$header[0]" . "<br>";
        foreach ($output as $line) {
            foreach (explode(" ", $line) as $word) {
                echo "$word ";
            }
            echo "<br>";
        }

    ?>
</body>
</html>