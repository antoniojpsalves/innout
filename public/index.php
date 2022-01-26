<h1>Olaff</h1>
<hr>
<?php

require_once(dirname(__FILE__, 2) . '/src/config/Database.php');

$sql = "SELECT * FROM users ";

$data = Database::getResultFromQuery($sql);


echo "<pre>";
while($row = $data->fetch_assoc()) {
    print_r($row);
    echo "<br>";
}
echo "</pre>";