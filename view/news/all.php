<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h3>Все новостий</h3>
<?php

foreach ($items as $item):
    echo "<h3>" . $item->time . "</h3>";
    echo $item->title . "<br>";
endforeach;

?>
</body>
</html>
