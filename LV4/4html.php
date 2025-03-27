<?php
function getHTMLpage($bodyContent)
{
    $html = '<!DOCTYPE html>
<html>
<head>
    <title>Generated Page</title>
</head>
<body>
    ' . $bodyContent . '
</body>
</html>';

    return $html;
}


echo getHTMLpage('<b>Hello World</b>');
?>