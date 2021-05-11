# API REST

Este es mi proyecto para la práctica de Backend y Frontend para Lion Systems Solutions.

Se trata de una apliación conectada a una API RESTful, que permite a los usuarios crear y obtener sus opiniones sobre empresas.

Tecnologías utilizadas:
- MySQL
- Laravel 7.4.0
- Vue 2.5.17
- Bootstrap 4.0.0

Instalar XAMPP, Composer, Laravel y NPM.
- Instale XAMPP. Mas detalles en https://laravel.com/docs/7.x/installation
- Baje el instalador de Composser, el cual se encuentra en https://getcomposer.org/doc/00-intro.md e instale Composser.
- Instale Laravel con el comando:
    - composer global require laravel/installer
- Y por último, descargue NPM de https://nodejs.org/es/ y luego ejecute el comando:
    - npm install
    
 Montar el proyecto:
- Descargue este proyecto.
- Valla a la linea 11 del archivo composer.json y agregue la version que se tenga de php instalada en la PC. (ej. En "php": "^7.2.5|8.0.3", agregue "|8.0.3").
- Ejecute los siguientes 5 comandos en la carpeta raíz del proyecto:
    - composer update
    - composer install
    - cp .env.example .env
    - php artisan key:generate
    - chmod 777 -R  storage
- En el archivo .env cambie el nombre de la app y el nombre de la base de datos a "api_rest".
- Cree una base de datos llamada "api_rest_bd" con el formato utf8_unicode_ci.
- Ejecute el comando:
    - php artisan migrate
- Y finalmente ejecute el comando:
    - php artisan serve
- Vaya a un navegador y entre en la dirección proporcionada por la terminal.
