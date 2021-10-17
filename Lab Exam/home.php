<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
</head>
<body>
    <form action="action.php" method="post">
        <h3>Get by date</h3>
        <label for="date">Date : </label>
        <input type="date" name="date" id="date">
        <input type="submit" value="Submit" name="getbydate">
    </form>
    <form action="action.php" method="post">
        <h3>Total bill</h3>
        <input type="text" name='name' placeholder="Customer Name">
        <input type="submit" value="Get details" name="totalbill">
    </form>
    <form action="action" method="post">
        <h3>Daily sales</h3>
        <input type="submit" value="Get daily sales" name="getdaliydata">
    </form>
</body>
</html>