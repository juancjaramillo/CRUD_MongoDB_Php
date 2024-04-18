# CRUD_MongoDB_Php
CRUD básico con MongoDB y PHP


En este ejemplo, se utiliza jQuery para manejar las operaciones CRUD en el lado del cliente y PHP para manejarlas en el lado del servidor, con MongoDB como la base de datos. Asegúrate de instalar el controlador de MongoDB para PHP (mongodb/mongodb) mediante Composer y de modificar la conexión a MongoDB y los nombres de la base de datos y la colección según tu configuración.

```<?php
require 'vendor/autoload.php'; // Cargar dependencias de MongoDB

// Conexión con MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->testdb->users; // Cambiar "testdb" y "users" según tu base de datos y colección
?>```

