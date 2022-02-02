<h1>Olaff</h1>
<hr>
<?php

require_once(dirname(__FILE__, 2) . '/src/config/config.php');
require_once(dirname(__FILE__, 2) . '/src/models/User.php');

/* $sql = "SELECT * FROM users ";

$data = Database::getResultFromQuery($sql);


echo "<pre>";
while($row = $data->fetch_assoc()) {
    print_r($row);
    echo "<br>";
}
echo "</pre>"; */

/* $user = new User(['name' => 'Antonio', 'email' => 'dev@syn.com.br']);

echo "<pre>";
print_r($user);
echo "</pre>";

echo "<br>";
$user->email = 'novo@email.com';
print_r($user->email); */



echo '<pre>';
print_r(User::get(['name' => 'Chaves'], 'id, name, email'));
echo '</pre>';

echo '<pre>';
print_r(User::get([], 'name'));
echo '</pre>';
// echo User::getSelect(['name' => 'Chaves', 'email' => 'chaves@cod3r.com.br']);

foreach(User::get([], 'name') as $user){
    echo $user->name;
    echo '<br>';
}