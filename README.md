# Introducción
Esta app consite en el registro de notas mediante una aplicación, esta dividida en 
 * Back-end -> Servicios api rest full (Actual)
 * Front-end -> Aplicación ionic (https://github.com/CesarAntolinez/noteApp)
 
 ## contenido
El aplicativo ionic esta formado de dos partes.
 * Autenticación : Esta creado para generar JSON WEB TOKEN como medio de autentificacion usando las herramientas
    * laravel/passport -> conjunto de autenticación predetermidado por laravel
 *  Notas -> Permite hacer una crud (create, read, update, delete) mediante peticiones http de lus cuales resive (POST, GET, PUT, DELETE) 
 
 ## Requerimientos
  + Laravel 7+
  + Mysql 5.7+
  
  # Instrucciones
  
  Para poder inicializar el sigiente repositorio devera
  
  - Clonar.
  - Ejecutar **composer install**.
  - Ejecutar **cp .env.example .env** para poder generar el archivo de configuracion de ambiente.
  - Configurar la base de datos en .env y crear la base de datos en su servivio de base de datos.
  - Ejecutar **php artisan key:generate** para generar una nueva llave del proyecto.
  - Ejecutar **php artisan serve** para verifivcar la instalación.
  - Ejecutar **php artisan migrate** para migrar la base de datos.
  - Ejecutar **php artisan migrate --seed** para insertar los datos de prueba
  - Para ingresar mediante peticion post al servicio Login el usuario es **user1@gmail.com** y la clave **password**
 
 ## Material de apoyo
 El material guía de construcción de aplicativo se uso del autor "php step by step"
  * youtube -> https://www.youtube.com/channel/UCvHX2bCZG2m9ddUhwxudKYA/featured
  * post -> https://www.youtube.com/watch?v=6qfE-lwRLuY&list=PL8p2I9GklV44rius9tPPXxPnuH0Yb27B4
