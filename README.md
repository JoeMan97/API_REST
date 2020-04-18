# API REST

Este es mi proyecto para la práctica de Backend y Frontend para Lion Systems Solutions.

Es una apliacion conectada a una API RESTful, que permite a los usuarios crear y obtener sus opiniones sobre empresas.

Tecnologias utilizadas:
- MySQL
- Laravel 7.4.0
- Vue 2.5.17
- Bootstrap 4.0.0

Como montar el proyecto:
- Es necesario tener instalado un servidor como XAMPP, para cumplir con los requisitos de Laravel.  Mas detalles en https://laravel.com/docs/7.x/installation
- Tener el administrador de dependencias Composer. El instalador se encuentra en https://getcomposer.org/doc/00-intro.md
- Teniendo Composer instalado, ejecutar el comando:
    composer global require laravel/installer
- Cree una base de datos llamada api_rest_bd con el formato utf8_unicode_ci.
- Descargue este proyecto.
- Vaya a la direccion del proyecto en la terminal del sistema operativo y ejecute el comando:
    php artisan migrate
para crear las tablas en la base de datos. Y finalmente ejecute el comando:
    php artisan serve
- Vaya a un navegador y entre en la direccion proporcionada por la terminal, no sin antes haber iniciado su servidor de PHP y MySQL.
    
Nota:
No estoy seguro de si para montar el proyecto es necesario tener el administrador de dependencias NPM. De ser asi instale node.js https://nodejs.org/es/ y ejecute el comando:
    npm install
en la terminal del sistema operativo, en la direccion del proyecto.

