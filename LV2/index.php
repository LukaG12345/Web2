<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocjene</title>
</head>
<body>
    <?php
        $ocjene = array(
            5 => "odličan",
            4 => "vrlo dobar",
            3 => "dobar",
            2 => "dovoljan",
            1 => "nedovoljan"
        );
        
        echo "<p>Originalne ocjene:</p>";
        echo "<pre>";
        print_r($ocjene);
        echo "</pre>";
        
        $ocjene[5] = "izvrstan";

        echo "<p>Ocjene nakon promjene:</p>";
        echo "<pre>";
        print_r($ocjene);
        echo "</pre>";
    ?>
</body>
</html>