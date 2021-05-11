# API REST

Este es mi proyecto para la práctica de Backend y Frontend para Lion Systems Solutions.

Se trata de una apliación conectada a una API RESTful, que permite a los usuarios crear y obtener sus opiniones sobre empresas.

Tecnologías utilizadas:
- MySQL
- Laravel 7.4.0
- Vue 2.5.17
- Bootstrap 4.0.0

Como montar el proyecto:
- Es necesario tener instalado un servidor como XAMPP, para cumplir con los requisitos de Laravel.  Mas detalles en https://laravel.com/docs/7.x/installation
- Tener el administrador de dependencias Composer. El instalador se encuentra en https://getcomposer.org/doc/00-intro.md
- Y por último, tener NPM. Debe descargarse de https://nodejs.org/es/ y luego ejecutar el comando
    npm install
- Teniendo Composer instalado, ejecutar el comando
    composer global require laravel/installer
- Cree una base de datos llamada api_rest_bd con el formato utf8_unicode_ci.
- Descargue este proyecto.
- Ir a la linea 11 del archivo composer.json y agregar la version que se tenga de php instalada en la PC. (ej. En "php": "^7.2.5|8.0.3", agregue "|8.0.3").
- Ejecutar el comando
    composer update
- Para instalar las dependencias respectivas del proyecto, ejecutar
    composer install
- Ejecutar los siguientes 3 comandos
    - cp .env.example .env
    - php artisan key:generate
    - chmod 777 -R  storage
- En el archivo .env camie el nombre de la app y el nombre de la base de datos a "nxtgames"
- Vaya a la dirección del proyecto en la terminal del sistema operativo y ejecute el comando
    php artisan migrate
para crear las tablas en la base de datos.
- Y finalmente ejecute el comando
    php artisan serve
- Vaya a un navegador y entre en la direccion proporcionada por la terminal.




Nota: en este punto ya se podrá ver el sitio corriendo.
- Cambiar el nombre de la base de datos en el archivo env.

