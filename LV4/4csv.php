<?php
function getArray($inputText)
{
    $lines = explode("\n", trim($inputText));

    $result = [];
    foreach ($lines as $line) {
        $trimmedLine = trim($line);
        if (!empty($trimmedLine)) {
            $result[] = $trimmedLine;
        }
    }

    return $result;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['text_input'])) {
    $inputText = $_POST['text_input'];
    $arrayFromInput = getArray($inputText);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV to Array Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        textarea {
            width: 100%;
            height: 150px;
            margin-bottom: 10px;
        }

        pre {
            background-color: #f5f5f5;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>Pretvori tekst u niz</h1>

    <form method="POST" action="">
        <label for="text_input">Unesite tekst (svaka vrijednost u novom redu):</label><br>
        <textarea id="text_input" name="text_input"
            placeholder="Unesite vrijednosti, svaku u novom redu"><?= isset($_POST['text_input']) ? htmlspecialchars($_POST['text_input']) : '' ?></textarea><br>
        <button type="submit">Pošalji</button>
    </form>

    <?php if (isset($arrayFromInput)): ?>
        <h2>Rezultat:</h2>
        <pre><?php print_r($arrayFromInput); ?></pre>
    <?php endif; ?>
</body>

</html>