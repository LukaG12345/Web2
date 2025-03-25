<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Username i Predmet</title>
</head>

<body>

    <?php
    $predmeti = ["Mikroracunala", "Prog ing", "OS", "C#", "Tej 4"];

    function alertEmptyUsername()
    {
        echo "<script>alert('Niste unijeli username!');</script>";
    }

    function alertEmptyPredmet()
    {
        echo "<script>alert('Molimo odaberite predmet!');</script>";
    }

    function alertSuccess($username, $predmet)
    {
        echo "<script>alert('Pozdrav $username, odabrali ste predmet: $predmet');</script>";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['username']) || isset($_GET['predmet'])) {
            $username = htmlspecialchars($_GET['username'] ?? '');
            $predmet = $_GET['predmet'] ?? '';

            if (empty($username)) {
                alertEmptyUsername();
            } elseif (empty($predmet)) {
                alertEmptyPredmet();
            } else {
                alertSuccess($username, $predmet);
            }
        }
    }
    ?>

    <form method="GET" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <br><br>

        <label for="predmet">Odaberite predmet:</label>
        <select id="predmet" name="predmet">
            <option value="">-- Odaberite predmet --</option>
            <?php
            foreach ($predmeti as $p) {
                echo "<option value='$p'>$p</option>";
            }
            ?>
        </select>
        <br><br>

        <button type="submit">Pošalji</button>
    </form>

</body>

</html>