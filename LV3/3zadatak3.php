<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Username, Predmet i Ocijena</title>
</head>

<body>

    <?php
    $predmeti = ["Mikroracunala", "Prog ing", "OS", "C#", "Tej 4"];
    $ocijene = [1, 2, 3, 4, 5];

    function alertEmptyUsername()
    {
        echo "<script>alert('Niste unijeli username!');</script>";
    }

    function alertEmptyPredmet()
    {
        echo "<script>alert('Molimo odaberite predmet!');</script>";
    }

    function alertEmptyOcijena()
    {
        echo "<script>alert('Molimo odaberite ocijenu!');</script>";
    }

    function alertSuccess($username, $predmet, $ocijena)
    {
        echo "<script>alert('Pozdrav $username, odabrali ste predmet: $predmet, ocijena: $ocijena');</script>";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['username']) || isset($_GET['predmet']) || isset($_GET['ocijena'])) {
            $username = htmlspecialchars($_GET['username'] ?? '');
            $predmet = $_GET['predmet'] ?? '';
            $ocijena = $_GET['ocijena'] ?? '';

            if (empty($username)) {
                alertEmptyUsername();
            } elseif (empty($predmet)) {
                alertEmptyPredmet();
            } elseif (empty($ocijena)) {
                alertEmptyOcijena();
            } else {
                alertSuccess($username, $predmet, $ocijena);
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

        <div>Odaberite ocijenu:</div>
        <?php
        foreach ($ocijene as $o) {
            echo "<label><input type='radio' name='ocijena' value='$o'> $o</label> ";
        }
        ?>
        <br><br>

        <button type="submit">Pošalji</button>
    </form>

</body>

</html>