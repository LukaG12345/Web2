<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Username Input</title>
</head>

<body>

    <?php
    function alertUsername($username)
    {
        echo "<script>alert('Username: $username');</script>";
    }

    function alertEmptyUsername()
    {
        echo "<script>alert('Niste unijeli username!');</script>";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['username']) && !empty($_GET['username'])) {
            alertUsername($_GET['username']);
        } elseif (isset($_GET['username']) && empty($_GET['username'])) {
            alertEmptyUsername();
        }
    }
    ?>

    <form method="GET" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <button type="submit">Pošalji</button>
    </form>

</body>

</html>