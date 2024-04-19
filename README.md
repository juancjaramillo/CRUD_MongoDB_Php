# CRUD_MongoDB_Php
CRUD básico con MongoDB y PHP


En este ejemplo, se utiliza jQuery para manejar las operaciones CRUD en el lado del cliente y PHP para manejarlas en el lado del servidor, con MongoDB como la base de datos. Asegúrate de instalar el controlador de MongoDB para PHP (**mongodb/mongodb**) mediante Composer y de modificar la conexión a MongoDB y los nombres de la base de datos y la colección según tu configuración.

Aquí te explico cómo hacerlo paso a paso:

1. **Instalar Composer:**
Si aún no tienes Composer instalado, puedes descargarlo e instalarlo desde getcomposer.org.
2. **Crear un archivo composer.json:**
En tu proyecto, crea un archivo llamado **composer.json** si no lo tienes.
Dentro de composer.json, especifica las dependencias que deseas instalar. Para el controlador de MongoDB para PHP, necesitas agregar **"mongodb/mongodb": "^1.12"** a las dependencias. Tu archivo **composer.json** podría verse así:

```json
{
    "require": {
        "mongodb/mongodb": "^1.12"
    }
}
```
3. **Ejecutar Composer:**
Abre una terminal o línea de comandos en el directorio de tu proyecto.
Ejecuta el comando **composer install** para instalar las dependencias especificadas en composer.json, incluyendo el controlador de MongoDB para PHP.

5. **Modificar la conexión a MongoDB en PHP:**
En tu archivo PHP donde te conectas a MongoDB, asegúrate de utilizar el nombre de la base de datos y la colección correctos.
Además, asegúrate de tener la URL de conexión correcta. Por ejemplo, si MongoDB se ejecuta en **localhost** en el puerto **27017** y la base de datos se llama **testdb**, puedes conectar así:

```php
<?php
require 'vendor/autoload.php'; // Cargar dependencias de MongoDB

// Conexión con MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->testdb->users; // Cambiar "testdb" y "users" según tu base de datos y colección
?>
```

Recuerda modificar **"testdb"** y **"users"** con los nombres reales de tu base de datos y colección.

Después de seguir estos pasos, tendrás el controlador de MongoDB para PHP instalado en tu proyecto y podrás conectar tu aplicación PHP con tu base de datos MongoDB.

