<h2>IOT ADMIN SERVIDOR</h2>

<h2>Instalación</h2>

<h3>Instalar Composer</h3>

apt-get install composer

<h3>Clonar el repo</h3>

Renombrar el archivo .env.example a .env y configurar las credenciales de la base de datos

<p>DB_CONNECTION=mysql</br>
DB_HOST=127.0.0.1 // para localhost</br>
DB_PORT=3306</br>
DB_DATABASE=iot_admin // tiene que estar creada</br>
DB_USERNAME=root</br>
DB_PASSWORD=</br>
</p>
<h3>Instalar dependencias</h3>

En la Raiz del proyecto correr

<code>composer update</code>

generar clave para 

<code>php artisan key:generate</code>

Instalar Base de datos

<code>php artinsa migrate</code>
