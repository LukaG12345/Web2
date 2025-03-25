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
    $korisnici = ["asdasd", "das", "dsasdasd", "ivan"];

    function alertEmptyUsername()
    {
        echo "<script>alert('Niste unijeli username!');</script>";
    }

    function alertInvalidUsername($username)
    {
        echo "<script>alert('Ne postoji korisnik s imenom $username');</script>";
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

    $username = '';
    $predmet = '';
    $ocijena = '';
    $usernameValid = true;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['username']) || isset($_GET['predmet']) || isset($_GET['ocijena'])) {
            $username = htmlspecialchars($_GET['username'] ?? '');
            $predmet = $_GET['predmet'] ?? '';
            $ocijena = $_GET['ocijena'] ?? '';

            if (empty($username)) {
                alertEmptyUsername();
            } else {
                $usernameValid = false;
                foreach ($korisnici as $korisnik) {
                    if (strtolower($korisnik) === strtolower($username)) {
                        $usernameValid = true;
                        break;
                    }
                }

                if (!$usernameValid) {
                    alertInvalidUsername($username);
                } elseif (empty($predmet)) {
                    alertEmptyPredmet();
                } elseif (empty($ocijena)) {
                    alertEmptyOcijena();
                } else {
                    alertSuccess($username, $predmet, $ocijena);
                }
            }
        }
    }
    ?>

    <form method="GET" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>">
        <br><br>

        <label for="predmet">Odaberite predmet:</label>
        <select id="predmet" name="predmet">
            <option value="">-- Odaberite predmet --</option>
            <?php
            foreach ($predmeti as $p) {
                $selected = ($p === $predmet) ? 'selected' : '';
                echo "<option value='$p' $selected>$p</option>";
            }
            ?>
        </select>
        <br><br>

        <div>Odaberite ocijenu:</div>
        <?php
        foreach ($ocijene as $o) {
            $checked = ($o == $ocijena) ? 'checked' : '';
            echo "<label><input type='radio' name='ocijena' value='$o' $checked> $o</label> ";
        }
        ?>
        <br><br>

        <button type="submit">Pošalji</button>
    </form>

</body>

</html>