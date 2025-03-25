<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LV3 - Popis zadataka</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background-color: #f8f9fa;
            border-left: 4px solid #3498db;
            margin-bottom: 10px;
            padding: 15px;
            border-radius: 0 5px 5px 0;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        li:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        a {
            color: #2980b9;
            text-decoration: none;
            font-weight: bold;
            display: block;
        }
        a:hover {
            color: #3498db;
        }
        .description {
            color: #7f8c8d;
            margin-top: 5px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <h1>LV3</h1>
    
    <?php
    $files = glob('*.php');
    $files = array_filter($files, function($file) {
        return $file !== 'index.php';
    });
    
    usort($files, 'strnatcmp');
    
    
    if (count($files) > 0) {
        echo '<ul>';
        foreach ($files as $file) {
            $name = pathinfo($file, PATHINFO_FILENAME);
            
            echo '<li>';
            echo "<a href='{$file}'>{$name}</a>";
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Nema zadataka u ovom folderu.</p>';
    }
    ?>
</body>
</html>