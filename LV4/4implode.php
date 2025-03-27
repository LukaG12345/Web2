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

    function alert($message)
    {
        echo "<script>alert('$message');</script>";
    }

    $username = $predmet = $ocijena = '';
    $usernameValid = true;

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $username = htmlspecialchars($_GET['username'] ?? '');
        $predmet = $_GET['predmet'] ?? '';
        $ocijena = $_GET['ocijena'] ?? '';

        if (empty($username)) {
            alert('Niste unijeli username!');
        } else {
            $usernameValid = in_array(strtolower($username), array_map('strtolower', $korisnici));

            if (!$usernameValid) {
                alert("Ne postoji korisnik s imenom $username");
            } elseif (empty($predmet)) {
                alert('Molimo odaberite predmet!');
            } elseif (empty($ocijena)) {
                alert('Molimo odaberite ocijenu!');
            } else {
                alert("Pozdrav $username, odabrali ste predmet: $predmet, ocijena: $ocijena");
            }
        }
    }
    ?>

    <form method="GET" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?= $username ?>">
        <br><br>

        <label for="predmet">Odaberite predmet:</label>
        <select id="predmet" name="predmet">
            <option value="">-- Odaberite predmet --</option>
            <?= implode('', array_map(function ($p) use ($predmet) {
                $selected = $p === $predmet ? 'selected' : '';
                return "<option value='$p' $selected>$p</option>";
            }, $predmeti)) ?>
        </select>
        <br><br>

        <div>Odaberite ocijenu:</div>
        <?= implode(' ', array_map(function ($o) use ($ocijena) {
            $checked = $o == $ocijena ? 'checked' : '';
            return "<label><input type='radio' name='ocijena' value='$o' $checked> $o</label>";
        }, $ocijene)) ?>
        <br><br>

        <button type="submit">Pošalji</button>
    </form>
</body>

</html>