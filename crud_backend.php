<?php
require 'vendor/autoload.php'; // Cargar dependencias de MongoDB

// Conexión con MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->testdb->users; // Cambiar "testdb" y "users" según tu base de datos y colección

// Obtener todos los usuarios y mostrarlos en la tabla HTML
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $users = $collection->find();
    foreach ($users as $user) {
        echo '<tr>';
        echo '<td>' . $user['name'] . '</td>';
        echo '<td>' . $user['email'] . '</td>';
        echo '<td>
                <button class="btn btn-primary editUser" data-userid="' . $user['_id'] . '">Editar</button>
                <button class="btn btn-danger deleteUser" data-userid="' . $user['_id'] . '">Eliminar</button>
              </td>';
        echo '</tr>';
    }
}

// Agregar o actualizar un usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['userId'])) { // Actualizar usuario
        $userId = $_POST['userId'];
        $updateResult = $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($userId)],
            ['$set' => ['name' => $_POST['name'], 'email' => $_POST['email']]]
        );
        echo json_encode($updateResult);
    } else { // Agregar nuevo usuario
        $insertResult = $collection->insertOne(['name' => $_POST['name'], 'email' => $_POST['email']]);
        echo json_encode($insertResult);
    }
}

// Eliminar un usuario
if (isset($_POST['deleteId'])) {
    $deleteResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($_POST['deleteId'])]);
    echo json_encode($deleteResult);
}

// Obtener datos de un usuario para editar
if (isset($_POST['editId'])) {
    $user = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($_POST['editId'])]);
    echo json_encode($user);
}
?>
